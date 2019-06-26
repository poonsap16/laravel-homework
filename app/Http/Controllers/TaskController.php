<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
            
    $tasks = Task::all();
    //return $tasks;

    return view('report',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate =[
            'type' => 'required',
            'name' => 'required|max:5',
            'status' => 'required'
    
        ];
        $messageError = [
            'type.required' => 'เลือกประเภทงาน',
            'name.required' => 'ใส่ชื่องาน',
            'name.max' => 'กรอกได้ไม่เกิน 5 ตัวอักษร'
        ];
    
    
        $request->validate($validate,$messageError);
        $task = new \App\Task();
        $task->type = $request->input('type');
        $task->name = $request->input('name');
        $task->detail = $request->input('detail');
        $task->completed =$request->input('status');
        $task->save(); 
    
        return redirect('show');
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
        $tasks = \App\Task::all(); 
        $task = \App\Task::find($id); 
        if (empty($task)){
            return "Not found";
        }
         return view('report')->with(['task' => $task,'tasks' => $tasks]);  
       
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
         
        Task::find($id)->update($request->all());
        return redirect()->back()->with('success','Edited Successfully !!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task=Task::find($id);
        $task->delete();
        return back();
    }
}
