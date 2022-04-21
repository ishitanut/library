@include('Admin')
@extends('layouts.studentlayout')

  <div class="center">
        <h1>Add Book</h1>
  <form action="{{url('/')}}/bookentry" method ="post">
  {!! csrf_field() !!}
        <div class="form-group">
            <input type="text" name="name" id =""  aria-describedby="helpId" value="{{old('name')}}">
            <span></span>
            <label for="">Book Name</label>
            <span class="text-danger">
            @php
            foreach ($errors->get('Bookname') as $message) {
             echo $message;
            }
            @endphp
            </span>
            <!-- <small id="helpId" class="text-muted">Help text</small> -->
        </div>
        <div class="form-group">          
            <input type="text" name="category" id =""  aria-describedby="helpId" value="{{old('category')}}"> 
            <span></span>
            <label for="">Category</label>  
            <span class="text-danger">
            @php

          foreach ($errors->get('category') as $message) {

            echo $message;

           }

           @endphp
            </span>
            <!-- <small id="helpId" class="text-muted">Help text</small> -->
        </div>
        <div class="form-group">
            <input type="text" name="author" id ="" aria-describedby="helpId" value="{{old('author')}}">
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
            <input type="text" name="publisher" id ="" aria-describedby="helpId" value="{{old('publisher')}}">
            <span></span>
            <label for="">Publisher</label>
            <span class="text-danger">
            @php

          foreach ($errors->get('publisher') as $message) {

            echo $message;

           }

           @endphp
            </span>
            <!-- <small id="helpId" class="text-muted">Help text</small> -->
        </div>
        <button>
            submit
        </button>
</form>
</div>
