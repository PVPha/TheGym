<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session()->regenerate();
        $user = Session::get('login');
        $trainer = DB::table('users')->join('trainer', 'users.id', '=', 'trainer.id')->where('users.id', '=', $user['id'])->get();
        $class = DB::table('class_registration')->join('class', 'class_registration.class_id', '=', 'class.class_id')->join('users', 'class_registration.member_id', '=', 'users.id')->whereRaw('DATEDIFF(class.end_date, NOW()) > 0 and class.trainer_id = ?', [$user['id']])->get();
        $old_class = DB::table('class_registration')->join('class', 'class_registration.class_id', '=', 'class.class_id')->whereRaw('DATEDIFF(class.end_date, NOW()) < 0 and class.trainer_id = ?', [$user['id']])->groupBy('class.class_id')->get();
        $member_class = DB::table('class')->join('class_registration', 'class.class_id', '=', 'class_registration.class_id')->join('users', 'class_registration.member_id', '=', 'users.id')->where('class.trainer_id', '=', $user['id'])->get();
        $schedule = DB::table('schedule')->join('users', 'schedule.member_id', '=', 'users.id')->where('schedule.trainer_id', '=', $user['id'])->get(['*', 'schedule.id']);
        return view('pages.trainer', ['trainer' => $trainer, 'class' => $class, 'old_class' => $old_class, 'schedule' => $schedule]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member_class = DB::table('class_registration')->join('users', 'class_registration.member_id', '=', 'users.id')->where('class_registration.class_id', '=', $id)->get();
        return $member_class;
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
    }
}