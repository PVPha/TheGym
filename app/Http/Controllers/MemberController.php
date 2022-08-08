<?php

namespace App\Http\Controllers;

use App\Mail\ExpiryPack;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class MemberController extends Controller
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
        $this->checkDatePack($user['id']);
        $pack = DB::table('pack_registration')->join('pack', 'pack_registration.pack_id', '=', 'pack.id')->where('pack_registration.member_id', '=', $user['id'])->get();
        $packList = DB::table('pack')->get();
        $schedule = DB::table('schedule')->join('users', 'schedule.trainer_id', '=', 'users.id')->whereRaw('member_id = ?', [$user['id']])->get(['*', 'schedule.id']);
        $member = DB::table('users')->where('id', '=', $user['id'])->get();
        $class = DB::table('class_registration')->join('class', 'class_registration.class_id', '=', 'class.class_id')->join('trainer', 'class.trainer_id', '=', 'trainer.id')->join('users', 'trainer.id', '=', 'users.id')->where('class_registration.member_id', '=', $user['id'])->get(['*', 'class.end_date', 'class.start_date']);
        $trainer = DB::select("SELECT * FROM trainer JOIN users ON trainer.id = users.id WHERE trainer.type = 'Gym' AND trainer.id NOT IN (SELECT trainer_id FROM schedule GROUP BY trainer_id HAVING COUNT(trainer_id) = 2)");
        $dow = DB::select('SELECT CASE WHEN SUM(schedule.dow) >= 35 THEN trainer_id END as dow FROM schedule GROUP BY schedule.trainer_id');
        if ($dow) {
            if ($dow[0]->dow) {
                $trainer = DB::select('SELECT * FROM users JOIN trainer ON users.id = trainer.id WHERE users.id NOT IN ( SELECT CASE WHEN SUM(schedule.dow) >= 35 THEN trainer_id END FROM schedule GROUP BY schedule.trainer_id)');
            }
        }
        $order = DB::table('order')->where('member_id', '=', $user['id'])->get();
        // dd(json_decode($order[0]->products));
        return view('pages.member', ['member' => $member, 'class' => $class, 'pack' => $pack, 'schedule' => $schedule, 'packList' => $packList, 'trainer' => $trainer, 'order' => $order]);
    }

    public function checkDatePack($id)
    {
        $data = DB::select("SELECT users.email FROM pack_registration JOIN users ON pack_registration.member_id = users.id WHERE pack_registration.member_id = ? AND DATEDIFF(pack_registration.expiry_date, NOW()) = 10", [$id]);
        if ($data) {
            Mail::to($data[0]->email)->send(new ExpiryPack());
        }
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
        $class = DB::table('class_registration')->join('class', 'class_registration.class_id', '=', 'class.class_id')->join('trainer', 'class.trainer_id', '=', 'trainer.id')->join('users', 'trainer.id', '=', 'users.id')->where('class_registration.class_id', '=', $id)->groupBy('class.class_id')->get(['*', 'class.end_date', 'class.start_date']);
        // dd($class);
        //$member = DB::table('users')->where('id', '=', $id)->get();
        return $class;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('trainer')->leftJoin('schedule', 'trainer.id', '=', 'schedule.trainer_id')->where('schedule.id', '=', $id)->get(['*', 'schedule.id']);
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