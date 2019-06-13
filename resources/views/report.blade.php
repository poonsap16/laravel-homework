@extends('layouts.app')

@section('title','Report Form')

@section('content')

<div class="container" align="center">
<div><h2>Report IT Support</h2></div></br>

<table class="table">
  <thead>
    <tr>
        <th scope="col">ลำดับ</th>
        <th scope="col">กลุ่มงาน</th>
        <th scope="col">ชื่อผู้ใช้งาน</th>
        <th scope="col">รายละเอียดงาน</th>
        <th scope="col">สถานะงาน</th>
    </tr>
  </thead>
  <tbody>
    @foreach($tasks as $task)
    <tr>    
        <th>{{ $task->id }}</th>
        <th>{{ $task->type }}</th>
        <th>{{ $task->name }}</th>
        <th>{{ $task->detail }}</th>
        <!-- <th>{{ $task->completed }}</th> -->
        <th> {{ $task->completed == 0 ? 'Ongoing' : 'Completed' }}</th>
      
        <th>
        <!-- @if( $task->completed == 0 )
          <div class = "row">
            <div class="col-sm-8">
              <button class="btn btn-danger btn-sm btn-block">Complete Job</button>
            </div>
          </div>
        @endif -->
          <form id = "complete-{{ $task->id }}" action="/tasks/{{ $task->id }}" method = "post">
            @csrf
            @method('patch')
            <input type="hidden" name ="completed" value = "1">
          </form>
          @if(!$task->completed)
            <button class="btn btn-success btn-sm"
            onclick="document.getElementById('complete-{{ $task->id }}').submit()"
            >Complete Job</button>
          @endif
        </th>
    </tr>
    @endforeach
  </tbody> 
</table>
</div>



@endsection