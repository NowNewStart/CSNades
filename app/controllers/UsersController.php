<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

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
            Session::flash('flashDanger', 'You did not fill out the form correctly.');
            return View::make('users.add-user')->with('heading', 'Register');
        }

        $userArray = array(
            'username' => Input::get('username'),
            'password' => Hash::make(Input::get('password')),
            'email'    => Input::get('email'),
        );

        $user = User::create($userArray);

        if ($user->save()) {
            $confirmation = new Confirmation;
            $confirmation->code = str_random(32);
            $confirmation->user()->associate($user);

            if ($confirmation->save()) {
                $viewData = array(
                    'username' => $user->username,
                    'token' => $confirmation->code,
                );

                Mail::send('emails.users.confirm', $viewData, function($message) use ($user) {
                    $message->from('support@csnades.com', 'CSNades Team');
                    $message->to($user->email, $user->username);
                    $message->subject('CSNades Account Confirmation');
                });

                Session::flash('flashSuccess', 'You have been registered. Please notify an Administrator.');
                return Redirect::to('/');
            }

        }

        Session::flash('flashDanger', 'The user account was not saved. Please notify an Administrator');
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

    public function confirmUser($code)
    {
        try {
            $confirmation = Confirmation::where('code', $code)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            Session::flash('flashDanger', 'The provided confirmation code was not found');
            return Redirect::to('/');
        }

        $user = $confirmation->user;
        $user->active = 1;

        if (!$user->save() || !$confirmation->delete()) {
            $flashDanger = 'There was an error confirming your account. Please contact support';

            Session::flash('flashDanger', $flashDanger);
            return Redirect::to('/');
        }

        Session::flash('flashSuccess', 'Your account is confirmed! You may proceed to login.');
        return Redirect::action('UsersController@showLoginForm');
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
