@include('Student')
@extends('layouts.studentlayout')
  <div class="center">
        <h1>Reissue</h1>
  <form action="/reissue/{{$issue->id}}" method ="post">
  {!! csrf_field() !!}
       
         <div class="form-group">
           
            <input type="date" name="return_date"required>
            <span></span>
            <span class="text-danger">
            @php
            foreach ($errors->get('Returndate') as $message) {
             echo $message;
            }
            @endphp
            </span>        
        </div>
        <button>
            Reissue
          </button>
  
</form>
</div>