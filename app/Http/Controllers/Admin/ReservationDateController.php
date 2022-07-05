<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\HotelContract;
use App\Models\MealPlan;
use App\Models\ReservationDate;
use App\Models\RoomCategory;
use App\Models\RoomType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationDateController extends Controller
{
    public function create()
    {

        $reservationDates = ReservationDate::get();
        return view('admin.pages.reservationDate.create', compact( 'reservationDates'));

    }

    public function edit( ReservationDate $reservationDate)
    {


        return view('admin.pages.reservationDate.edit',compact('reservationDate'));
    }
//
//    public function create()
//    {
//        $reservationDates = ReservationDate::get();
//        return view('admin.pages.reservationDate.create', compact('reservationDates'));
//    }

    public function store(Request $request)
    {

        $store_arr = [];
        foreach ($request->all() as $key => $value) {
            if ($key == '_token') continue;//skip token
            $store_arr[$key] = $value;
        }

            if (ReservationDate::
            where('name',$request->name)
                ->where('from', $request->from)
                ->where('to', $request->to)
               ->exists()
            ) {
                return redirect()->back()->with(['errors' => '🤗  this Name is exist']);

            }

                ReservationDate::create([
                    'name' => $request->name,
                    'from' => $request->from,
                    'to' =>  $request->to,
                    'rate' => $request->rate,
                    'note' => $request->note,

                ]);

        return redirect()->back()->with(['success' => " successfully Storing"]);
    }

    public function update(Request $request, ReservationDate $reservationDate)
    {


        if (ReservationDate::
        where('name',$request->name)
            ->where('from', $request->from)
            ->where('to', $request->to)
            ->exists()
        ) {
            return redirect()->back()->with(['errors' => '🤗  this Name is exist']);

        }

        $reservationDate->update([
            'name' => $request->name,
            'from' => $request->from,
            'to' =>  $request->to,
            'rate' => $request->rate,
            'note' => $request->note,

        ]);


        return redirect()->route('ReservationDates.create.index')->with(['success' => "successfully updating"]);
    }

    public
    function delete( ReservationDate $reservationDate)
    {


              $reservationDate  ->delete();
        return redirect()->route('ReservationDates.create.index')->with(['error' => "successfully Deleting"]);
    }


}






