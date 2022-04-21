@include('Student')
@
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
      
  <form action="/student-update/{{$student->s_id}}" method ="post">
  {!! csrf_field() !!}
        <div class="container">
        <h1 class="text-center">Student Registeration</h1>
         <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" id ="name" class="form-control" placeholder="Name" aria-describedby="helpId" required>
            <span class="text-danger">
            @php
            foreach ($errors->get('name') as $message) {
             echo $message;
            }
            @endphp
            </span>
           
        </div>
        <div class="form-group">
            <label for="">Rollnumber</label>
        <input type="text" name="Rollnumber" id ="" class="form-control" placeholder="Roll Number" aria-describedby="helpId" required value="{{$student->Rollnumber}}"> 
          
            <span class="text-danger">
            @php

          foreach ($errors->get('rollnumber') as $message) {

            echo $message;

           }

           @endphp
            </span>
        </div>
     
        <div class="form-group">
            <label for="">Phone Number</label>
            <input type="text" name="phonenumber" id ="" class="form-control" placeholder="Phone Number" aria-describedby="helpId" required value="{{$student->phonenumber}}">
          
            <span class="text-danger">
            @php

          foreach ($errors->get('number') as $message) {

            echo $message;

           }

           @endphp
            </span>
           
        </div> 
            <!-- <small id="helpId" class="text-muted">Help text</small> -->
        </div>
        <button type="submit">
            submit
          </button>
    </div>
</form>
  </body>
</html>