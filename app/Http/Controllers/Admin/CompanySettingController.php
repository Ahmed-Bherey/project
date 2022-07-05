<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CompanySetting;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSettingRequest;

class CompanySettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $compSetts= CompanySetting::first();

        return view('admin.pages.CompanySetting.create' , compact('compSetts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $store_arr = [];
        foreach ($request->all() as $key => $value) {
            if ($key == '_token') continue;//skip token
            $store_arr[$key] = $value;
        }



            CompanySetting::updateOrCreate([],[
                'name' => $request->name,
                'ar_name' =>$request->ar_name,
                'tel' => $request->tel,
                'tel1' => $request->tel1,
                'tel2' => $request->tel2,
                'tel3' => $request->tel3,
                'tel4' => $request->tel4,
                'address' => $request->address,
                'vat_num' =>$request->vat_no,
                'cr' =>$request->cr,
                'logo'=>$request->logo->store('public/Setting/logo'),
                'email' =>$request->email,
                'fax' =>$request->fax,
            ]);


        return redirect()->back()->with(['success' => '🤗 Successfully Storing']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $compantsets = CompanySetting::FindOrFail($id);
        // return view('admin.pages.CompanySetting.edit' , compact('compantsets'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // $companyLogo = $request->file('com-logo');
        // $CompanyPostLogo = time()."_".$companyLogo->getClientOriginalName();
        // $companyLogo->move('img' , $CompanyPostLogo);
        // $compantsets = CompanySetting::FindOrFail($id);

        // $compantsets->update([
        //     'name' => $request->name,
        //     'ar_name' =>$request->ar_name,
        //     'tel' => $request->tel,
        //     'adderss' => $request->address,
        //     // 'logo' => $request->CompanyPostLogo,
        //     'vat_num' =>$request->vat_no,
        //     'cr' =>$request->cr,
        //     'email' =>$request->email,
        //     'fax' =>$request->fax,
        // ]);
        // return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // $compantsets = CompanySetting::findOrFail($id);
        // $compantsets->delete();
        // return redirect()->back();
    }
}
