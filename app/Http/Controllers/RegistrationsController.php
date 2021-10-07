<?php

namespace App\Http\Controllers;

use App\Center;
use App\CommunityCenter;
use App\ConfigMail;
use App\Registration;
use App\RegistrationSessionDate;
use App\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class RegistrationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = Session::orderBy('id', 'desc')->get();
        $centers = Center::get();

        return view('admin.registrations.index')->with(["sessions" => $sessions, "centers" => $centers]);
    }

    /**
     * Display the form to fill the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form()
    {
        $session = Session::where("active", 1)->first();
        $centers = Center::get();

        return view('forms.index')->with(["data" => $session, "centers" => $centers]);
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
        if ($request->session_date_ids != NULL) {

            $configmails = ConfigMail::where('active', 1)->get();

            $registration = new Registration;

            $registration->parent_firstname = $request->parent_firstname;
            $registration->parent_lastname = $request->parent_lastname;
            $registration->parent_mail = $request->parent_mail;
            $registration->street = $request->street;
            $registration->street_number = $request->street_number;
            $registration->postal_box = $request->postal_box;
            $registration->postal_code = $request->postal_code;
            $registration->parent_phone = $request->parent_phone;
            $registration->child_firstname = $request->child_firstname;
            $registration->child_lastname = $request->child_lastname;
            $registration->child_birthday = $request->child_birthday;
            $registration->child_gender = $request->child_gender;
            $registration->doctor_phone = $request->doctor_phone;
            if (!empty($request->child_disease)) {
                $registration->child_disease = join("\n", $request->child_disease);
            }            
            $registration->child_bloodgroup = $request->child_bloodgroup;
            $registration->child_medicine = $request->child_medicine;
            $registration->child_allergy = $request->child_allergy;
            $registration->note = $request->note;
            $registration->community_center_id = $request->community_center_id;
            if (!empty($request->checked_nursery)) {
                $registration->checked_nursery = 1;
            }else{
                $registration->checked_nursery = 0;
            }
            $registration->checked_nursery = $request->checked_nursery;
            $registration->nursery = $request->nursery;
            $registration->session_id = $request->session_id;
            $registration->save();

            foreach ($request->session_date_ids as $session_date_id) {
                $session_date_registration = new RegistrationSessionDate;
                $session_date_registration->session_date_id = $session_date_id;
                $session_date_registration->registration_id = $registration->id;
                $session_date_registration->save();
            }

            Mail::to($registration->parent_mail)->send(new \App\Mail\RegistrationComplete($registration->id) );
            if (isset($configmails)) {
             foreach ($configmails as $configmail) {
                Mail::to($configmail->mail)->send(new \App\Mail\RegistrationComplete($registration->id) );
             }
            }

            session()->flash('msg',"Votre demande d'inscription a bien été envoyée. Dans quelques instants, vous recevrez un email contenant un récapitulatif de vos informations ainsi que des instructions pour valider votre inscription.");
        }else{
            
            session()->flash('error',"Vous devez cocher au moins une session d'activité.");
            return redirect()->route('activites.form')->withInput();
        }

        return redirect()->route('activites.form');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registration = Registration::where("id", $id)->first();

        return view('admin.registrations.form')->with(["data" => $registration]);
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
          $registration = Registration::findOrFail($id);

          $registration->parent_firstname = $request->parent_firstname;
          $registration->parent_lastname = $request->parent_lastname;
          $registration->parent_mail = $request->parent_mail;
          $registration->street = $request->street;
          $registration->street_number = $request->street_number;
          $registration->postal_box = $request->postal_box;
          $registration->postal_code = $request->postal_code;
          $registration->parent_phone = $request->parent_phone;
          $registration->child_firstname = $request->child_firstname;
          $registration->child_lastname = $request->child_lastname;
          $registration->child_birthday = $request->child_birthday;
          $registration->child_gender = $request->child_gender;
          $registration->doctor_phone = $request->doctor_phone;
          $registration->child_disease = $request->child_disease;
          $registration->child_bloodgroup = $request->child_bloodgroup;
          $registration->child_medicine = $request->child_medicine;
          $registration->child_allergy = $request->child_allergy;
          $registration->note = $request->note;
          if (!empty($request->checked_nursery)) {
              $registration->checked_nursery = 1;
          }else{
              $registration->checked_nursery = 0;
          }
          $registration->nursery = $request->nursery;
          $registration->paid_amount = $request->paid_amount;
          $registration->bank_info = $request->bank_info;
          $registration->op = $request->op;

          if (empty($registration->paid_date)) {
            Mail::to($registration->parent_mail)->send(new \App\Mail\RegistrationPaid($registration->id) );
            $registration->paid_date = $request->paid_date;
          }

          $registration->save();
          return redirect()->to(route('registrations.index')."#reg-".$id);
 
    }

    /**
     * Export resource in csv file.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function export($session_id, $center_id)
    {

        $center = CommunityCenter::where('id',$center_id)->first();
        $registrations = Registration::where("session_id", $session_id)->where("community_center_id",$center_id)->get();
        $session = Session::where("id", $session_id)->first();

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . date('Y_m_d') . '-' . $session->title . '_' . $center->center->title . '.xlsx');
        header('Cache-Control: max-age=0');

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $offset = 2;
        $styleArray = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],

        ];
        $title = $center->center->title . " (session : " . $session->title . ")";
        $headers = [$title, "","","","","",""];

        $columns = ["Nom enfant",
                    "Prénom enfant",
                    "D de N",
                    "Adresse",
                    "N° / Boite",
                    "N° GSM Parent",
                    "Remarques"];

        foreach ($session->session_dates as $session_date) {
            $columns[] = $session_date->abbreviation;
        }
                   
        $columns = array_merge($columns, ["Garderie", "Maladies", "Groupe sanguin", "Médication", "Allergies", "Date paiement", "Montant reçu","Montant dû", "N° OP"]);

        $sheet->mergeCells('A1:G1');               

        $case_letter = '0';            
        foreach ($headers as $header) {
            $case = ord('A') + $case_letter;
            $sheet->SetCellValue(chr($case).'1', $header);
            $case_letter++;
        } 
        $offset = $offset + 1;       

        $case_letter = '0';            
        foreach ($columns as $column) {
            $case = ord('A') + $case_letter;
            $sheet->SetCellValue(chr($case).'2', $column);
            $case_letter++;
        }
        $offset = $offset + 1;
                                  
        $i = 3;
        foreach($registrations as $registration) {
           $values = [$registration->child_lastname,
                      $registration->child_firstname,
                      $registration->child_birthday->format('d-m-y'),
                      $registration->street,
                      $registration->street_number . " / " . $registration->postal_box,
                      $registration->parent_phone,
                      $registration->note];

            $total_session_dates = 0;
            $total_amount = 0;
            foreach ($session->session_dates as $session_date) {
                $registration_in_session_date = 0;
                foreach($registration->session_dates as $registration_session_date){

                    if ($registration_session_date->id == $session_date->id) {
                        $registration_in_session_date = 1;
                        if ($registration->postal_code == 1140) {
                          $total_amount += $session_date->price;
                        }else{
                          $total_amount += $session_date->full_price;
                        }
                        if ($registration->checked_nursery == 1) {
                          $total_amount += 5;
                        }
                        $total_session_dates++;
                    }
                }
                    
                $values[] = $registration_in_session_date;
            }
            $totals[] = $total_session_dates;

            $values = array_merge($values, [isset($registration->checked_nursery) ? $registration->checked_nursery : "0", $registration->child_disease, $registration->child_bloodgroup, $registration->child_medicine, $registration->child_allergy, isset($registration->paid_date) ? $registration->paid_date->format('d-m-y') : "" , $registration->paid_amount . " €", $total_amount . " €" , $registration->op]);


            $case_letter = '0';            
            foreach ($values as $value) {
                $case = ord('A') + $case_letter;
                $sheet->SetCellValue(chr($case).$i, $value);
                $case_letter++;
            }
                        
            $i++;
            $offset++;
        }
        // $i = 0;
        // foreach ($totals as $total) {
        //   $sheet->SetCellValue(chr(ord('H') + $i).$offset, $total);
        //   $i++;
        // }


        for ($col = 'A'; $col !== (chr(ord('A') + count($columns))); $col++)
        {
            $sheet->getStyle($col.'1')->applyFromArray($styleArray);
            $sheet->getStyle($col.'2')->applyFromArray($styleArray);

            $sheet->getColumnDimension($col)->setAutoSize(true);
        }
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Registration::findOrFail($id)->delete();
        RegistrationSessionDate::where("registration_id", $id)->delete();
        return json_encode(["response" => "success"]);
    }

}
