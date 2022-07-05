<?php

namespace App\Http\Controllers\Admin;

use App\Models\GuestReservation;
use App\Models\Hotel;
use App\Models\MealPlan;
use App\Models\RoomType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\HotelContract;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HotelContractController extends Controller
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
        $hotels = Hotel::get();
        $roomTypes = RoomType::get();
        $hotelContracts = HotelContract::groupBy(['name', 'hotel_id', 'room_type_id', 'mealPlan_id', 'roomCategory_id'])->get();
        $mealPlans = MealPlan::get();
        $roomCategorys = \App\Models\RoomCategory::get();

        $HCHotel_id = Session::get('HCHotel_id');
        $HCRoom_type_id = Session::get('HCRoom_type_id');
        $HCMealPlan_id = Session::get('HCMealPlan_id');
        $HCRoomCategory_id = Session::get('HCRoomCategory_id');
        $HCRate = Session::get('HCRate');
        $HCNote = Session::get('HCNote');
        $from = Session::get('from');

        return view('admin.pages.HotelContract.create', compact('from',  'HCNote', 'HCRate', 'HCRoomCategory_id', 'HCMealPlan_id', 'HCRoom_type_id', 'HCHotel_id', 'roomCategorys', 'hotels', 'roomTypes', 'hotelContracts', 'mealPlans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $dt = Carbon::create($request->from);
        $from = Carbon::parse($request->from);
        $to = Carbon::parse($request->to);
        $number = ($from)->diffInDays($to);
        $x = 0;
        for ($i = 0; $i <= $number; $i++) {
            $dt->addDays($x)->format('Y-m-d');
            $date = date_format($dt, "Y-m-d");
            $x = 1;
            if (HotelContract::where('date', $date)
                ->where('hotel_id', $request->hotel_id)
                ->where('room_type_id', $request->room_type_id)
                ->where('roomCategory_id', $request->roomCategory_id)
                ->where('mealPlan_id', $request->mealPlan_id)->exists()
            ) {
                return redirect()->back()->with(['errors' => $date . ' ' . '🤗  this date is exist']);

            }
            HotelContract::create([
                'hotel_id' => $request->hotel_id,
                'room_type_id' => $request->room_type_id,
                'mealPlan_id' => $request->mealPlan_id,
                'roomCategory_id' => $request->roomCategory_id,
                'date' => $date,
                'name' => $request->from . ' TO ' . $request->to,
                'rate' => $request->rate,
                'note' => $request->note,

            ]);
        }


        session()->put([
            'HCHotel_id' => $request->hotel_id,
            'HCRoom_type_id' => $request->room_type_id,
            'HCMealPlan_id' => $request->mealPlan_id,
            'HCRoomCategory_id' => $request->roomCategory_id,
            'from' => $request->from,

            'HCRate' => $request->rate,
            'HCNote' => $request->note,
        ]);

        return redirect()->back()->withInput()->with(['success' => '🤗 Successfully Storing']);    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function showAll($name, $roomType_id, $mealPlan_id, $roomCategory_id)
    {
        //
        $hotelContracts = HotelContract::where('name', $name)
            ->where('room_type_id', $roomType_id)
            ->where('mealPlan_id', $mealPlan_id)
            ->where('roomCategory_id', $roomCategory_id)->get();
        return view('admin.pages.HotelContract.show', compact('hotelContracts'));
    }

    public function add($name, $roomType_id, $mealPlan_id, $roomCategory_id, $hotel_id)
    {
        $hotels = Hotel::get();
        $hotelTypes = RoomType::get();
        $mealPlans = MealPlan::get();
        $roomCategorys = \App\Models\RoomCategory::get();
        $hotelContracts = HotelContract::where('name', $name)
            ->where('room_type_id', $roomType_id)
            ->where('mealPlan_id', $mealPlan_id)
            ->where('hotel_id', $hotel_id)
            ->where('roomCategory_id', $roomCategory_id)
            ->groupBy(['name', 'room_type_id', 'mealPlan_id', 'roomCategory_id'])
            ->get();
        $from=HotelContract::where('name', $name)
            ->where('room_type_id', $roomType_id)
            ->where('mealPlan_id', $mealPlan_id)
            ->where('hotel_id', $hotel_id)
            ->where('roomCategory_id', $roomCategory_id)
            ->groupBy(['name', 'room_type_id', 'mealPlan_id', 'roomCategory_id'])
            ->get();
        foreach ($hotelContracts as $hotelContract)

            return view('admin.pages.HotelContract.add', compact('roomCategorys', 'hotelContract', 'hotels', 'hotelTypes', 'mealPlans'));
    }
    public function addDate(Request $request)
    {


        $dt = Carbon::create($request->from);
        $from = Carbon::parse($request->from);
        $to = Carbon::parse($request->to);
        $number = ($from)->diffInDays($to);
        $x = 0;
        for ($i = 0; $i <= $number; $i++) {
            $dt->addDays($x)->format('Y-m-d');
            $date = date_format($dt, "Y-m-d");
            $x = 1;
            if(HotelContract::where('room_type_id', $request->room_type_id)
                    ->where('mealPlan_id', $request->mealPlan_id)
                    ->where('hotel_id',  $request->hotel_id)
                    ->where('roomCategory_id',  $request->roomCategory_id)
                    ->where('date',$date)
                    ->value('id') > 0){

                return redirect()->back()->with(['errors' => ' this Date'.$request->date. 'is Exits']);


            }
            HotelContract::create([
                'name' => $request->name,
                'hotel_id' => $request->hotel_id,
                'room_type_id' => $request->room_type_id,
                'mealPlan_id' => $request->mealPlan_id,
                'roomCategory_id' => $request->roomCategory_id,
                'rate' => $request->rate,
                'date' => $date,
            ]);
        }

        return redirect()->route('hotel-contract.create')->with(['success' => '🤗 Successfully Adding']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotels = Hotel::get();
        $hotelTypes = RoomType::get();
        $mealPlans = MealPlan::get();
        $hotelContract = HotelContract::FindOrFail($id);
        $roomCategorys = \App\Models\RoomCategory::get();
        $roomTypes = RoomType::get();
        return view('admin.pages.HotelContract.edit', compact('roomTypes', 'roomCategorys', 'hotelContract', 'hotels', 'hotelTypes', 'mealPlans'));
    }

    public function editAll($name, $roomType_id, $mealPlan_id, $roomCategory_id, $hotel_id)
    {
        $hotels = Hotel::get();
        $hotelTypes = RoomType::get();
        $mealPlans = MealPlan::get();
        $roomCategorys = \App\Models\RoomCategory::get();
        $hotelContracts = HotelContract::where('name', $name)
            ->where('room_type_id', $roomType_id)
            ->where('mealPlan_id', $mealPlan_id)
            ->where('hotel_id', $hotel_id)
            ->where('roomCategory_id', $roomCategory_id)
            ->groupBy(['name', 'room_type_id', 'mealPlan_id', 'roomCategory_id'])
            ->get();
        $from=HotelContract::where('name', $name)
            ->where('room_type_id', $roomType_id)
            ->where('mealPlan_id', $mealPlan_id)
            ->where('hotel_id', $hotel_id)
            ->where('roomCategory_id', $roomCategory_id)
            ->groupBy(['name', 'room_type_id', 'mealPlan_id', 'roomCategory_id'])
            ->get();
        foreach ($hotelContracts as $hotelContract)

            return view('admin.pages.HotelContract.editAll', compact('roomCategorys', 'hotelContract', 'hotels', 'hotelTypes', 'mealPlans'));
    }

    public function updateAll(Request $request, $name, $roomType_id, $mealPlan_id, $roomCategory_id, $hotel_id)
    {
        $dt = Carbon::create($request->from);
        $from = Carbon::parse($request->from);
        $to = Carbon::parse($request->to);
        $number = ($from)->diffInDays($to);
        $x = 0;
        for ($i = 0; $i <= $number; $i++) {
            $dt->addDays($x)->format('Y-m-d');
            $date = date_format($dt, "Y-m-d");
            $x = 1;
//            if (HotelContract::
//            where('hotel_id', $request->hotel_id)
//                ->where('room_type_id', $request->room_type_id)
//                ->where('roomCategory_id', $request->roomCategory_id)
//                ->where('mealPlan_id', $request->mealPlan_id)->exists()
//            ) {
//                return redirect()->back()->with(['errors' => '🤗  this date is exist']);
//
//            }


            HotelContract::where('name', $name)->where('room_type_id', $roomType_id)
                ->where('mealPlan_id', $mealPlan_id)->where('hotel_id', $hotel_id)
                ->where('roomCategory_id', $roomCategory_id)->update([
                    'hotel_id' => $request->hotel_id,
                    'room_type_id' => $request->room_type_id,
                    'mealPlan_id' => $request->mealPlan_id,
                    'roomCategory_id' => $request->roomCategory_id,
                    'rate' => $request->rate,
                ]);

        }
        return redirect()->route('hotel-contract.create')->with(['success' => '🤗 Successfully Editing']);
    }

    public function deleteDestory($name, $roomType_id, $mealPlan_id, $roomCategory_id, $hotel_id)
    {


        if (GuestReservation::where('hotelContractName', $name)->where('roomType_id', $roomType_id)
            ->where('roomCategory_id', $roomCategory_id)->where('hotel_id', $hotel_id)->where('meal_id', $mealPlan_id)->exists()
        ) {
            return redirect()->back()->with(['errors' => '🤗 Not Deleting .some operation in Reservation']);

        }
        HotelContract::where('name', $name)->where('room_type_id', $roomType_id)
            ->where('mealPlan_id', $mealPlan_id)->where('hotel_id', $hotel_id)
            ->where('roomCategory_id', $roomCategory_id)->delete();


        return redirect()->back()->with(['errors' => '🤗 Successfully Deleting']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $hotelContracts = HotelContract::findOrFail($id);
        $hotelContracts->update([
            'hotel_id' => $request->hotel_id,
            'room_type_id' => $request->room_type_id,
            'mealPlan_id' => $request->mealPlan_id,
            'roomCategory_id' => $request->roomCategory_id,
            'rate' => $request->rate,
            'note' => $request->note,
        ]);
        $name = HotelContract::where('id', $id)->value('name');

        return redirect()->route('hotel-contract.show', $name)->with(['success' => '🤗 Successfully Editing']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        HotelContract::where('name', $id)->delete();
        return redirect()->back()->with(['errors' => '🤗 Successfully Deleting']);
    }

    public function delete($id)
    {
        HotelContract::where('id', $id)->delete();
        return redirect()->back()->with(['errors' => '🤗 Successfully Deleting']);
    }
}
