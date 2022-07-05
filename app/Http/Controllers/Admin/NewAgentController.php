<?php

namespace App\Http\Controllers\Admin;

use App\Models\GuestReservation;
use App\Models\NewAgent;
use App\Models\TravelAgentRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewAgentController extends Controller
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
        $newAgents=NewAgent::all();
        return view('admin.pages.NewAgent.create',compact('newAgents'));
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
        NewAgent::create([
            'name' => $request->name,
            'tel' =>$request->tel,
            'address' =>$request->address,
            'email' =>$request->email,
            'whatsapp' =>$request->whatsapp,
            'note' =>$request->note,
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $newAgents=NewAgent::findOrFail($id);
        return view('admin.pages.NewAgent.edit',compact('newAgents'));
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
        $newAgents=NewAgent::findOrFail($id);
        $newAgents->update([
            'name' => $request->name,
            'tel' =>$request->tel,
            'address' =>$request->address,
            'email' =>$request->email,
            'whatsapp' =>$request->whatsapp,
            'note' =>$request->note,
        ]);
        return redirect()->route('newaAent.create')->with(['success' => '🤗 Successfully Storing']);
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
        if(GuestReservation::where('travel_agent_id',$id)->exists()){
            return redirect()->back()->with(['errors' => '🤗 error Deleting.this Agent has Reservation']);

        } if(TravelAgentRoom::where('travel_agent_id',$id)->exists()){
            return redirect()->back()->with(['errors' => '🤗 error Deleting.this Agent has Travel Agent Room']);

        }
        $newAgents = NewAgent::findOrFail($id);
        $newAgents->delete();
        return redirect()->back()->with(['errors' => '🤗 Successfully deleting']);
    }
}
