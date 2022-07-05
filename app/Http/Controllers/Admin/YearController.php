<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{
    public function index()
    {

        $years = Year::get();
        return view('admin.pages.year.index', compact('years'));
    }

    public function indexUpdate(Request $request)
    {

        foreach ($request->data['name'] as $key => $value) {
            Year::where('name', $value)->update([

                'active' => Null
            ]);



        }
        foreach ($request->data['active'] as $key => $value) {


            Year::where('name', $value)->update([

                'active' =>1
            ]);


        }
        return redirect()->back()->with(['success' => '🤗 Successfully Storing']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $years = Year::get();
        return view('admin.pages.year.create', compact('years'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Year::create([
            'name' => $request->name,
        ]);
        return redirect()->back()->with(['success' => '🤗 Successfully Storing']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Year $year)
    {

        return view('admin.pages.year.edit', compact('year'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Year $year)
    {
        $year->update([

            'name' => $request->year

        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }


}
