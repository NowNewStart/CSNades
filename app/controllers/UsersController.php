<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class UsersController extends BaseController {

    public function addUser()
    {
        $rules = array(
            'username'  => 'required|alpha_num|between:6,20|unique:users',
            'password'  => 'required|min:8',
            'password2' => 'required|same:password',
            'email'     => 'required|email|unique:users',
        );

        $messages = array(
            'password2.required' => 'The password confirmation is required.',
            'password2.same' => 'The password and password confirmation must match.',
        );

        $validator = Validator::make(Input::all(), $rules, $messages);
        
        if ($validator->fails()) {
            return Redirect::action('UsersController@showAddUserForm')
                ->withFlashDanger('There were some errors with the form.')
                ->withErrors($validator)
                ->withInput();
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

                $flashSuccess = 'You have been registered. Please check your email to verify your account.';
                return Redirect::to('/')->withFlashSuccess($flashSuccess);
            }

            $flashWarning = 'You have been registered, but there was an error. Please notify an Administrator.';
            return Redirect::to('/')->withFlashWarning($flashWarning);

        }

        $flashDanger = 'The user account was not saved. Please notify an Administrator.';
        return Redirect::to('/')->withFlashDanger($flashDanger);
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
            return Redirect::intended()->withFlashSuccess('You have been logged in!');
        }

        $viewData = array(
            'heading'     => 'Login',
        );

        $flashDanger = 'Invalid username and password.';
        return Redirect::action('UsersController@showLoginForm')->withFlashDanger($flashDanger);
    }

    public function confirmUser($code)
    {
        try {
            $confirmation = Confirmation::where('code', $code)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            $flashDanger = 'The provided confirmation code was not found.';
            return Redirect::to('/')->withFlashDanger($flashDanger);
        }

        $user = $confirmation->user;
        $user->active = 1;

        if (!$user->save() || !$confirmation->delete()) {
            $flashDanger = 'There was an error confirming your account. Please contact support.';
            return Redirect::to('/')->withFlashDanger($flashDanger);
        }

        $flashSuccess = 'Your account is confirmed! You may proceed to login.';
        return Redirect::action('UsersController@showLoginForm')->withFlashSuccess($flashSuccess);
    }

    public function logout()
    {
        Auth::logout();

        $flashInfo = 'You have been logged out.';
        return Redirect::action('UsersController@showLoginForm')->withFlashInfo($flashInfo);
    }

    public function showAddUserForm()
    {
        $viewData = array('heading' => 'Register');

        return View::make('users.add-user')->with($viewData);
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
}
