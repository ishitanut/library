@include('Student')
@extends('layouts.studentviewlayout')
  <table class="styled-table">
              <thead>
                  <tr>
                    <th>S.no</th>
                      <th>Name</th>
                      <th>Email</th> 
                      <th>Phone Number</th>
                      <th>Roll Number</th> 
                  </tr>
              </thead>
              <tbody id="myTable">
                  @foreach($student as $data)
                  <tr>
                      <td>{{$data->s_id}}
                      <td>{{$data->name}}</td>
                      <td>{{$data->email}}</td>
                      <td>{{$data->phonenumber}}</td>
                      <td>{{$data->Rollnumber}}</td>     
                  </tr>
                  @endforeach
              </tbody>
          </table>
