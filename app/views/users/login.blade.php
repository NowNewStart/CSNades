@extends('layouts.main')

@section('content')
        <div class="row">
            <div class="col-xs-12">
                {{ Form::open(array('method' => 'post', 'action' => 'UsersController@showLoginForm', 'class' => 'form-horizontal')) }}
                    <div class="form-group">
                        <label for="username" class="col-sm-12">Username</label>
                        <div class="col-sm-3">
                            <input type="text" name="username" placeholder="Username" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-12">Password</label>
                        <div class="col-sm-3">
                            <input type="password" name="password" placeholder="Password" class="form-control">
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
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
            <div class="col-xs-12">
                <a href="{{ action('UsersController@showRegistrationForm') }}">Don't have an account? Click here to register</a>
            </div>
        </div>
@stop