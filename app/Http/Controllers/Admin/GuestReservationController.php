<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\BankMoves;
use App\Models\GuestReservation;
use App\Models\GuestReservationChild;
use App\Models\Hotel;
use App\Models\HotelContract;
use App\Models\MealPlan;
use App\Models\NewAgent;
use App\Models\NewGuest;
use App\Models\RoomType;
use App\Models\TotalReservation;
use App\Models\TravelAgentRoom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;

class GuestReservationController extends Controller
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
        $guests = NewGuest::orderBy('name')->get();
        $hotels = Hotel::get();
        $travelAgents = NewAgent::get();
        $guestReservations = TotalReservation::orderBy('id', 'DESC')->limit(20)->get();
        $roomCategorys = \App\Models\RoomCategory::get();
        $roomTypes = \App\Models\RoomType::get();
        $mealPlans = \App\Models\MealPlan::get();
        return view('admin.pages.Reservation.create', compact('guests', 'hotels', 'travelAgents', 'guestReservations', 'roomCategorys', 'roomTypes', 'mealPlans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (NewGuest::where('name', $request->guestName)->count() < 1) {
            return redirect()->back()->with(['errors' => '🤗 guest is not Exists .please create new guest']);

        }

        session()->put('guest_id', $request->guestName);
        $hotelNumber = Hotel::where("id", $request->hotel)->value('room_no');
        $reservation = GuestReservation::where('hotel_id', $request->hotel)->where("date", $request->from)->count();
        if ($reservation < $hotelNumber) {
            $guests = NewGuest::orderBy('name')->get();
            $hotels = Hotel::get();
            $travelAgents = NewAgent::get();
            $guestReservations = TotalReservation::get();
            $roomCategorys = \App\Models\RoomCategory::get();
            $roomTypes = \App\Models\RoomType::get();
            $mealPlans = \App\Models\MealPlan::get();


            $HotelContractOffers = HotelContract::
            where("room_type_id", $request->roomType)
                ->where("hotel_id", $request->hotel)
                ->where("mealPlan_id", $request->meal)
                ->where("roomCategory_id", $request->roomCategory_id)
                ->where("offerFrom", '<=', $request->date)
                ->where("offerTo", '>=', $request->date)
                ->where("date", '>=', $request->from)
                ->where("date", '<', $request->to)
                ->value('offerRate');


            $HotelContracts = HotelContract::
            where("room_type_id", $request->roomType)
                ->where("hotel_id", $request->hotel)
                ->where("mealPlan_id", $request->meal)
                ->where("roomCategory_id", $request->roomCategory_id)
                ->where("date", '>=', $request->from)
                ->where("date", '<', $request->to)
                ->get();

            $HotelContractNumbers = HotelContract::
            where("room_type_id", $request->roomType)
                ->where("hotel_id", $request->hotel)
                ->where("mealPlan_id", $request->meal)
                ->where("roomCategory_id", $request->roomCategory_id)
                ->where("date", '>=', $request->from)
                ->where("date", '<', $request->to)
                ->get();

        } else {
            return redirect()->back()->with(['errors' => '🤗 Number Of Rooms Not ']);

        }

        $guest_id = NewGuest::where('name', $request->guestName)->value('name');

        $hotel_id = $request->hotel;
        $nights_no = $request->nights_no;
        $roomType_id = $request->roomType;
        $travelAgents_id = $request->travel_agent_id;
        $meal_id = $request->meal;
        $date = $request->date;
        $Category_id = $request->roomCategory_id;
        $DateTo = $request->to;
        $DateFrom = $request->from;
        $adultNumber = $request->adult;
        $roomNumber = $request->roomNumber;
        $childNumber = $request->child;
        $rateNumber = $request->rate;
        $notes = $request->note;
        $numerOfReservation = $request->numerOfReservation;
        $specialRequests = $request->specialRequest;
        $rooms = $request->rooms;
        $checkbox = $request->checkbox;
        return view('admin.pages.Reservation.create', compact('date', 'HotelContractOffers', 'numerOfReservation', 'rateNumber', 'childNumber', 'roomNumber', 'adultNumber', 'DateTo', 'DateFrom', 'Category_id', 'meal_id',
            'HotelContractNumbers', 'travelAgents_id', 'guest_id', 'roomType_id', 'nights_no', 'hotel_id',
            'HotelContracts', 'guests', 'hotels', 'travelAgents'
            , 'guestReservations', 'roomCategorys', 'roomTypes', 'rooms', 'checkbox', 'mealPlans', 'notes', 'specialRequests', 'hotelNumber'));
    }

    public function showEdit(Request $request, $id)
    {


        session()->put('guest_id', $request->guest_id);
        $hotelNumber = Hotel::where("id", $request->hotel)->value('room_no');
        $reservation = GuestReservation::where('hotel_id', $request->hotel)->where("date", $request->from)->count();
        if ($reservation < $hotelNumber) {
            $guests = NewGuest::orderBy('name')->get();
            $hotels = Hotel::get();
            $travelAgents = NewAgent::get();
            $guestReservations = TotalReservation::get();
            $roomCategorys = \App\Models\RoomCategory::get();
            $roomTypes = \App\Models\RoomType::get();
            $mealPlans = \App\Models\MealPlan::get();
            $guestReservations = HotelContract::
            where("room_type_id", $request->roomType)
                ->where("hotel_id", $request->hotel)
                ->where("mealPlan_id", $request->meal)
                ->where("roomCategory_id", $request->roomCategory_id)
                ->where("date", '>=', $request->from)
                ->where("date", '<', $request->to)
                ->get();

            $HotelContractNumbers = HotelContract::
            where("room_type_id", $request->roomType)
                ->where("hotel_id", $request->hotel)
                ->where("mealPlan_id", $request->meal)
                ->where("roomCategory_id", $request->roomCategory_id)
                ->where("date", '>=', $request->from)
                ->where("date", '<', $request->to)
                ->get();

        } else {
            return redirect()->back()->with(['errors' => '🤗 Number Of Rooms Not ']);

        }

        $guest_id = NewGuest::where('name', $request->guestName)->value('name');

        $hotel_id = $request->hotel;
        $nights_no = $request->nights_no;
        $roomType_id = $request->roomType;
        $travelAgents_id = $request->travel_agent_id;
        $meal_id = $request->meal;
        $Category_id = $request->roomCategory_id;
        $DateTo = $request->to;
        $DateFrom = $request->from;
        $adultNumber = $request->adult;
        $roomNumber = $request->roomNumber;
        $childNumber = $request->child;
        $rateNumber = $request->rate;
        $notes = $request->note;
        $numerOfReservation = $request->numerOfReservation;
        $specialRequests = $request->specialRequest;
        $rooms = $request->rooms;
        $checkbox = $request->checkbox;
        $totals = TotalReservation::find($id);
        $kind = 2;

        return view('admin.pages.Reservation.edit', compact('kind', 'totals', 'numerOfReservation', 'rateNumber', 'childNumber', 'roomNumber', 'adultNumber', 'DateTo', 'DateFrom', 'Category_id', 'meal_id',
            'HotelContractNumbers', 'travelAgents_id', 'guest_id', 'roomType_id', 'nights_no', 'hotel_id',
            'guests', 'hotels', 'travelAgents'
            , 'guestReservations', 'roomCategorys', 'roomTypes', 'rooms', 'checkbox', 'mealPlans', 'notes', 'specialRequests', 'hotelNumber'));
    }

    public function storeReservation(Request $request)
    {

        if ($request->data['selling_rate'] == "") {


            return redirect()->back()->with(['success' => 'error data']);

        }
        if ($request->checkbox != 1) {


            $HotelReservation = GuestReservation::
            where("travel_agent_id", $request->travel_agent_id)
                ->where("hotel_id", $request->hotel)
                ->where("date", $request->from)
                ->count('rate');


            $guest_id = NewGuest::where('name', $request->guestName)->value('id');
            $dateFrom = Carbon::create($request->from);
            $dateFrom->addDays($request->nights_no - 1)->format('Y-m-d');

            $dateTo = date_format($dateFrom, "Y-m-d");
            $total = TotalReservation::create([
                'guest_id' => $guest_id,
                'hotel_id' => $request->hotel,
                'nights_no' => $request->nights_no,
                'from' => $request->from,
                'note' => $request->note,
                'specialRequest' => $request->specialRequest,
                'dateReservation' => $request->date,
                'extraCharge' => $request->extraCharge,
                'meal_id' => $request->meal,
                'to' => $dateTo,
                'roomCategory_id' => $request->roomCategory_id,
                'roomType_id' => $request->roomType,
                'travel_agent_id' => $request->travel_agent_id,
                'user_id' => auth()->user()->id,
                'adult' => $request->adult,
                'child' => $request->child,
                'rooms' => $request->rooms,
                'roomNumber' => $request->roomNumber,
            ]);
            $dt = Carbon::create($request->from);
            $nights_no = $request->nights_no;

            $x = 0;
            for ($i = 0; $i < $nights_no; $i++) {
                $dt->addDays($x)->format('Y-m-d');
                $date = date_format($dt, "Y-m-d");
                $x = 1;
//            foreach ($request->data['selling_rate'] as $key => $value){
                $HotelContract_id = HotelContract::where('date', $date)
                    ->where('hotel_id', $request->hotel)
                    ->where('mealPlan_id', $request->meal)
                    ->where('room_type_id', $request->roomType)
                    ->value('id');

                $hotelContractName = HotelContract::where('date', $date)->where('hotel_id', $request->hotel)
                    ->where('mealPlan_id', $request->meal)
                    ->where('room_type_id', $request->roomType)->value('name');
                $hotelContractRate = HotelContract::where('date', $date)->where('hotel_id', $request->hotel)
                    ->where('mealPlan_id', $request->meal)
                    ->where('room_type_id', $request->roomType)->value('rate');
                $update = GuestReservation::create([
                    'total_id' => $total->id,
                    'guest_id' => $guest_id,
                    'hotel_id' => $request->hotel,
                    'travel_agent_id' => $request->travel_agent_id,
                    'date' => $date,
                    'rooms' => $request->rooms,

                    'nights_no' => $request->rooms,
                    'rate' => $hotelContractRate * $request->rooms,
                    'roomType_id' => $request->roomType,
                    'hotelContract_id' => $HotelContract_id,
                    'roomCategory_id' => $request->roomCategory_id,
                    'hotelContractName' => $hotelContractName,
                    'adult' => $request->adult,
                    'child' => $request->child,
                    'roomNumber' => $request->roomNumber,
                    'sellingRate' => $hotelContractRate * $request->rooms,
                    'meal_id' => $request->meal,


                ]);

            }

            foreach ($request->data['selling_rate'] as $key => $value) {

                GuestReservation::where('total_id', $total->id)->where('date', $request->data['reservationDate'][$key])->update([

                    'sellingRate' => $value * $request->rooms,
                    'rate' => $request->data['HotelRate'][$key] * $request->rooms,

                ]);
            }

            TotalReservation::where('id', $total->id)->update([
                'total' => $request->NumberSellingRate,
                'totalHotel' => $request->NumberRate,
            ]);

            $agentBalance = TotalReservation::where('id', $total->id)->value('agentBalance');
            $hotelBalance = TotalReservation::where('id', $total->id)->value('hotelBalance');
            TotalReservation::where('id', $total->id)->update([
                'agentBalance' => $agentBalance - $request->NumberSellingRate,
                'hotelBalance' => $hotelBalance + $request->NumberRate,
            ]);

            return redirect()->route('guest_reservation.create')->with(['success' => '🤗 Successfully Storing']);
        }


        if ($request->checkbox == 1)
            if ($request->rooms != 1) {

                $HotelReservation = GuestReservation::
                where("travel_agent_id", $request->travel_agent_id)
                    ->where("hotel_id", $request->hotel)
                    ->where("date", $request->from)
                    ->count('rate');

                $guest_id = NewGuest::where('name', $request->guestName)->value('id');
                $dateFrom = Carbon::create($request->from);
                $dateFrom->addDays($request->nights_no - 1)->format('Y-m-d');

                $dateTo = date_format($dateFrom, "Y-m-d");
                $total = TotalReservation::create([
                    'guest_id' => $guest_id,
                    'hotel_id' => $request->hotel,
                    'nights_no' => $request->nights_no,
                    'from' => $request->from,
                    'note' => $request->note,
                    'specialRequest' => $request->specialRequest,
                    'dateReservation' => $request->date, 'extraCharge' => $request->extraCharge,
                    'meal_id' => $request->meal,
                    'to' => $dateTo,
                    'roomCategory_id' => $request->roomCategory_id,
                    'roomType_id' => $request->roomType,
                    'travel_agent_id' => $request->travel_agent_id,
                    'user_id' => auth()->user()->id,
                    'adult' => $request->adult,
                    'child' => $request->child,
                    'rooms' => 1,
                    'roomNumber' => $request->roomNumber,
                ]);
                $dt = Carbon::create($request->from);
                $nights_no = $request->nights_no;

                $x = 0;
                for ($i = 0; $i < $nights_no; $i++) {
                    $dt->addDays($x)->format('Y-m-d');
                    $date = date_format($dt, "Y-m-d");
                    $x = 1;
//            foreach ($request->data['selling_rate'] as $key => $value){
                    $HotelContract_id = HotelContract::where('date', $date)
                        ->where('hotel_id', $request->hotel)
                        ->where('mealPlan_id', $request->meal)
                        ->where('room_type_id', $request->roomType)
                        ->value('id');

                    $hotelContractName = HotelContract::where('date', $date)->where('hotel_id', $request->hotel)
                        ->where('mealPlan_id', $request->meal)
                        ->where('room_type_id', $request->roomType)->value('name');
                    $hotelContractRate = HotelContract::where('date', $date)->where('hotel_id', $request->hotel)
                        ->where('mealPlan_id', $request->meal)
                        ->where('room_type_id', $request->roomType)->value('rate');
                    $update = GuestReservation::create([
                        'total_id' => $total->id,
                        'guest_id' => $guest_id,
                        'hotel_id' => $request->hotel,
                        'travel_agent_id' => $request->travel_agent_id,
                        'date' => $date,
                        'nights_no' => 1,
                        'rooms' => 1,

                        'rate' => $hotelContractRate,
                        'roomType_id' => $request->roomType,
                        'hotelContract_id' => $HotelContract_id,
                        'roomCategory_id' => $request->roomCategory_id,
                        'hotelContractName' => $hotelContractName,
                        'adult' => $request->adult,
                        'child' => $request->child,
                        'roomNumber' => $request->roomNumber,
                        'sellingRate' => $hotelContractRate,
                        'meal_id' => $request->meal,


                    ]);

                }

                foreach ($request->data['selling_rate'] as $key => $value) {

                    GuestReservation::where('total_id', $total->id)->where('date', $request->data['reservationDate'][$key])->update([

                        'sellingRate' => $value,
                        'rate' => $request->data['HotelRate'][$key],

                    ]);
                }


                TotalReservation::where('id', $total->id)->update([
                    'total' => $request->NumberSellingRate/$request->rooms,
                    'totalHotel' => $request->NumberRate/$request->rooms,
                ]);
                $agentBalance = TotalReservation::where('id', $total->id)->value('agentBalance');
                $hotelBalance = TotalReservation::where('id', $total->id)->value('hotelBalance');
                TotalReservation::where('id', $total->id)->update([
                    'agentBalance' => $agentBalance - ($request->NumberSellingRate/$request->rooms),
                    'hotelBalance' => $hotelBalance + ($request->NumberRate/$request->rooms),
                ]);


                $hotelNumber = Hotel::where("id", $request->hotel)->value('room_no');
                $reservation = GuestReservation::where('hotel_id', $request->hotel)->where("date", $request->from)->count();
                $guests = NewGuest::orderBy('name')->get();
                $hotels = Hotel::get();
                $travelAgents = NewAgent::get();
                $guestReservations = TotalReservation::get();
                $roomCategorys = \App\Models\RoomCategory::get();
                $roomTypes = \App\Models\RoomType::get();
                $mealPlans = \App\Models\MealPlan::get();
                $HotelContracts = HotelContract::
                where("room_type_id", $request->roomType)
                    ->where("hotel_id", $request->hotel)
                    ->where("mealPlan_id", $request->meal)
                    ->where("roomCategory_id", $request->roomCategory_id)
                    ->where("date", '>=', $request->from)
                    ->where("date", '<', $request->to)
                    ->get();
                $HotelContractNumbers = HotelContract::
                where("room_type_id", $request->roomType)
                    ->where("hotel_id", $request->hotel)
                    ->where("mealPlan_id", $request->meal)
                    ->where("roomCategory_id", $request->roomCategory_id)
                    ->where("date", '>=', $request->from)
                    ->where("date", '<', $request->to)
                    ->get();
                $guest_id = NewGuest::where('name', $request->guestName)->value('name');

                $hotel_id = $request->hotel;
                $nights_no = $request->nights_no;
                $roomType_id = $request->roomType;
                $travelAgents_id = $request->travel_agent_id;
                $meal_id = $request->meal;
                $Category_id = $request->roomCategory_id;
                $DateTo = $request->to;
                $DateFrom = $request->from;
                $adultNumber = $request->adult;
                $roomNumber = $request->roomNumber;
                $childNumber = $request->child;
                $rateNumber = $request->rate;
                $notes = $request->note;
                $numerOfReservation = $request->numerOfReservation;
                $specialRequests = $request->specialRequest;
                $rooms = $request->rooms - 1;
                $checkbox = $request->checkbox;

                return view('admin.pages.Reservation.create', compact('numerOfReservation', 'rateNumber', 'childNumber', 'roomNumber', 'adultNumber', 'DateTo', 'DateFrom', 'Category_id', 'meal_id',
                    'HotelContractNumbers', 'travelAgents_id', 'guest_id', 'roomType_id', 'nights_no', 'hotel_id',
                    'HotelContracts', 'guests', 'hotels', 'travelAgents'
                    , 'guestReservations', 'roomCategorys', 'roomTypes', 'mealPlans', 'checkbox', 'rooms', 'notes', 'specialRequests', 'hotelNumber'));

            }
        if ($request->rooms == 1) {


            $guest_id = NewGuest::where('name', $request->guestName)->value('id');
            $dateFrom = Carbon::create($request->from);
            $dateFrom->addDays($request->nights_no - 1)->format('Y-m-d');

            $dateTo = date_format($dateFrom, "Y-m-d");
            $total = TotalReservation::create([
                'guest_id' => $guest_id,
                'hotel_id' => $request->hotel,
                'nights_no' => $request->nights_no,
                'from' => $request->from,
                'note' => $request->note,
                'specialRequest' => $request->specialRequest,
                'dateReservation' => $request->date, 'extraCharge' => $request->extraCharge,
                'meal_id' => $request->meal,
                'to' => $dateTo,
                'roomCategory_id' => $request->roomCategory_id,
                'roomType_id' => $request->roomType,
                'travel_agent_id' => $request->travel_agent_id,
                'user_id' => auth()->user()->id,
                'adult' => $request->adult,
                'child' => $request->child,
                'rooms' => $request->rooms,
                'roomNumber' => $request->roomNumber,
            ]);
            $dt = Carbon::create($request->from);
            $nights_no = $request->nights_no;

            $x = 0;
            for ($i = 0; $i < $nights_no; $i++) {
                $dt->addDays($x)->format('Y-m-d');
                $date = date_format($dt, "Y-m-d");
                $x = 1;
//            foreach ($request->data['selling_rate'] as $key => $value){
                $HotelContract_id = HotelContract::where('date', $date)
                    ->where('hotel_id', $request->hotel)
                    ->where('mealPlan_id', $request->meal)
                    ->where('room_type_id', $request->roomType)
                    ->value('id');

                $hotelContractName = HotelContract::where('date', $date)->where('hotel_id', $request->hotel)
                    ->where('mealPlan_id', $request->meal)
                    ->where('room_type_id', $request->roomType)->value('name');
                $hotelContractRate = HotelContract::where('date', $date)->where('hotel_id', $request->hotel)
                    ->where('mealPlan_id', $request->meal)
                    ->where('room_type_id', $request->roomType)->value('rate');
                $update = GuestReservation::create([
                    'total_id' => $total->id,
                    'guest_id' => $guest_id,
                    'hotel_id' => $request->hotel,
                    'travel_agent_id' => $request->travel_agent_id,
                    'date' => $date,
                    'rooms' => 1,
                    'nights_no' => $request->nights_no,
                    'rate' => $hotelContractRate,
                    'roomType_id' => $request->roomType,
                    'hotelContract_id' => $HotelContract_id,
                    'roomCategory_id' => $request->roomCategory_id,
                    'hotelContractName' => $hotelContractName,
                    'adult' => $request->adult,
                    'child' => $request->child,
                    'roomNumber' => $request->roomNumber,
                    'sellingRate' => $hotelContractRate,
                    'meal_id' => $request->meal,


                ]);

            }

            foreach ($request->data['selling_rate'] as $key => $value) {

                GuestReservation::where('total_id', $total->id)->where('date', $request->data['reservationDate'][$key])->update([

                    'sellingRate' => $value,
                    'rate' => $request->data['HotelRate'][$key],

                ]);
            }


            TotalReservation::where('id', $total->id)->update([
                'total' => $request->NumberSellingRate,
                'totalHotel' => $request->NumberRate,
            ]);

            $agentBalance = TotalReservation::where('id', $total->id)->value('agentBalance');
            $hotelBalance = TotalReservation::where('id', $total->id)->value('hotelBalance');
            TotalReservation::where('id', $total->id)->update([
                'agentBalance' => $agentBalance - $request->NumberSellingRate,
                'hotelBalance' => $hotelBalance + $request->NumberRate,
            ]);

            return redirect()->route('guest_reservation.create')->with(['success' => '🤗 Successfully Storing']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function detail($id)
    {

        $guestReservations = GuestReservation::where('total_id', $id)->get();
        return view('admin.pages.Reservation.detail', compact('guestReservations'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        //
        $guests = NewGuest::orderBy('name')->get();

        $hotels = Hotel::get();
        $travelAgents = NewAgent::get();
        $totals = TotalReservation::find($id);
        $guestReservations = GuestReservation::where('total_id', $id)->get();
        $guestReservationTotal = GuestReservation::where('total_id', $id)->get();
        $roomCategorys = \App\Models\RoomCategory::get();
        $roomTypes = \App\Models\RoomType::get();
        $mealPlans = \App\Models\MealPlan::get();
        $guest_id = NewGuest::where('id', $totals->guest_id)->value('name');
        $hotel_id = $totals->hotel_id;
        $nights_no = $totals->nights_no;
        $roomType_id = $totals->roomType_id;
        $travelAgents_id = $totals->travel_agent_id;
        $meal_id = $totals->meal_id;
        $Category_id = $totals->roomCategory_id;
        $DateTo = $totals->to;
        $DateFrom = $totals->from;
        $date = $totals->dateReservation;
        $adultNumber = $totals->adult;
        $roomNumber = $totals->roomNumber;
        $childNumber = $totals->child;
        $rateNumber = $totals->totalHotel;
        $notes = $totals->note;
        $numerOfReservation = $totals->numerOfReservation;
        $specialRequests = $totals->specialRequest;
        $rooms = $totals->rooms;
        $checkbox = $totals->checkbox;
        $extraCharge = $totals->extraCharge;

        $HotelContractNumbers = HotelContract::
        where("room_type_id", $totals->roomType_id)
            ->where("hotel_id", $totals->hotel_id)
            ->where("mealPlan_id", $totals->meal_id)
            ->where("roomCategory_id", $totals->roomCategory_id)
            ->where("date", '>=', $totals->from)
            ->where("date", '<', $totals->to)
            ->get();
        $HotelContracts = HotelContract::
        where("room_type_id", $totals->roomType_id)
            ->where("hotel_id", $totals->hotel_id)
            ->where("mealPlan_id", $totals->meal_id)
            ->where("roomCategory_id", $totals->roomCategory_id)
            ->where("date", '>=', $totals->from)
            ->where("date", '<', $totals->to)
            ->get();
        $kind = 1;
        $hotelNumber = Hotel::where("id", $totals->hotel_id)->value('room_no');

        return view('admin.pages.Reservation.edit', compact('date', 'extraCharge', 'numerOfReservation', 'rateNumber', 'childNumber', 'roomNumber', 'adultNumber', 'DateTo', 'DateFrom', 'Category_id', 'meal_id',
            'HotelContractNumbers', 'travelAgents_id', 'guest_id', 'roomType_id', 'nights_no', 'hotel_id',
            'HotelContracts', 'guests', 'hotels', 'kind', 'travelAgents'
            , 'totals', 'guestReservationTotal', 'guestReservations', 'roomCategorys', 'roomTypes', 'rooms', 'checkbox', 'mealPlans', 'notes', 'specialRequests', 'hotelNumber'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function editUpdate(Request $request, $id)
    {
        if ($request->data['selling_rate'] == "") {


            return redirect()->back()->with(['success' => 'error data']);

        }
        if ($request->checkbox != 1) {
            GuestReservation::where('total_id', $id)->delete();

            GuestReservation::where('total_id', $id)->delete();
            $HotelReservation = GuestReservation::
            where("travel_agent_id", $request->travel_agent_id)
                ->where("hotel_id", $request->hotel)
                ->where("date", $request->from)
                ->count('rate');


            $guest_id = NewGuest::where('name', $request->guestName)->value('id');
            $dateFrom = Carbon::create($request->from);
            $dateFrom->addDays($request->nights_no - 1)->format('Y-m-d');

            $dateTo = date_format($dateFrom, "Y-m-d");
            $total = TotalReservation::where('id', $id)->update([
                'guest_id' => $guest_id,
                'hotel_id' => $request->hotel,
                'nights_no' => $request->nights_no,
                'from' => $request->from,
                'note' => $request->note,
                'specialRequest' => $request->specialRequest,
                'dateReservation' => $request->date, 'extraCharge' => $request->extraCharge,
                'meal_id' => $request->meal,
                'to' => $dateTo,
                'roomCategory_id' => $request->roomCategory_id,
                'roomType_id' => $request->roomType,
                'travel_agent_id' => $request->travel_agent_id,
                'user_id' => auth()->user()->id,
                'adult' => $request->adult,
                'child' => $request->child,
                'rooms' => $request->rooms,
                'roomNumber' => $request->roomNumber,
            ]);
            $dt = Carbon::create($request->from);
            $nights_no = $request->nights_no;

            $x = 0;
            for ($i = 0; $i < $nights_no; $i++) {
                $dt->addDays($x)->format('Y-m-d');
                $date = date_format($dt, "Y-m-d");
                $x = 1;
//            foreach ($request->data['selling_rate'] as $key => $value){
                $HotelContract_id = HotelContract::where('date', $date)
                    ->where('hotel_id', $request->hotel)
                    ->where('mealPlan_id', $request->meal)
                    ->where('room_type_id', $request->roomType)
                    ->value('id');


                $hotelContractName = HotelContract::where('date', $date)->where('hotel_id', $request->hotel)
                    ->where('mealPlan_id', $request->meal)
                    ->where('room_type_id', $request->roomType)->value('name');
                $hotelContractRate = HotelContract::where('date', $date)->where('hotel_id', $request->hotel)
                    ->where('mealPlan_id', $request->meal)
                    ->where('room_type_id', $request->roomType)->value('rate');

                $update = GuestReservation::create([
                    'total_id' => $id,
                    'guest_id' => $guest_id,
                    'hotel_id' => $request->hotel,
                    'travel_agent_id' => $request->travel_agent_id,
                    'date' => $date,
                    'nights_no' => $request->rooms,
                    'rate' => $hotelContractRate * $request->rooms,
                    'roomType_id' => $request->roomType,
                    'hotelContract_id' => $HotelContract_id,
                    'roomCategory_id' => $request->roomCategory_id,
                    'hotelContractName' => $hotelContractName,
                    'adult' => $request->adult,
                    'child' => $request->child,
                    'rooms' => $request->rooms,

                    'roomNumber' => $request->roomNumber,
                    'sellingRate' => $hotelContractRate * $request->rooms,
                    'meal_id' => $request->meal,


                ]);

            }

            foreach ($request->data['selling_rate'] as $key => $value) {

                GuestReservation::where('total_id', $id)->where('date', $request->data['reservationDate'][$key])->update([

                    'sellingRate' => $value * $request->rooms,
                    'rate' => $request->data['HotelRate'][$key] * $request->rooms,

                ]);
            }
            $allTotal = TotalReservation::where('id', $id)->value('total');
            $allagentBalance = TotalReservation::where('id', $id)->value('agentBalance');
            $alltotalAgent=$allTotal+$allagentBalance;

            $allTotalHotel = TotalReservation::where('id', $id)->value('totalHotel');
            $allagentBalanceHotel = TotalReservation::where('id', $id)->value('hotelBalance');
            $alltotalAgentHotel=$allTotalHotel-$allagentBalanceHotel;

            TotalReservation::where('id', $id)->update([
                'total' => $request->NumberSellingRate,
                'totalHotel' => $request->NumberRate,
                'agentBalance' => $alltotalAgent - $request->NumberSellingRate,
                'hotelBalance' =>$request->NumberRate - $alltotalAgentHotel ,

            ]);
//            $agentBalance = TotalReservation::where('id', $id)->value('agentBalance');
//            $hotelBalance = TotalReservation::where('id', $id)->value('hotelBalance');
//            TotalReservation::where('id', $id)->update([
//                'agentBalance' => $agentBalance - $request->NumberSellingRate,
//                'hotelBalance' => $hotelBalance + $request->NumberRate,
//            ]);


            return redirect()->route('guest_reservation.create')->with(['success' => '🤗 Successfully Storing']);
        }


        if ($request->checkbox == 1)

            if ($request->rooms != 1) {
                if (NewGuest::where('name', $request->guestName)->value('id') > 0) {
                    $guest_id = NewGuest::where('name', $request->guestName)->value('id');
                } else {
                    $guest = NewGuest::create([
                        'name' => $request->guestName


                    ]);
                    $guest_id = $guest->id;
                }
                $HotelReservation = GuestReservation::
                where("travel_agent_id", $request->travel_agent_id)
                    ->where("hotel_id", $request->hotel)
                    ->where("date", $request->from)
                    ->count('rate');


                $dateFrom = Carbon::create($request->from);
                $dateFrom->addDays($request->nights_no - 1)->format('Y-m-d');

                $dateTo = date_format($dateFrom, "Y-m-d");
                $total = TotalReservation::create([
                    'guest_id' => $guest_id,
                    'hotel_id' => $request->hotel,
                    'nights_no' => $request->nights_no,
                    'from' => $request->from,
                    'note' => $request->note,
                    'specialRequest' => $request->specialRequest,
                    'dateReservation' => $request->date, 'extraCharge' => $request->extraCharge,
                    'meal_id' => $request->meal,
                    'to' => $dateTo,
                    'roomCategory_id' => $request->roomCategory_id,
                    'roomType_id' => $request->roomType,
                    'travel_agent_id' => $request->travel_agent_id,
                    'user_id' => auth()->user()->id,
                    'adult' => $request->adult,
                    'child' => $request->child,
                    'rooms' => 1,
                    'roomNumber' => $request->roomNumber,
                ]);
                $dt = Carbon::create($request->from);
                $nights_no = $request->nights_no;

                $x = 0;
                for ($i = 0; $i < $nights_no; $i++) {
                    $dt->addDays($x)->format('Y-m-d');
                    $date = date_format($dt, "Y-m-d");
                    $x = 1;
//            foreach ($request->data['selling_rate'] as $key => $value){
                    $HotelContract_id = HotelContract::where('date', $date)
                        ->where('hotel_id', $request->hotel)
                        ->where('mealPlan_id', $request->meal)
                        ->where('room_type_id', $request->roomType)
                        ->value('id');

                    $hotelContractName = HotelContract::where('date', $date)->where('hotel_id', $request->hotel)
                        ->where('mealPlan_id', $request->meal)
                        ->where('room_type_id', $request->roomType)->value('name');
                    $hotelContractRate = HotelContract::where('date', $date)->where('hotel_id', $request->hotel)
                        ->where('mealPlan_id', $request->meal)
                        ->where('room_type_id', $request->roomType)->value('rate');
                    $update = GuestReservation::create([
                        'total_id' => $total->id,
                        'guest_id' => $guest_id,
                        'hotel_id' => $request->hotel,
                        'travel_agent_id' => $request->travel_agent_id,
                        'date' => $date,
                        'nights_no' => 1,
                        'rate' => $hotelContractRate,
                        'roomType_id' => $request->roomType,
                        'hotelContract_id' => $HotelContract_id,
                        'roomCategory_id' => $request->roomCategory_id,
                        'hotelContractName' => $hotelContractName,
                        'adult' => $request->adult,
                        'child' => $request->child,
                        'roomNumber' => $request->roomNumber,
                        'sellingRate' => $hotelContractRate,
                        'meal_id' => $request->meal,
                        'rooms' => 1,


                    ]);

                }

                foreach ($request->data['selling_rate'] as $key => $value) {

                    GuestReservation::where('total_id', $total->id)->where('date', $request->data['reservationDate'][$key])->update([

                        'sellingRate' => $value,
                        'rate' => $request->data['HotelRate'][$key],

                    ]);
                }

                $allTotal = TotalReservation::where('id', $total->id)->value('total')/$request->rooms;
                $allagentBalance = TotalReservation::where('id', $total->id)->value('agentBalance');
                $alltotalAgent=$allTotal+$allagentBalance;

                $allTotalHotel = TotalReservation::where('id', $total->id)->value('totalHotel')/$request->rooms;
                $allagentBalanceHotel = TotalReservation::where('id', $total->id)->value('hotelBalance');
                $alltotalAgentHotel=$allTotalHotel-$allagentBalanceHotel;

                TotalReservation::where('id',$total->id)->update([
                    'total' => $request->NumberSellingRate / $request->rooms,
                    'totalHotel' => $request->NumberRate / $request->rooms,
                    'agentBalance' => $alltotalAgent - ($request->NumberSellingRate/$request->rooms),
                    'hotelBalance' =>($request->NumberRate/$request->rooms) - $alltotalAgentHotel,

                ]);

                $hotelNumber = Hotel::where("id", $request->hotel)->value('room_no');
                $reservation = GuestReservation::where('hotel_id', $request->hotel)->where("date", $request->from)->count();
                $guests = NewGuest::orderBy('name')->get();
                $hotels = Hotel::get();
                $travelAgents = NewAgent::get();
                $guestReservations = GuestReservation::where('total_id', $id)->get();
                $roomCategorys = \App\Models\RoomCategory::get();
                $roomTypes = \App\Models\RoomType::get();
                $mealPlans = \App\Models\MealPlan::get();
                $HotelContracts = HotelContract::
                where("room_type_id", $request->roomType)
                    ->where("hotel_id", $request->hotel)
                    ->where("mealPlan_id", $request->meal)
                    ->where("roomCategory_id", $request->roomCategory_id)
                    ->where("date", '>=', $request->from)
                    ->where("date", '<', $request->to)
                    ->get();
                $HotelContractNumbers = HotelContract::
                where("room_type_id", $request->roomType)
                    ->where("hotel_id", $request->hotel)
                    ->where("mealPlan_id", $request->meal)
                    ->where("roomCategory_id", $request->roomCategory_id)
                    ->where("date", '>=', $request->from)
                    ->where("date", '<', $request->to)
                    ->get();
                $guest_id = $request->guestName;

                $hotel_id = $request->hotel;
                $nights_no = $request->nights_no;
                $roomType_id = $request->roomType;
                $travelAgents_id = $request->travel_agent_id;
                $meal_id = $request->meal;
                $Category_id = $request->roomCategory_id;
                $DateTo = $request->to;
                $DateFrom = $request->from;
                $date = $request->date;

                $adultNumber = $request->adult;
                $roomNumber = $request->roomNumber;
                $childNumber = $request->child;
                $rateNumber = $request->rate;
                $notes = $request->note;
                $numerOfReservation = $request->numerOfReservation;
                $specialRequests = $request->specialRequest;
                $rooms = $request->rooms - 1;
                $checkbox = $request->checkbox;
                $totals = TotalReservation::find($id);
                $kind = 1;
                return view('admin.pages.Reservation.edit', compact('date', 'numerOfReservation', 'rateNumber', 'childNumber', 'roomNumber', 'adultNumber', 'DateTo', 'DateFrom', 'Category_id', 'meal_id',
                    'HotelContractNumbers', 'travelAgents_id', 'guest_id', 'roomType_id', 'nights_no', 'hotel_id',
                    'HotelContracts', 'guests', 'hotels', 'travelAgents'
                    , 'guestReservations', 'totals', 'kind', 'roomCategorys', 'roomTypes', 'mealPlans', 'checkbox', 'rooms', 'notes', 'specialRequests', 'hotelNumber'));

            }
        if ($request->rooms == 1) {

            GuestReservation::where('total_id', $id)->delete();

            if (NewGuest::where('name', $request->guestName)->value('id') > 0) {
                $guest_id = NewGuest::where('name', $request->guestName)->value('id');
            } else {
                $guest = NewGuest::create([
                    'name' => $request->guestName


                ]);
                $guest_id = $guest->id;
            }
            $dateFrom = Carbon::create($request->from);
            $dateFrom->addDays($request->nights_no - 1)->format('Y-m-d');

            $dateTo = date_format($dateFrom, "Y-m-d");
            $total = TotalReservation::where('id', $id)->update([
                'guest_id' => $guest_id,
                'hotel_id' => $request->hotel,
                'nights_no' => $request->nights_no,
                'from' => $request->from,
                'note' => $request->note,
                'specialRequest' => $request->specialRequest,
                'dateReservation' => $request->date, 'extraCharge' => $request->extraCharge,
                'meal_id' => $request->meal,
                'to' => $dateTo,
                'roomCategory_id' => $request->roomCategory_id,
                'roomType_id' => $request->roomType,
                'travel_agent_id' => $request->travel_agent_id,
                'user_id' => auth()->user()->id,
                'adult' => $request->adult,
                'child' => $request->child,
                'rooms' => $request->rooms,
                'roomNumber' => $request->roomNumber,
            ]);
            $dt = Carbon::create($request->from);
            $nights_no = $request->nights_no;

            $x = 0;
            for ($i = 0; $i < $nights_no; $i++) {
                $dt->addDays($x)->format('Y-m-d');
                $date = date_format($dt, "Y-m-d");
                $x = 1;
//            foreach ($request->data['selling_rate'] as $key => $value){
                $HotelContract_id = HotelContract::where('date', $date)
                    ->where('hotel_id', $request->hotel)
                    ->where('mealPlan_id', $request->meal)
                    ->where('room_type_id', $request->roomType)
                    ->value('id');
                $hotelContractName = HotelContract::where('date', $date)->where('hotel_id', $request->hotel)
                    ->where('mealPlan_id', $request->meal)
                    ->where('room_type_id', $request->roomType)->value('name');
                $hotelContractRate = HotelContract::where('date', $date)->where('hotel_id', $request->hotel)
                    ->where('mealPlan_id', $request->meal)
                    ->where('room_type_id', $request->roomType)->value('rate');

                $update = GuestReservation::create([
                    'total_id' => $id,
                    'guest_id' => $request->guestName,
                    'hotel_id' => $request->hotel,
                    'travel_agent_id' => $request->travel_agent_id,
                    'date' => $date,
                    'nights_no' => $request->rooms,
                    'rate' => $hotelContractRate,
                    'roomType_id' => $request->roomType,
                    'hotelContract_id' => $HotelContract_id,
                    'roomCategory_id' => $request->roomCategory_id,
                    'hotelContractName' => $hotelContractName,
                    'adult' => $request->adult,
                    'child' => $request->child,
                    'roomNumber' => $request->roomNumber,
                    'sellingRate' => $hotelContractRate,
                    'meal_id' => $request->meal,
                    'rooms' => 1,


                ]);

            }

            foreach ($request->data['selling_rate'] as $key => $value) {

                GuestReservation::where('total_id', $id)->where('date', $request->data['reservationDate'][$key])->update([

                    'sellingRate' => $value,
                    'rate' => $request->data['HotelRate'][$key],

                ]);
            }


            $allTotal = TotalReservation::where('id', $id)->value('total');
            $allagentBalance = TotalReservation::where('id', $id)->value('agentBalance');
            $alltotalAgent=$allTotal+$allagentBalance;

            $allTotalHotel = TotalReservation::where('id', $id)->value('totalHotel');
            $allagentBalanceHotel = TotalReservation::where('id', $id)->value('hotelBalance');
            $alltotalAgentHotel=$allTotalHotel-$allagentBalanceHotel;

            TotalReservation::where('id', $id)->update([
                'total' => $request->NumberSellingRate,
                'totalHotel' => $request->NumberRate,
                'agentBalance' => $alltotalAgent - $request->NumberSellingRate,
                'hotelBalance' =>$request->NumberRate - $alltotalAgentHotel ,

            ]);

            return redirect()->route('guest_reservation.create')->with(['success' => '🤗 Successfully Storing']);
        }
    }

    public function showAll()
    {

        $guestReservations = TotalReservation::orderBy('id', 'DESC')->get();

        return view('admin.pages.Reservation.showAll', compact('guestReservations'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function editDate($id)
    {

        $hotels = Hotel::get();
        $hotelTypes = RoomType::get();
        $mealPlans = MealPlan::get();
        $GuestReservation = GuestReservation::find($id);

        $roomCategorys = \App\Models\RoomCategory::get();
        $roomTypes = RoomType::get();
        return view('admin.pages.Reservation.editDate', compact('roomTypes', 'roomCategorys', 'GuestReservation', 'hotels', 'hotelTypes', 'mealPlans'));
    }

    public
    function updateDate(Request $request, $id)
    {


        GuestReservation::where('id', $id)->update([

            'hotel_id' => $request->hotel_id,
            'roomType_id' => $request->room_type_id,
            'meal_id' => $request->mealPlan_id,
            'roomCategory_id' => $request->roomCategory_id,
            'sellingRate' => $request->rate,

        ]);
        $totalRate = GuestReservation::where('total_id', $request->total)->sum('sellingRate');
        TotalReservation::where('id', $request->total)->update([
            'total' => $totalRate,
        ]);
        return redirect()->route('guest_reservation.create')->with(['success' => '🤗 Successfully updating']);

    }

    public
    function detailDelete($id)
    {
        $total = TotalReservation::where('id', $id)->value('cancel');
        if ($total == 1) {


            TotalReservation::where('id', $id)->update([
                'cancel' => Null

            ]);
            GuestReservation::where('total_id', $id)->update([
                'cancel' => Null

            ]);
            foreach (BankMoves::where('total_id', $id)->get() as $bank)
                $bankMovis = $bank->sum('pay');
            $bank_id = $bank->bank_id;
            $balanceBank = Bank::where('id', $bank_id)->value('balance');
            Bank::where('id', $bank_id)->update([
                'balance' => $balanceBank - $bankMovis,
            ]);
        }
        if ($total == Null) {


            TotalReservation::where('id', $id)->update([
                'cancel' => 1

            ]);
            GuestReservation::where('total_id', $id)->update([
                'cancel' => 1

            ]);
            foreach (BankMoves::where('total_id', $id)->get() as $bank)
                $bankMovis = $bank->sum('pay');
            $bank_id = $bank->bank_id;
            $balanceBank = Bank::where('id', $bank_id)->value('balance');
            Bank::where('id', $bank_id)->update([
                'balance' => $balanceBank + $bankMovis,
            ]);
        }

        return redirect()->route('guest_reservation.create')->with(['errors' => '🤗  Operation Successfully']);

    }

    public
    function destroyDate($id)
    {

        $data = GuestReservation::where('id', $id)->value('cancel');

        if ($data == 1) {


            GuestReservation::where('id', $id)->update([
                'cancel' => Null

            ]);
            $guest_id = GuestReservation::where('id', $id)->value('guest_id');
            $balanceGuest = NewGuest::where('id', $guest_id)->value('balance');
            $total = GuestReservation::where('id', $id)->value('sellingRate');

            foreach(BankMoves::where('total_id',$id)->get() as $bank)
                $bankMovis=$bank->sum('pay');
            $bank_id=$bank->bank_id;
            $balanceBank=Bank::where('id',$bank_id)->value('balance');
            Bank::where('id',$bank_id)->update([
                'balance'=>$balanceBank + $bankMovis,
            ]);
        }
        if ($data == Null) {
            GuestReservation::where('id', $id)->update([
                'cancel' => 1

            ]);
            foreach(BankMoves::where('total_id',$id)->get() as $bank)
                $bankMovis=$bank->sum('pay');
            $bank_id=$bank->bank_id;
            $balanceBank=Bank::where('id',$bank_id)->value('balance');
            Bank::where('id',$bank_id)->update([
                'balance'=>$balanceBank - $bankMovis,
            ]);

        }

        $total_id = GuestReservation::where('id', $id)->value('total_id');

        return redirect()->route('admin.detail.guest', $total_id)->with(['success' => '🤗 Successfully updating']);
    }

    public
    function ajax($id, $hotel, $from, $nights_no, $meal, $category)
    {

        $dateFrom = Carbon::create($from);
        $dateFrom->addDays($nights_no - 1)->format('Y-m-d');
        $dateTo = date_format($dateFrom, "Y-m-d");

        if ($HotelContract = HotelContract::
            where("room_type_id", $id)
                ->where("hotel_id", $hotel)
                ->where("mealPlan_id", $meal)
                ->where("roomCategory_id", $category)
                ->where("date", '>=', $from)
                ->where("date", '<=', $dateTo)
                ->sum('rate') > 0.0
        ) {
            $HotelContract = HotelContract::
            where("room_type_id", $id)
                ->where("hotel_id", $hotel)
                ->where("mealPlan_id", $meal)
                ->where("roomCategory_id", $category)
                ->where("date", '>=', $from)
                ->where("date", '<=', $dateTo)
                ->sum('rate');
        } else {
            $HotelContract = 'All Days Not Between Arrange';
        }

        return json_encode($HotelContract);
    }

    public
    function ajaxNumberOfReservation($id, $from)
    {

        $Hotel = Hotel::
        where("id", $id)
            ->value('room_no');
        $HotelReservation = GuestReservation::
        where("hotel_id", $id)
            ->where("date", $from)
            ->sum('nights_no');

        $data = $Hotel - $HotelReservation;

        return json_encode($data);
    }

    public
    function ajaxNubmerOfTravelAgent($id, $from, $hotel)
    {

        $Hotel = TravelAgentRoom::
        where("travel_agent_id", $id)
            ->where("hotel_id", $hotel)
            ->value('room_no');
        $HotelReservation = GuestReservation::
        where("travel_agent_id", $id)
            ->where("hotel_id", $hotel)
            ->where("date", $from)
            ->count('rate');

        $data = $Hotel - $HotelReservation;

        return json_encode($data);
    }

    public
    function reportReservation($id)
    {


        $totals = TotalReservation::find($id);

        return view('admin.pages.Reservation.report', compact('totals'));

    }

    public
    function AjaxMealPlan($id)
    {

        $mealPlan = HotelContract:: where("hotel_id", $id)
            ->with(['mealPlans'])->select("mealPlan_id", "id")->groupBy('mealPlan_id')->orderBy('mealPlan_id')->get();

        return json_encode($mealPlan);
    }

    public
    function AjaxRoomCategory($id)
    {

        $roomCategors = HotelContract::where("hotel_id", $id)
            ->with(['roomCategors'])->select("roomCategory_id", "id")->groupBy('roomCategory_id')->orderBy('roomCategory_id')->get();
        return json_encode($roomCategors);
    }

    public
    function AjaxRoomType($id)
    {

        $RoomTypes = HotelContract::where("hotel_id", $id)
            ->with(['roomTypes'])->select("room_type_id", "id")->groupBy('room_type_id')->orderBy('room_type_id')->get();
        return json_encode($RoomTypes);
    }

    public
    function ajaxRoomTypeAdultNumber($id)
    {

        $adultNumber = RoomType::
        where("id", $id)
            ->value('capacity');


        return json_encode($adultNumber);
    }

}
