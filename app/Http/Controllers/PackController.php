<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('pack')->get();
        $register = DB::table('pack')->join('pack_registration', 'pack.id', '=', 'pack_registration.pack_id')->join('users', 'pack_registration.member_id', '=', 'users.id')->get(['*', 'pack_registration.id', 'pack.name as name_pack', 'pack_registration.start_date', 'pack_registration.expiry_date']);
        return view('pages.admin.pack', ['data' => $data, 'register' => $register]);
    }
    public function search(Request $request)
    {
        $data = DB::table('pack')->where('name', 'LIKE', '%' . $request->input('query') . '%')->get();
        $register = DB::table('pack')->join('pack_registration', 'pack.id', '=', 'pack_registration.pack_id')->join('users', 'pack_registration.member_id', '=', 'users.id')->where('users.name', 'LIKE', '%' . $request->input('query') . '%')->get(['*', 'pack_registration.id', 'pack.name as name_pack', 'pack_registration.start_date', 'pack_registration.expiry_date']);
        return view('pages.admin.pack', ['data' => $data, 'register' => $register]);
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
        DB::table('pack')->insert([
            'name' => $request->name,
            'price' => $request->price,
            'time' => $request->time,
        ]);
        return redirect('pack');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('pack')->where('id', '=', $id)->get();
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
        DB::table('pack')->where('id', '=', $request->id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'time' => $request->time,
        ]);
        return redirect('pack');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('pack')->delete($id);
        return redirect('pack');
    }
}