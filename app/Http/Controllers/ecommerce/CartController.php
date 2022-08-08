<?php

namespace App\Http\Controllers\ecommerce;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Session::get('cart');
        $count = 0;
        if (!empty($cart)) {
            foreach ($cart as $key => $value) {
                $count += $value['quantity'];
            }
        }
        Session::put('count', $count);
        $product = DB::table('storage')->get();
        $promotion = DB::table('promotion')->get();
        return view('pages.ecommerce.cart', ['count' => $count, 'product' => $product, 'promotion' => $promotion]);
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

        //dd(json_decode($request->products));
        $products = json_decode($request->products);
        foreach ($products as $key => $value) {
            DB::update("update storage set quantity = quantity - ? where slug = ?", [$value->quantity, $value->id]);
        }

        DB::table('order')->insert([
            'member_id' => $request->member_id,
            'products' => $request->products,
            'total' => $request->total,
            'address' => $request->address,
            'phone' => $request->phone,
            'status' => 'Chờ duyệt'
        ]);
        Session::remove("cart");
        $name  = $request->name;
        $data = [
            'name' => $request->name,
            'products' => $request->products,
            'total' => $request->total,
            'address' => $request->address
        ];
        Mail::to($request->email)->send(new OrderShipped($data));
        // Mail::send('mail.orderShipped', $data, function ($message, $request) {
        //     $message->to($request->email, $request->name)->subject('Thông tin đơn hàng');
        //     $message->from('pvpdaoclone3@gmail.com', 'pvp');
        // });
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
        $data = explode('_', $id);
        $sto = DB::table('storage')->where('slug', '=', $data[0])->first('name');
        $product = [
            'id' => $data[0],
            'quantity' => $data[1],
            'name' => $sto->name
        ];
        session()->regenerate();
        if (!empty(Session::get('cart'))) {
            $cart = Session::get('cart');
            $new = false;
            foreach ($cart as $key => $value) {
                if ($value['id'] == $data[0]) {
                    $cart[$key]['quantity'] = $value['quantity'] + $data[1];
                    Session::remove("cart");
                    Session::put("cart", $cart);
                    $new = false;
                    break;
                } else {
                    $new = true;
                }
            }
            if ($new) {
                Session::push('cart', $product);
                $new = false;
            }
        } else {
            Session::put('cart', [$product]);
        }
        $cart = Session::get('cart');
        $count = 0;
        foreach ($cart as $key => $value) {
            $count += $value['quantity'];
        }
        Session::put('count', $count);
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
        $data = explode('_', $id);
        session()->regenerate();
        if (!empty(Session::get('cart'))) {
            $cart = Session::get('cart');
            foreach ($cart as $key => $value) {
                if ($value['id'] == $data[0]) {
                    $cart[$key]['quantity'] = $data[1];
                    Session::remove("cart");
                    Session::put("cart", $cart);
                    break;
                }
            }
        }
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
        $cart = Session::get('cart');
        foreach ($cart as $key => $value) {
            if ($value['id'] == $id) {
                unset($cart[$key]);
                Session::remove("cart");
                Session::put("cart", $cart);
            }
        }
        return redirect()->back();
    }
}