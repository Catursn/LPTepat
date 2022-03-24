<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feature;
use File;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feature = Feature::orderBy('id_features','DESC')->get();
        return view('feature.index',compact('feature'));
    }

    public function data(){
        $feature = Feature::orderBy('id_features','DESC')->get();
        $no = 0;
        $data = array();
        foreach($feature as $list){
            $no ++;
            $row = array();
            $row[] = $no;
            $row[] = $list->feature;
            $row[] = '<div class="btn-group">
                <a href="/admin/feature/'.$list->id_features.'/edit" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                <button class="btn btn-danger" data-catid='.$list->id_features.' data-toggle="modal" data-target="#delete'.$list->id_features.'"><i class="fa fa-trash"></i></button>
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
        return view('feature.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $feature = new Feature;
        $data = $request->all();
        $status=$feature->fill($data)->save();
        if($status){
            request()->session()->flash('success','Feature successfully created');
        }
        else{
            request()->session()->flash('error','Eror while created feature');
        }
        return redirect()->route('feature.index');
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
        $feature = Feature::find($id);
        return view('feature.edit',compact('feature'));
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
        $feature = Feature::find($id);
        $data = $request->all();
        $status=$feature->fill($data)->save();
        if($status){
            request()->session()->flash('success','Feature successfully updated');
        }
        else{
            request()->session()->flash('error','Eror while updated feature');
        }
        return redirect()->route('feature.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = Feature::find($id)->delete();
        if($status){
            request()->session()->flash('success','Data feature successfully deleted');
        }
        else{
            request()->session()->flash('error','Eror while deleted data feature');
        }
        return redirect()->route('feature.index');
    }
}
