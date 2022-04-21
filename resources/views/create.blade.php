<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
      <a href="/student/view">Back</a>
  <form action="{{url('/')}}/register" method ="post">
  {!! csrf_field() !!}
        <div class="container">
        <h1 class="text-center">Student Registeration</h1>
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" id =""  value="{{old('name')}}">
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
            <label for="">Rollnumber</label>
            <input type="text" name="rollnumber" id =""  value="{{old('rollnumber')}}">
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
            <label for="">Gender</label>
            <input type="text" name="gender" id ="" value="{{old('gender')}}">
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
            <label for="">Phone Number</label>
            <input type="text" name="number" id =""  value="{{old('number')}}">
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
            <label for="">Email</label>
            <input type="email" name="email" id ="" class="form-control" placeholder="Email" aria-describedby="helpId" value="{{old('email')}}">
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
            <label for="">Password</label>
            <input type="password" name="password" id ="" class="form-control" placeholder="Password" aria-describedby="helpId">
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
            <label for="">Confirm Password</label>
            <input type="password" name="password_confirmation" id ="" class="form-control" placeholder="Password" aria-describedby="helpId">
            <span class="text-danger">
            @php

foreach ($errors->get('password_confirmation') as $message) {

  echo $message;

 }
 @endphp
            </span>
            <!-- <small id="helpId" class="text-muted">Help text</small> -->
        </div>
        <button class="btn-btn-primary">
            submit
        </button>
    </div>
</form>
  </body>
</html>