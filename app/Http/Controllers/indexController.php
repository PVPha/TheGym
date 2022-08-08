<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session()->regenerate();
        $class = DB::table('class')->join('trainer', 'class.trainer_id', '=', 'trainer.id')->join('users', 'trainer.id', '=', 'users.id')->get();
        $trainer = DB::table('trainer')->join('users', 'trainer.id', '=', 'users.id')->get();
        $room  = DB::table('room')->paginate(4);
        $pack = DB::table('pack')->get();
        $name = '';
        $url = '';
        if (!empty(Session::get('login'))) {
            $value = Session::get('login');
            $name = $value['name'];
            $url = $value['url'];
        }
        return view('index', ['pack' => $pack, 'class' => $class, 'trainer' => $trainer, 'room' => $room, 'name' => $name, 'url' => $url]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        session()->regenerate();
        $user = DB::select('select * from users where username = ? and password = ?', [$request->username, md5($request->password)]);
        if (!empty($user)) {
            Session::put('login', ['id' => $user[0]->id, 'name' => $user[0]->name, 'role' => $user[0]->role, 'url' => $user[0]->role == 'admin' ? '/admin' : ($user[0]->role == 'trainer' ? '/trainer' : '/member')]);
        }
        return redirect('/');
    }

    public function logout()
    {
        session()->regenerate();
        if (!empty(Session::get('login'))) {
            session()->remove('login');
        }
        return redirect('/');
    }

    public function changePass(Request $request)
    {
        DB::table('users')->where('id', '=', $request->id)->update([
            'password' => md5($request->new_password)
        ]);
        session()->regenerate();
        session()->remove('login');
        return redirect('/');
    }
    public function forgot(Request $request)
    {
        $token = DB::table('users')->where('email', '=', $request->email)->first('token');
        if ($token) {
            Mail::to($request->email)->send(new ForgotPass(url('?reset_pass=' . $token->token)));
        }
        return redirect()->back();
    }
    public function resetpass(Request $request)
    {
        DB::table('users')->where('token', '=', $request->token)->update([
            'password' => md5($request->password),
            'token' => Hash::make($request->password)
        ]);
        return redirect('/');
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