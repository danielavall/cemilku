<?php

namespace App\Http\Controllers;

use App\Models\Customize;
use App\Models\CustomizeDecoration;
use App\Models\CustomizeSnack;
use App\Models\Decoration;
use App\Models\LayerSnack;
use Illuminate\Http\Request;

class CustomizeTowerBouquetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_tower()
    {
        $snack = LayerSnack::all();
        $decoration = Decoration::all();

        return view('customize_tower.create', compact('snack', 'decoration'));
    }

    public function create_bouquet(){
        $snack = LayerSnack::all();
        $decoration = Decoration::all();

        return view('customize_bouquet/create', compact('snack', 'decoration'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $type)
    {
        $customize = new Customize();
        $customize->name = $request->name;
        $customize->type = $type;
        $customize->layer = $request->layer;
        $customize->price = $request->price;
        $customize->created_at = now();
        $customize->save();

        if($type == 'tower'){
            for($i = 1; $i <= $request->layer; $i++){
                CustomizeSnack::insert(['customize_id' => $customize->id, 'snack_id' => $request->input('snack_'.$i), 'quantity' => 10, 'created_at' => now()]);
            }

            CustomizeDecoration::insert(['customize_id' => $customize->id, 'decoration_id' => $request->decoration, 'created_at' => now()]);
        }else if($type == 'bouquet'){
            for($i = 1; $i <= $request->layer; $i++){
                CustomizeSnack::insert(['customize_id' => $customize->id, 'snack_id' => $request->input('snack_'.$i), 'quantity' => 5, 'created_at' => now()]);
            }
        }

        return view('home');
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
