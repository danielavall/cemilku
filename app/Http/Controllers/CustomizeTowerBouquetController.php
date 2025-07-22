<?php

namespace App\Http\Controllers;

use App\Models\Customize;
use App\Models\CustomizeDecoration;
use App\Models\CustomizeSnack;
use App\Models\Decoration;
use App\Models\LayerSnack;
use App\Models\Snack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomizeTowerBouquetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == "admin") {
            return view('customize.index', [
                'customizes' => Customize::with(['snacks', 'decorations'])->get()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->role == "admin") {
            return view('customize.create', [
                'snacks' => Snack::all(),
                'decorations' => Decoration::all()
            ]);
        }
    }

    public function create_tower()
    {
        $snack = LayerSnack::all();
        $decoration = Decoration::all();

        return view('customize_tower.create', compact('snack', 'decoration'));
    }

    public function create_bouquet()
    {
        $snack = LayerSnack::all();
        $decoration = Decoration::all();

        return view('customize_bouquet/create', compact('snack', 'decoration'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $type)
    {
        if (Auth::user()->role == "admin") {
            $data = $request->validate([
                'name' => 'required',
                'type' => 'required',
                'price' => 'required|numeric',
                'image' => 'nullable|string',
                'layer' => 'required|in:2,3,4',
                'snack_id_1' => 'nullable|exists:snacks,id',
                'snack_id_2' => 'nullable|exists:snacks,id',
                'snack_id_3' => 'nullable|exists:snacks,id',
                'snack_id_4' => 'nullable|exists:snacks,id',
                'decoration_id_1' => 'nullable|exists:decorations,id',
                'decoration_id_2' => 'nullable|exists:decorations,id'
            ]);

            $customize = Customize::create($data);

            // pivot table input (optional, jika pakai dynamic snack/decor)
            if ($request->snacks) {
                foreach ($request->snacks as $snackId => $qty) {
                    $customize->snacks()->attach($snackId, ['quantity' => $qty]);
                }
            }

            if ($request->decorations) {
                $customize->decorations()->attach($request->decorations);
            }

            return redirect()->route('customize.index');
        } else {
            $customize = new Customize();
            $customize->name = $request->name;
            $customize->type = $type;
            $customize->layer = $request->layer;
            $customize->price = $request->price;
            $customize->created_at = now();
            $customize->save();

            if ($type == 'tower') {
                for ($i = 1; $i <= $request->layer; $i++) {
                    CustomizeSnack::insert(['customize_id' => $customize->id, 'snack_id' => $request->input('snack_' . $i), 'quantity' => 10, 'created_at' => now()]);
                }

                CustomizeDecoration::insert(['customize_id' => $customize->id, 'decoration_id' => $request->decoration, 'created_at' => now()]);
            } else if ($type == 'bouquet') {
                for ($i = 1; $i <= $request->layer; $i++) {
                    CustomizeSnack::insert(['customize_id' => $customize->id, 'snack_id' => $request->input('snack_' . $i), 'quantity' => 5, 'created_at' => now()]);
                }
            }

            return view('home');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
