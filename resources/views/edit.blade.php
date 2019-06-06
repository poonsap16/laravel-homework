@extends('layouts.app')

@section('title','Create Task')

@section('content')


<div class="container">

<form action="{{ url('/tasks',$task->id)}}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"> </br> 
    <!-- <input type="hidden" name="_method" value="PUT"> -->
    <input type="hidden" name="_method" value="PATCH">

    @if($message = Session::get('success'))
      <div class="alert alert-success">
        {{$message}}
      </div>
    @endif

    @if($errors->any())
      <div class="alert alert-danger">
        <ul> 
          @foreach($errors->all() as $error)
            <li> {{$error}}</li> 
          @endforeach
        </ul> 
      </div> 
    @endif 

    <div><h2>Case Support Form</h2></div></br>
        <div class="form-group row">
            <label for="type" class="col-sm-2 col-form-label"><b>Job Type</b></label>
            <div class="col-sm-10">
                <select class="form-control" id="type" name="type">
                  <option value="" hidden select>เลือกประเภทงาน</option>
                    <option value="1">Hardware</option>
                    <option value="2">Software</option>
                    <option value="3">Network</option>
                    <option value="4">Virus</option>
                    <option value="5">Consult</option>
                </select>
            </div>
        </div>

    <div class="form-group row">
      <label for="detail" class="col-sm-2 col-form-label"><b>Job Detail</b></label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="detail" name="detail" value="{{old('detail',$task->detail)}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label"><b>User</b></label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" value="{{old('name',$task->name)}}">
      </div>
    </div>

    <fieldset class="form-group">
      <div class="row">
        <legend class="col-form-label col-sm-2 pt-0"><b>Status</b></legend>
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="status1" value="0" checked>
            <label class="form-check-label" for="status1">
              On going
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="status2" value="1">
            <label class="form-check-label" for="status2">
              Complete
            </label>
          </div>
        </div>
      </div>
    </fieldset>
    
    <div class="form-group row">
      <div class="col-sm-4" align="center">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
    

</form>
</div>






@endsection