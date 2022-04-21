@include('Student')
@extends('layouts.studentlayout')
  <div class="center">
        <h1 class="text-center">Return Book</h1>
  <form action="/return/{{$issue->id}}" method ="post">
  {!! csrf_field() !!}
      
        <div class="form-group">
          
            <input type="date" name="return_date" class="form-control"required >
            <span></span>
            <span class="text-danger">
            @php
            foreach ($errors->get('Returnday') as $message) {
             echo $message;
            }
            @endphp
            </span>
            <!-- <small id="helpId" class="text-muted">Help text</small> -->
        </div>
            <!-- <small id="helpId" class="text-muted">Help text</small> -->
            <button>Return</button>
       
   
</form>
</div>
