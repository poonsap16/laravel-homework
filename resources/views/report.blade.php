@extends('layouts.app')

@section('title','Report Form')

@section('content')

@include('_form')
<div class="container" align="center">
<div><h2>Report IT Support</h2></div></br>

<table class="table">
  <thead>
    <tr>
        <th scope="col">ลำดับ</th>
        <th scope="col">กลุ่มงาน</th>
        <th scope="col">ชื่อผู้ใช้งาน</th>
        <th scope="col">รายละเอียดงาน</th>
        <th scope="col">ผู้บันทึก</th>
        <th scope="col">สถานะงาน</th>
        <th scope="col">ยืนยันสถานะ</th>
        <th scope="col">แก้ไข</th>
        <th scope="col">ลบ</th>
    </tr>
  </thead>
  <tbody>
    @foreach($tasks as $task)
    <tr>    
        <th>{{ $task->id }}</th>
        {{-- <th>{{ $task->type->name}}</th> --}}
        <th>{{ $task->type_name }}</th>
        <th>{{ $task->name }}</th>
        <th>{{ $task->detail }}</th>
        {{--<th>{{ $task->user->name }}</th>--}}
        <th>{{ $task->username }}</th>
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
            <button class="btn btn-success"
            onclick="document.getElementById('complete-{{ $task->id }}').submit()"
            >Complete Job</button>
          @endif
        </th>
        <td>
          <a class="btn btn-success" role="button" href="{{url('/tasks',$task->id)}}">Edit</a>
        </td>

        <td>
        <form method="POST" action="{{ url('/tasks', $task->id) }}">
				    {{ csrf_field() }}
				    {{ method_field('DELETE') }}
				    <button class="btn btn-danger" type="submit">Delete</button>
				</form>
        </td>

    </tr>
    @endforeach
  </tbody> 
</table>
</div>

<div class="pagination justify-content-center">
  {{$tasks->links()}}
</div>

@endsection