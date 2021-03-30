<?php

namespace App\Http\Controllers;
use App\User;
use App\Address;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $addresses = Address::all();
        $array = [];
        foreach($users as $user){
            $user->address;
            array_push($array, [
                'user'=>$user,
                //'adresses'=>$user->address,

            ]);
        }
        //dd($array);
        return response()->json($array);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //dd($request->address[0]['address']);
        $user = new User;
        
        $user->name = $request->input('name'); 
        $user->last_name = $request->input('last_name'); 
        $user->birth_date = $request->input('birth_date'); 
        $user->save();
        foreach($request->address as $addresses){
            $address = new Address;
            $address->address = $addresses['address'];
            $address->user_id = $user->id;
            $address->save();
        }
        
        return response()->json($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
