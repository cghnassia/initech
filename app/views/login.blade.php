@extends('layout');


@section('head')

{{ HTML::style('css/custom-login.css') }}

@stop


@section('container')
         
<form class="form-signin" role="form" method="POST" action="/login" accept-charset="UTF-8">

    <h2 class="form-signin-heading">Please sign in</h2>

    <div class="alert alert-danger alert-error" id="login-error">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Incorrect Username or Password!</strong> .
    </div>

    <div class="alert alert-success" id="login-success">  
        <a class="close" data-dismiss="alert">×</a>  
        <strong>Authentication Success. You are going to be redirected</strong>
    </div>  

    <input type="text" id="username" class="form-control" name="username" placeholder="Username" autofocus="" required="" />
    <input type="password" id="password" class="form-control" name="password" placeholder="Password" autofocus="" required=""/>
                
    <label class="checkbox">            
        <input type="checkbox" name="remember" value="1" /> Remember Me
    </label>

                
    <button type="submit" name="submit" class="btn btn-primary btn-block">Sign in</button>

</form>

@stop