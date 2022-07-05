<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\BankMoves;
use App\Models\CompanySetting;
use App\Models\GuestReservation;
use App\Models\Hotel;
use App\Models\Invoice;
use App\Models\MoneyKeeper;
use App\Models\MoneyKeeperMoves;
use App\Models\NewAgent;
use App\Models\NewGuest;
use App\Models\RoomCategory;
use App\Models\RoomType;
use App\Models\TotalReservation;
use App\Models\TravelAgentRoom;
use App\Models\User;
use App\Models\VisaMoves;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GuestReservationReportController extends Controller
{
    public function reportHotel()
    {


        $hotels = Hotel::get();
        $travelAgents = NewAgent::get();

        return view('admin.pages.ReportReservation.hotel', compact('hotels', 'travelAgents'));
    }

    public function arrivalList(Request $request)
    {

        if ($request->checkbox != 1) {
            if ($request->travelAgent_id == 0 && $request->hotel_id > 0 && $request->to != "") {
                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)->paginate(15);
                $totalss = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)->get();

                $travelAgent = "";
                $number = 1;
                $hotel = Hotel::find($request->hotel_id);
                $companySitting = CompanySetting::get();

                $from = $request->from;
                $to = $request->to;
                return view('admin.pages.ReportReservation.arrivalList11', compact('number', 'travelAgent', 'from', 'to', 'totals', 'totalss', 'hotel', 'companySitting'));
            } elseif ($request->travelAgent_id > 0 && $request->hotel_id > 0 && $request->to != "") {
                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('travel_agent_id', $request->travelAgent_id)
                    ->where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)->paginate(15);
                $totalss = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('travel_agent_id', $request->travelAgent_id)
                    ->where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)->get();
                $hotel = Hotel::find($request->hotel_id);
                $number = 2;
                if ($totals->count() < 1) {
                    return redirect()->back()->with(['errors' => '🤗 Reservation  Not exists ']);


                }
                $travelAgent = NewAgent::find($request->travelAgent_id);
                $companySitting = CompanySetting::get();

                $from = $request->from;
                $to = $request->to;
                return view('admin.pages.ReportReservation.arrivalList12', compact('number', 'travelAgent', 'from', 'to', 'totals', 'totalss', 'hotel', 'companySitting'));

            } elseif ($request->travelAgent_id == 0 && $request->hotel_id == 0 && $request->to != "") {
                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->
                where('cancel', Null)->
                where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)->paginate(15);
                $totalss = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->
                where('cancel', Null)->
                where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)->get();
                $hotel = Hotel::orderBy('name', 'ASC')->get();
                $number = 3;

                if ($totals->count() < 1) {
                    return redirect()->back()->with(['errors' => '🤗 Reservation  Not exists ']);


                }

                $travelAgent = NewAgent::orderBy('name', 'ASC')->get();
                $companySitting = CompanySetting::get();

                $from = $request->from;
                $to = $request->to;
                return view('admin.pages.ReportReservation.arrivalList13', compact('number', 'travelAgent', 'from', 'to', 'totals', 'totalss', 'hotel', 'companySitting'));

            } elseif ($request->travelAgent_id > 0 && $request->hotel_id == 0 && $request->to != "") {
                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->
                where('travel_agent_id', $request->travelAgent_id)
                    ->where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)->paginate(15);
                $totalss = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->
                where('travel_agent_id', $request->travelAgent_id)
                    ->where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)->get();
                $hotel = Hotel::orderBy('name', 'ASC')->get();

                $number = 4;
                if ($totals->count() < 1) {
                    return redirect()->back()->with(['errors' => '🤗 Reservation  Not exists ']);


                }
                $travelAgent = NewAgent::find($request->travelAgent_id);
                $companySitting = CompanySetting::get();

                $from = $request->from;
                $to = $request->to;
                return view('admin.pages.ReportReservation.arrivalList14', compact('number', 'travelAgent', 'from', 'to', 'totals', 'totalss', 'hotel', 'companySitting'));

            }
            if ($request->travelAgent_id == 0 && $request->hotel_id > 0 && $request->to == "") {
                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('from', $request->from)
                    ->paginate(15);
                $totalss = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('from', $request->from)
                    ->get();

                $travelAgent = "";
                $number = 1;
                $hotel = Hotel::find($request->hotel_id);
                $companySitting = CompanySetting::get();

                $from = $request->from;
                $to = $request->to;
                return view('admin.pages.ReportReservation.arrivalList15', compact('number', 'travelAgent', 'from', 'to', 'totals', 'totalss', 'hotel', 'companySitting'));
            } elseif ($request->travelAgent_id > 0 && $request->hotel_id > 0 && $request->to == "") {
                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('travel_agent_id', $request->travelAgent_id)
                    ->where('from', $request->from)
                    ->paginate(15);
                $totalss = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('travel_agent_id', $request->travelAgent_id)
                    ->where('from', $request->from)
                    ->get();
                $hotel = Hotel::find($request->hotel_id);
                $number = 2;
                if ($totals->count() < 1) {
                    return redirect()->back()->with(['errors' => '🤗 Reservation  Not exists ']);


                }
                $travelAgent = NewAgent::find($request->travelAgent_id);
                $companySitting = CompanySetting::get();

                $from = $request->from;
                $to = $request->to;
                return view('admin.pages.ReportReservation.arrivalList16', compact('number', 'travelAgent', 'from', 'to', 'totals', 'totalss', 'hotel', 'companySitting'));

            } elseif ($request->travelAgent_id == 0 && $request->hotel_id == 0 && $request->to == "") {

                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->
                where('from', $request->from)
                    ->paginate(15);
                $totalss = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->
                where('from', $request->from)
                    ->get();
                $hotel = Hotel::orderBy('name', 'ASC')->get();
                $number = 3;

                if ($totals->count() < 1) {
                    return redirect()->back()->with(['errors' => '🤗 Reservation  Not exists ']);


                }

                $travelAgent = NewAgent::orderBy('name', 'ASC')->get();
                $companySitting = CompanySetting::get();

                $from = $request->from;
                $to = $request->to;
                return view('admin.pages.ReportReservation.arrivalList17', compact('number', 'travelAgent', 'from', 'to', 'totals', 'totalss', 'hotel', 'companySitting'));

            } elseif ($request->travelAgent_id > 0 && $request->hotel_id == 0 && $request->to == "") {
                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->
                where('travel_agent_id', $request->travelAgent_id)
                    ->where('from', $request->from)
                    ->paginate(15);
                $totalss = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->
                where('travel_agent_id', $request->travelAgent_id)
                    ->where('from', $request->from)
                    ->get();
                $hotel = Hotel::orderBy('name', 'ASC')->get();

                $number = 4;
                if ($totals->count() < 1) {
                    return redirect()->back()->with(['errors' => '🤗 Reservation  Not exists ']);


                }
                $travelAgent = NewAgent::find($request->travelAgent_id);
                $companySitting = CompanySetting::get();

                $from = $request->from;
                $to = $request->to;
                return view('admin.pages.ReportReservation.arrivalList18', compact('number', 'travelAgent', 'from', 'to', 'totalss', 'totals', 'hotel', 'companySitting'));

            }


        }
        if ($request->checkbox == 1) {

            if ($request->travelAgent_id == 0 && $request->hotel_id > 0 && $request->to != "") {
                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)->get();

                $travelAgent = "";

                $hotel = Hotel::where('id', $request->hotel_id)->get();
            } elseif ($request->travelAgent_id > 0 && $request->hotel_id > 0 && $request->to != "") {
                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('travel_agent_id', $request->travelAgent_id)
                    ->where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)->get();
                $hotel = Hotel::where('id', $request->hotel_id)->get();
                if ($totals->count() < 1) {
                    return redirect()->back()->with(['errors' => '🤗 Reservation  Not exists ']);


                }
                $travelAgent = NewAgent::where('id', $request->travelAgent_id)->get();


            } elseif ($request->travelAgent_id == 0 && $request->hotel_id == 0 && $request->to != "") {
                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->
                where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)->get();
                $hotel = Hotel::orderBy('name', 'ASC')->get();

                if ($totals->count() < 1) {
                    return redirect()->back()->with(['errors' => '🤗 Reservation  Not exists ']);


                }

                $travelAgent = NewAgent::orderBy('name', 'ASC')->get();

            } elseif ($request->travelAgent_id > 0 && $request->hotel_id == 0 && $request->to != "") {
                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->
                where('travel_agent_id', $request->travelAgent_id)
                    ->where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)->get();
                $hotel = Hotel::orderBy('name', 'ASC')->get();


                if ($totals->count() < 1) {
                    return redirect()->back()->with(['errors' => '🤗 Reservation  Not exists ']);


                }
                $travelAgent = NewAgent::where('id', $request->travelAgent_id)->get();


            }
            if ($request->travelAgent_id == 0 && $request->hotel_id > 0 && $request->to == "") {
                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('from', $request->from)
                    ->get();

                $travelAgent = "";
                $hotel = Hotel::where('id', $request->hotel_id)->get();
            } elseif ($request->travelAgent_id > 0 && $request->hotel_id > 0 && $request->to == "") {
                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('travel_agent_id', $request->travelAgent_id)
                    ->where('from', $request->from)
                    ->paginate(15);
                $hotel = Hotel::where('id', $request->hotel_id)->get();
                if ($totals->count() < 1) {
                    return redirect()->back()->with(['errors' => '🤗 Reservation  Not exists ']);


                }
                $travelAgent = NewAgent::where('id', $request->travelAgent_id)->get();


            } elseif ($request->travelAgent_id == 0 && $request->hotel_id == 0 && $request->to == "") {

                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->
                where('from', $request->from)
                    ->get();
                $hotel = Hotel::orderBy('name', 'ASC')->get();


                if ($totals->count() < 1) {
                    return redirect()->back()->with(['errors' => '🤗 Reservation  Not exists ']);


                }

                $travelAgent = NewAgent::orderBy('name', 'ASC')->get();

            } elseif ($request->travelAgent_id > 0 && $request->hotel_id == 0 && $request->to == "") {
                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->
                where('travel_agent_id', $request->travelAgent_id)
                    ->where('from', $request->from)
                    ->get();
                $hotel = Hotel::orderBy('name', 'ASC')->get();


                if ($totals->count() < 1) {
                    return redirect()->back()->with(['errors' => '🤗 Reservation  Not exists ']);


                }
                $travelAgent = NewAgent::where('id', $request->travelAgent_id)->get();


            }


            $companySitting = CompanySetting::get();

            $from = $request->from;
            $to = $request->to;
            return view('admin.pages.ReportReservation.dataTable1', compact('travelAgent', 'from', 'to', 'totals', 'hotel', 'companySitting'));
        }
    }

    public function reportHotel2()
    {

        $travelAgents = NewAgent::get();

        $hotels = Hotel::get();
        return view('admin.pages.ReportReservation.hotel2', compact('hotels', 'travelAgents'));
    }

    public function hotelTravelAgent($dd)
    {


        $travelAgent = TravelAgentRoom::
        where("hotel_id", $dd)
            ->with('travelAgents')
            ->select('id', 'travel_agent_id')
            ->get('rate');


        return json_encode($travelAgent);
    }

    public function arrivalList2(Request $request)
    {

        if ($request->checkbox != 1) {
            if ($request->travelAgent_id == 0 && $request->hotel_id > 0 && $request->to != "") {
                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)->paginate(15);
                $totalss = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)->get();
                $travelAgent = "";
                $number = 1;
                $hotel = Hotel::find($request->hotel_id);
                $companySitting = CompanySetting::get();

                $from = $request->from;
                $to = $request->to;
                return view('admin.pages.ReportReservation.arrivalList21', compact('number', 'travelAgent', 'from', 'to', 'totalss', 'totals', 'hotel', 'companySitting'));
            } elseif ($request->travelAgent_id > 0 && $request->hotel_id > 0 && $request->to != "") {
                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('travel_agent_id', $request->travelAgent_id)
                    ->where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)->paginate(15);
                $totalss = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('travel_agent_id', $request->travelAgent_id)
                    ->where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)->get();
                $hotel = Hotel::find($request->hotel_id);
                $number = 2;
                if ($totals->count() < 1) {
                    return redirect()->back()->with(['errors' => '🤗 Reservation  Not exists ']);


                }
                $travelAgent = NewAgent::find($request->travelAgent_id);
                $companySitting = CompanySetting::get();

                $from = $request->from;
                $to = $request->to;
                return view('admin.pages.ReportReservation.arrivalList22', compact('number', 'travelAgent', 'from', 'to', 'totalss', 'totals', 'hotel', 'companySitting'));

            } elseif ($request->travelAgent_id == 0 && $request->hotel_id == 0 && $request->to != "") {
                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->
                where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)->paginate(15);
                $totalss = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->
                where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)->get();
                $hotel = Hotel::orderBy('name', 'ASC')->get();
                $number = 3;

                if ($totals->count() < 1) {
                    return redirect()->back()->with(['errors' => '🤗 Reservation  Not exists ']);


                }

                $travelAgent = NewAgent::orderBy('name', 'ASC')->get();
                $companySitting = CompanySetting::get();

                $from = $request->from;
                $to = $request->to;
                return view('admin.pages.ReportReservation.arrivalList23', compact('number', 'travelAgent', 'from', 'to', 'totals', 'totalss', 'hotel', 'companySitting'));

            } elseif ($request->travelAgent_id > 0 && $request->hotel_id == 0 && $request->to != "") {
                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->
                where('travel_agent_id', $request->travelAgent_id)
                    ->where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)->paginate(15);
                $totalss = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->
                where('travel_agent_id', $request->travelAgent_id)
                    ->where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)->get();
                $hotel = Hotel::orderBy('name', 'ASC')->get();

                $number = 4;
                if ($totals->count() < 1) {
                    return redirect()->back()->with(['errors' => '🤗 Reservation  Not exists ']);


                }
                $travelAgent = NewAgent::find($request->travelAgent_id);

                $companySitting = CompanySetting::get();

                $from = $request->from;
                $to = $request->to;
                return view('admin.pages.ReportReservation.arrivalList24', compact('number', 'travelAgent', 'from', 'to', 'totalss', 'totals', 'hotel', 'companySitting'));

            }

            if ($request->travelAgent_id == 0 && $request->hotel_id > 0 && $request->to == "") {
                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('from', $request->from)
                    ->paginate(15);
                $totalss = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('from', $request->from)
                    ->get();

                $travelAgent = "";
                $number = 1;
                $hotel = Hotel::find($request->hotel_id);
                $companySitting = CompanySetting::get();

                $from = $request->from;
                $to = $request->to;
                return view('admin.pages.ReportReservation.arrivalList25', compact('number', 'travelAgent', 'from', 'to', 'totalss', 'totals', 'hotel', 'companySitting'));
            } elseif ($request->travelAgent_id > 0 && $request->hotel_id > 0 && $request->to == "") {
                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('travel_agent_id', $request->travelAgent_id)
                    ->where('from', $request->from)
                    ->paginate(15);
                $totalss = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('travel_agent_id', $request->travelAgent_id)
                    ->where('from', $request->from)
                    ->get();
                $hotel = Hotel::find($request->hotel_id);
                $number = 2;
                if ($totals->count() < 1) {
                    return redirect()->back()->with(['errors' => '🤗 Reservation  Not exists ']);


                }
                $travelAgent = NewAgent::find($request->travelAgent_id);
                $companySitting = CompanySetting::get();

                $from = $request->from;
                $to = $request->to;
                return view('admin.pages.ReportReservation.arrivalList26', compact('number', 'travelAgent', 'from', 'to', 'totalss', 'totals', 'hotel', 'companySitting'));

            } elseif ($request->travelAgent_id == 0 && $request->hotel_id == 0 && $request->to == "") {

                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->
                where('from', $request->from)
                    ->paginate(15);
                $totalss = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->
                where('from', $request->from)
                    ->get();
                $hotel = Hotel::orderBy('name', 'ASC')->get();
                $number = 3;

                if ($totals->count() < 1) {
                    return redirect()->back()->with(['errors' => '🤗 Reservation  Not exists ']);


                }

                $travelAgent = NewAgent::orderBy('name', 'ASC')->get();
                $companySitting = CompanySetting::get();

                $from = $request->from;
                $to = $request->to;
                return view('admin.pages.ReportReservation.arrivalList27', compact('number', 'travelAgent', 'from', 'to', 'totalss', 'totals', 'hotel', 'companySitting'));

            } elseif ($request->travelAgent_id > 0 && $request->hotel_id == 0 && $request->to == "") {
                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->
                where('travel_agent_id', $request->travelAgent_id)
                    ->where('from', $request->from)
                    ->paginate(15);
                $totalss = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->
                where('travel_agent_id', $request->travelAgent_id)
                    ->where('from', $request->from)
                    ->get();
                $hotel = Hotel::orderBy('name', 'ASC')->get();

                $number = 4;
                if ($totals->count() < 1) {
                    return redirect()->back()->with(['errors' => '🤗 Reservation  Not exists ']);


                }
                $travelAgent = NewAgent::find($request->travelAgent_id);
                $companySitting = CompanySetting::get();

                $from = $request->from;
                $to = $request->to;
                return view('admin.pages.ReportReservation.arrivalList28', compact('number', 'travelAgent', 'from', 'to', 'totalss', 'totals', 'hotel', 'companySitting'));

            }


        }


        if ($request->checkbox == 1) {

            if ($request->travelAgent_id == 0 && $request->hotel_id > 0 && $request->to != "") {
                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)->get();
                $travelAgent = "";

                $hotel = Hotel::where('id', $request->hotel_id)->get();
            } elseif ($request->travelAgent_id > 0 && $request->hotel_id > 0 && $request->to != "") {
                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('travel_agent_id', $request->travelAgent_id)
                    ->where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)->get();
                $hotel = Hotel::where('id', $request->hotel_id)->get();
                if ($totals->count() < 1) {
                    return redirect()->back()->with(['errors' => '🤗 Reservation  Not exists ']);


                }
                $travelAgent = NewAgent::where('id', $request->travelAgent_id)->get();


            } elseif ($request->travelAgent_id == 0 && $request->hotel_id == 0 && $request->to != "") {
                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->
                where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)->get();
                $hotel = Hotel::orderBy('name', 'ASC')->get();


                if ($totals->count() < 1) {
                    return redirect()->back()->with(['errors' => '🤗 Reservation  Not exists ']);


                }

                $travelAgent = NewAgent::orderBy('name', 'ASC')->get();
            } elseif ($request->travelAgent_id > 0 && $request->hotel_id == 0 && $request->to != "") {
                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->
                where('travel_agent_id', $request->travelAgent_id)
                    ->where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)->get();
                $hotel = Hotel::orderBy('name', 'ASC')->get();

                if ($totals->count() < 1) {
                    return redirect()->back()->with(['errors' => '🤗 Reservation  Not exists ']);


                }
                $travelAgent = NewAgent::where('id', $request->travelAgent_id)->get();


            }
            if ($request->travelAgent_id == 0 && $request->hotel_id > 0 && $request->to == "") {
                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('from', $request->from)
                    ->get();

                $travelAgent = "";

                $hotel = Hotel::where('id', $request->hotel_id)->get();
            } elseif ($request->travelAgent_id > 0 && $request->hotel_id > 0 && $request->to == "") {
                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('travel_agent_id', $request->travelAgent_id)
                    ->where('from', $request->from)
                    ->get();
                $hotel = Hotel::where('id', $request->hotel_id)->get();
                if ($totals->count() < 1) {
                    return redirect()->back()->with(['errors' => '🤗 Reservation  Not exists ']);


                }
                $travelAgent = NewAgent::where('id', $request->travelAgent_id)->get();


            } elseif ($request->travelAgent_id == 0 && $request->hotel_id == 0 && $request->to == "") {

                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->
                where('from', $request->from)
                    ->get();
                $hotel = Hotel::orderBy('name', 'ASC')->get();


                if ($totals->count() < 1) {
                    return redirect()->back()->with(['errors' => '🤗 Reservation  Not exists ']);


                }

                $travelAgent = NewAgent::orderBy('name', 'ASC')->get();

            } elseif ($request->travelAgent_id > 0 && $request->hotel_id == 0 && $request->to == "") {
                $totals = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->
                where('travel_agent_id', $request->travelAgent_id)
                    ->where('from', $request->from)
                    ->get();
                $hotel = Hotel::orderBy('name', 'ASC')->get();


                if ($totals->count() < 1) {
                    return redirect()->back()->with(['errors' => '🤗 Reservation  Not exists ']);


                }
                $travelAgent = NewAgent::where('id', $request->travelAgent_id)->get();


            }


            $companySitting = CompanySetting::get();
            $from = $request->from;
            $to = $request->to;
            return view('admin.pages.ReportReservation.dataTable2', compact('travelAgent', 'from', 'to', 'totals', 'hotel', 'companySitting'));
        }


    }

    public function travel()
    {

        $hotels = Hotel::get();

        $roomsCategorys = RoomCategory::get();
        return view('admin.pages.ReportReservation.travel', compact('roomsCategorys', 'hotels'));
    }

    public function showTravel(Request $request)
    {
        if ($request->checkbox == 1) {


            $totals = GuestReservation::orderBy('date', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                ->where('date', '>=', $request->from)
                ->where('date', '<=', $request->to)->groupBy('date')->get();
            $countRoomCategorys = GuestReservation::orderBy('date', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                ->where('date', '>=', $request->from)
                ->where('date', '<=', $request->to)->sum('rooms');

            $totalGroup = GuestReservation::orderBy('date', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                ->where('date', '>=', $request->from)
                ->where('date', '<=', $request->to)
                ->groupBy('roomCategory_id')->get();
            $totalReservations = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                ->where('from', '>=', $request->from)
                ->where('from', '<=', $request->to)
                ->groupBy('roomCategory_id')->get();

            $hotel = Hotel::find($request->hotel_id);
            $companySitting = CompanySetting::get();
            $from = $request->from;
            $to = $request->to;
            ////////
            $dateFrom = Carbon::parse($from);
            $dateTo = Carbon::parse($to);
            $dates = [];
            $d = \Carbon\Carbon::createFromDate($from)->format('d');

            $days = $dateFrom->diffInDays($dateTo);
            $x = $days + ($d);
            for ($d; $d <= $x; ++$d) {
                $dates[] = \Carbon\Carbon::createFromDate($dateFrom->year, $dateFrom->month, $d)->format('d-m-Y');
            }

            return view('admin.pages.ReportReservation.dataTable3', compact('days', 'dates', 'countRoomCategorys', 'totalReservations', 'from', 'to', 'hotel', 'totals', 'totalGroup', 'companySitting'));
        } else {
            if ($request->roomCategory_id == 0) {
                $totals = GuestReservation::orderBy('date', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('date', '>=', $request->from)
                    ->where('date', '<=', $request->to)->groupBy('date')->get();
                $countRoomCategorys = GuestReservation::orderBy('date', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('date', '>=', $request->from)
                    ->where('date', '<=', $request->to)->sum('rooms');
                $totalGroup = GuestReservation::orderBy('date', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('date', '>=', $request->from)
                    ->where('date', '<=', $request->to)
                    ->groupBy('roomCategory_id')->get();
                $totalReservations = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)
                    ->groupBy('roomCategory_id')->get();

                $hotel = Hotel::find($request->hotel_id);
                $companySitting = CompanySetting::get();
                $from = $request->from;
                $to = $request->to;

                ////////
                $dateFrom = Carbon::parse($from);
                $dateTo = Carbon::parse($to);
                $dates = [];

                $d = \Carbon\Carbon::createFromDate($from)->format('d');

                $days = $dateFrom->diffInDays($dateTo);
                $x = $days + ($d);
                for ($d; $d <= $x; ++$d) {
                    $dates[] = \Carbon\Carbon::createFromDate($dateFrom->year, $dateFrom->month, $d)->format('d-m-Y');
                }

                return view('admin.pages.ReportReservation.materillization', compact('days', 'dates', 'countRoomCategorys', 'totalReservations', 'from', 'to', 'hotel', 'totals', 'totalGroup', 'companySitting'));
            } else {
                $totals = GuestReservation::orderBy('date', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('roomCategory_id', $request->roomCategory_id)
                    ->where('date', '>=', $request->from)
                    ->where('date', '<=', $request->to)->groupBy('date')->get();
                $countRoomCategorys = GuestReservation::orderBy('date', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('roomCategory_id', $request->roomCategory_id)
                    ->where('date', '>=', $request->from)
                    ->where('date', '<=', $request->to)->sum('rooms');
$roomCategory=RoomCategory::find($request->roomCategory_id);
                $totalGroup = GuestReservation::orderBy('date', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('roomCategory_id', $request->roomCategory_id)
                    ->where('date', '>=', $request->from)
                    ->where('date', '<=', $request->to)
                    ->groupBy('roomCategory_id')->get();
                $totalReservations = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('roomCategory_id', $request->roomCategory_id)
                    ->where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)
                    ->groupBy('roomCategory_id')->get();
                $agent = RoomCategory::find($request->agnt_id);
                $hotel = Hotel::find($request->hotel_id);
                $companySitting = CompanySetting::get();
                $from = $request->from;
                $to = $request->to;
                ////////
                $dateFrom = Carbon::parse($from);
                $dateTo = Carbon::parse($to);
                $dates = [];
                $d = \Carbon\Carbon::createFromDate($from)->format('d');

                $days = $dateFrom->diffInDays($dateTo);
                $x = $days + ($d);
                for ($d; $d <= $x; ++$d) {
                    $dates[] = \Carbon\Carbon::createFromDate($dateFrom->year, $dateFrom->month, $d)->format('d-m-Y');
                }

                return view('admin.pages.ReportReservation.materillization1', compact('agent', 'days', 'dates', 'countRoomCategorys', 'totalReservations', 'from', 'to', 'hotel', 'totals', 'totalGroup', 'companySitting','roomCategory'));
            }
        }

    }

    public function travelAgent()
    {

        $hotels = Hotel::get();

        $agents = NewAgent::get();
        return view('admin.pages.ReportReservation.travelAgent', compact('agents', 'hotels'));
    }

    public function showTravelAgent(Request $request)
    {

        if ($request->checkbox == 1) {


            $totals = GuestReservation::orderBy('date', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                ->where('travel_agent_id', $request->agent_id)
                ->where('date', '>=', $request->from)
                ->where('date', '<=', $request->to)->groupBy('date')->get();
            $countRoomCategorys = GuestReservation::orderBy('date', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                ->where('travel_agent_id', $request->agent_id)
                ->where('date', '>=', $request->from)
                ->where('date', '<=', $request->to)->sum('rooms');

            $totalGroup = GuestReservation::orderBy('date', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                ->where('travel_agent_id', $request->agent_id)
                ->where('date', '>=', $request->from)
                ->where('date', '<=', $request->to)
                ->groupBy('travel_agent_id')->get();
            $totalReservations = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                ->where('travel_agent_id', $request->agent_id)
                ->where('from', '>=', $request->from)
                ->where('from', '<=', $request->to)
                ->groupBy('travel_agent_id')->get();

            $hotel = Hotel::find($request->hotel_id);
            $companySitting = CompanySetting::get();
            $from = $request->from;
            $to = $request->to;
            ////////
            $dateFrom = Carbon::parse($from);
            $dateTo = Carbon::parse($to);
            $dates = [];

            $d = \Carbon\Carbon::createFromDate($from)->format('d');

            $days = $dateFrom->diffInDays($dateTo);
            $x = $days + ($d);
            for ($d; $d <= $x; ++$d) {
                $dates[] = \Carbon\Carbon::createFromDate($dateFrom->year, $dateFrom->month, $d)->format('d-m-Y');
            }

            return view('admin.pages.ReportReservation.dataTableAgent3', compact('days', 'dates', 'countRoomCategorys', 'totalReservations', 'from', 'to', 'hotel', 'totals', 'totalGroup', 'companySitting'));
        } else {
            if ($request->agent_id == 0) {
                $totals = GuestReservation::orderBy('date', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('date', '>=', $request->from)
                    ->where('date', '<=', $request->to)->groupBy('date')->get();
                $countRoomCategorys = GuestReservation::orderBy('date', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('date', '>=', $request->from)
                    ->where('date', '<=', $request->to)->sum('rooms');
                $totalGroup = GuestReservation::orderBy('date', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('date', '>=', $request->from)
                    ->where('date', '<=', $request->to)
                    ->groupBy('travel_agent_id')->get();
                $totalReservations = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)
                    ->groupBy('travel_agent_id')->get();

                $hotel = Hotel::find($request->hotel_id);
                $companySitting = CompanySetting::get();
                $from = $request->from;
                $to = $request->to;

                ////////
                $dateFrom = Carbon::parse($from);
                $dateTo = Carbon::parse($to);
                $dates = [];
                $d = \Carbon\Carbon::createFromDate($from)->format('d');

                $days = $dateFrom->diffInDays($dateTo);
                $x = $days + ($d);
                for ($d; $d <= $x; ++$d) {
                    $dates[] = \Carbon\Carbon::createFromDate($dateFrom->year, $dateFrom->month, $d)->format('d-m-Y');
                }

                return view('admin.pages.ReportReservation.materillizationAgent', compact('days', 'dates', 'countRoomCategorys', 'totalReservations', 'from', 'to', 'hotel', 'totals', 'totalGroup', 'companySitting'));
            } else {
                $totals = GuestReservation::orderBy('date', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('roomCategory_id', $request->agent_id)
                    ->where('date', '>=', $request->from)
                    ->where('date', '<=', $request->to)->groupBy('date')->get();
                $countRoomCategorys = GuestReservation::orderBy('date', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('travel_agent_id', $request->agent_id)
                    ->where('date', '>=', $request->from)
                    ->where('date', '<=', $request->to)->sum('rooms');
                $agent=NewAgent::find($request->agent_id);

                $totalGroup = GuestReservation::orderBy('date', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('travel_agent_id', $request->agent_id)
                    ->where('date', '>=', $request->from)
                    ->where('date', '<=', $request->to)
                    ->groupBy('travel_agent_id')->get();
                $totalReservations = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('travel_agent_id', $request->agent_id)
                    ->where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)
                    ->groupBy('travel_agent_id')->get();
                $agent = NewAgent::find($request->agent_id);
                $hotel = Hotel::find($request->hotel_id);
                $companySitting = CompanySetting::get();
                $from = $request->from;
                $to = $request->to;
                ////////
                $dateFrom = Carbon::parse($from);
                $dateTo = Carbon::parse($to);
                $dates = [];
                $d = \Carbon\Carbon::createFromDate($from)->format('d');
                $days = $dateFrom->diffInDays($dateTo);
                $x = $days + ($d);
                for ($d; $d <= $x; ++$d) {
                    $dates[] = \Carbon\Carbon::createFromDate($dateFrom->year, $dateFrom->month, $d)->format('d-m-Y');
                }
                return view('admin.pages.ReportReservation.materillizationAgent1', compact('agent', 'days', 'dates', 'countRoomCategorys', 'totalReservations', 'from', 'to', 'hotel', 'totals', 'totalGroup', 'companySitting','agent'));
            }
        }

    }
    public function travelAgent2()
    {

        $hotels = Hotel::get();

        $agents = NewAgent::get();
        return view('admin.pages.ReportReservation.travelAgent2', compact('agents', 'hotels'));
    }

    public function showTravelAgent2(Request $request)
    {

        if ($request->checkbox == 1) {


            $totals = GuestReservation::orderBy('date', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                ->where('travel_agent_id', $request->agent_id)
                ->where('date', '>=', $request->from)
                ->where('date', '<=', $request->to)->groupBy('date')->get();
            $countRoomCategorys = GuestReservation::orderBy('date', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                ->where('travel_agent_id', $request->agent_id)
                ->where('date', '>=', $request->from)
                ->where('date', '<=', $request->to)->sum('rooms');

            $totalGroup = GuestReservation::orderBy('date', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                ->where('travel_agent_id', $request->agent_id)
                ->where('date', '>=', $request->from)
                ->where('date', '<=', $request->to)
                ->groupBy('travel_agent_id')->get();
            $totalReservations = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                ->where('travel_agent_id', $request->agent_id)
                ->where('from', '>=', $request->from)
                ->where('from', '<=', $request->to)
                ->groupBy('travel_agent_id')->get();

            $hotel = Hotel::find($request->hotel_id);
            $companySitting = CompanySetting::get();
            $from = $request->from;
            $to = $request->to;
            ////////
            $dateFrom = Carbon::parse($from);
            $dateTo = Carbon::parse($to);
            $dates = [];

            $d = \Carbon\Carbon::createFromDate($from)->format('d');

            $days = $dateFrom->diffInDays($dateTo);
            $x = $days + ($d);
            for ($d; $d <= $x; ++$d) {
                $dates[] = \Carbon\Carbon::createFromDate($dateFrom->year, $dateFrom->month, $d)->format('d-m-Y');
            }

            return view('admin.pages.ReportReservation.dataTableAgent3', compact('days', 'dates', 'countRoomCategorys', 'totalReservations', 'from', 'to', 'hotel', 'totals', 'totalGroup', 'companySitting'));
        }
        else {
            if ($request->agent_id == 0) {
                $totals = GuestReservation::orderBy('date', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('date', '>=', $request->from)
                    ->where('date', '<=', $request->to)->groupBy('date')->get();
                $countRoomCategorys = GuestReservation::orderBy('date', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('date', '>=', $request->from)
                    ->where('date', '<=', $request->to)->sum('rooms');
                $totalGroup = GuestReservation::orderBy('date', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('date', '>=', $request->from)
                    ->where('date', '<=', $request->to)
                    ->groupBy('travel_agent_id')->get();
                $totalReservations = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)
                    ->groupBy('travel_agent_id')->get();

                $hotel = Hotel::find($request->hotel_id);
                $companySitting = CompanySetting::get();
                $from = $request->from;
                $to = $request->to;

                ////////
                $dateFrom = Carbon::parse($from);
                $dateTo = Carbon::parse($to);
                $dates = [];
                $d = \Carbon\Carbon::createFromDate($from)->format('d');

                $days = $dateFrom->diffInDays($dateTo);
                $x = $days + ($d);
                for ($d; $d <= $x; ++$d) {
                    $dates[] = \Carbon\Carbon::createFromDate($dateFrom->year, $dateFrom->month, $d)->format('d-m-Y');
                }
            $agentHaveNotRooms=NewAgent::doesnthave('travelAgents')->doesnthave('totalReservation')->get();
            $agentHaveRooms=NewAgent::doesnthave('travelAgents')->doesnthave('totalReservation')->get();

                return view('admin.pages.ReportReservation.materillizationAgent2', compact('days', 'dates', 'countRoomCategorys', 'totalReservations', 'from', 'to', 'hotel', 'totals', 'totalGroup', 'companySitting','agentHaveNotRooms','agentHaveRooms'));
            } else {
                $totals = GuestReservation::orderBy('date', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('roomCategory_id', $request->agent_id)
                    ->where('date', '>=', $request->from)
                    ->where('date', '<=', $request->to)->groupBy('date')->get();
                $countRoomCategorys = GuestReservation::orderBy('date', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('travel_agent_id', $request->agent_id)
                    ->where('date', '>=', $request->from)
                    ->where('date', '<=', $request->to)->sum('rooms');
                $agent=NewAgent::find($request->agent_id);

                $totalGroup = GuestReservation::orderBy('date', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('travel_agent_id', $request->agent_id)
                    ->where('date', '>=', $request->from)
                    ->where('date', '<=', $request->to)
                    ->groupBy('travel_agent_id')->get();
                $totalReservations = TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $request->hotel_id)
                    ->where('travel_agent_id', $request->agent_id)
                    ->where('from', '>=', $request->from)
                    ->where('from', '<=', $request->to)
                    ->groupBy('travel_agent_id')->get();
                $agent = NewAgent::find($request->agent_id);
                $hotel = Hotel::find($request->hotel_id);
                $companySitting = CompanySetting::get();
                $from = $request->from;
                $to = $request->to;
                ////////
                $dateFrom = Carbon::parse($from);
                $dateTo = Carbon::parse($to);
                $dates = [];
                $d = \Carbon\Carbon::createFromDate($from)->format('d');
                $days = $dateFrom->diffInDays($dateTo);
                $x = $days + ($d);
                for ($d; $d <= $x; ++$d) {
                    $dates[] = \Carbon\Carbon::createFromDate($dateFrom->year, $dateFrom->month, $d)->format('d-m-Y');
                }

                return view('admin.pages.ReportReservation.materillizationAgent12', compact('agent', 'days', 'dates', 'countRoomCategorys', 'totalReservations', 'from', 'to', 'hotel', 'totals', 'totalGroup', 'companySitting','agent'));
            }
        }

    }

    public function reportUser()
    {
        $users = User::get();
        return view('admin.pages.ReportReservation.userReport', compact('users'));
    }
    public function showReportUser(Request $request)
    {
        if ($request->user_id == 0) {
            $totalReservations = TotalReservation::orderBy('user_id')->orderBy('hotel_id', 'ASC')->where('cancel', Null)
                ->where('from', '>=', $request->from)
                ->where('from', '<=', $request->to)
                ->get();
        } else {
            $totalReservations = TotalReservation::where('user_id', $request->user_id)->orderBy('hotel_id', 'ASC')->where('cancel', Null)
                ->where('from', '>=', $request->from)
                ->where('from', '<=', $request->to)
                ->get();
        }
        $from = $request->from;
        $to = $request->to;
        return view('admin.pages.ReportReservation.reportUserResult', compact('totalReservations', 'from', 'to'));

    }

    public function reportGuestResrvation()
    {

        $guests = NewGuest::get();
        return view('admin.pages.ReportReservation.guestResrvation', compact('guests'));

    }

    public function reportGuestResrvationShow(Request $request)
    {


        $guest_id = NewGuest::where('name', $request->guest)->value('id');
        if ($guest_id == "") {
            return redirect()->back()->with(['errors' => '🤗  this Guest not exist']);

        }
        $totals = TotalReservation::where('guest_id', $guest_id)->where('from', '>=', $request->from)
            ->where('from', '<=', $request->to)->paginate(15);
        $totalss = TotalReservation::where('guest_id', $guest_id)->where('from', '>=', $request->from)
            ->where('from', '<=', $request->to)->get();
        $from = $request->from;
        $to = $request->to;
        $guest = NewGuest::find($guest_id);
        return view('admin.pages.ReportReservation.guestResrvationShow', compact('totals', 'guest', 'from', 'to', 'totalss'));

    }

    public function reportHotelResrvation()
    {

        $hotels = Hotel::get();
        return view('admin.pages.ReportReservation.hotelResrvation', compact('hotels'));

    }

    public function reportHotelResrvationShow(Request $request)
    {

        if ($request->kind == 0) {
            $hotel_id = Hotel::where('name', $request->hotel)->value('id');
            if ($hotel_id == "") {
                return redirect()->back()->with(['errors' => '🤗  this Hotel not exist']);

            }
            $totals = TotalReservation::where('hotel_id', $hotel_id)->where('from', '>=', $request->from)
                ->where('from', '<=', $request->to)->paginate(15);
            $totalss = TotalReservation::where('hotel_id', $hotel_id)->where('from', '>=', $request->from)
                ->where('from', '<=', $request->to)->get();
            $from = $request->from;
            $to = $request->to;
            $hotel = Hotel::find($hotel_id);
            return view('admin.pages.ReportReservation.hotelResrvationShow', compact('totals', 'hotel', 'from', 'to', 'totalss'));

        } elseif ($request->kind == 1) {
            $hotel_id = Hotel::where('name', $request->hotel)->value('id');
            $TOTLrESERVATION = TotalReservation::where('hotel_id', $hotel_id)->value('id');
            $totalss = TotalReservation::where('hotel_id', $hotel_id)->where('from', '>=', $request->from)
                ->where('from', '<=', $request->to)->get();
            if ($TOTLrESERVATION == "") {
                return redirect()->back()->with(['errors' => '🤗  this Hotel not exist']);

            }
            if ($totalss->count() == 0) {
                return redirect()->back()->with(['errors' => '🤗  No Data reservation ']);

            }
            $totals = TotalReservation::where('hotel_id', $hotel_id)->where('from', '>=', $request->from)
                ->where('from', '<=', $request->to)->paginate(15);


            $from = $request->from;
            $to = $request->to;
            $hotel = Hotel::find($hotel_id);
            foreach ($totalss as $total)
                $bank = BankMoves::where('total_id', $total->id)->sum('pay');
            $monyKeeper = MoneyKeeperMoves::where('total_id', $total->id)->sum('pay');
            $visa = VisaMoves::where('total_id', $total->id)->sum('pay');
            $sumAll = $bank + $monyKeeper + $visa;


            return view('admin.pages.ReportReservation.hotelResrvationShowTotal', compact('sumAll', 'totals', 'hotel', 'from', 'to', 'totalss'));

        }

    }

    public function reportAgentResrvation()
    {

        $agents = NewAgent::get();
        return view('admin.pages.ReportReservation.agentResrvation', compact('agents'));

    }

    public function reportAgentResrvationShow(Request $request)
    {


        $agent_id = NewAgent::where('name', $request->agent)->value('id');
        if ($agent_id == "") {
            return redirect()->back()->with(['errors' => '🤗  this Agent not exist']);

        }
        $totals = TotalReservation::where('travel_agent_id', $agent_id)->where('from', '>=', $request->from)
            ->where('from', '<=', $request->to)->paginate(15);
        $totalss = TotalReservation::where('travel_agent_id', $agent_id)->where('from', '>=', $request->from)
            ->where('from', '<=', $request->to)->get();
        $from = $request->from;
        $to = $request->to;
        $agent = NewAgent::find($agent_id);
        return view('admin.pages.ReportReservation.agentResrvationShow', compact('totals', 'agent', 'from', 'to', 'totalss'));

    }
//    public function collectGuest($dd){
//
//    $totals=TotalReservation::find($dd);
//     return view('admin.pages.ReportReservation.collectGuest', compact('totals'));
//
//    }
//    public function collectGuestShow(Request $request){
//
//        if ($request->kindPush == 1) {
//
//            BankMoves::create([
//                'date' => $request->date,
//                'kind' => 'guest',
//                'note' => $request->note,
//                'Bank_id' => $request->kindPush_id,
//                'total_id' => $request->total_id,
//                'pay' => $request->balance,
//                'name' => $request->guestName,
//            ]);
//            $balanceBank = Bank::where('id', $request->kindPush_id)->value('balance');
//            Bank::where('id', $request->kindPush_id)->update([
//                'balance' => $balanceBank - $request->balance,
//            ]);
//            $guestBank = NewGuest::where('name', $request->guestName)->value('balance');
//            NewGuest::where('name', $request->guestName)->update([
//                'balance' => $guestBank - $request->balance,
//            ]);
//
//        }
//        if ($request->kindPush == 2) {
//
//            MoneyKeeperMoves::create([
//                'date' => $request->date,
//                'kind' => 'guest',
//                'note' => $request->note,
//                'total_id' => $request->total_id,
//                'moneyKeeper_id' => $request->kindPush_id,
//                'pay' => $request->balance,
//                'name' => $request->guestName,
//            ]);
//            $balanceBank = Bank::where('id', $request->kindPush_id)->value('balance');
//            Bank::where('id', $request->kindPush_id)->update([
//                'balance' => $balanceBank -$request->balance,
//            ]);
//            $guestBank = NewGuest::where('name', $request->guestName)->value('balance');
//            NewGuest::where('name', $request->guestName)->update([
//                'balance' => $guestBank - $request->balance,
//            ]);
//
//        }
//        return redirect()->route('guest_reservation.create')->with(['success' => '🤗 Successfully Storing']);
//    }
    public function collectAgent($dd)
    {

        $totals = TotalReservation::find($dd);
        return view('admin.pages.ReportReservation.collectAgent', compact('totals'));

    }

    public function collectAgentShow(Request $request)
    {

        if ($request->kindPush == 1) {

            BankMoves::create([
                'date' => $request->date,
                'kind' => 'agent',
                'note' => $request->note,
                'Bank_id' => $request->kindPush_id,
                'total_id' => $request->total_id,
                'collect' => $request->balance,
                'name' => $request->agentName,
                'user_id' => auth()->user()->id,

            ]);
            $balanceBank = Bank::where('id', $request->kindPush_id)->value('balance');
            Bank::where('id', $request->kindPush_id)->update([
                'balance' => $balanceBank + $request->balance,
            ]);
            $agentBalance = TotalReservation::where('id', $request->total_id)->value('agentBalance');
//            $hotelBalance = TotalReservation::where('id',$request->total_id)->value('hotelBalance');
            TotalReservation::where('id', $request->total_id)->update([
                'agentBalance' => $agentBalance + $request->balance,
//                'hotelBalance' => $hotelBalance - $request->balance,
            ]);


        }
        if ($request->kindPush == 2) {

            MoneyKeeperMoves::create([
                'date' => $request->date,
                'kind' => 'agent',
                'note' => $request->note,
                'total_id' => $request->total_id,
                'moneyKeeper_id' => $request->kindPush_id,
                'collect' => $request->balance,
                'name' => $request->agentName,
                'user_id' => auth()->user()->id,

            ]);
            $balanceBank = MoneyKeeper::where('id', $request->kindPush_id)->value('balance');
            MoneyKeeper::where('id', $request->kindPush_id)->update([
                'balance' => $balanceBank + $request->balance,
            ]);
            $agentBalance = TotalReservation::where('id', $request->total_id)->value('agentBalance');
//            $hotelBalance = TotalReservation::where('id',$request->total_id)->value('hotelBalance');
            TotalReservation::where('id', $request->total_id)->update([
                'agentBalance' => $agentBalance + $request->balance,
//                'hotelBalance' => $hotelBalance - $request->balance,
            ]);


        }
        if ($request->kindPush == 3) {
            $total = TotalReservation::find($request->total_id);
            VisaMoves::create([
                'date' => $request->date,
                'kind' => 'agent /hotel/guest',
                'note' => $request->note,
                'total_id' => $request->total_id,
                'collect' => $request->balance,
                'agent_id' => $total->travel_agent_id,
                'guest_id' => $total->guest_id,
                'hotel_id' => $total->hotel_id,
                'user_id' => auth()->user()->id,

            ]);
            $agentBalance = TotalReservation::where('id', $request->total_id)->value('agentBalance');
            $hotelBalance = TotalReservation::where('id', $request->total_id)->value('hotelBalance');
            TotalReservation::where('id', $request->total_id)->update([
                'agentBalance' => $agentBalance + $request->balance,
                'hotelBalance' => $hotelBalance - $request->balance,
            ]);


        }
        return redirect()->route('guest_reservation.create')->with(['success' => '🤗 Successfully Storing']);
    }

    public function payAgent($dd)
    {

        $totals = TotalReservation::find($dd);
        return view('admin.pages.ReportReservation.payAgent', compact('totals'));

    }

    public function payAgentShow(Request $request)
    {

        if ($request->kindPush == 1) {

            BankMoves::create([
                'date' => $request->date,
                'kind' => 'agent',
                'note' => $request->note,
                'Bank_id' => $request->kindPush_id,
                'total_id' => $request->total_id,
                'pay' => $request->balance,
                'name' => $request->agentName,
                'user_id' => auth()->user()->id,

            ]);
            $balanceBank = Bank::where('id', $request->kindPush_id)->value('balance');
            Bank::where('id', $request->kindPush_id)->update([
                'balance' => $balanceBank - $request->balance,
            ]);
            $agentBalance = TotalReservation::where('id', $request->total_id)->value('agentBalance');
//            $hotelBalance = TotalReservation::where('id',$request->total_id)->value('hotelBalance');
            TotalReservation::where('id', $request->total_id)->update([
                'agentBalance' => $agentBalance - $request->balance,
//                'hotelBalance' => $hotelBalance + $request->balance,
            ]);


        }
        if ($request->kindPush == 2) {

            MoneyKeeperMoves::create([
                'date' => $request->date,
                'kind' => 'agent',
                'note' => $request->note,
                'total_id' => $request->total_id,
                'moneyKeeper_id' => $request->kindPush_id,
                'pay' => $request->balance,
                'name' => $request->agentName,
                'user_id' => auth()->user()->id,

            ]);
            $balanceBank = MoneyKeeper::where('id', $request->kindPush_id)->value('balance');
            MoneyKeeper::where('id', $request->kindPush_id)->update([
                'balance' => $balanceBank - $request->balance,
            ]);
            $agentBalance = TotalReservation::where('id', $request->total_id)->value('agentBalance');
//            $hotelBalance = TotalReservation::where('id',$request->total_id)->value('hotelBalance');
            TotalReservation::where('id', $request->total_id)->update([
                'agentBalance' => $agentBalance - $request->balance,
//                'hotelBalance' => $hotelBalance + $request->balance,
            ]);

        }
        if ($request->kindPush == 3) {
            $total = TotalReservation::find($request->total_id);
            VisaMoves::create([
                'date' => $request->date,
                'kind' => 'agent /hotel/guest',
                'note' => $request->note,
                'total_id' => $request->total_id,
                'collect' => $request->balance,
                'agent_id' => $total->travel_agent_id,
                'guest_id' => $total->guest_id,
                'hotel_id' => $total->hotel_id,
                'user_id' => auth()->user()->id,

            ]);
            $agentBalance = TotalReservation::where('id', $request->total_id)->value('agentBalance');
            $hotelBalance = TotalReservation::where('id', $request->total_id)->value('hotelBalance');
            TotalReservation::where('id', $request->total_id)->update([
                'agentBalance' => $agentBalance - $request->balance,
                'hotelBalance' => $hotelBalance + $request->balance,
            ]);

        }
        return redirect()->route('guest_reservation.create')->with(['success' => '🤗 Successfully Storing']);
    }
}
