<?php

class UsersController extends BaseController {
    public function attemptLogin()
    {
        $user = array(
            'username' => Input::get('username'),
            'password' => Input::get('password'),
        );

        if (Auth::attempt($user, true)) {
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
        return Redirect::home();
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
}
