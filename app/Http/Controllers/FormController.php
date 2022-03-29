<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $form = Form::orderBy('id_forms','DESC')->get();
        return view('form.index',compact('form'));
    }

    public function data(){
        $form = Form::orderBy('id_forms','DESC')->get();
        $no = 0;
        $data = array();
        foreach($form as $list){
            $no ++;
            $row = array();
            $row[] = $no;
            $row[] = $list->nama;
            $row[] = $list->wa;
            $row[] = $list->email;
            $row[] = $list->perusahaan;
            $row[] = $list->pesan;
            $row[] = '<div class="btn-group">
                <a href="/admin/form/'.$list->id_forms.'" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                <button class="btn btn-danger" data-catid='.$list->id_forms.' data-toggle="modal" data-target="#delete'.$list->id_forms.'"><i class="fa fa-trash"></i></button>
                </div>';
            $data[] = $row;
        }
        $output = array("data" => $data);
        return response()->json($output);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $form = Form::find($id);
        return view('form.detail',compact('form'));
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
        $status = form::find($id)->delete();
        if($status){
            request()->session()->flash('success','Data form successfully deleted');
        }
        else{
            request()->session()->flash('error','Eror while deleted data form');
        }
        return redirect()->route('form.index');
    }
}
