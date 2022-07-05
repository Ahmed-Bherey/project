<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kayan |Agent chart </title>
    <link rel="shortcut icon" href="{{ asset('public/admin/dist/img/kayan.png') }}" type="image/x-icon">
    <!--css file-->
    <link rel="stylesheet" href="{{ asset('public/admin/dist/css/bootstrap.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/admin/plugins/fontawesome-free-6.1.1-web/css/all.min.css') }}">
    <!--css file-->
    <link rel="stylesheet" href="{{ asset('public/admin/report/travel/css/report.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/report/travel/css/charts.min.css') }}">
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
                                <span class="ms-2"> Agent : </span>
                                <span> {{ $agent->name }} </span>
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
                    <thead>
                    <tr>
                        <th rowspan="2">Agent</th>
                        @foreach ($dates as $date)
                            <td>{{ Str::limit(date('l', strtotime($date)), '2') }}</td>
                        @endforeach
                        <th>total</th>
                    </tr>
                    <tr>
                        @foreach ($dates as $date)
                            <td>{{ date('d', strtotime($date)) }} </td>
                        @endforeach
                        <td>--</td>

                    @foreach ($totalReservations as $totalReservation)
                        <tr>


                    </thead>
                    <tbody>


                    <td>
                        {{ $totalReservation->travelAgents->name }}
                    </td>

                    @foreach ($dates as $date)
                        <td>

                            {{ \App\Models\GuestReservation::where('cancel', null)->where('hotel_id', $hotel->id)->where('date', date('Y-m-d', strtotime($date)))->where('travel_agent_id', $totalReservation->travel_agent_id)->sum('rooms') }}

                        </td>
                    @endforeach

                    <td> {{ \App\Models\GuestReservation::where('cancel', null)->where('hotel_id', $hotel->id)->where('date', '>=', $from)->where('date', '<=', $to)->where('travel_agent_id', $totalReservation->travel_agent_id)->sum('rooms') }}
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Total sold</th>
                        @foreach ($dates as $date)
                            <td>{{ \App\Models\GuestReservation::where('cancel', null)->where('hotel_id', $hotel->id)->where('date', date('Y-m-d', strtotime($date)))->sum('rooms') }}
                            </td>
                        @endforeach
                        <td>{{ $countRoomCategorys }}</td>
                    </tr>

                    <tr>

                        <th>allocation</th>
                        @foreach ($dates as $date)
                            <td>
                                {{ \App\Models\Hotel::where('id', $hotel->id)->value('room_no') }}
                            </td>
                        @endforeach
                        <td>{{ \App\Models\Hotel::where('id', $hotel->id)->sum('room_no') * ($days + 1) }}
                        </td>

                    </tr>

                    <tr>

                        <th>Available</th>
                        @foreach ($dates as $date)
                            <td>{{ \App\Models\Hotel::where('id', $hotel->id)->sum('room_no') -\App\Models\GuestReservation::where('hotel_id', $hotel->id)->where('date', date('Y-m-d', strtotime($date)))->sum('rooms') }}
                            </td>
                        @endforeach
                        <td>{{ \App\Models\Hotel::where('id', $hotel->id)->sum('room_no') * ($days + 1) - $countRoomCategorys }}
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
            <!--end contain-->
        </div>
    </div>
</div>

<!--endpage 1-->

</body>

</html>
