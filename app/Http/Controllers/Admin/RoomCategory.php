<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HotelContract;
use Illuminate\Http\Request;

class RoomCategory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roomCategorys = \App\Models\RoomCategory::all();
        return view('admin.pages.roomCategory.create' , compact('roomCategorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roomCategorys = \App\Models\RoomCategory::all();
        return view('admin.pages.roomCategory.create' , compact('roomCategorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        \App\Models\RoomCategory::create([
            'name' => $request->name,
            'note' =>$request->note,
            'abbreviation'=>$request->abbreviation,
        ]);
        return redirect()->back()->with(['success' => '🤗 Successfully Storing']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $roomCategorys = \App\Models\RoomCategory::FindOrFail($id);
        return view('admin.pages.roomCategory.edit' , compact('roomCategorys'));
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
        $roomCategorys = \App\Models\RoomCategory::FindOrFail($id);
        $roomCategorys->update([
            'name' => $request->name,
            'note' =>$request->note,
            'abbreviation'=>$request->abbreviation,

        ]);
        return redirect()->route('roomCategory.create')->with(['success' => '🤗 Successfully Editing']);
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
        if(HotelContract::where('roomCategory_id',$id)->exists()){
            return redirect()->back()->with(['errors' => '🤗 error Deleting.this Room Category has Hotel contract']);

        }
        $roomCategorys = \App\Models\RoomCategory::findOrFail($id);
        $roomCategorys->delete();
        return redirect()->back()->with(['errors' => '🤗 Successfully deleting']);
    }
}
