<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
  <div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="admin-heading">Add Publisher</h2>
            </div>
            <div class="offset-md-7 col-md-2">
        
            </div>
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <form action="{{url('/')}}/publisher" method ="post">
                  {!! csrf_field() !!}
                    <div class="form-group">
                        <label>Publisher Name</label>
                        <input type="text" class="form-control" placeholder="Publisher Name" name="name" value="{{ old('name') }}" required>
                        @php
            foreach ($errors->get('Publishername') as $message) {
             echo $message;
            }
            @endphp
                    </div>
                    <button class="btn-btn-primary">
            submit
        </button>
                </form>
            </div>
        </div>
    </div>
</div>
  </body>
</html>