<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;


class BodyIndexController extends Controller
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
        DB::table('body_index')->insert([
            'member_id' => $request->member_id,
            'height' => $request->height,
            'weight' => $request->weight,
            'chest' => $request->chest,
            'waist' => $request->waist,
            'butt' => $request->butt,
            'left_hand' => $request->left_hand,
            'right_hand' => $request->right_hand,
            'left_leg' => $request->left_leg,
            'right_leg' => $request->right_leg,
            'date_measure' => date("Y-m-d")
        ]);
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
        $data  =  DB::table('body_index')->where('id', '=', $id)->get();
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
        $data  =  DB::table('body_index')->where('member_id', '=', $id)->get();
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
        DB::table('body_index')->where('id', '=', $request->id)->update([
            'height' => $request->height,
            'weight' => $request->weight,
            'chest' => $request->chest,
            'waist' => $request->waist,
            'butt' => $request->butt,
            'left_hand' => $request->left_hand,
            'right_hand' => $request->right_hand,
            'left_leg' => $request->left_leg,
            'right_leg' => $request->right_leg,
            'date_measure' => $request->date_measure
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
        DB::table('body_index')->delete($id);
        return redirect()->back();
    }
}