<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index');
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
        $request->validate([
            'name' => 'required',
            'tel' => 'required',
            'email' => 'required'
        ]);

        $name = trim(strip_tags($request->input('name')));
        $tel = trim(strip_tags($request->input('tel')));
        $email = trim(strip_tags($request->input('email')));
        $pic = $request->input('pic');
        $userCom = trim(strip_tags($request->input('userCom')));

        $order = [
            'name' => 'Имя: '.$name.'; ',
            'tel' => 'Телефон: '.$tel.'; ',
            'email' => 'Email: '.$email.'; ',
            'pic' => 'Pic: '.$pic.'; ',
            'userCom' => 'Комментарий: '.$userCom.'|'
        ];

        $file = '../database/userOrder.txt';
        file_put_contents($file, $order, FILE_APPEND | LOCK_EX);
        //$message = 'Запрос отправлен';        

        return response()->download('assets/img/pic/'.$pic.'.jpg');
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
