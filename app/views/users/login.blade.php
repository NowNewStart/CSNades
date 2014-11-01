@extends('layouts.main')

@section('content')
    <div class="row">
      <div class="col-lg-4 col-lg-offset-4">
        {{ Form::open(array('method' => 'post', 'action' => 'UsersController@showLoginForm')) }}
          <div class="form-group">
            <label for="username" class="col-sm-12">Username</label>
            <div class="col-sm-12">
              <input id="username" type="text" name="username" placeholder="Username" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-sm-12">Password</label>
            <div class="col-sm-12">
              <input id="password" type="password" name="password" placeholder="Password" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="remember" value="1">
                    Remember Me
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary">Login</button>
              <a class="pull-right" href="{{ action('UsersController@showRegistrationForm') }}">Don't have an account? Register Now!</a>
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">

            </div>
          </div>
        {{ Form::close() }}
      </div>
    </div>
@stop
