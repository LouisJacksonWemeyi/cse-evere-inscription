<?php

namespace App\Http\Controllers;

use App\CommunityCenter;
use App\Session;
use App\SessionDate;
use Illuminate\Http\Request;

class CommunityCentersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centers = CommunityCenter::get();

        return view('admin.centers.index')->with(["datas" => $centers]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($session_date_id)
    {
        $session_date = SessionDate::where("id", $session_date_id)->first();

        return view('admin.centers.index')->with(["data" => $session_date]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_session)
    {
        $session = Session::where('id', $id_session)->first();

        return view('admin.centers.create')->with(["session" => $session]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_session)
    {
        $center = new CommunityCenter;

        $center->title = $request->title;
        $center->places = $request->places;
        $center->session_id = $id_session;
        $center->save();
        
        return redirect()->route('sessions.show', ["id" => $id_session]);
       
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
        CommunityCenter::where('id', $id)->update(['active' => $_REQUEST["value"]]);

        return json_encode(["response" => "success"]);
    }

    /**
     * Update the specified field in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        CommunityCenter::where('id', $id)->update([$_REQUEST["field"] => $_REQUEST["value"]]);
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
        CommunityCenter::findOrFail($id)->delete();
        return json_encode(["response" => "success"]);
    }
}
