<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Type;

class TypesController extends Controller
{
	public function index()
    {
    	return view('create_type');
    }

    public function create()
    {

	    $type = request()->all();

	    Type::create($type);
	    return back()->with('success','Created Successfully !!');

    }
}
