<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pack = DB::table('pack')->where('id', '=', $request->pack_id)->first();
        $pack_register = DB::table('pack_registration')->where('member_id', '=', $request->id)->first();
        if ($pack_register) {
            $expiry_date = DB::select('SELECT DATEDIFF(expiry_date, NOW()) AS "expiry_date" FROM pack_registration WHERE member_id = ?', [$request->id]);
            if ($expiry_date[0]->expiry_date) {
                DB::update('update pack_registration set pack_id = ?, start_date = NOW(), expiry_date = DATE_ADD(DATE_ADD(NOW(),INTERVAL DATEDIFF(expiry_date,NOW()) DAY),INTERVAL ? MONTH) where member_id = ?', [$request->pack_id, $pack->time, $request->id]);
            } else {
                DB::update('update pack_registration set pack_id = ?, start_date = NOW(), expiry_date = DATE_ADD(NOW(),INTERVAL ? MONTH) where member_id = ?', [$request->pack_id, $pack->time, $request->id]);
            }
        } else {
            DB::insert("insert into pack_registration (pack_id, member_id, start_date, expiry_date, status) values (?, ?, NOW(), DATE_ADD(NOW(),INTERVAL ? MONTH), false)", [$request->pack_id, $request->id, $pack->time]);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        session()->regenerate();
        $user = Session::get('login');
        $pack = DB::table('pack')->where('id', '=', $id)->first();
        $pack_register = DB::table('pack_registration')->where('member_id', '=', $user['id'])->first();
        if ($pack_register) {
            $expiry_date = DB::select('SELECT DATEDIFF(expiry_date, NOW()) AS "expiry_date" FROM pack_registration WHERE member_id = ?', [$user['id']]);
            if ($expiry_date[0]->expiry_date) {
                DB::update('update pack_registration set pack_id = ?, start_date = NOW(), expiry_date = DATE_ADD(DATE_ADD(NOW(),INTERVAL DATEDIFF(expiry_date,NOW()) DAY),INTERVAL ? MONTH), total_money = total_money + ?, status = false where member_id = ?', [$id, $pack->time, $pack->price, $user['id']]);
            } else {
                DB::update('update pack_registration set pack_id = ?, start_date = NOW(), expiry_date = DATE_ADD(NOW(),INTERVAL ? MONTH), total_money = ?, status = false where member_id = ?', [$id, $pack->time, $pack->price, $user['id']]);
            }
        } else {
            DB::insert("insert into pack_registration (pack_id, member_id, start_date, expiry_date, total_money, status) values (?, ?, NOW(), DATE_ADD(NOW(),INTERVAL ? MONTH),?, false)", [$id, $user['id'], $pack->time, $pack->price]);
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        DB::table('pack_registration')->where('id', '=', $id)->update([
            'status' => true,
            'time_stamp' => date('Y-m-d')
        ]);
        return redirect('pack');
    }

    public function extend($id)
    {
        $data = DB::table('pack_registration')->where('id', '=', $id)->first();
        return $data;
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
        DB::update('update pack_register set pack_id = ?, start_date = NOW(), expiry_date = DATE_ADD(DATE_ADD(NOW(),INTERVAL DATEDIFF(NOW() , expiry_date) DAY),INTERVAL ? MONTH) where member_id = ?', [$request->pack_id, $request->time, $request->member_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('pack_registration')->delete($id);
        return redirect('pack');
    }
}