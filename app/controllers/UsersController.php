<?php

class UsersController extends BaseController {
    public function addUser()
    {
        $rules = array(
            'username'  => 'required|alpha_num|min:8|max:20|unique:users',
            'password'  => 'min:8',
            'password2' => 'same:password',
            'email'     => 'required|email|unique:users',
        );
        $validator = Validator::make(Input::all(), $rules);
        
        if ($validator->fails()) {
            Session::flash('flashError', 'You did not fill out the form correctly.');
            return View::make('users.add-user')->with('heading', 'Register');
        }

        $userArray = array(
            'username' => Input::get('username'),
            'password' => Hash::make(Input::get('password')),
            'email'    => Input::get('email'),
        );

        $user = User::create($userArray);

        if ($user->save()) {
            Session::flash('flashSuccess', 'You have been registered. Please notify an Administrator.');
            return Redirect::to('/');
        }

        Session::flash('flashError', 'The user account was not saved. Please notify an Administrator');
        return Redirect::to('/');
    }

    public function attemptLogin()
    {
        $remember = false;
        $user = array(
            'username' => Input::get('username'),
            'password' => Input::get('password'),
            'active'   => 1,
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
            'heading' => 'Login',
        );

        return View::make('users.login')->with($viewData);
    }

    public function showProfile()
    {
        return "Profile";
    }

    public function showRegistrationForm()
    {
        $viewData = array('heading' => 'Register');

        return View::make('users.add-user')->with($viewData);
    }
}
