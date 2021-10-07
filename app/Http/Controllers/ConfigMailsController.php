<?php

namespace App\Http\Controllers;

use App\ConfigMail;
use Illuminate\Http\Request;

class ConfigMailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mails = ConfigMail::get();

        return view('admin.configmails.index')->with(["datas" => $mails]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.configmails.create');
    }

    /**
     * Store the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $configmail = new ConfigMail;
        $configmail->mail = $request->mail;
        $configmail->active = 1;

        $configmail->save();
        return redirect()->route('configmails.index');
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
        ConfigMail::where('id', $id)->update([$_REQUEST["field"] => $_REQUEST["value"]]);
        return json_encode(["response" => "success"]);
    }

    /**
     * Update the active field in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        ConfigMail::where('id', $id)->update(['active' => $_REQUEST["value"]]);

        return json_encode(["response" => "success"]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ConfigMail::findOrFail($id)->delete();
        return json_encode(["response" => "success"]);
    }
}
