@include('admin')
@extends('layouts.studentlayout')

  <div class="center">
        <h1 class="text-center">Edit Book</h1>
      <a href="/book/view">Back</a>
  <form action="/book/update/{{$book->b_id}}" method ="post">
  {!! csrf_field() !!}
        <div class="center">
        <h1 class="text-center">Edit Book</h1>
        <div class="form-group">
            
            <input type="text" name="name" id =""  aria-describedby="helpId" required value="{{$book->name}}">
            <span></span>
            <label for="">BookName</label>
            <span class="text-danger">
            @php
            foreach ($errors->get('name') as $message) {
             echo $message;
            }
            @endphp
            </span>
            <!-- <small id="helpId" class="text-muted">Help text</small> -->
        </div>
        <div class="form-group">
          
            <input type="text" name="author" id ="" aria-describedby="helpId" required value="{{$book->author}}">
            <span></span>
            <label for="">Author</label>
            <span class="text-danger">
            @php

          foreach ($errors->get('author') as $message) {

            echo $message;

           }

           @endphp
            </span>
            <!-- <small id="helpId" class="text-muted">Help text</small> -->
        </div>
        <div class="form-group">
            <input type="text" name="category" id ="" aria-describedby="helpId" required value="{{$book->category}}">
            <span></span>
            <label for="">Category</label>
            <span class="text-danger">
            @php

          foreach ($errors->get('category') as $message) {

            echo $message;

           }

           @endphp
            </span>
        </div>
        <div class="form-group">
            <input type="text" name="publisher" id =""  aria-describedby="helpId" required value="{{$book->publisher}}">
            <span></span>
            <label for="">Publisher</label>
            <span class="text-danger">
            @php
          foreach ($errors->get('publisher') as $message) {
            echo $message;
          }
           @endphp
          </span>    
        </div>
        <button>
            submit
        </button>
</form>
</div>
