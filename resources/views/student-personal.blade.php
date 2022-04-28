@include('Student')
@extends('layouts.studentviewlayout')
  <div class="container">
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
                      <th>{{$data->s_id}}</th>
                      <th>{{$data->name}}</th>
                      <th>{{$data->email}}</th>
                      <th>{{$data->phonenumber}}</th>
                      <th>{{$data->Rollnumber}}</th>     
                  </tr>
                  @endforeach
              </tbody>
          </table>
