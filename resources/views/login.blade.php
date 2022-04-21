@extends('layouts.studentlayout')
@section('title','Student Login')
  <div class="center">
  <h1>Student Login</h1>
  <form action="{{url('/')}}/student-personal" method ="post">
  {!! csrf_field() !!}
        <div class="form-group">
            <input type="email" name="email"  aria-describedby="helpId" value="{{old('email')}}">
            <span></span>
            <label for="">Email</label>
            <span class="text-danger">
            @php
            foreach ($errors->get('email') as $message) {
             echo $message;
            }
            @endphp
            </span>
            <!-- <small id="helpId" class="text-muted">Help text</small> -->
          </div>
        <div class="form-group">
 
            <input type="password" name="password" id ="" class="form-control"  aria-describedby="helpId">
            <label for="">Password</label>
            <span class="text-danger">
            @php

foreach ($errors->get('password') as $message) {

  echo $message;

 }

 @endphp
            </span>
            <!-- <small id="helpId" class="text-muted">Help text</small> -->
        </div>
        <div class="form-group">
            <input type="password" name="password_confirmation" id ="" class="form-control"  aria-describedby="helpId">
            <label for="">Confirm Password</label>
            <span class="text-danger">
            @php

foreach ($errors->get('password_confirmation') as $message) {

  echo $message;

 }
 @endphp
            </span>
            <!-- <small id="helpId" class="text-muted">Help text</small> -->
            
        </div>
        <div class="pass"> <a href ="#">Frogot Password?</a></div>
        <button >
            Submit
        </button>
        <div class="signup_link">Not a member?<a href="/register">Register</a></div>

</form>
</div>