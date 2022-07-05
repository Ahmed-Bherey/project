<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hotel;
use App\Models\NewAgent;
use Illuminate\Http\Request;
use App\Models\TravelAgentRoom;
use App\Http\Controllers\Controller;

class TravelAgentRoomController extends Controller
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
        $travelAgents = NewAgent::get();
        $hotels = Hotel::get();
        $TravelAgentRooms = TravelAgentRoom::get();
        return view('admin.pages.HotelsRoom.create' , compact('travelAgents','hotels' , 'TravelAgentRooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Hotel = Hotel::
        where("id", $request->hotel_id)
            ->value('room_no');
        if($request->room_no > $Hotel)
        {
            return redirect()->back()->with(['errors' => '🤗 The number is not enough']);

        }
        TravelAgentRoom::create([
            'travel_agent_id' => $request->travel_agent_id,
            'hotel_id' =>$request->hotel_id,
            'room_no' =>$request->room_no
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
        $travelAgents = NewAgent::get();
        $hotels = Hotel::get();
        $TravelAgentRooms = TravelAgentRoom::findOrFail($id);
        return view('admin.pages.HotelsRoom.edit' , compact('travelAgents','hotels' , 'TravelAgentRooms'));
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
        $Hotel = Hotel::
        where("id", $request->hotel_id)
            ->value('room_no');
        if($request->room_no > $Hotel)
        {
            return redirect()->back()->with(['errors' => '🤗 The number is not enough']);

        }
        $TravelAgentRooms = TravelAgentRoom::FindOrFail($id);
        $TravelAgentRooms->update([
            'travel_agent_id' => $request->travel_agent_id,
            'hotel_id' =>$request->hotel_id,
            'room_no' =>$request->room_no
        ]);
        return redirect()->route('travelAgent-rooms.create')->with(['success' => '🤗 Successfully Update']);
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
        $TravelAgentRooms = TravelAgentRoom::findOrFail($id);
        $TravelAgentRooms->delete();
        return redirect()->back()->with(['errors' => '🤗 Deleting Storing']);
    }
}
