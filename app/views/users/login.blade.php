@extends('main')

@section('content')
        @if($loginFailed)
        <div class="alert alert-danger"><strong>Login Failed!</strong></div>
        @endif
        {{ Form::open(array('method' => 'post', 'action' => 'UsersController@showLoginForm')) }}
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Username" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <!-- <input type="submit" value="Login" class="btn btn-primary" /> -->
            <button type="submit" class="btn btn-primary">Login</button>
        {{ Form::close() }}
        <!-- <form role="form" method="POST" action="index.php?page=StaffLogin&action=Perform"> -->
        <!-- </form> -->
@stop