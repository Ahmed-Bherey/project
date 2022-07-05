<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('public/admin/dist/img/kayan.png') }}" type="image/x-icon">
    <title>kayan | Voucher</title>
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
                                <th colspan="6">hotel voucher</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $totals->nights_no }}</td>
                                <td class="th">
                                    Nights Number</td>
                                <td> {{ $totals->hotels->name }} </td>
                                <td class="th">Hotel Name</td>
                            </tr>
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($totals->to )->addDays(1)->format('Y-m-d');}}</td>
                                <td class="th">Departure </td>
                                <td>{{ $totals->from }}</td>
                                <td class="th">Arrival</td>
                            </tr>
                            <tr>
                                <td>{{ $totals->guests->nationality }}</td>
                                <td class="th"> Nationality</td>
                                <td>{{ $totals->guests->name }} </td>
                                <td class="th">Guest Name</td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align:center">{{ $totals->travelAgents->name }}</td>
                                <td class="th">Agent </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">{{ $totals->child }}</td>
                                <td class="th">Children </td>
                                <td style=" font-weight: normal;">{{ $totals->adult }} </td>
                                <td class="th">Adults </td>
                            </tr>
                            <tr>
                                <td>{{ $totals->roomCategors->name }}</td>
                                <td class="th">Room Category </td>
                                <td> {{ $totals->roomTypes->type }}</td>
                                <td class="th">Room Type</td>
                            </tr>
                            <tr>
                                <td>{{ $totals->meals->name }}</td>
                                <td class="th">Meal plan </td>
                                <td> {{ $totals->roomNumber }}</td>
                                <td class="th">Room Number</td>
                            </tr>
                            <tr>

                                <td>{{ $totals->specialRequest }}</td>
                                <td class="th">Special Requests</td>
                                <td> {{ $totals->rooms }}</td>
                                <td class="th">Rooms</td>
                            </tr>
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
