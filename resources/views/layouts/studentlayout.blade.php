<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
       body{
         margin:0;
         padding:0;
         font-family:montserrat;
         background-color: #328f8a;
  background-image: linear-gradient(45deg,#328f8a,#08ac4b);
         height:90vh;
         overflow:hidden;
       }
    .center{
      position:absolute;
      top:50%;
      left:50%;
      transform:translate(-50%,-50%);
      width:600px;
      background:white;
      border-radius:20px;
       }
       .center h1{
         text-align:center;
         padding:0 0 20px 0;
         border-bottom: 1px solid silver;
         font-style:normal;
         font-weight: 300;
         font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
       }
       .center form{
         padding:0 40px;
         box-sizing :border-box;
       }
       form .form-group{
         position:relative;
         border-bottom:2px solid #adadad;
         margin:30px 0;
       }
       .form-group input{
         width:100%;
         padding:0 5px;
         height: 40px;
         font-size: 16px;
         border: none;
         background: none;
         outline:none;
       }
       .form-group label{
         position:absolute;
         top: 50%;
         left: 5px;
         color:#adadad;
         transform:translateY(-50%);
         font-size:16px;
         pointer-events:none;
         transition:.5s;
       }
       .form-group span::before{
         content:'';
         position:absolute;
         top:40px;
         left:0;
         width:100%;
         height: 2px;
         background: #2691d9;
       }
       .form-group input:focus ~ label,
       .form-group input:valid ~ label
       {
         top :-5px;
         color:#2691d9;
       }
       .from-group input:focus ~ span::before,
       .form-group input:valid ~ span::before{
         width:100%;
       }
       .pass
       {
         margin: -5px 0 20px 5px;
         color:#a6a6a6;
         cursor:pointer;
       }
       .pass:hover{
         text-decoration:underline;
       }
       button
       {
          width:100%;
          height:50px;
          border: 1px solid;
          background-color: #328f8a;
  background-image: linear-gradient(45deg,#328f8a,#08ac4b);
          border-radius:25px;
          font-size:18px;
          color:#e9f4fb;
          font-weight:700;
          cursor:pointer;
          outline:none;
       }
       .signup_link{
         margin:30px 0;
         text-align:center;
         font-size:16px;
         color:#666666;
       }
       .signup_link a{
         color:#2691d9;
         text-decoration:none;
       }
       .signup_link a:hover{
         text-decoration:underline;    
       }
      </style>
  <body>
</body>
</html>

