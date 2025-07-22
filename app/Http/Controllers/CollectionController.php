<?php

namespace App\Http\Controllers;

use App\Exports\CollectionExport;
use App\Imports\CollectionImport;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == "admin") {
            $collections = Collection::with(['snack1', 'snack2', 'snack3', 'snack4'])->get();
            return view('admin.collection.index', compact('collections'));
        } else {
            $cny = Collection::where('category', 'Chinese New Year')->get();
            $ramadhan = Collection::where('category', 'Ramadhan')->get();
            $valentine = Collection::where('category', 'Valentine')->get();
            $christmas = Collection::where('category', 'Christmas')->get();
            $birthday = Collection::where('category', 'Birthday')->get();
            $graduation = Collection::where('category', 'Graduation')->get();

            return view('collections.index', compact('cny', 'ramadhan', 'valentine', 'christmas', 'birthday', 'graduation'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->role == "admin") {
            return view('admin.collection.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->role == "admin") {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'type' => 'required|in:tower,bouquet',
                'layer' => 'required|integer|between:2,4',
                'snack_id_1' => 'nullable|exists:snacks,id',
                'snack_id_2' => 'nullable|exists:snacks,id',
                'snack_id_3' => 'nullable|exists:snacks,id',
                'snack_id_4' => 'nullable|exists:snacks,id',
                'price' => 'required|numeric',
                'stock' => 'required|integer|min:0',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            Collection::create($validated);
            return redirect()->route('admin.collection.index')->with('success', 'Collection berhasil ditambahkan!');
        } else {
            $request->validate([
                'collection_id' => 'required|exists:collections,id',
                'quantity' => 'required|integer|min:1',
                'price' => 'required|numeric|min:0',
            ]);

            $collection = Collection::findOrFail($request->collection_id);

            if ($request->quantity > $collection->stock) {
                return redirect()->back()->with('error', 'Quantity melebihi stok yang tersedia.');
            }

            $userId = Auth::user()->id;

            // Cari cart aktif milik user
            $cart = Cart::where('user_id', $userId)->where('is_active', true)->first();

            // Jika tidak ada, buat cart baru
            if (!$cart) {
                $cart = Cart::create([
                    'user_id' => $userId,
                    'is_active' => true,
                ]);
            }

            // Simpan item ke cart
            $cartItem = new CartItem();
            $cartItem->cart_id = $cart->id;
            $cartItem->collection_id = $request->collection_id;
            $cartItem->quantity = $request->quantity;
            $cartItem->price = $request->price;
            $cartItem->total_price = $request->quantity * $request->price;
            $cartItem->save();

            return redirect()->route('collections.show', ['id' => $request->collection_id])->with('success', true);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(Auth::user()->role == "admin"){
            return redirect()->route('admin.collection.index');
        }else{
            $detail = Collection::findOrFail($id);
            return view('collections.detail', compact('detail'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collection $collection)
    {
        if (Auth::user()->role == "admin") {
            return view('admin.collection.edit', compact('collection'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Collection $collection)
    {
        if (Auth::user()->role == "admin") {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'type' => 'required|in:tower,bouquet',
                'layer' => 'required|integer|between:2,4',
                'snack_id_1' => 'nullable|exists:snacks,id',
                'snack_id_2' => 'nullable|exists:snacks,id',
                'snack_id_3' => 'nullable|exists:snacks,id',
                'snack_id_4' => 'nullable|exists:snacks,id',
                'price' => 'required|numeric',
                'stock' => 'required|integer|min:0',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $collection->update($validated);
            return redirect()->route('admin.collection.index')->with('success', 'Collection berhasil diperbarui!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collection $collection)
    {
        if (Auth::user()->role == "admin") {
            $collection->delete();
            return redirect()->route('admin.collection.index')->with('success', 'Collection berhasil dihapus!');
        }
    }

    public function export()
    {
        return Excel::download(new CollectionExport, 'collection.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new CollectionImport, $request->file('file'));
        return redirect()->route('admincollection.index')->with('success', 'Data collection berhasil diimpor!');
    }

    public function trash()
    {
        $trashedCollections = Collection::onlyTrashed()->get();
        return view('admin.collection.trash', compact('trashedCollections'));
    }

    public function restore($id)
    {
        $collection = Collection::withTrashed()->findOrFail($id);
        $collection->restore();
        return redirect()->route('admin.collection.trash')->with('success', 'Collection berhasil dipulihkan.');
    }

    public function restoreAll()
    {
        Collection::onlyTrashed()->restore();
        return redirect()->route('admin.collection.trash')->with('success', 'Semua collection berhasil direstore.');
    }

    public function forceDelete($id)
    {
        $collection = Collection::withTrashed()->findOrFail($id);
        $collection->forceDelete();
        return redirect()->route('admin.collection.trash')->with('success', 'Collection berhasil dihapus permanen.');
    }
}
