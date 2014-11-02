@extends('layouts.main')

@section('content')
      <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
          {{ Form::open(array('method' => 'post', 'action' => 'UsersController@addUser')) }}
            <div class="form-group {{ $errors->has('email') ? 'has-error' : 'has-success' }}">
              <label for="email" class="col-xs-12">Email</label>
              <div class="col-xs-12">
                <input type="text" name="email" id="email" class="form-control" value="{{ Input::old('email') }}">
                {{ $errors->first('email', '<p>:message</p>') }}
              </div>
            </div>
            <div class="form-group {{ $errors->has('username') ? 'has-error' : 'has-success' }}">
              <label for="username" class="col-xs-12">Username</label>
              <div class="col-xs-12">
                <input type="text" name="username" id="username" class="form-control" placeholder="At least 6 characters" value="{{ Input::old('username') }}">
                {{ $errors->first('username', '<p>:message</p>') }}
              </div>
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : 'has-success' }}">
              <label for="password" class="col-xs-12">Password</label>
              <div class="col-xs-12">
                <input type="password" name="password" id="password" class="form-control" placeholder="At least 8 characters">
                {{ $errors->first('password', '<p>:message</p>') }}
              </div>
            </div>
            <div class="form-group {{ $errors->has('password2') ? 'has-error' : 'has-success' }}">
              <label for="password2" class="col-xs-12">Confirm Password</label>
              <div class="col-xs-12">
                <input type="password" name="password2" id="password2" class="form-control">
                {{ $errors->first('password2', '<p>:message</p>') }}
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12">
                <button type="submit" class="btn btn-primary">Register</button>
              </div>
            </div>
          {{ Form::close() }}
        </div>
      </div>
@stop
