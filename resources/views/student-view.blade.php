@include('admin')
@extends('layouts.studentviewlayout')
  
        {{ csrf_field() }}
      <div class="container">
          <!-- <a href="/student/create">Add</a> -->
              <input  style="background-color:light-green;" class="form-control" id="myInput" type="text" placeholder="Search..">
            <br>
    <table class="styled-table">
              <thead>
                  <tr>
                    <th>S.no</th>
                      <th>Name</th>
                      <th>Roll Number</th>
                      <th>Gender</th>
                      <th>Phone Number</th>
                      <th>Email</th> 
                      <th>Delete</th>
                      <th>Edit</th>
                  </tr>
              </thead>
              <tbody id="myTable">
                  @foreach($students as $student)
                  <tr>
                      <td>{{$student->s_id}}</td>
                      <td>{{$student->name}}</td>
                      <td>{{$student->Rollnumber}}</td>
                      <td>
                          @if($student->gender=="M")
                          Male
                          @elseif($student->gender=="F")
                          Female
                          @else
                          Other
                          @endif
                          
                      </td>
                      <td>{{$student->phonenumber}}</td>
                      <td>{{$student->email}}</td>
                      <!-- <td><a href="/student/delete/{{$student->s_id}}"><button>Delete</button></td></a> -->
                      <td>
                           <form action="/student/delete/{{$student->s_id}}" method="POST">
                             {{csrf_field()}}
                             {{method_field('DELETE')}}
                             <input type="hidden" name="s_id">
                             <button type="submit">Delete</button>
                           </form>
                      </td>
                  <td><a href="/student/edit/{{$student->s_id}}"><button >Edit</button></td></a>
                    
                  </tr>
                  @endforeach
              </tbody>
          </table>
      <div class="row">{{$students->links()}}</div>;
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
  </body>
</html>