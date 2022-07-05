<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <title>kayan | Agent chart </title>
    <link rel="shortcut icon" href="{{ asset('public/admin/dist/img/kayan.png') }}" type="image/x-icon">
    <!--css file-->
    <link rel="stylesheet" href="{{ asset('public/admin/dist/css/bootstrap.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/admin/plugins/fontawesome-free-6.1.1-web/css/all.min.css') }}">
    <!--css file-->
    <link rel="stylesheet" href="{{ asset('public/admin/report/travel/css/report.css') }}">
    <title>report</title>

</head>

<body>
    <div class="book">

        <!--start page1-->
        <div class="page">
            <div class="subpage">
                <!--start header-->
                <div class="header">
                    <div class="row justify-content-between ">
                        <div class="w-50">
                            <div class="img">
                                <img src="{{ asset('public/admin/dist/img/kayan2.png') }}" class="w-25"
                                    title="kayan" alt="kayan">
                            </div>
                        </div>
                        <div class="w-25 info">
                            <div class="d-flex justify-content-start align-items-center">
                                <p class=" ">
                                    KAYAN INTERNATIONAL TOURS
                                </p>
                            </div>
                            <div class="mt-3">

                                <div class="d-flex justify-content-start align-items-center mt-3">
                                    <p> <span class="ms-2"> form : </span>
                                        <span>{{ $from }}</span>
                                    </p>
                                </div>
                                <div class="d-flex justify-content-start align-items-center mt-3">
                                    <p>
                                    <p> <span class="ms-2"> to : </span>
                                        <span>{{ $to }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end header-->
                <!--start contain-->
                <div class="contain">
                    <p class="Attend">Hotel: <span>{{ $hotel->name }}</span></p>
                    <table class=" info ">
                        <tbody>
                            <tr>
                                <td rowspan="2">Agent</td>
                                @foreach ($dates as $date)
                                    <td>{{ Str::limit(date('l', strtotime($date)), '2') }}</td>
                                @endforeach
                                <td>total</td>
                            </tr>

                            <tr>
                                @foreach ($dates as $date)
                                    <td>{{ date('d', strtotime($date)) }} </td>
                                @endforeach
                                <td>--</td>

                                @foreach ( \App\Models\TotalReservation::orderBy('hotel_id', 'ASC')->orderBy('from', 'ASC')->where('cancel', Null)->where('hotel_id', $hotel->id)
                    ->where('from', '>=', $from)
                    ->where('to', '<=', $to)
                    ->groupBy('travel_agent_id')->get() as $totalReservation)
                            <tr>
                                <td>
                                    {{ $totalReservation->travelAgents->name }}
                                </td>

                                @foreach ($dates as $date)
                                    <td>

                                        {{ \App\Models\GuestReservation::where('cancel',Null)->where('hotel_id', $hotel->id)->where('date', date('Y-m-d', strtotime($date)))->where('travel_agent_id', $totalReservation->travel_agent_id)->sum('rooms') }}

                                    </td>
                                @endforeach

                                <td> {{ \App\Models\GuestReservation::where('cancel',Null)->where('hotel_id', $hotel->id)->where('date', '>=', $from)->where('date', '<=', $to)->where('travel_agent_id', $totalReservation->travel_agent_id)->sum('rooms') }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Total sold</td>
                                @foreach ($dates as $date)
                                    <td>{{ \App\Models\GuestReservation::where('cancel',Null)->where('hotel_id', $hotel->id)->where('date', date('Y-m-d', strtotime($date)))->sum('rooms') }}
                                    </td>
                                @endforeach
                                <td>{{ $countRoomCategorys }}</td>
                            </tr>

                            <tr>

                                <td>allocation</td>
                                @foreach ($dates as $date)
                                    <td>
                                        {{ \App\Models\Hotel::where('id', $hotel->id)->value('room_no') }}
                                    </td>
                                @endforeach
                                <td>{{ \App\Models\Hotel::where('id', $hotel->id)->sum('room_no') * ($days + 1) }}
                                </td>

                            </tr>

                            <tr>

                                <td>Available</td>
                                @foreach ($dates as $date)
                                    <td>{{ \App\Models\Hotel::where('id', $hotel->id)->sum('room_no') - \App\Models\GuestReservation::where('hotel_id',$hotel->id)->where('date', date('Y-m-d', strtotime($date)))->sum('rooms') }}
                                    </td>
                                @endforeach
                                <td>{{ \App\Models\Hotel::where('id', $hotel->id)->sum('room_no') * ($days+1 ) - $countRoomCategorys }}
                                </td>

                            </tr>

                        </tfoot>
                    </table>
                </div>
                <div class="footer">
                    <div class="row">
                        <div class="w-50">
                            <p class="mt-2"><i class="fa fa-envelope  me-2"></i>reservation@kayan-tours.com
                            </p>


                        </div>
                        <div class="w-50 location">
                            <p class="mt-2"><i class="fa fa-map-marker-alt me-2"></i>flat 12,1st
                                floor (Al Lewaa building) 2nd
                                of sherif ST, Abdeen, cairo-Egypt.</p>

                        </div>
                    </div>
                </div>
                {{-- <div class="footer">
                    <div class="footer-number">
                        <div class="nubmer-icon">
                            <img src="{{ asset('public/admin/report/arrivalList2/css/images/phone.png') }}">
                        </div>
                        <ul>
                            <li><i class="fa-brands fa-whatsapp" style="font-size: 22px;margin-right: 9px;"></i>
                                +201276656741</li>
                            <li>+201276656742</li>
                            <li>+201276656743</li>
                            <li>+201276656744</li>
                        </ul>
                    </div>
                    <div class="footer-location">
                        <img src="{{ asset('public/admin/report/arrivalList2/css/images/pin.png') }}" alt="">
                        <p>flat 12,1st floor (Al Lewaa building)
                            <br> 2nd of sherif ST, Abdeen, cairo-Egypt.
                        </p>
                    </div>
                    <div class="footer-number">
                        <div class="nubmer-icon">
                            <img src="{{ asset('public/admin/report/arrivalList2/css/images/email.png') }}">
                        </div>
                        <p>reservation@kayan-tours.com</p>
                    </div>
                </div> --}}
                <!--end contain-->
            </div>
        </div>

    </div>
