


<div class="container">
@if(isset($task))
    <form action="{{url('/tasks',$task->id)}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PATCH"> 
@else
    <form action="save" method="post" enctype="multipart/form-data">
@endif
    <input type="hidden" name="_token" value="{{ csrf_token() }}"> </br> 

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
                <select class="form-control" id="type_id" name="type_id">
                  <option value="" hidden select>เลือกประเภทงาน</option>
                  @foreach($types as $type)
                    @if(old('type_id', isset($task) ? $task->type_id : '') == $type['id'])
                      <option value="{{$type['id']}}" selected>{{$type['name']}}</option>
                    @else
                      <option value="{{$type['id']}}">{{$type['name']}}</option>
                    @endif
                  @endforeach

                </select>
                @error('type')
                <small class = "form-text text-danger">{{ $message}} </small>
                @enderror
            </div>
        </div>

    <div class="form-group row">
      <label for="detail" class="col-sm-2 col-form-label"><b>Job Detail</b></label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="detail" name="detail"  value="{{old('detail',isset($task) ? $task -> detail:'')}}">
      </div>
    </div>

    <div class="form-group row">
      <label for="file" class="col-sm-2 col-form-label"><b>File Upload</b></label>
      <div class="col-sm-10">
        <input type="file" class="form-control" id="file" name="file_upload">
      </div>
    </div>

    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label"><b>User</b></label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" value="{{old('name',isset($task)?$task->name:'')}}">
        @error('name')
                <small class = "form-text text-danger">{{ $message}} </small>
                @enderror
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




