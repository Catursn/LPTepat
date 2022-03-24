<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimoni;
use File;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimoni = Testimoni::orderBy('id_testimonis','DESC')->get();
        return view('testimoni.index',compact('testimoni'));
    }

    public function data(){
        $testimoni = Testimoni::orderBy('id_testimonis','DESC')->get();
        $no = 0;
        $data = array();
        foreach($testimoni as $list){
            $no ++;
            $row = array();
            $row[] = $no;
            $row[] = $list->nama;
            $row[] = $list->perusahaan;
            $row[] = $list->testi;
            $row[] = '<div class="btn-group">
                <a href="/admin/testimoni/'.$list->id_testimonis.'/edit" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                <button class="btn btn-danger" data-catid='.$list->id_testimonis.' data-toggle="modal" data-target="#delete'.$list->id_testimonis.'"><i class="fa fa-trash"></i></button>
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
        return view('testimoni.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $testimoni = new testimoni;
        $data = $request->all();
        $status=$testimoni->fill($data)->save();
        if($status){
            request()->session()->flash('success','Testimoni successfully created');
        }
        else{
            request()->session()->flash('error','Eror while created testimoni');
        }
        return redirect()->route('testimoni.index');
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
        $testimoni = Testimoni::find($id);
        return view('testimoni.edit',compact('testimoni'));
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
        $testimoni = Testimoni::find($id);
        $data = $request->all();
        $status=$testimoni->fill($data)->save();
        if($status){
            request()->session()->flash('success','Testimoni successfully updated');
        }
        else{
            request()->session()->flash('error','Eror while updated testimoni');
        }
        return redirect()->route('testimoni.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = Testimoni::find($id)->delete();
        if($status){
            request()->session()->flash('success','Data testimoni successfully deleted');
        }
        else{
            request()->session()->flash('error','Eror while deleted data testimoni');
        }
        return redirect()->route('testimoni.index');
    }
}
