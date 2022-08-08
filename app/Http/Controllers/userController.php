<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pack = DB::table('pack')->get();
        $trainer = DB::table('trainer')->join('users', 'trainer.id', '=', 'users.id')->get();
        $member = DB::table('users')->where('role', '=', 'member')->get();
        return view('pages.admin.user', ['trainer' => $trainer, 'member' => $member, 'pack' => $pack]);
    }

    public function search(Request $request)
    {
        $pack = DB::table('pack')->get();
        $trainer = DB::table('trainer')->join('users', 'trainer.id', '=', 'users.id')->where('name', 'LIKE', '%' . $request->input('query') . '%')->paginate(10);
        $member = DB::table('users')->where('role', '=', 'member')->where('name', 'LIKE', '%' . $request->input('query') . '%')->paginate(10);
        return view('pages.admin.user', ['trainer' => $trainer, 'member' => $member, 'pack' => $pack]);
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
        DB::table('users')->insert([
            'name'  => $request->name,
            'gender'  => $request->gender,
            'email' => $request->email,
            'phone' => $request->phone,
            'date_of_birth' => $request->date_of_birth,
            'username' => $request->email,
            'password' => md5($request->password),
            'role' => $request->role,
            'image' => $filename,
            'register_date' => date('Y-m-d'),
            'token' => Hash::make($request->email)
        ]);
        if (isset($request->for_trainer)) {
            $id = DB::table('users')->orderBy('id', 'desc')->get(['id'])->first();
            DB::table('trainer')->insert([
                'id' => $id->id,
                'type' => $request->type,
                'price' => $request->price,
                'description' => $request->description
            ]);
        }
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
        //$data = DB::table('users')->leftJoin('trainer', 'users.id', '=', 'trainer.id')->where('users.id', '=', $id)->get();
        $data = DB::select('SELECT *, users.id as "id" FROM users LEFT JOIN trainer ON users.id = trainer.id WHERE users.id = ?', [$id]);
        return $data;
    }

    public function getInfor($id)
    {
        $data = DB::table('users')->where('id', '=', $id)->get();
        return $data;
    }

    public function checkDup(Request $request)
    {
        $msgMail = '';
        $msgPhone = '';
        if ($request->input('email')) {
            $email = DB::table('users')->where('email', '=', $request->input('email'))->first();
            if ($email) {
                $msgMail = 'Email đã được sử dụng';
            }
        }
        if ($request->input('phone')) {
            $phone = DB::table('users')->where('phone', '=', $request->input('phone'))->first();
            if ($phone) {
                $msgPhone = 'SĐT đã được sử dụng';
            }
        }
        return [
            'email' => $msgMail,
            'phone' => $msgPhone
        ];
    }
    /**
     * Display the specified resource.
     *
     * @param  string  $type
     * @return \Illuminate\Http\Response
     */
    public function userType($type)
    {
        $data = DB::select('SELECT *, users.id as "id" FROM users LEFT JOIN trainer ON users.id = trainer.id WHERE trainer.type = ?', [$type]);
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
        $data = DB::select('SELECT *, users.id as "id" FROM users LEFT JOIN trainer ON users.id = trainer.id WHERE users.id = ?', [$id]);
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
        DB::table('users')->where('id', '=', $request->id)->update([
            'name'  => $request->name,
            'gender'  => $request->gender,
            'email' => $request->email,
            'phone' => $request->phone,
            'date_of_birth' => $request->date_of_birth
        ]);
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            DB::table('users')->where('id', '=', $request->id)->update([
                'image'  => 'public/Image/' . $filename
            ]);
        }
        if (isset($request->for_trainer)) {
            DB::table('trainer')->where('id', '=', $request->id)->update([
                'type' => $request->type,
                'description' => $request->description,
                'price' => $request->price,
            ]);
        }
        if (isset($request->for_user)) {
            return redirect($request->for_user);
        }
        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trainer =  DB::table('users')->join('trainer', 'users.id', '=', 'trainer.id')->where('users.id', '=', $id)->get('users.id');
        DB::table('users')->delete($id);
        if (!empty($trainer)) {
            DB::table('trainer')->delete($id);
        }
        return redirect('user');
    }
}