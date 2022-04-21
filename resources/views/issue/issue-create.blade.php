@include('Student')
@extends('layouts.studentlayout')
@section('title','Issue')

  <body>
  <div class="center">
        <h1 class="text-center">Book Issue</h1>
  <form action="{{url('/')}}/issue" method ="post">
  {!! csrf_field() !!}
        <div class="form-group">
            <select class="form-control" name="s_id" required>
                                <option value=""></option>
                                @foreach ($students as $student)
                                    <option value='{{ $student->s_id }}'>{{ $student->s_id}}</option>
                                @endforeach
                            </select>
                            <span></span>
                            <label>Student ID</label>
            <span class="text-danger">
            @php
            foreach ($errors->get('Student name') as $message) {
             echo $message;
            }
            @endphp
            </span>
            <!-- <small id="helpId" class="text-muted">Help text</small> -->
        </div>
        <div class="form-group">
            <select class="form-control" name="b_id" required>
                                <option value=""></option>
                                @foreach ($books as $book)
                                @if ($book->status!="N")
                                    <option value='{{ $book->b_id }}'>{{ $book->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <span></span>
                            <label>Book Name</label>
            <span class="text-danger">
            @php
            foreach ($errors->get('Book name') as $message) {
             echo $message;
            }
            @endphp
            </span>
            <!-- <small id="helpId" class="text-muted">Help text</small> -->
        </div>
       
        <button>
            Issue
        </button>
</form>
</div>
  </body>
</html>