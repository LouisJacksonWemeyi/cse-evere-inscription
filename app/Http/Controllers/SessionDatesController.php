<?php

namespace App\Http\Controllers;

use App\CommunityCenter;
use App\Session;
use App\SessionDate;
use Illuminate\Http\Request;

class SessionDatesController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_session)
    {        
        $session = Session::where("id", $id_session)->first();

        return view('admin.sessiondate.create')->with(["data" => $session]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_session)
    {
        $sessionDate = new SessionDate;

        $sessionDate->title = $request->title;
        $sessionDate->abbreviation = $request->abbreviation;
        $sessionDate->price = $request->price;
        $sessionDate->full_price = $request->full_price;
        $sessionDate->session_id = $id_session;
        $sessionDate->save();
        
        $centers_to_save = [["center_id" => 1, "places" => 36],
                            ["center_id" => 2, "places" => 24],
                            ["center_id" => 3, "places" => 24],
                            ["center_id" => 4, "places" => 24]];
                            
        foreach ($centers_to_save as $center_to_save) {
            $center = new CommunityCenter;
            $center->center_id = $center_to_save["center_id"];
            $center->places = $center_to_save["places"];
            $center->active = 1;
            $center->session_date_id = $sessionDate->id;

            $center->save();
        }
        return redirect()->route('sessions.show', ['id' => $id_session]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        SessionDate::where('id', $id)->update([$_REQUEST["field"] => $_REQUEST["value"]]);
        return json_encode(["response" => "success"]);
    }

    /**
     * Get the resource in storage (for ajax call).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request, $session_id)
    {
        $session_dates = SessionDate::where('session_id', $session_id)->get();

        $session_dates_avalaible = [];
        foreach ($session_dates as $session_date) {

            $center = CommunityCenter::where("session_date_id", $session_date->id)->where("center_id", $request->community_center_id)->where("active", 1)->first();
            if (isset($center)) {
                $count = 0;
                foreach ($session_date->registrations as $registration) {
                    if ($registration->community_center_id == $request->community_center_id) {
                        $count++;
                    }
                }
                $session_date->remaining_places = $center->places - $count;
                if ($session_date->remaining_places > 0) {
                    $session_dates_avalaible[] = $session_date;
                }
            }
        }


        return json_encode(["datas" => $session_dates_avalaible]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SessionDate::findOrFail($id)->delete();
        CommunityCenter::where('session_date_id', $id)->delete();
        RegistrationSessionDate::where("session_date_id", $id)->delete();
        
        return json_encode(["response" => "success"]);
    }

}
