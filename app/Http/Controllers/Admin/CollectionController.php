<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\BankMoves;
use App\Models\Hotel;
use App\Models\MoneyKeeper;
use App\Models\MoneyKeeperMoves;
use App\Models\NewAgent;
use App\Models\NewGuest;
use App\Models\TotalReservation;
use App\Models\VisaMoves;
use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function ajaxKindPush($id)
    {


        if ($id == 1) {
            $data = Bank::get();
        }
        if ($id == 2) {
            $data = MoneyKeeper::get();

        }
        if ($id == 3) {
            $data = 'visa';

        }

        return json_encode($data);

    }

    public function agentCollect()
    {

        $agents = NewAgent::get();
        return view('admin.accounting.collection.agent.collect', compact('agents'));
    }

    public function agentCollectStore(Request $request)
    {
        if (NewAgent::where('name', $request->agentName)->value('id') == "") {
            return redirect()->back()->with(['errors' => '🤗  this Agent not exist']);


        }
        if ($request->kindPush == 1) {

            BankMoves::create([
                'date' => $request->date,
                'total_id' => $request->total_id,
                'kind' => 'agent',
                'note' => $request->note,
                'Bank_id' => $request->kindPush_id,
                'pay' => $request->balance,
                'name' => $request->agentName,
                'user_id'=>auth()->user()->id,
            ]);
            $balanceBank = Bank::where('id', $request->kindPush_id)->value('balance');
            Bank::where('id', $request->kindPush_id)->update([
                'balance' => $balanceBank - $request->balance,
            ]);
            $agentBalance = TotalReservation::where('id', $request->total_id)->value('agentBalance');
//            $hotelBalance = TotalReservation::where('id',$request->total_id)->value('hotelBalance');
            TotalReservation::where('id', $request->total_id)->update([
                'agentBalance' => $agentBalance + $request->balance,
//                'hotelBalance' => $hotelBalance + $request->balance,
            ]);

        }
        if ($request->kindPush == 2) {

            MoneyKeeper::create([
                'date' => $request->date,
                'kind' => 'agent',
                'note' => $request->note,
                'moneyKeeper_id' => $request->kindPush_id,
                'pay' => $request->balance,
                'name' => $request->agentName,
                'total_id' => $request->total_id,

            ]);
            $balanceBank = MoneyKeeper::where('id', $request->kindPush_id)->value('balance');
            MoneyKeeper::where('id', $request->kindPush_id)->update([
                'balance' => $balanceBank - $request->balance,
            ]);
            $agentBalance = TotalReservation::where('id', $request->total_id)->value('agentBalance');
//            $hotelBalance = TotalReservation::where('id',$request->total_id)->value('hotelBalance');
            TotalReservation::where('id', $request->total_id)->update([
                'agentBalance' => $agentBalance + $request->balance,
//                'hotelBalance' => $hotelBalance + $request->balance,
            ]);

        }


        return redirect()->back()->with(['success' => '🤗 Successfully Storing']);
    }

    public function agentPay()
    {

        $agents = NewAgent::get();
        return view('admin.accounting.collection.agent.pay', compact('agents'));
    }

    public function agentPayStore(Request $request)
    {
        if (NewAgent::where('name', $request->agentName)->value('id') == "") {
            return redirect()->back()->with(['errors' => '🤗  this Agent not exist']);


        }
        if ($request->kindPush == 1) {

            BankMoves::create([
                'date' => $request->date,
                'kind' => 'agent',
                'note' => $request->note,
                'Bank_id' => $request->kindPush_id,
                'pay' => $request->balance,
                'name' => $request->agentName,
                'total_id' => $request->total_id,
                'user_id'=>auth()->user()->id,

            ]);
            $balanceBank = Bank::where('id', $request->kindPush_id)->value('balance');
            Bank::where('id', $request->kindPush_id)->update([
                'balance' => $balanceBank - $request->balance,
            ]);
            $agentBank = NewAgent::where('name', $request->agentName)->value('balance');
            NewAgent::where('name', $request->agentName)->update([
                'balance' => $agentBank + $request->balance,
            ]);

        }
        if ($request->kindPush == 2) {

            MoneyKeeper::create([
                'date' => $request->date,
                'kind' => 'agent',
                'note' => $request->note,
                'moneyKeeper_id' => $request->kindPush_id,
                'pay' => $request->balance,
                'name' => $request->agentName,
                'total_id' => $request->total_id,

            ]);
            $balanceBank = MoneyKeeper::where('id', $request->kindPush_id)->value('balance');
            MoneyKeeper::where('id', $request->kindPush_id)->update([
                'balance' => $balanceBank - $request->balance,
            ]);
            $agentBank = NewAgent::where('name', $request->agentName)->value('balance');
            NewAgent::where('name', $request->agentName)->update([
                'balance' => $agentBank + $request->balance,
            ]);

        }
        return redirect()->back()->with(['success' => '🤗 Successfully Storing']);
    }

    public function guestCollect()
    {

        $guests = NewGuest::get();
        return view('admin.accounting.collection.guest.collect', compact('guests'));
    }

    public function guestCollectStore(Request $request)
    {
        if (NewGuest::where('name', $request->guestName)->value('id') == "") {
            return redirect()->back()->with(['errors' => '🤗  this Guest not exist']);
        }
        if ($request->kindPush == 1) {

            BankMoves::create([
                'date' => $request->date,
                'kind' => 'guest',
                'note' => $request->note,
                'Bank_id' => $request->kindPush_id,
                'pay' => $request->balance,
                'name' => $request->guestName,
                'total_id' => $request->total_id,
                'user_id'=>auth()->user()->id,


            ]);
            $balanceBank = Bank::where('id', $request->kindPush_id)->value('balance');
            Bank::where('id', $request->kindPush_id)->update([
                'balance' => $balanceBank - $request->balance,
            ]);
            $agentBank = NewGuest::where('name', $request->guestName)->value('balance');
            NewGuest::where('name', $request->guestName)->update([
                'balance' => $agentBank + $request->balance,
            ]);

        }
        if ($request->kindPush == 2) {

            MoneyKeeperMoves::create([
                'date' => $request->date,
                'kind' => 'guest',
                'note' => $request->note,
                'moneyKeeper_id' => $request->kindPush_id,
                'pay' => $request->balance,
                'name' => $request->guestName,
                'total_id' => $request->total_id,
                'user_id'=>auth()->user()->id,

            ]);
            $balanceBank = MoneyKeeper::where('id', $request->kindPush_id)->value('balance');
            MoneyKeeper::where('id', $request->kindPush_id)->update([
                'balance' => $balanceBank - $request->balance,
            ]);
            $guestBank = NewGuest::where('name', $request->guestName)->value('balance');
            NewAgent::where('name', $request->guestName)->update([
                'balance' => $guestBank + $request->balance,
            ]);

        }

        return redirect()->back()->with(['success' => '🤗 Successfully Storing']);
    }

    public function guestPay()
    {

        $guests = NewGuest::get();
        return view('admin.accounting.collection.guest.pay', compact('guests'));
    }

    public function guestPayStore(Request $request)
    {
        if (NewGuest::where('name', $request->guestName)->value('id') == "") {
            return redirect()->back()->with(['errors' => '🤗  this Guest not exist']);
        }
        if ($request->kindPush == 1) {

            BankMoves::create([
                'date' => $request->date,
                'kind' => 'guest',
                'note' => $request->note,
                'Bank_id' => $request->kindPush_id,
                'pay' => $request->balance,
                'name' => $request->guestName,
                'total_id' => $request->total_id,
                'user_id'=>auth()->user()->id,

            ]);
            $balanceBank = Bank::where('id', $request->kindPush_id)->value('balance');
            Bank::where('id', $request->kindPush_id)->update([
                'balance' => $balanceBank - $request->balance,
            ]);
            $guestBank = NewGuest::where('name', $request->guestName)->value('balance');
            NewGuest::where('name', $request->guestName)->update([
                'balance' => $guestBank + $request->balance,
            ]);

        }
        if ($request->kindPush == 2) {

            MoneyKeeperMoves::create([
                'date' => $request->date,
                'kind' => 'guest',
                'note' => $request->note,
                'moneyKeeper_id' => $request->kindPush_id,
                'pay' => $request->balance,
                'total_id' => $request->total_id,
                'user_id'=>auth()->user()->id,
                'name' => $request->guestName,

            ]);
            $balanceBank = MoneyKeeper::where('id', $request->kindPush_id)->value('balance');
            MoneyKeeper::where('id', $request->kindPush_id)->update([
                'balance' => $balanceBank - $request->balance,
            ]);
            $guestBank = NewGuest::where('name', $request->guestName)->value('balance');
            NewGuest::where('name', $request->guestName)->update([
                'balance' => $guestBank + $request->balance,
            ]);

        }
        return redirect()->back()->with(['success' => '🤗 Successfully Storing']);
    }

    public function hotelCollect()
    {

        $hotels = Hotel::get();
        return view('admin.accounting.collection.hotel.collect', compact('hotels'));
    }

    public function hotelCollectStore(Request $request)
    {
        if (Hotel::where('name', $request->hotelName)->value('id') == "") {
            return redirect()->back()->with(['errors' => '🤗  this Hotel not exist']);
        }
        if ($request->kindPush == 1) {

            BankMoves::create([
                'date' => $request->date,
                'kind' => 'hotel',
                'note' => $request->note,
                'Bank_id' => $request->kindPush_id,
                'pay' => $request->balance,
                'name' => $request->hotelName,
                'total_id' => $request->total_id,
                'user_id'=>auth()->user()->id,

            ]);
            $balanceBank = Bank::where('id', $request->kindPush_id)->value('balance');
            Bank::where('id', $request->kindPush_id)->update([
                'balance' => $balanceBank - $request->balance,
            ]);
            $hotelBank = Hotel::where('name', $request->hotelName)->value('balance');
            Hotel::where('name', $request->hotelName)->update([
                'balance' => $hotelBank - $request->balance,
            ]);

        }
        if ($request->kindPush == 2) {

            MoneyKeeperMoves::create([
                'date' => $request->date,
                'kind' => 'hotel',
                'note' => $request->note,
                'moneyKeeper_id' => $request->kindPush_id,
                'pay' => $request->balance,
                'total_id' => $request->total_id,
                'user_id'=>auth()->user()->id,
                'name' => $request->hotelName,


            ]);
            $balanceBank = MoneyKeeper::where('id', $request->kindPush_id)->value('balance');
            MoneyKeeper::where('id', $request->kindPush_id)->update([
                'balance' => $balanceBank - $request->balance,
            ]);
            $hotelBank = Hotel::where('name', $request->hotelName)->value('balance');
            Hotel::where('name', $request->hotelName)->update([
                'balance' => $hotelBank - $request->balance,
            ]);

        }

        return redirect()->back()->with(['success' => '🤗 Successfully Storing']);
    }

    public function hotelPay()
    {

        $hotels = Hotel::get();
        return view('admin.accounting.collection.hotel.pay', compact('hotels'));
    }

    public function hotelReservationAjax($id)
    {
        $hotel_id = Hotel::where('name', $id)->value('id');
        $data = TotalReservation::where('hotelBalance','>',0)->where('hotel_id', $hotel_id)->get();
    return json_encode($data);
    }

    public function hotelPayStore(Request $request)
    {
        if (Hotel::where('name', $request->hotelName)->value('id') == "") {
            return redirect()->back()->with(['errors' => '🤗  this Hotel not exist']);
        }

        if ($request->kindPush == 1) {


            $balanceBank = Bank::where('id', $request->kindPush_id)->value('balance');
            Bank::where('id', $request->kindPush_id)->update([
                'balance' => $balanceBank - $request->balance,
            ]);
//            $agentBalance = TotalReservation::where('id',$request->total_id)->value('agentBalance');
//            foreach ($request->total_id as $key => $total){
                BankMoves::create([
                    'date' => $request->date,
                    'kind' => 'hotel',
                    'note' => $request->note,
                    'Bank_id' => $request->kindPush_id,
                    'pay' => $request->balance,
                    'name' =>$request->hotelName,
                    'total_id' => $request->total_id,
                    'user_id'=>auth()->user()->id,

                ]);
             $totalBalance = TotalReservation::where('id', $request->total_id)->value('totalHotel');
            $hotelBalance = TotalReservation::where('id', $request->total_id)->value('hotelBalance');



            if ($request->balance <= 0) {
                return redirect()->back()->with(['success' => '🤗 Successfully Storing']);

            }
            TotalReservation::where('id', $request->total_id)->update([

                'hotelBalance' =>$hotelBalance - $request->balance,
            ]);
            }


        if ($request->kindPush == 2) {
            $balanceMoneyKeeper = MoneyKeeper::where('id', $request->kindPush_id)->value('balance');
            MoneyKeeper::where('id', $request->kindPush_id)->update([
                'balance' => $balanceMoneyKeeper - $request->balance,
            ]);

            MoneyKeeperMoves::create([
                'date' => $request->date,
                'kind' => 'hotel',
                'note' => $request->note,
                'moneyKeeper_id' => $request->kindPush_id,
                'pay' => $request->balance,
                'total_id' => $request->total_id,
                'user_id'=>auth()->user()->id,
                'name' =>$request->hotelName,

            ]);
                $totalBalance = TotalReservation::where('id', $request->total_id)->value('totalHotel');
                $hotelBalance = TotalReservation::where('id', $request->total_id)->value('hotelBalance');



                if ($request->balance <= 0) {
                    return redirect()->back()->with(['success' => '🤗 Successfully Storing']);

                }
                TotalReservation::where('id', $request->total_id)->update([

                    'hotelBalance' =>$hotelBalance - $request->balance,
                ]);
            }
        return redirect()->back()->with(['success' => '🤗 Successfully Storing']);
    }

    public function bankStep()
    {

        $moves = BankMoves::get();
        return view('admin.accounting.bank.moves', compact('moves'));
    }

    public function moneyKeeperStep()
    {

        $moves = MoneyKeeperMoves::get();
        return view('admin.accounting.moneyKeeper.moves', compact('moves'));
    }

    public function visaStep()
    {

        $moves = VisaMoves::get();
        return view('admin.accounting.visaMoves', compact('moves'));
    }
}
