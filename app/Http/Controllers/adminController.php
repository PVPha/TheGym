<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pack = DB::select('SELECT SUM(total_money) AS "pack" FROM pack_registration where status = 1');
        $delivered = DB::select('SELECT SUM(total) AS "delivered" FROM `order` WHERE status = "Đã giao"');
        $ship = DB::select('SELECT (COUNT(id)*30000) AS "ship" FROM `order` WHERE status = "Giao không thành công"');
        $class = DB::select('SELECT SUM(class.price) AS "class" FROM class_registration JOIN class ON class_registration.class_id = class.class_id');
        $pt = DB::select("SELECT SUM(trainer.price) AS 'pt' FROM schedule JOIN trainer ON schedule.trainer_id = trainer.id WHERE schedule.status = 1");
        $day_pt = DB::select("SELECT SUM(trainer.price) AS 'pt' FROM schedule JOIN trainer ON schedule.trainer_id = trainer.id WHERE schedule.status = 1 AND DAY(time_stamp) - DAY(NOW()) = 0");
        $month_pt = DB::select("SELECT SUM(trainer.price) AS 'pt' FROM schedule JOIN trainer ON schedule.trainer_id = trainer.id WHERE schedule.status = 1 AND MONTH(time_stamp) - MONTH(NOW()) = 0");
        $day_pack = DB::select("SELECT SUM(total_money) AS 'money_pack' FROM pack_registration where status = 1 AND DAY(time_stamp) - DAY(NOW()) = 0");
        $month_pack = DB::select("SELECT SUM(total_money) AS 'money_pack' FROM pack_registration where status = 1 AND MONTH(time_stamp) - MONTH(NOW()) = 0");
        $day_delivered = DB::select("SELECT SUM(total) AS 'money_delivered' FROM `order` WHERE status = 'Đã giao' AND DAY(time_stamp) - DAY(NOW()) = 0");
        $month_delivered = DB::select("SELECT SUM(total) AS 'money_delivered' FROM `order` WHERE status = 'Đã giao' AND MONTH(time_stamp) - MONTH(NOW()) = 0");
        $day_ship = DB::select("SELECT COUNT(id) * 30000 AS 'money_ship' FROM `order` WHERE status = 'Giao không thành công' AND DAY(time_stamp) - DAY(NOW()) = 0");
        $month_ship = DB::select("SELECT COUNT(id) * 30000 AS 'money_ship' FROM `order` WHERE status = 'Giao không thành công' AND MONTH(time_stamp) - MONTH(NOW()) = 0");
        $day_class = DB::select("SELECT SUM(class.price) AS 'money_class' FROM class_registration JOIN class ON class_registration.class_id = class.class_id AND DAY(time_stamp) - DAY(NOW()) = 0");
        $month_class = DB::select("SELECT SUM(class.price) AS 'money_class' FROM class_registration JOIN class ON class_registration.class_id = class.class_id AND MONTH(time_stamp) - MONTH(NOW()) = 0");
        $total_money_month_pack = DB::select("SELECT case when month(time_stamp) = 1 then SUM(total_money) END AS 'Jan',case when month(time_stamp) = 2 then SUM(total_money) END AS 'Feb',case when month(time_stamp) = 3 then SUM(total_money) END AS 'Mar',case when month(time_stamp) = 4 then SUM(total_money) END AS 'Apr',case when month(time_stamp) = 5 then SUM(total_money) END AS 'May',case when month(time_stamp) = 6 then SUM(total_money) END AS 'Jun',case when month(time_stamp) = 7 then SUM(total_money) END AS 'Jul',case when month(time_stamp) = 8 then SUM(total_money) END AS 'Aug',case when month(time_stamp) = 9 then SUM(total_money) END AS 'Sep',case when month(time_stamp) = 10 then SUM(total_money) END AS 'Oct',case when month(time_stamp) = 11 then SUM(total_money) END AS 'Nov',case when month(time_stamp) = 12 then SUM(total_money) END AS 'Dec' FROM `pack_registration`");
        $total_money_month_class = DB::select("SELECT case when month(time_stamp) = 1 then SUM(class.price) END AS 'Jan',case when month(time_stamp) = 2 then SUM(class.price) END AS 'Feb',case when month(time_stamp) = 3 then SUM(class.price) END AS 'Mar',case when month(time_stamp) = 4 then SUM(class.price) END AS 'Apr',case when month(time_stamp) = 5 then SUM(class.price) END AS 'May',case when month(time_stamp) = 6 then SUM(class.price) END AS 'Jun',case when month(time_stamp) = 7 then SUM(class.price) END AS 'Jul',case when month(time_stamp) = 8 then SUM(class.price) END AS 'Aug',case when month(time_stamp) = 9 then SUM(class.price) END AS 'Sep',case when month(time_stamp) = 10 then SUM(class.price) END AS 'Oct',case when month(time_stamp) = 11 then SUM(class.price) END AS 'Nov',case when month(time_stamp) = 12 then SUM(class.price) END AS 'Dec' FROM class_registration JOIN class ON class_registration.class_id = class.class_id");
        $total_money_month_delivered = DB::select("SELECT case when month(time_stamp) = 1 then SUM(total) END AS 'Jan',case when month(time_stamp) = 2 then SUM(total) END AS 'Feb',case when month(time_stamp) = 3 then SUM(total) END AS 'Mar',case when month(time_stamp) = 4 then SUM(total) END AS 'Apr',case when month(time_stamp) = 5 then SUM(total) END AS 'May',case when month(time_stamp) = 6 then SUM(total) END AS 'Jun',case when month(time_stamp) = 7 then SUM(total) END AS 'Jul',case when month(time_stamp) = 8 then SUM(total) END AS 'Aug',case when month(time_stamp) = 9 then SUM(total) END AS 'Sep',case when month(time_stamp) = 10 then SUM(total) END AS 'Oct',case when month(time_stamp) = 11 then SUM(total) END AS 'Nov',case when month(time_stamp) = 12 then SUM(total) END AS 'Dec' FROM `order` WHERE status = 'Đã giao'");
        $total_money_month_ship = DB::select("SELECT case when month(time_stamp) = 1 then COUNT(id) * 30000 END AS 'Jan',case when month(time_stamp) = 2 then COUNT(id) * 30000 END AS 'Feb',case when month(time_stamp) = 3 then COUNT(id) * 30000 END AS 'Mar',case when month(time_stamp) = 4 then COUNT(id) * 30000 END AS 'Apr',case when month(time_stamp) = 5 then COUNT(id) * 30000 END AS 'May',case when month(time_stamp) = 6 then COUNT(id) * 30000 END AS 'Jun',case when month(time_stamp) = 7 then COUNT(id) * 30000 END AS 'Jul',case when month(time_stamp) = 8 then COUNT(id) * 30000 END AS 'Aug',case when month(time_stamp) = 9 then COUNT(id) * 30000 END AS 'Sep',case when month(time_stamp) = 10 then COUNT(id) * 30000 END AS 'Oct',case when month(time_stamp) = 11 then COUNT(id) * 30000 END AS 'Nov',case when month(time_stamp) = 12 then COUNT(id) * 30000 END AS 'Dec' FROM `order` WHERE status = 'Giao không thành công'");
        $total_money_month_pt = DB::select("SELECT case when month(time_stamp) = 1 then SUM(trainer.price) END AS 'Jan',case when month(time_stamp) = 2 then SUM(trainer.price) END AS 'Feb',case when month(time_stamp) = 3 then SUM(trainer.price) END AS 'Mar',case when month(time_stamp) = 4 then SUM(trainer.price) END AS 'Apr',case when month(time_stamp) = 5 then SUM(trainer.price) END AS 'May',case when month(time_stamp) = 6 then SUM(trainer.price) END AS 'Jun',case when month(time_stamp) = 7 then SUM(trainer.price) END AS 'Jul',case when month(time_stamp) = 8 then SUM(trainer.price) END AS 'Aug',case when month(time_stamp) = 9 then SUM(trainer.price) END AS 'Sep',case when month(time_stamp) = 10 then SUM(trainer.price) END AS 'Oct',case when month(time_stamp) = 11 then SUM(trainer.price) END AS 'Nov',case when month(time_stamp) = 12 then SUM(trainer.price) END AS 'Dec' FROM schedule JOIN trainer ON schedule.trainer_id = trainer.id WHERE schedule.status = 1");
        // session()->regenerate();
        // if (!empty(Session::get('login'))) {
        //     $value = Session::get('login');
        //     $name = $value['name'];
        //     $url = $value['url'];
        // }
        return view('pages.admin.dashboard', ['pack' => $pack, 'delivered' => $delivered, 'ship' => $ship, 'class' => $class, 'pt' => $pt, 'day_pt' => $day_pt, 'month_pt' => $month_pt, 'day_pack' => $day_pack, 'month_pack' => $month_pack, 'day_ship' => $day_ship, 'month_ship' => $month_ship, 'day_class' => $day_class, 'month_class' => $month_class, 'day_delivered' => $day_delivered, 'month_delivered' => $month_delivered, 'total_money_month_pack' => $total_money_month_pack, 'total_money_month_class' => $total_money_month_class, 'total_money_month_delivered' => $total_money_month_delivered, 'total_money_month_ship' => $total_money_month_ship, 'total_money_month_pt' => $total_money_month_pt,]);
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