<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('public/admin/dist/img/kayan.png') }}" type="image/x-icon">
    <title>kayan | Hotel Reservation</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('public/admin/dist/css/bootstrap.css') }}">
    <!--css file-->
    <link rel="stylesheet" href="{{ asset('public/admin/dist/css/report.css') }}">
    <title>Voucher</title>
</head>

<body>
<div class="book">
    <!--start page1-->
    <div class="page active">
        <div class="subpage">
            <!--start header-->
            <div class="header-div">
                <div class="left">
                    {{-- <h4> 20 / 10 /2020</h4> --}}
                </div>
                <div class="center">
                    <h4> KAYAN INTERNATIONAL TOURS </h4>
                </div>
                <div class="right" style="direction: ltr;">
                    <h5 class="ps-2 pt-3">Date : {{ date('d/m/Y') }}</h5>
                </div>
            </div>

            <!--end header-->
            <!--start contain-->
            <div class="contain">
                <table class=" data ">
                    <thead>
                    <tr>
                        <th colspan="6">{{ $hotel->name}}</th>
                    </tr>
                    </thead>
                    <tbody>

                        <tr>
                        <td>{{$totalss->count()}}</td>
                        <td class="th">
                           Count</td>
                        <td>{{$totalss->sum('nights_no')}} </td>
                        <td class="th">Nights No</td>
                    </tr>
                    <tr>
                        <td>{{$totalss->sum('rooms')}}</td>
                        <td class="th">Rooms </td>
                        <td>{{$totalss->sum(function ($row){
                             return   $row->rooms * $row->adult ;})}}</td>
                        <td class="th">Adult</td>
                    </tr>
                    <tr>
                        <td>{{$totalss->sum('totalHotel')}}</td>
                        <td class="th"> total </td>
                        <td>{{  $totalss->sum('hotelBlance') }} </td>
                        <td class="th">pay</td>
                    </tr>
                        <tr>
                        <td>{{$totalss->sum('totalHotel') - $totalss->sum('hotelBlance')}}</td>
                        <td class="th"> Remaining balance </td>
                        <td> </td>
                        <td class="th"></td>
                    </tr>
                    {{--<tr>--}}
                        {{--<td colspan="3" style="text-align:center">{{ $totalss->travelAgents->name }}</td>--}}
                        {{--<td class="th">Agent </td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td style="text-align: center;">{{ $totalss->child }}</td>--}}
                        {{--<td class="th">Children </td>--}}
                        {{--<td style=" font-weight: normal;">{{ $totalss->adult }} </td>--}}
                        {{--<td class="th">Adults </td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>{{ $totalss->roomCategors->name }}</td>--}}
                        {{--<td class="th">Room Category </td>--}}
                        {{--<td> {{ $totalss->roomTypes->type }}</td>--}}
                        {{--<td class="th">Room Type</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>{{ $totalss->meals->name }}</td>--}}
                        {{--<td class="th">Meal plan </td>--}}
                        {{--<td> {{ $totalss->roomNumber }}</td>--}}
                        {{--<td class="th">Room Number</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}

                        {{--<td>{{ $totalss->specialRequest }}</td>--}}
                        {{--<td class="th">Special Requests</td>--}}
                        {{--<td> {{ $totalss->rooms }}</td>--}}
                        {{--<td class="th">Rooms</td>--}}
                    {{--</tr>--}}
                    </tbody>
                </table>

            </div>
            <!--end contain-->
            <div class="footer">
                <div class="footer-number">
                    <div class="nubmer-icon">
                        <img src="{{ asset('public/admin/dist/img/phone.png') }}">
                    </div>
                    <ul>
                        <li>+201276656741</li>
                        <li>+201276656742</li>
                        <li>+201276656743</li>
                        <li>+201276656744</li>
                    </ul>
                </div>
                <div class="footer-location">
                    <img src="{{ asset('public/admin/dist/img/pin.png') }}" alt="">
                    <p>flat 12,1st floor (Al Lewaa building)
                        <br> 2nd of sherif ST, Abdeen, cairo-Egypt.
                    </p>
                </div>
                <div class="footer-number">
                    <div class="nubmer-icon">
                        <img src="{{ asset('public/admin/dist/img/email.png') }}">
                    </div>
                    <p>reservation@kayan-tours.com</p>
                </div>
            </div>
        </div>
    </div>
    <!--endpage 1-->
</div>
</body>

</html>
