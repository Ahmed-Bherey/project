<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kayan | Arrival List 1</title>
    <link rel="shortcut icon" href="{{ asset('public/admin/dist/img/kayan.png') }}" type="image/x-icon">
    <!--css file-->
    <link rel="stylesheet" href="{{ asset('public/admin/dist/css/bootstrap.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/admin/plugins/fontawesome-free-6.1.1-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/report/arrivalList/css/report.css') }}">
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

                            <div class="mt-3">
                                <div class="d-flex justify-content-start align-items-center mt-3">
                                    <p><span class="ms-2"> form : </span>
                                        <span>{{ $from }}</span>
                                    </p>
                                </div>
                                <div class="d-flex justify-content-start align-items-center mt-3">
                                    <p>
                                    <p><span class="ms-2"> to : </span>
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
                                <td>serial</td>
                                <td>name</td>
                                <td>hotel</td>

                                <td>arrival</td>
                                <td>Night</td>
                                <td>departure</td>
                                <td>rooms</td>
                                <td>room type</td>
                                <td>room Category</td>
                                <td>meals</td>
                                <td>adult</td>
                                <td>child</td>
                                <td>Agent</td>
                                <td>Special Request</td>
                                <td>Note</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($totals as $key => $total)
                                <tr>
                                    <td class="number">{{ $key + 1 }}</td>
                                    <td>{{ $total->guests->name }} </td>
                                    <td>{{ $total->hotels->name }} </td>
                                    <td>{{ $total->from }}</td>
                                    <td>{{ $total->nights_no }}</td>
                                    <td>{{ \Carbon\Carbon::parse($total->to)->addDays(1)->format('Y-m-d') }}</td>
                                    <td class="rooms">{{ $total->rooms }}</td>
                                    <td>{{ $total->roomTypes->type }}</td>
                                    <td>{{ $total->roomCategors->name }}</td>
                                    <td>{{ $total->meals->name }}</td>
                                    <td class="adult">{{ $total->adult * $total->rooms }}</td>
                                    <td>{{ $total->child }}</td>
                                    <td>{{ $total->travelAgents->name }}</td>
                                    <td>{{ $total->specialRequest }}</td>
                                    <td>{{ $total->note }}</td>
                                </tr>
                            @endforeach
                            <tr @if($totals->lastPage() - $totals->currentPage() != 0) hidden="" @endif>
                                <td>total </td>
                                <td >{{$totalss->count()}} </td>
                                <td> </td>
                                <td> </td>
                                <td>{{$totalss->sum('nights_no')}}</td>
                                <td></td>
                                <td >{{$totalss->sum('rooms')}}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td >{{$totalss->sum(function ($row){
                             return   $row->rooms* $row->adult ;})}}</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
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
    {{ $totals->withQueryString()->render('pagination::bootstrap-4') }}

    <!--endpage 1-->
    <!--endpage 1-->
    <script>
        let number = document.querySelectorAll('.number'),
            total = document.querySelector('.total'),
            rooms = document.querySelectorAll('.rooms'),
            roomsTotal = document.querySelector('.rooms-total'),
            adult = document.querySelectorAll('.adult'),
            adultTotal = document.querySelector('.adult-total');

        total.textContent = number[number.length-1].textContent
        for (let i = 0; i <= number.length; i++) {
            roomsTotal.textContent = roomsTotal.textContent * 1 + rooms[i].textContent * 1
            adultTotal.textContent = adultTotal.textContent * 1 + adult[i].textContent * 1
        }
    </script>
</body>


</html>
