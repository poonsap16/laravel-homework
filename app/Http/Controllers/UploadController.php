<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Upload;
use App\TimeStamp;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('upload');
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
        //return $request->all();
        $upload = Upload::create($request->all());

        if($request->hasFile('file')){
            $path = $request->file('file')->store('/public');

            $time_stamps = new \App\Imports\TimeStampsImport();
            $time_stamps->import(storage_path('app/'.$path));
            //$path = $request->file('file')->storeAS('/', $request->file('file')->getClientOriginalName());
            $filename = pathinfo($path);
            $upload->file = $filename['basename'];
            $upload->update();
            //return Storage::download($path);
            //return Storage::url($path);


 // $time_stamps->import(storage_path('app\public\PKJQITtKMo8cVYFIeDj5kYEt7ucUNmtmxDolJkia.xlsx'));

            return redirect('/upload');
        }else{
            return 'no file';
        }
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
        //
    }
}
