@extends('layouts.studentlayout')

  <div class="center">
        <h1 >Admin Login</h1>
  <form action="{{url('/')}}/admin" method ="post">
  {!! csrf_field() !!}
        <div class="form-group">  
            <input type="text" name="name" id =""  aria-describedby="helpId" value="{{old('name')}}">
            <label for="">Name</label>
            <span class="text-danger">
            @php
            foreach ($errors->get('name') as $message) {
             echo $message;
            }
            @endphp
            </span>
          </div>
            <!-- <small id="helpId" class="text-muted">Help text</small> -->
        <div class="form-group">
            <input type="password" name="password" id ="" aria-describedby="helpId">
            <label for="">Password</label>
            <span class="text-danger">
            @php

foreach ($errors->get('password') as $message) {

  echo $message;

 }

 @endphp
            </span>
            <!-- <small id="helpId" class="text-muted">Help text</small> -->
            <!-- <small id="helpId" class="text-muted">Help text</small> -->
        </div>
        <button >
            Login
        </button>
        <div class="signup_link">Not a Admin?<a href="/register">Student</a></div>
</form>
    </div>