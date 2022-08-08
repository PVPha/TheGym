<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('class')->join('trainer', 'class.trainer_id', '=', 'trainer.id')->join('users', 'trainer.id', '=', 'users.id')->get(['*', 'class.end_date', 'class.end_date', 'class.price']);
        $trainer = DB::table('trainer')->join('users', 'trainer.id', '=', 'users.id')->where('type', '=', 'Yoga')->get();
        return view('pages.admin.class', ['data' => $data, 'trainer' => $trainer]);
    }

    public function search(Request $request)
    {
        $data = DB::table('class')->join('trainer', 'class.trainer_id', '=', 'trainer.id')->join('users', 'trainer.id', '=', 'users.id')->where('class_name', 'LIKE', '%' . $request->input('query') . '%')->get(['*', 'class.end_date', 'class.end_date', 'class.price']);
        $trainer = DB::table('trainer')->join('users', 'trainer.id', '=', 'users.id')->get();
        return view('pages.admin.class', ['data' => $data, 'trainer' => $trainer]);
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
        DB::table('class')->insert([
            'class_name' => $request->class_name,
            'room' => $request->room,
            'trainer_id' => $request->trainer_id,
            'date_of_week' => $request->date_of_week,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'price' => $request->price
        ]);
        return redirect('class');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('class')->join('trainer', 'class.trainer_id', '=', 'trainer.id')->join('users', 'trainer.id', '=', 'users.id')->where('class.class_id', '=', $id)->get(['*', 'class.start_date', 'class.end_date', 'class.price']);
        return $data;
    }

    public function checkPT(Request $request)
    {
        // dd($request->all());
        $msgTrainer = '';
        $msgRoom = '';
        $msgCN = '';

        $trainer = DB::select("SELECT * FROM class WHERE trainer_id = '" . $request->input('trainer_id') . "' AND date_of_week LIKE '%" . $request->input('date_of_week') . "%' AND HOUR(start_time) = HOUR('" . $request->input('start_time') . "') AND HOUR(end_time) = HOUR('" . $request->input('end_time') . "') AND  start_date = '" . $request->input('start_date') . "' AND end_date = '" . $request->input('end_date') . "'");
        $room = DB::select("SELECT * FROM class WHERE room = '" . $request->input('room') . "' AND date_of_week LIKE '%" . $request->input('date_of_week') . "%' AND HOUR(start_time) = HOUR('" . $request->input('start_time') . "') AND HOUR(end_time) = HOUR('" . $request->input('end_time') . "') AND  start_date = '" . $request->input('start_date') . "' AND end_date = '" . $request->input('end_date') . "'");
        $class_name = DB::select('select * from class where class_name = ?', [$request->input('class_name')]);
        if ($trainer) {
            $msgTrainer = 'Trùng huấn luyện viên';
        };
        if ($room) {
            $msgRoom = 'Trùng phòng tập';
        };
        if ($class_name) {
            $msgCN = 'Trùng tên lớp';
        };
        return [
            'trainer' => $msgTrainer,
            'room' => $msgRoom,
            'class_name' => $msgCN
        ];
    }

    public function classType($type)
    {
        $data = DB::table('class')->where('type', '=', $type)->get();
        return $data;
    }

    public function classInfor($id)
    {
        $data = DB::table('class')->where('class_id', '=', $id)->get();
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
        DB::table('class')->where('class_id', '=', $request->class_id)->update([
            'class_name' => $request->class_name,
            'room' => $request->room,
            'trainer_id' => $request->trainer_id,
            'date_of_week' => $request->date_of_week,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'price' => $request->price
        ]);
        return redirect('class');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from class where class_id = ?', [$id]);
        return redirect('class');
    }

    public function checkClass($id)
    {
        $data = DB::select('SELECT * FROM class JOIN class_registration ON class.class_id = class_registration.class_id WHERE class.class_id = ? AND class_registration.member_id IS NOT NULL', [$id]);
        if ($data) {
            return $data;
        }
    }
}