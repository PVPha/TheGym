<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('order')->get();
        return view('pages.admin.order', ['data' => $data]);
    }
    public function search(Request $request)
    {
        $data = DB::table('order')->where('phone', '=', $request->input('query'))->paginate(10);
        return view('pages.admin.order', ['data' => $data]);
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
        // $produts = json_decode(DB::table('order')->where('id', '=', $id)->first('products')->products);

        // foreach ($produts as $key => $value) {
        //     DB::update("update storage set quantity = quantity - $value->quantity where slug = ?", [$value->id]);
        // }

        DB::table('order')->where('id', '=', $id)->update([
            'status' => 'Đang giao',
            'time_stamp' => date('Y-m-d')
        ]);
        return redirect()->back();
    }

    public function delivered($id)
    {
        // $produts = json_decode(DB::table('order')->where('id', '=', $id)->first('products')->products);

        // foreach ($produts as $key => $value) {
        //     DB::update("update storage set quantity = quantity - $value->quantity where slug = ?", [$value->id]);
        // }

        DB::table('order')->where('id', '=', $id)->update([
            'status' => 'Đã giao',
            'time_stamp' => date('Y-m-d')
        ]);
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
        $produts = json_decode(DB::table('order')->where('id', '=', $id)->first('products')->products);

        foreach ($produts as $key => $value) {
            DB::update("update storage set quantity = quantity + $value->quantity where slug = ?", [$value->id]);
        }
        DB::table('order')->where('id', '=', $id)->update([
            'status' => 'Giao không thành công',
            'time_stamp' => date('Y-m-d')
        ]);
        return redirect()->back();
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
        DB::table('order')->delete($id);
        return redirect()->back();
    }
}