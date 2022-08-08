<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
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
        session()->regenerate();
        $user = Session::get('login');
        DB::table('schedule')->insert([
            'trainer_id' => $request->id,
            'member_id' => $user['id'],
            'date_of_week' => $request->date_of_week,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => false
        ]);
        return redirect('member');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$data = DB::table('trainer')->leftJoin('schedule', 'trainer.id', '=', 'schedule.trainer_id')->where('trainer.id', '=', $id)->get(['*', 'trainer.id']);
        $data = DB::select("SELECT trainer.id, CONCAT(CASE WHEN schedule.date_of_week = 'T2/T4/T6' THEN 'T2/T4/T6' ELSE '' END,',',CASE WHEN schedule.date_of_week = 'T3/T5/T7' THEN 'T3/T5/T7' ELSE '' END) AS 'date_of_week' FROM schedule RIGHT JOIN trainer ON schedule.trainer_id = trainer.id WHERE trainer.id = ? GROUP BY schedule.date_of_week", [$id]);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        DB::table('schedule')->where('id', '=', $id)->update([
            'status' => true,
            'time_stamp' => date('Y-m-d')
        ]);
        return redirect('trainer');
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
        DB::table('schedule')->where('id', '=', $request->id)->update([
            'date_of_week' => $request->date_of_week,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'dow' => $request->dow,
            'status' => false
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('schedule')->delete($id);
        return redirect()->back();
    }
}