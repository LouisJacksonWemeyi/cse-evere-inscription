<?php

namespace App\Http\Controllers;

use App\Registration;
use App\Session;
use App\SessionDate;
use Illuminate\Http\Request;

class SessionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = Session::orderBy('id', 'desc')->get();
        $activeSession = Session::where("active", 1)->get();

        $sessions->activated = (isset($activeSession[0]->id)) ? "checked" : "";

        return view('admin.sessions.index')->with(["datas" => $sessions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('admin.sessions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $session = new Session;

        $session->title = $request->title;

        $session->save();

        return redirect()->route('sessions.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $session = Session::where("id", $id)->first();

        return view('admin.sessions.session_dates')->with(["data" => $session]);
    }

    /**
     * Update the specified field in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateField($id)
    {
        Session::where('id', $id)->update([$_REQUEST["field"] => $_REQUEST["value"]]);
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
        Session::where('active', 1)->update(['active' => 0]);
        Session::where('id', $id)->update(['active' => $_REQUEST["value"]]);

        return json_encode(["response" => "success"]);
    }

    /**
     * Unactive allsessions.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unactive()
    {
        Session::where('active', 1)->update(['active' => 0]);

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
        Session::findOrFail($id)->delete();
        SessionDate::where('session_id', $id)->delete();
        Registration::where('session_id', $id)->delete();
        return json_encode(["response" => "success"]);
    }

}
