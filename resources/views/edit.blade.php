@extends('layouts.studentlayout')

      <div class="center">
      <a href="/student/view">Back</a>
        <h1 class="text-center">Edit Student</h1>
  <form action="/student/update/{{$student->s_id}}" method ="post">
  {!! csrf_field() !!}
         <div class="form-group">
            <input type="text" name="name" id ="name" aria-describedby="helpId" required value="{{$student->name}}">
            <span></span>
            <label>Name</label>
            <span class="text-danger">
            @php
            foreach ($errors->get('name') as $message) {
             echo $message;
            }
            @endphp
            </span>
           
        </div>
        <div class="form-group">
           
        <input type="text" name="Rollnumber" id ="" aria-describedby="helpId" required value="{{$student->Rollnumber}}"> 
        <span></span>
        <label>Rollnumber</label>
            <span class="text-danger">
            @php

          foreach ($errors->get('rollnumber') as $message) {

            echo $message;

           }

           @endphp
            </span>
        </div>
     
        <div class="form-group">
            <input type="text" name="phonenumber" id ="" aria-describedby="helpId" required value="{{$student->phonenumber}}">
            <span></span>
            <label>Phone Number</label>
            <span class="text-danger">
            @php

          foreach ($errors->get('number') as $message) {

            echo $message;

           }

           @endphp
            </span>
        </div>
        <button >
            submit
          </button>
</form>
</div>
