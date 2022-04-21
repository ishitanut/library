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
  <form class ="row g-3" action="{{url('/')}}/publish" method="POST">
        {{ csrf_field() }}
      <div class="container">
          <a href="/publish/create">Add</a>
          <table class="table">
              
              <thead>
                  <tr>
                      <th>S.no</th>
                      <th>Publisher</th>
                      <th>Delete</th>
                      <th>Edit</th>

                  </tr>
              </thead>
              <tbody>
                  @foreach($publishers as $publisher)
                  <tr>
                      
                      <td>{{$publisher->id}}</td>
                      <td>{{$publisher->name}}</td>
                
                      <td>
                    <a href="/publish/delete/{{$publisher->id}}"><button type="button" class="btn btn-primary">Delete</button></td></a>
                   <td> <a href="/publish/edit/{{$publisher->id}}"><button type="button" class="btn btn-primary">Edit</button></td></a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
                       </form>
                       <div class="row">{{$publishers->links()}}</div>;
      <div class="row">{{$publishers->currentPage()}}</div>

  </body>
</html>