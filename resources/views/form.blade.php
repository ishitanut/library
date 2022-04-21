@extends('layouts.studentlayout')
  <body>
  <div class="center">
        <h1 >Student Registeration</h1>
  <form action="{{url('/')}}/register" method ="post">
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
            <!-- <small id="helpId" class="text-muted">Help text</small> -->
        </div>
        <div class="form-group">
            <input type="text" name="Rollnumber" id =""  aria-describedby="helpId" value="{{old('Rollnumber')}}">
            <label for="">Rollnumber</label>
            <span class="text-danger">
            @php

          foreach ($errors->get('rollnumber') as $message) {

            echo $message;

           }

           @endphp
            </span>
            <!-- <small id="helpId" class="text-muted">Help text</small> -->
        </div>
        <div class="form-group">
            <input type="text" name="gender" id =""  aria-describedby="helpId" value="{{old('gender')}}">
            <label for="">Gender</label>
            <span class="text-danger">
            @php

          foreach ($errors->get('gender') as $message) {

            echo $message;

           }

           @endphp
            </span>
            <!-- <small id="helpId" class="text-muted">Help text</small> -->
        </div>
        <div class="form-group">
            <input type="text" name="phonenumber" id =""  aria-describedby="helpId" value="{{old('phonenumber')}}">
            <label for="">Phone Number</label>
            <span class="text-danger">
            @php

          foreach ($errors->get('number') as $message) {

            echo $message;

           }

           @endphp
            </span>
            <!-- <small id="helpId" class="text-muted">Help text</small> -->
        </div>
        <div class="form-group">
            <input type="email" name="email" id =""  aria-describedby="helpId" value="{{old('email')}}">
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
            <input type="password" name="password" id =""  aria-describedby="helpId">
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
            <input type="password" name="password_confirmation" id ="" c aria-describedby="helpId">
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
        <button >
            Register
        </button>
        <div class="signup_link">Already a member?<a href="/login">Login</a></div>
        
    
</form>
</div>
  </body>
</html>