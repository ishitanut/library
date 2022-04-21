@include('admin')
@extends('layouts.studentviewlayout')
        {{ csrf_field() }}
      <div class="container">
          <a href="/return-book">Return</a>
              <input  style="background-color:light-green;" class="form-control" id="myInput" type="text" placeholder="Search..">
            <br>
    <table class="styled-table">
              <thead>
                  <tr>
                    <th>S.no</th>
                      <th>Book Name</th>
                      <th>Author</th>
                      <th>Category</th>
                      <th>Publisher</th>
                      <th>Status</th> 
                      <th>Delete</th>
                      <th>Edit</th>
                  </tr>
              </thead>
              <tbody id="myTable">
                  @foreach($books as $book)
                  <tr>
                      <td>{{$book->b_id}}
                      <td>{{$book->name}}</td>
                      <td>{{$book->Author}}</td>
                      <td>{{$book->category}}</td>
                      <td>{{$book->publisher}}</td>
                      <td>@if ($book->status == 'Y')
                                            <span class='badge badge-success'>Available</span>
                                        @else
                                            <span class='badge badge-danger'>Issued</span>
                                        @endif</td>
</td>
                         
                      
                      <td><a href="/book/delete/{{$book->b_id}}"><button>Delete</button></td></a>
                  <td><a href="/book/edit/{{$book->b_id}}"><button >Edit</button></td></a>
                    
                  </tr>
                  @endforeach
              </tbody>
          </table>
      <div class="row">{{$books->links()}}</div>
      </div>
      <script>
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
  </script>            