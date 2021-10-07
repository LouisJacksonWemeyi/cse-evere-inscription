<?php

namespace App\Http\Controllers;
use App\ScholarSupport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class ScholarSupportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$scholar = ScholarSupport::orderBy('id', 'desc')->get();

    	return view('admin.scholar.index')->with(["datas" => $scholar]);
    }

    /**
     * Display the form to fill the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form()
    {
        return view('forms.index2');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$scholar = new ScholarSupport;
    	$scholar->parent_firstname = $request->parent_firstname;
    	$scholar->parent_lastname = $request->parent_lastname;
    	$scholar->parent_mail = $request->parent_mail;
    	$scholar->parent_phone = $request->parent_phone;
    	$scholar->child_firstname = $request->child_firstname;
    	$scholar->child_lastname = $request->child_lastname;
    	$scholar->adress = $request->adress;
    	$scholar->postal_code = $request->postal_code;
    	$scholar->child_gender = $request->child_gender;
    	$scholar->school_name = $request->school_name;
    	$scholar->school_postal_code = $request->school_postal_code;
    	$scholar->education_type = $request->education_type;
    	$scholar->scholar_year = $request->scholar_year;
    	$scholar->supports = join("\n", $request->supports);
    	$scholar->notes = $request->notes;
    	$scholar->save();
    	session()->flash('msg','Votre inscription a bien été envoyée.');
    	return redirect()->route('scholar.form');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
     * Export resource in csv file.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function export()
    {

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . date('Y_m_d') . '"-soutien_scholaire.xlsx"');
        header('Cache-Control: max-age=0');

        $scholars = ScholarSupport::orderBy('id', 'desc')->get();
       
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $styleArray = array('font' => array('bold' => true));

        $columns = ["Nom parent",
                    "Prénom parent",
                    "Mail",
                    "Téléphone",
                    "Nom enfant",
                    "Prénom enfant",
                    "Adresse",
                    "CP",
                    "Genre enfant",
                    "Nom école",
                    "CP école",
                    "Education",
                    "Année scholaire",
                    "Soutiens",
                    "Remarques",
                    "Date"];
                            
        $case_letter = '0';            
        foreach ($columns as $column) {
            $case = ord('A') + $case_letter;
            $sheet->SetCellValue(chr($case).'1', $column);
            $case_letter++;
        }
                                  
        $i = 2;
        foreach($scholars as $scholar) {
           $values = [$scholar->parent_lastname,
                      $scholar->parent_firstname,
                      $scholar->parent_mail,
                      $scholar->parent_phone,
                      $scholar->child_lastname,
                      $scholar->child_firstname,
                      $scholar->adress,
                      $scholar->postal_code,
                      $scholar->child_gender,
                      $scholar->school_name,
                      $scholar->school_postal_code,
                      $scholar->education_type,
                      $scholar->scholar_year,
                      $scholar->supports,
                      $scholar->notes,
                      $scholar->created];

            $case_letter = '0';            
            foreach ($values as $value) {
                $case = ord('A') + $case_letter;
                $sheet->SetCellValue(chr($case).$i, $value);
                $case_letter++;
            }
                        
            $i++;
        }

        for ($col = 'A'; $col !== 'P'; $col++)
        {
            $sheet->getStyle($col.'1')->applyFromArray($styleArray);

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
        ScholarSupport::findOrFail($id)->delete();
        return json_encode(["response" => "success"]);
    }

}
