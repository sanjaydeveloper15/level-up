<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>{{config('app.name')}}</title>
      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
      <!-- bootstrap 4 css -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
      <!-- Styles -->
      <style>
         html, body {
         background-color: #fff;
         color: #636b6f;
         font-family: 'Nunito', sans-serif;
         font-weight: 200;
         height: 100vh;
         margin: 0;
         }
         .full-height {
         height: 100vh;
         }
         .flex-center {
         align-items: center;
         display: flex;
         justify-content: center;
         }
         .position-ref {
         position: relative;
         }
         .top-right {
         position: absolute;
         right: 10px;
         top: 18px;
         }
         .content {
         text-align: center;
         }
         .title {
         font-size: 84px;
         }
         .links > a {
         color: #636b6f;
         padding: 0 25px;
         font-size: 13px;
         font-weight: 600;
         letter-spacing: .1rem;
         text-decoration: none;
         text-transform: uppercase;
         }
         .m-b-md {
         margin-bottom: 30px;
         }
      </style>
   </head>
   <body>
      <div class="flex-center position-ref full-height">
         @if (Route::has('login'))
         <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
         </div>
         @endif
         <div class="content">
            <div class="title m-b-md">
               {{config('app.name')}}
            </div>
            <a class="btn btn-info" onclick="doLogin()">Login To Chat</a>
            {{-- 
            <div class="links">
               <a href="https://laravel.com/docs">Docs</a>
               <a href="https://laracasts.com">Laracasts</a>
               <a href="https://laravel-news.com">News</a>
               <a href="https://blog.laravel.com">Blog</a>
               <a href="https://nova.laravel.com">Nova</a>
               <a href="https://forge.laravel.com">Forge</a>
               <a href="https://vapor.laravel.com">Vapor</a>
               <a href="https://github.com/laravel/laravel">GitHub</a>
            </div>
            --}}
         </div>
      </div>
   </body>
</html>
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            {{-- 
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            --}}
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="global-container">
               <div class="card login-form">
                  <div class="card-body">
                     <h3 class="card-title text-center">Log in to {{config('app.name')}}</h3>
                     <div class="card-text">
                        <!--
                           <div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
                        <form id="login-form">
                           <!-- to error: add class "has-danger" -->
                           <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" name="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputPassword1">Password</label>
                              {{-- <a href="#" style="float:right;font-size:12px;">Forgot password?</a> --}}
                              <input type="password" name="password" class="form-control form-control-sm" id="exampleInputPassword1">
                           </div>
                           <input type="submit" name="submit" class="btn btn-primary" value="Sign In">
                           <div class="sign-up">
                              Don't have an account? <a style="cursor: pointer;" onclick="doSignup()">Create One</a>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            {{-- 
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            --}}
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="card">
               <h2 class="card-title text-center">Register to {{config('app.name')}}</h2>
               <div class="card-body py-md-4">
                  <form _lpchecked="1" id="register-form">
                     <div class="form-group">
                        <input type="text" class="form-control" name="first_name" placeholder="First Name">
                     </div>
                     <div class="form-group">
                        <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                     </div>
                     <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                     </div>
                     <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                     </div>
                     {{-- <div class="form-group">
                        <input type="password" class="form-control" name="confirm_password" placeholder="confirm-password">
                     </div> --}}
                     <div class="d-flex flex-row align-items-center justify-content-between">
                        <a style="cursor:pointer;" onclick="doLogin()">Login</a>
                        <input type="submit" name="submit" class="btn btn-primary" value="Create Account">
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Sweetalert JS -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Bootstrap JS -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
<!-- Custom JS -->
<script type="text/javascript">
   function doLogin(){
      emptyInputs();
      $(`#registerModal`).modal('hide');
      $(`#loginModal`).modal(`show`);
   }
   
   function doSignup(){
      emptyInputs();
      $(`#loginModal`).modal('hide');
      $(`#registerModal`).modal('show');
   }

   $(`#register-form`).submit(function(e){
        let token = '{{csrf_token()}}';
        //console.log(token);
        $.ajax({
            type: 'post',
            url:"{{config('app.url')}}api/user/signup",
            data: new FormData(this),
            //headers: {'X-CSRF-Token': `${token}`},
            processData: false,
            contentType: false,
            success: function(res){
               Swal.fire(res.message);
               emptyInputs();
               doLogin();
               // console.clear();
               // console.log(res);
            }
        });
        e.preventDefault();
   });

   function emptyInputs(delay=500){
      setTimeout(function(){
         $(`.form-control`).val('');
      },delay);   
   }

   emptyInputs(3000);

   $('#login-form').submit(function(e){
      $.ajax({
         type: 'get',
         url:"{{route('login_request')}}",
         data: {'email': $(`#login-form input[name='email']`).val(), 'password': btoa($(`#login-form input[name='password']`).val())},
         success: function(res){
            Swal.fire(res.message);
            if(res.code==3){
               setTimeout(function(){
                  window.location.href = "{{route('global')}}";
               },2000)
            }
            //emptyInputs();
         }
      });
      e.preventDefault();
   });
   
</script>