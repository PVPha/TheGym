<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('room')->get();
        return view('pages.admin.room', ['data' => $data]);
    }

    public function search(Request $request)
    {
        $data = DB::table('room')->where('name', 'LIKE', '%' . $request->input('query') . '%')->paginate(10);
        return view('pages.admin.room', ['data' => $data]);
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
        $filename = '';
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $filename = 'public/Image/' . $filename;
        }
        DB::table('room')->insert([
            'name' => $request->name,
            'image' => $filename,
            'phone' => $request->phone,
            'address' => $request->address,
            'map' => $request->map
        ]);
        return redirect('room');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('room')->where('id', '=', $id)->get();
        return $data;
    }
    public function show2($id)
    {
        session()->regenerate();
        $name = '';
        $url = '';
        if (!empty(Session::get('login'))) {
            $value = Session::get('login');
            $name = $value['name'];
            $url = $value['url'];
        }
        $data = DB::table('room')->where('id', '=', $id)->first();
        return view('room.room', ['name' => $name, 'url' => $url, 'data' => $data]);
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

        DB::table('room')->where('id', '=', $request->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'map' => $request->map
        ]);
        $filename = '';
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $filename = 'public/Image/' . $filename;
            DB::table('room')->where('id', '=', $request->id)->update([
                'image' => $filename
            ]);
        }
        return redirect('room');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('room')->delete($id);
        return redirect('room');
    }
}