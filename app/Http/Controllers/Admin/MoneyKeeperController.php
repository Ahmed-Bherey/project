<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MoneyKeeper;
use Illuminate\Http\Request;

class MoneyKeeperController extends Controller
{
    public function index()
    {

        $moneyKeepers = MoneyKeeper ::get();

        return view('admin.accounting.moneyKeeper.create', compact('moneyKeepers'));

    }

    public function edit(MoneyKeeper $moneyKeeper)
    {
        $moneyKeepers = MoneyKeeper ::get();


        return view('admin.accounting.moneyKeeper.edit', compact('moneyKeeper','moneyKeepers'));
    }

    public function create()
    {
        return view('admin.accounting.moneyKeeper.create');
    }

    public function store(Request $request)
    {

        $store_arr = [];
        foreach ($request->all() as $key => $value) {
            if ($key == '_token') continue;//skip token
            $store_arr[$key] = $value;
        }


        MoneyKeeper ::create($store_arr);
        return redirect()->route('moneyKeepers.all.index')->with(['success' => " تم  بنجاح"]);
    }

    public function update(Request $request, MoneyKeeper $moneyKeeper)
    {

        $update_arr = [];
        foreach ($request->all() as $key => $value) {
            /**
             * 'title' => 'My Title'
             * $key => $value
             */
            if ($key == '_token') continue;//skip token
            $update_arr[$key] = $value;
        }


        $moneyKeeper->update($update_arr);
        return redirect()->route('moneyKeepers.all.index')->with(['success' => " تم  بنجاح"]);
    }

    public function delete(MoneyKeeper $moneyKeeper)
    {

        $moneyKeeper->delete();
        return redirect()->route('moneyKeepers.all.index')->with(['error' => " تم  بنجاح"]);
    }


}






