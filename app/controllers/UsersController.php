<?php

class UsersController extends BaseController {
    public function attemptLogin()
    {
        $remember = false;
        $user = array(
            'username' => Input::get('username'),
            'password' => Input::get('password'),
        );

        if (Input::get('remember')) {
            $remember = true;
        }

        if (Auth::attempt($user, $remember)) {
            Session::flash('flashSuccess', 'You have been logged in!');
            return Redirect::intended();
        }

        $viewData = array(
            'heading'     => 'Login',
            'loginFailed' => true,
        );

        Session::flash('flashDanger', 'Invalid username and password.');
        return View::make('users.login')->with($viewData);
    }

    public function logout()
    {
        Auth::logout();
        Session::flash('flashInfo', 'You have been logged out.');
        return Redirect::action('UsersController@showLoginForm');
    }

    public function showLoginForm()
    {
        if (Auth::check()) {
            return Redirect::home();
        }

        $viewData = array(
            'heading'     => 'Login',
            'loginFailed' => false,
        );

        return View::make('users.login')->with($viewData);
    }

    public function showProfile()
    {
        return "Profile";
    }
}
