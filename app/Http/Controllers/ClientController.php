<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use File;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::orderBy('id_clients','DESC')->get();
        return view('client.index',compact('client'));
    }

    public function data(){
        $client = Client::orderBy('id_clients','DESC')->get();
        $no = 0;
        $data = array();
        foreach($client as $list){
            $no ++;
            $row = array();
            $row[] = $no;
            $row[] = $list->link;
            $row[] = '<img src="'.$list->foto.'" height="100px" >';
            $row[] = '<div class="btn-group">
                <a href="/admin/client/'.$list->id_clients.'/edit" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                <button class="btn btn-danger" data-catid='.$list->id_clients.' data-toggle="modal" data-target="#delete'.$list->id_clients.'"><i class="fa fa-trash"></i></button>
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
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new Client;
        $data = $request->all();
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            
            $nama_gambar = "/img/client/".$file->getClientOriginalName();
            $lokasi = public_path('/img/client');
            // dd($nama_gambar);
            $file->move($lokasi, $nama_gambar);
            $data['foto'] = $nama_gambar;
        }
        $status=$client->fill($data)->save();
        if($status){
            request()->session()->flash('success','client successfully created');
        }
        else{
            request()->session()->flash('error','Eror while created client');
        }
        return redirect()->route('client.index');
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
        $client = Client::find($id);
        return view('client.edit',compact('client'));
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
        $client = client::find($id);
        $data = $request->all();
        if ($request->hasFile('foto')) {
            $try = File::delete(public_path($client->foto));
            // dd($try);

            $file = $request->file('foto');
            
            $nama_gambar = "/img/client/".$file->getClientOriginalName();
            $lokasi = public_path('/img/client');
            $file->move($lokasi, $nama_gambar);
            $data['foto'] = $nama_gambar;
        }else{
            $data['foto'] = $client->foto;
        }
        $status=$client->fill($data)->save();
        if($status){
            request()->session()->flash('success','client successfully updated');
        }
        else{
            request()->session()->flash('error','Eror while updated client');
        }
        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client =  Client::find($id);
        $status = Client::find($id)->delete();
        if($status){
            File::delete(public_path($client->foto));
            request()->session()->flash('success','Data client successfully deleted');
        }
        else{
            request()->session()->flash('error','Eror while deleted data client');
        }
        return redirect()->route('client.index');
    }
}
