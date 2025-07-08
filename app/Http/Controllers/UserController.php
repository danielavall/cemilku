<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role == "admin"){
            return view('admin.user.index');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, string $slug)
    {
        $address = Address::where('user_id', $id)->get();
        return view('profile.index', \compact('address'));
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
        $user = User::findOrFail($id);

        if($request->name){
            $user->name = $request->name;
            $user->gender = Auth::user()->gender;
            $user->date_of_birth = Auth::user()->date_of_birth;
            $user->email = Auth::user()->email;
            $user->phone_number = Auth::user()->phone_number;
        }
        else{
            $user->name = Auth::user()->name;
            $user->gender = $request->gender;
            $user->date_of_birth = $request->dateofbirth;
            $user->email = $request->email;
            $user->phone_number = $request->telepon;
        }

        $user->save();

        return redirect()->route('profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
