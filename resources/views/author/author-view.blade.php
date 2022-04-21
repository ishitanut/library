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
  <form class ="row g-3" action="{{url('/')}}/auth" method="POST">
        {{ csrf_field() }}
      <div class="container">
          <a href="/auth/create">Add</a>
          <table class="table">
              
              <thead>
                  <tr>
                      <th>S.no</th>
                      <th>Author</th>
                      <th>Delete</th>
                      <th>Edit</th>

                  </tr>
              </thead>
              <tbody>
                  @foreach($authors as $author)
                  <tr>
                      
                      <td>{{$author->id}}</td>
                      <td>{{$author->name}}</td>
                
                      <td>
                    <a href="/auth/delete/{{$author->id}}"><button type="button" class="btn btn-primary">Delete</button></td></a>
                   <td> <a href="/auth/edit/{{$author->id}}"><button type="button" class="btn btn-primary">Edit</button></td></a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
                       </form>
                       <div class="row">{{$authors->links()}}</div>;
      <div class="row">{{$authors->currentPage()}}</div>

  </body>
</html>