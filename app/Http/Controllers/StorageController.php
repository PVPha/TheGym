<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StorageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->checkSale();
        $data = DB::table('storage')->paginate(10);
        return view('pages.admin.storage', ['data' => $data]);
    }

    public function search(Request $request)
    {
        // $this->checkSale();
        $data = DB::table('storage')->where('name', 'LIKE', '%' . $request->input('query') . '%')->paginate(10);
        return view('pages.admin.storage', ['data' => $data]);
    }
    public function checkSale()
    {
        DB::update('update storage set total_price = price where DATEDIFF(storage.end_sale, NOW()) < 0');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        DB::table('storage')->insert([
            'id' => $request->id,
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $filename,
            'slug' => $request->type . '-' . $request->id
            // 'discount' => $request->discount,
            // 'start_sale' => $request->start_sale,
            // 'end_sale' => $request->end_sale,
            // 'total_price' => $request->price - ($request->price * ($request->discount / 100))
        ]);

        return redirect('storage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('storage')->where('id', '=', $id)->get();
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
        $msg = '';
        $data = DB::table('storage')->where('id', '=', $id)->first();
        if ($data) {
            $msg = 'Mã hàng đã tồn tại';
        }
        return $msg;
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
        DB::table('storage')->where('id', '=', $request->id)->update([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            'quantity' => $request->quantity
            // 'discount' => $request->discount,
            // 'start_sale' => $request->start_sale,
            // 'end_sale' => $request->end_sale,
            // 'total_price' => $request->price - ($request->price * ($request->discount / 100))
        ]);
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            DB::table('storage')->where('id', '=', $request->id)->update([
                'image'  => 'public/Image/' . $filename
            ]);
        }
        return redirect('storage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('storage')->delete($id);
        return redirect('storage');
    }
}