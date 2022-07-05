<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\HotelContract;
use App\Models\HotelContractReservation;
use App\Models\MealPlan;
use App\Models\ReservationDate;
use App\Models\RoomCategory;
use App\Models\RoomType;
use Illuminate\Http\Request;

class HotelContractReservationController extends Controller
{
    public function create(Request $request)
    {
        $hotelContracts = HotelContract::where('hotel_id',$request->hotel_id)->groupBy(['name', 'hotel_id', 'room_type_id', 'mealPlan_id', 'roomCategory_id'])->get();

        $hotelContractReservations = HotelContractReservation::get();
          $reservationDates=ReservationDate::find($request->reservationDate_id);
        return view('admin.pages.hotelContractReservation.create',
            compact('hotelContracts','reservationDates','hotelContractReservations'));

    } public function index()
    {
        $reservationDates=ReservationDate::get();
        $hotelContractReservations = HotelContractReservation::get();
        $hotels=Hotel::get();
        return view('admin.pages.hotelContractReservation.index',
            compact( 'hotelContractReservations','reservationDates','hotels'));

    }

    public function edit( HotelContractReservation $hotelContractReservation)
    {
        $reservationDates = ReservationDate::get();
        $hotelContracts = HotelContract::groupBy(['name', 'hotel_id', 'room_type_id', 'mealPlan_id', 'roomCategory_id'])->get();

        return view('admin.pages.hotelContractReservation.edit',compact('hotelContractReservation','hotelContracts','reservationDates'));
    }

    public function store(Request $request)
    {

        $store_arr = [];
        foreach ($request->all() as $key => $value) {
            if ($key == '_token') continue;//skip token
            $store_arr[$key] = $value;
        }


foreach($request->data['hotel_id'] as $key=>$value){
    $hotel_id=Hotel::where('name',$value)->value('id');
        $roomTyple_id=RoomType::where('type',$request->data['room_type_id'][$key])->value('id');
        $roomCategory_id=RoomCategory::where('name',$request->data['roomCategory_id'][$key])->value('id');
        $mealPlan_id=MealPlan::where('name',$request->data['mealPlan_id'][$key])->value('id');

    if (HotelContractReservation::

        where('hotel_id',$hotel_id)
        ->where('room_type_id',$roomTyple_id)
        ->where('mealPlan_id', $mealPlan_id)
        ->where('roomCategory_id',$roomCategory_id)
        ->where('name',$request->data['name'][$key])
        ->exists()
    ) {
        return redirect()->back()->with(['errors' => '🤗  this Name is exist']);

    }
    $reservation_ID=ReservationDate::where('name',$request->reservationDate_id)->value('id');
        HotelContractReservation::create([
            'reservationDate_id' =>$reservation_ID,
            'hotel_id' =>$hotel_id,
            'room_type_id' => $roomTyple_id,
            'mealPlan_id' =>$mealPlan_id,
            'roomCategory_id' =>$roomCategory_id,
            'rate' => $request->data['reservationRate'][$key],
            'name' => $request->data['name'][$key],
            'note' => $request->note,

        ]);
        HotelContract::where('hotel_id', $hotel_id)
            ->where('room_type_id',$roomTyple_id)
            ->where('mealPlan_id',$mealPlan_id)
            ->where('name',  $request->data['name'][$key])
            ->where('roomCategory_id',$roomCategory_id)->update([
                'offerRate'=>$request->data['reservationRate'][$key],
                'reservationRate_id'=>$reservation_ID,
                'offerFrom'=>ReservationDate::where('id',$reservation_ID)->value('from'),
                'offerTo'=>ReservationDate::where('id',$reservation_ID)->value('to'),


            ]);
}
        return redirect()->route('HotelContractReservations.all.index')->with(['success' => " successfully Storing"]);
    }

    public function update(Request $request, HotelContractReservation $hotelContractReservation)
    {

        $reservation_ID=ReservationDate::where('name',$request->reservationDate_id)->value('id');

//        if (HotelContractReservation::
//            where('hotel_id', $request->hotel_id)
//            ->where('room_type_id', $request->room_type_id)
//            ->where('mealPlan_id', $request->mealPlan_id)
//            ->where('roomCategory_id', $request->roomCategory_id)
//            ->where('name', $request->name)
//            ->exists()
//        ) {
//            return redirect()->back()->with(['errors' => '🤗  this Name is exist']);
//
//        }
        $hotel_id=Hotel::where('name',$request->hotel_id)->value('id');
        $roomTyple_id=RoomType::where('type',$request->room_type_id)->value('id');
        $roomCategory_id=RoomCategory::where('name',$request->roomCategory_id)->value('id');
        $mealPlan_id=MealPlan::where('name',$request->mealPlan_id)->value('id');
        $hotelContractReservation->update([
            'reservationDate_id' => $reservation_ID,
            'hotel_id' =>$hotel_id,
            'room_type_id' => $roomTyple_id,
            'mealPlan_id' =>$mealPlan_id,
            'roomCategory_id' =>$roomCategory_id,
            'rate' => $request->reservationRate,
            'name' => $request->name,
            'note' => $request->note,


        ]);

        HotelContract::where('hotel_id', $hotel_id)
            ->where('room_type_id',$roomTyple_id)
            ->where('mealPlan_id',$mealPlan_id)
            ->where('name', $request->name)
            ->where('roomCategory_id',$roomCategory_id)->update([
                'offerRate'=>$request->reservationRate,
                'reservationRate_id'=>$request->reservationDate_id,
                'offerFrom'=>ReservationDate::where('id',$request->reservationDate_id)->value('from'),
                'offerTo'=>ReservationDate::where('id',$request->reservationDate_id)->value('to'),

            ]);

        return redirect()->route('HotelContractReservations.all.index')->with(['success' => "successfully updating"]);
    }

    public
    function delete( HotelContractReservation $hotelContractReservation)
    {


        $hotelContractReservation->delete();
        HotelContract::where('hotel_id', $hotelContractReservation->hotel_id)
            ->where('room_type_id', $hotelContractReservation->room_type_id)
            ->where('mealPlan_id', $hotelContractReservation->mealPlan_id)
            ->where('roomCategory_id', $hotelContractReservation->roomCategory_id)->update([
                'offerRate'=>Null,
                'reservationRate_id'=>Null,
                'offerFrom'=>Null,
                'offerTo'=>Null,


            ]);
        return redirect()->route('HotelContractReservations.all.index')->with(['error' => "successfully Deleting"]);
    }


}






