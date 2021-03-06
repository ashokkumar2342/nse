<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\DocumentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DocumentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $documentTypes = DocumentType::all();
        return view('admin.master.document.list',compact('documentTypes'));
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
        $rules=[
                'documentType' => 'required|string|min:2|max:50', 
                ];

                $validator = Validator::make($request->all(),$rules);
                if ($validator->fails()) {
                    $errors = $validator->errors()->all();
                    $response=array();
                    $response["status"]=0;
                    $response["msg"]=$errors[0];
                    return response()->json($response);// response as json
                }
               
                     
                $document = new DocumentType();
                $document->name = $request->documentType; 
                $document->save();  
                $response['msg'] = 'Account created Successfully';
                $response['status'] = 1;
                return response()->json($response); 
    }
     public function search(Request $request)
    {
        $academic = AcademicYear::find($request->academic_year_id);

        return response()->json(['start_date'=>date('d-m-Y',strtotime($academic->start_date)),'end_date'=>date('d-m-Y',strtotime($academic->end_date))]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
    public function show(AcademicYear $academicYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
    public function edit(AcademicYear $academicYear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AcademicYear $academicYear)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\AcademicYear  $academicYear
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcademicYear $academicYear)
    {
        //
    }
}
