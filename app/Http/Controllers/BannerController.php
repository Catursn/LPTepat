<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

use File;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::orderBy('id_banners','DESC')->get();
        return view('banner.index',compact('banner'));
    }

    public function data(){
        $banner = Banner::orderBy('id_banners','DESC')->get();
        $no = 0;
        $data = array();
        foreach($banner as $list){
            $no ++;
            $row = array();
            $row[] = $no;
            $row[] = $list->caption;
            $row[] = '<img src="'.$list->foto.'" height="250px" >';
            $row[] = '<div class="btn-group">
                <a href="/admin/banner/'.$list->id_banners.'/edit" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                <button class="btn btn-danger" data-catid='.$list->id_banners.' data-toggle="modal" data-target="#delete'.$list->id_banners.'"><i class="fa fa-trash"></i></button>
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
        return view('banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner = new Banner;
        $data = $request->all();
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            
            $nama_gambar = "/img/banner/".$file->getClientOriginalName();
            $lokasi = public_path('/img/banner');
            // dd($nama_gambar);
            $file->move($lokasi, $nama_gambar);
            $data['foto'] = $nama_gambar;
        }
        $status=$banner->fill($data)->save();
        if($status){
            request()->session()->flash('success','Banner successfully created');
        }
        else{
            request()->session()->flash('error','Eror while created banner');
        }
        return redirect()->route('banner.index');
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
        $banner = Banner::find($id);
        return view('banner.edit',compact('banner'));
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
        $banner = Banner::find($id);
        $data = $request->all();
        if ($request->hasFile('foto')) {
            $try = File::delete(public_path($banner->foto));
            // dd($try);

            $file = $request->file('foto');
            
            $nama_gambar = "/img/banner/".$file->getClientOriginalName();
            $lokasi = public_path('/img/banner');
            $file->move($lokasi, $nama_gambar);
            $data['foto'] = $nama_gambar;
        }else{
            $data['foto'] = $banner->foto;
        }
        $status=$banner->fill($data)->save();
        if($status){
            request()->session()->flash('success','Banner successfully updated');
        }
        else{
            request()->session()->flash('error','Eror while updated banner');
        }
        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner =  Banner::find($id);
        $status = Banner::find($id)->delete();
        if($status){
            File::delete(public_path($banner->foto));
            request()->session()->flash('success','Data banner successfully deleted');
        }
        else{
            request()->session()->flash('error','Eror while deleted data banner');
        }
        return redirect()->route('banner.index');
    }
}
