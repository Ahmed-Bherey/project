<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hotel;
use App\Models\HotelContract;
use App\Models\MealPlan;
use App\Models\MealPrice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MealPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $mealPrices = MealPrice::get();
        $hotels = Hotel::get();
        $meals= MealPlan::get();
        return view('admin.pages.MealPrices.create' , compact('hotels' , 'mealPrices','meals'));
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
        MealPrice::create([
            'hotel_id' => $request->hotel_id,
            'meal_id' =>$request->meal_id,
            'date_range' =>$request->date,
            'price' =>$request->price,
        ]);
        return redirect()->back()->with(['success' => '🤗 Successfully Editing']);
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
    // $mealPrices->hotels->name
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $mealPrices = MealPrice::FindOrFail($id);
        $hotels = Hotel::get();
        $meals= MealPlan::get();

        return view('admin.pages.MealPrices.edit' , compact('hotels' , 'mealPrices','meals'));
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
        $mealPrices = MealPrice::FindOrFail($id);
        $mealPrices->update([
            'hotel_id' => $request->hotel_id,
            'meal_id' =>$request->meal_id,
            'date_range' =>$request->date,
            'price' =>$request->price,
        ]);
        return redirect()->back()->with(['success' => '🤗 Successfully Storing']);
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
//        if(HotelContract::where('mealPlan_id',$id)->exists()){
//            return redirect()->back()->with(['errors' => '🤗 error Deleting.this Meal has Hotel contract']);
//
//        }
        $mealPrices = MealPrice::findOrFail($id);
        $mealPrices->delete();
        return redirect()->back()->with(['errors' => '🤗 Successfully deleting']);
    }
}
