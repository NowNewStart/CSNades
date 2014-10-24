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
            return Redirect::intended();
        }

        $viewData = array(
            'heading'     => 'Login',
            'loginFailed' => true,
        );

        return View::make('users.login')->with($viewData);
    }

    public function logout()
    {
        Auth::logout();
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
