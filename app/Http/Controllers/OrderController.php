<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == "admin") {
            return view('admin.order.index');
        }
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
        if (Auth::user()->role == "admin") {
            $data = $request->validate([
                'collection_id' => 'nullable|exists:collections,id',
                'customize_id' => 'nullable|exists:customizes,id',
                'quantity' => 'required|integer|min:1',
                'price' => 'required|numeric|min:0',
                'order_id' => 'required|exists:orders,id'
            ]);

            // Validasi manual: hanya satu yang boleh terisi
            if (is_null($data['collection_id']) === is_null($data['customize_id'])) {
                return back()->withErrors([
                    'collection_id' => 'Harus pilih salah satu: collection atau customize.',
                    'customize_id' => 'Harus pilih salah satu: collection atau customize.'
                ]);
            }

            OrderDetail::create($data);
            return redirect()->route('orders.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
