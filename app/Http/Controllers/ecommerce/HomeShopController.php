<?php

namespace App\Http\Controllers\ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('storage')->where('quantity', '>=', 1)->take(8)->inRandomOrder()->paginate(12);
        return view('pages.ecommerce.landing-page', ['products' => $products]);
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
        $data = DB::table('storage')->where('slug', '=', $id)->get();
        return view('pages.ecommerce.product', ['product' => $data[0]]);
    }

    public function search(Request $request)
    {

        $data = DB::table('storage')->where('name', 'LIKE', '%' . $request->input('query') . '%')->paginate(10);
        return view('pages.ecommerce.search-results', ['products' => $data]);
    }
    public function category($cate)
    {
        $data = DB::table('storage')->where('type', '=', $cate)->take(8)->paginate(12);
        return view('pages.ecommerce.landing-page', ['products' => $data]);
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