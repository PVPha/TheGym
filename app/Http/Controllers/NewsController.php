<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        session()->regenerate();
        $name = '';
        $url = '';
        if (!empty(Session::get('login'))) {
            $value = Session::get('login');
            $name = $value['name'];
            $url = $value['url'];
        }

        $data = DB::table('news')->paginate(4);

        return view('news.news', ['name' => $name, 'url' => $url, 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session()->regenerate();
        $name = '';
        $url = '';
        if (!empty(Session::get('login'))) {
            $value = Session::get('login');
            $name = $value['name'];
            $url = $value['url'];
        }
        return view('news.addNew', ['name' => $name, 'url' => $url]);
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
        DB::table('news')->insert([
            'name' => $request->name,
            'introduction' => $request->introduction,
            'content' => $request->content,
            'image' => $filename
        ]);
        return redirect('news');
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
        $name = '';
        $url = '';
        if (!empty(Session::get('login'))) {
            $value = Session::get('login');
            $name = $value['name'];
            $url = $value['url'];
        }
        $data = DB::table('news')->where('id', '=', $id)->first();
        return view('news.new', ['name' => $name, 'url' => $url, 'data' => $data]);
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
        $filename = '';
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $filename = 'public/Image/' . $filename;
            DB::table('news')->where('id', '=', $request->id)->update([
                'image' => $filename
            ]);
        }
        DB::table('news')->where('id', '=', $request->id)->update([
            'name' => $request->name,
            'introduction' => $request->introduction,
            'content' => $request->content,
        ]);
        return redirect('news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('news')->delete($id);
        return redirect('news');
    }
}