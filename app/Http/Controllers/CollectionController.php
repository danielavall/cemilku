<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cny = Collection::where('category', 'Chinese New Year')->get();
        $ramadhan = Collection::where('category', 'Ramadhan')->get();
        $valentine = Collection::where('category', 'Valentine')->get();
        $christmas = Collection::where('category', 'Christmas')->get();
        $birthday = Collection::where('category', 'Birthday')->get();
        $graduation = Collection::where('category', 'Graduation')->get();

        return view('collections.index', compact('cny', 'ramadhan', 'valentine', 'christmas', 'birthday', 'graduation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return view('detail', compact('collection'));
        $detail = Collection::findOrFail($id);
        return view('collections.detail', compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
