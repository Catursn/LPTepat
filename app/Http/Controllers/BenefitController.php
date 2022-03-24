<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Benefit;
use File;

class BenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $benefit = Benefit::orderBy('id_benefits','DESC')->get();
        return view('benefit.index',compact('benefit'));
    }

    public function data(){
        $benefit = Benefit::orderBy('id_benefits','DESC')->get();
        $no = 0;
        $data = array();
        foreach($benefit as $list){
            $no ++;
            $row = array();
            $row[] = $no;
            $row[] = $list->caption;
            $row[] = '<img src="'.$list->foto.'" height="250px" >';
            $row[] = '<div class="btn-group">
                <a href="/admin/benefit/'.$list->id_benefits.'/edit" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                <button class="btn btn-danger" data-catid='.$list->id_benefits.' data-toggle="modal" data-target="#delete'.$list->id_benefits.'"><i class="fa fa-trash"></i></button>
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
        return view('benefit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $benefit = new Benefit;
        $data = $request->all();
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            
            $nama_gambar = "/img/benefit/".$file->getClientOriginalName();
            $lokasi = public_path('/img/benefit');
            // dd($nama_gambar);
            $file->move($lokasi, $nama_gambar);
            $data['foto'] = $nama_gambar;
        }
        $status=$benefit->fill($data)->save();
        if($status){
            request()->session()->flash('success','Benefit successfully created');
        }
        else{
            request()->session()->flash('error','Eror while created benefit');
        }
        return redirect()->route('benefit.index');
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
        $benefit = Benefit::find($id);
        return view('benefit.edit',compact('benefit'));
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
        $benefit = Benefit::find($id);
        $data = $request->all();
        if ($request->hasFile('foto')) {
            $try = File::delete(public_path($benefit->foto));
            // dd($try);

            $file = $request->file('foto');
            
            $nama_gambar = "/img/benefit/".$file->getClientOriginalName();
            $lokasi = public_path('/img/benefit');
            $file->move($lokasi, $nama_gambar);
            $data['foto'] = $nama_gambar;
        }else{
            $data['foto'] = $benefit->foto;
        }
        $status=$benefit->fill($data)->save();
        if($status){
            request()->session()->flash('success','Benefit successfully updated');
        }
        else{
            request()->session()->flash('error','Eror while updated benefit');
        }
        return redirect()->route('benefit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $benefit =  Benefit::find($id);
        $status = Benefit::find($id)->delete();
        if($status){
            File::delete(public_path($benefit->foto));
            request()->session()->flash('success','Data benefit successfully deleted');
        }
        else{
            request()->session()->flash('error','Eror while deleted data benefit');
        }
        return redirect()->route('benefit.index');
    }
}
