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
  <form class ="row g-3" action="{{url('/')}}/cat" method="POST">
        {{ csrf_field() }}
      <div class="container">
          <a href="/cat/create">Add</a>
          <table class="table">
              
              <thead>
                  <tr>
                      <th>S.no</th>
                      <th>Category</th>
                      <th>Delete</th>
                      <th>Edit</th>

                  </tr>
              </thead>
              <tbody>
                  @foreach($categorys as $category)
                  <tr>
                      
                      <td>{{$category->id}}</td>
                      <td>{{$category->name}}</td>
                
                      <td>
                    <a href="/cat/delete/{{$category->id}}"><button type="button" class="btn btn-primary">Delete</button></td></a>
                   <td> <a href="/cat/edit/{{$category->id}}"><button type="button" class="btn btn-primary">Edit</button></td></a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
                       </form>
                       <div class="row">{{$categorys->links()}}</div>;
      <div class="row">{{$categorys->currentPage()}}</div>

  </body>
</html>