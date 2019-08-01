<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Task;
use \App\Type;

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
            
    // $tasks = Task::all();
    $types = \App\Type::all();
    
    // $role = \Auth::user()->roles()->where('role_id',1)->first();
    $role = \Auth::user()->roles()->where(function($query){
        $query->where('role_id',1)->orwhere('role_id',2);  
    })->first();
    
    if(!empty($role)){
        //$tasks = Task::all();
        // $tasks = DB::table('tasks')
        //                 ->join('types','tasks.type_id',"=",'types.id')
        //                 ->join('users','tasks.user_id',"=",'users.id')
        //                 ->select(
        //                     'tasks.*',
        //                     'types.name as type_name',
        //                     'users.username as username'
        //                 )
        //                 ->get();
        //return $tasks;
        $sort = 'desc';
        $tasks =Task::taskAll($sort)->paginate(10);
    }else{
        //$tasks = Task::where('user_id',\Auth::id())->get();
        // $tasks = DB::table('tasks')
        // ->join('types','tasks.type_id',"=",'types.id')
        // ->join('users','tasks.user_id',"=",'users.id')
        // ->select(
        //     'tasks.*',
        //     'types.name as type_name',
        //     'users.username as username'
        // )
        // ->where('user_id',\Auth::id())
        // ->get();
        
        $tasks =Task::where('user_id',\Auth::id())
        			->taskAll('desc')->paginate(10);
    }
    // $tasks = Task::all();
    return view('report',compact('tasks','types'));
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
            'type_id' => 'required',
            'name' => 'required|max:5',
            'status' => 'required'
    
        ];
        $messageError = [
            'type_id.required' => 'เลือกประเภทงาน',
            'name.required' => 'ใส่ชื่องาน',
            'name.max' => 'กรอกได้ไม่เกิน 5 ตัวอักษร'
        ];
    
  
        $request->validate($validate,$messageError);
        $task = new \App\Task();
        $task->type_id = $request->input('type_id');
        $task->name = $request->input('name');
        $task->detail = $request->input('detail');
        $user_id = \Auth::id();
        $task->user_id = $user_id;
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
        $types = \App\Type::all();

        $role = \Auth::user()->roles()->where(function($query){
            $query->where('role_id',1)->orwhere('role_id',2);  
        })->first();
        
        if(!empty($role)){
            //$tasks = Task::all();
            $tasks = DB::table('tasks')
                            ->join('types','tasks.type_id',"=",'types.id')
                            ->join('users','tasks.user_id',"=",'users.id')
                            ->select(
                                'tasks.*',
                                'types.name as type_name',
                                'users.username as username'
                            )
                            ->get();
            //return $tasks;
        }else{
            //$tasks = Task::where('user_id',\Auth::id())->get();
            $tasks = DB::table('tasks')
            ->join('types','tasks.type_id',"=",'types.id')
            ->join('users','tasks.user_id',"=",'users.id')
            ->select(
                'tasks.*',
                'types.name as type_name',
                'users.username as username'
            )
            ->where('user_id',\Auth::id())
            ->get();
        }

         return view('report')->with(['task' => $task,'tasks' => $tasks,'types' => $types]);  
       
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

        $tasks = Task::find($id)->update($request->all());
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
