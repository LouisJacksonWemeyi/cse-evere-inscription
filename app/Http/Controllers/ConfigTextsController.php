<?php

namespace App\Http\Controllers;

use App\ConfigText;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ConfigTextsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $texts = ConfigText::get();

        return view('admin.texts.index')->with(["datas" => $texts]);
    }

    /**
     * Store the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Update the specified field of the resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        ConfigText::where('id', $id)->update([$_REQUEST["field"] => $_REQUEST["value"]]);
        return json_encode(["response" => "success"]);
    }

}
