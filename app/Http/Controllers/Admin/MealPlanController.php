<?php

namespace App\Http\Controllers\Admin;

use App\Models\HotelContract;
use App\Models\MealPlan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MealPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mealPlan = MealPlan::all();
        return view('admin.pages.MealPlan.create' , compact('mealPlan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $mealPlan = MealPlan::all();
        return view('admin.pages.MealPlan.create' , compact('mealPlan'));
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
        MealPlan::create([
            'name' => $request->name,
            'abbreviation' => $request->abbreviation,
            'note' =>$request->note,
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
        $meals = MealPlan::FindOrFail($id);
        return view('admin.pages.MealPlan.edit' , compact('meals'));
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
        $meals = MealPlan::FindOrFail($id);
        $meals->update([
            'name' => $request->name,
            'abbreviation' => $request->abbreviation,
            'note' =>$request->note,
        ]);
        return redirect()->route('mealplan.create')->with(['success' => '🤗 Successfully Editing']);
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
        if(HotelContract::where('mealPlan_id',$id)->exists()){
            return redirect()->back()->with(['errors' => '🤗 error Deleting.this Meal has Hotel contract']);

        }
        $meals = MealPlan::findOrFail($id);
        $meals->delete();
        return redirect()->back()->with(['errors' => '🤗 Successfully deleting']);
    }
}
