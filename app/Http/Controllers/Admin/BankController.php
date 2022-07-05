<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{

    public function index()
    {

        $banks = Bank ::get();

        return view('admin.accounting.bank.create', compact('banks'));

    }

    public function edit(Bank $bank)
    {

        $banks = Bank ::get();


        return view('admin.accounting.bank.edit', compact('bank','banks'));
    }

    public function create()
    {
        return view('admin.accounting.bank.add');
    }

    public function store(Request $request)
    {

        $store_arr = [];
        foreach ($request->all() as $key => $value) {
            if ($key == '_token') continue;//skip token
            $store_arr[$key] = $value;
        }


        Bank ::create($store_arr);
        return redirect()->route('banks.all.index')->with(['success' => " تم  بنجاح"]);
    }

    public function update(Request $request, Bank $bank)
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


        $bank->update($update_arr);
        return redirect()->route('banks.all.index')->with(['success' => " تم  بنجاح"]);
    }

    public function delete(Bank $bank)
    {

        $bank->delete();
        return redirect()->route('banks.all.index')->with(['error' => " تم  بنجاح"]);
    }


}





