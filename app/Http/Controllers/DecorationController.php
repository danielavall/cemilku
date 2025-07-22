<?php

namespace App\Http\Controllers;

use App\Exports\DecorationExport;
use App\Imports\DecorationImport;
use App\Models\Decoration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class DecorationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == "admin") {
            $decorations = Decoration::all();
            return view('admin.decoration.index', compact('decorations'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->role == "admin") {
            return view('admin.decoration.create');
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
                'price' => 'required|numeric',
                'stock' => 'required|integer|min:0',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('decorations', 'public');
            }

            Decoration::create($validated);

            return redirect()->route('admin.decoration.index')->with('success', 'Decoration ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('admin.decoration.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Decoration $decoration)
    {
        if (Auth::user()->role == "admin") {
            return view('admin.decoration.edit', compact('decoration'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Decoration $decoration)
    {
        if (Auth::user()->role == "admin") {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric',
                'stock' => 'required|integer|min:0',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            if ($request->hasFile('image')) {
                if ($decoration->image && Storage::disk('public')->exists($decoration->image)) {
                    Storage::disk('public')->delete($decoration->image);
                }

                $validated['image'] = $request->file('image')->store('decorations', 'public');
            }

            $decoration->update($validated);

            return redirect()->route('admin.decoration.index')->with('success', 'Decoration diperbarui!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Decoration $decoration)
    {
        if (Auth::user()->role == "admin") {
            $decoration->delete();

            return redirect()->route('admin.decoration.index')->with('success', 'Decoration dihapus!');
        }
    }

    public function export()
    {
        return Excel::download(new DecorationExport, 'decoration.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new DecorationImport, $request->file('file'));

        return redirect()->route('admincollection.index')->with('success', 'Data decoration berhasil diimpor!');
    }

    public function trash()
    {
        $trashedDecorations = Decoration::onlyTrashed()->get();
        return view('admin.decoration.trash', compact('trashedDecorations'));
    }

    public function restore($id)
    {
        $decoration = Decoration::withTrashed()->findOrFail($id);
        $decoration->restore();
        return redirect()->route('admin.decoration.trash')->with('success', 'Decoration berhasil dipulihkan.');
    }

    public function forceDelete($id)
    {
        $decoration = Decoration::withTrashed()->findOrFail($id);
        $decoration->forceDelete();
        return redirect()->route('admin.decoration.trash')->with('success', 'Decoration berhasil dihapus permanen.');
    }

    public function restoreAll()
    {
        Decoration::onlyTrashed()->restore();
        return redirect()->route('admin.decoration.trash')->with('success', 'Semua decoration berhasil direstore.');
    }
}
