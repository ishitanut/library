@include('Student')
@extends('layouts.studentviewlayout') 
      <div class="container">
          <a href="/return">Return</a>
              <input  style="background-color:light-green;" class="form-control" id="myInput" type="text" placeholder="Search..">
            <br>
    <table class="styled-table">
              <thead>
                  <tr>
                      <th>S.no</th>
                      <th>Book Name</th>
                      <th>Phone Number</th>
                      <th>Email</th>
                      <th>Issue_date</th> 
                      <th>Return Date</th>
                      <th>Status</th>
                      <th>Reissue</th>
                      <th>Return</th>
                  </tr>
              </thead>
              <tbody id="myTable">
                  @foreach($data as $issue)
                  <tr>
                      <td>{{$issue->id}}
                      <td>{{$issue->name}}</td>
                      <td>{{$issue->phonenumber}}</td>
                      <td>{{$issue->email}}</td>
                      <td>{{date("d.m.y",$issue->issue_date)}}</td>
                      <td>{{date("d.m.y",$issue->return_date)}}</td>
                      <td> @if ($issue->issue_status == 'Y')
                                            <span class='badge badge-success'>Returned</span>
                                        @else
                                            <span class='badge badge-danger'>Issued</span>
                                        @endif
                                      </td>
                      <td><a href="/reissue/{{$issue->id}}"><button>Reissue</button></td></a>        
                      <td><a href="/return/{{$issue->id}}"><button>Return</button></td></a>                 
                  </tr>
                  @endforeach
              </tbody>
          </table>
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
