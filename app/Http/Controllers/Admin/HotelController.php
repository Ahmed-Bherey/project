<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\HotelContract;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $hotels = Hotel::get();
        // return view('admin.pages.MealPrices.create' , compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $hotels = Hotel::get();
        return view('admin.pages.NewHotel.create' , compact('hotels'));
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
        Hotel::create([
            'name' => $request->name,
            'category' =>$request->category,
            'address' =>$request->address,
            'room_no' =>$request->room_no,
            'tel' =>$request->tel,
            'whatsapp' =>$request->whatsapp,
            'email' =>$request->email,
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
        $hotels = Hotel::FindOrFail($id);
        return view('admin.pages.NewHotel.edit' , compact('hotels'));
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
        $hotels = Hotel::FindOrFail($id);
        $hotels->update([
            'name' => $request->name,
            'category' =>$request->category,
            'address' =>$request->address,
            'room_no' =>$request->room_no,
            'tel' =>$request->tel,
            'whatsapp' =>$request->whatsapp,
            'email' =>$request->email,
        ]);
        return redirect()->route('hotel.create')->with(['success' => '🤗 Successfully updating']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(HotelContract::where('hotel_id',$id)->exists()){
            return redirect()->back()->with(['errors' => '🤗 error Deleting.this hotel has Hotel contract']);

        }
        $hotels = Hotel::findOrFail($id);
        $hotels->delete();
        return redirect()->back()->with(['errors' => '🤗 Successfully deleting']);
    }
}
