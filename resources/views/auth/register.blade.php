@extends('layouts.master')
@section('pageLevelCss')
    <link src="<% asset('static/app/css/auth/main.css') %>" rel="stylesheet">
@stop
@section('pageLevelJs')
    <script type="text/javascript" src="<% asset('static/app/js/auth/main.js') %>"></script>@stop
@section('title')
    Source Cheetah
@stop

@section('pageContent')
    <div class="container">
        <nav>
            <ul class="nav nav-pills pull-right">
                <li role="presentation" class="active"><a href="#">Home</a></li>
                <li role="presentation"><a href="#">About</a></li>
                <li role="presentation"><a href="#">Contact</a></li>
                <a class="navbar-brand" href="#">Source Cheetah</a>
            </ul>
        </nav>
    </div>
    <div class="container">
        <form class="form-signin" method="post" action="<% asset('auth/register') %>">
            <%% csrf_field() %%>
            <h2 class="form-signin-heading">Sign Up</h2>
            <label for="inputName" class="sr-only">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name" required autofocus>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <label for="confirmPassword" class="sr-only">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirm" required>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        </form>
    </div>
@stop
