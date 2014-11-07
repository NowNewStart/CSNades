<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class UsersController extends BaseController {

    public function addUser()
    {
        $userArray = array(
            'username' => Input::get('username'),
            'password' => Hash::make(Input::get('password')),
            'email'    => Input::get('email'),
        );

        $user = new User($userArray);
        $user->setAddUserValidation()->setInput(Input::all());
        // dd($user->getRules());

        if (!$user->save()) {
            $flashDanger = 'There were some errors with your registration.';
            return Redirect::route('get.users.register')
                                    ->withFlashDanger($flashDanger)
                                    ->withErrors($user->getValidator())
                                    ->withInput();
        }

        $confirmation = new Confirmation;
        $confirmation->code = str_random(32);
        $confirmation->user()->associate($user);

        if (!$confirmation->save()) {
            $flashWarning = 'You have been registered, but there was an error. Please notify an Administrator.';
            return Redirect::home()->withFlashDanger($flashWarning);
        }

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
        return Redirect::home()->withFlashSuccess($flashSuccess);
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
        return Redirect::route('get.users.login')->withFlashDanger($flashDanger);
    }

    public function confirmUser($code)
    {
        try {
            $confirmation = Confirmation::where('code', $code)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            $flashDanger = 'The provided confirmation code was not found.';
            return Redirect::home()->withFlashDanger($flashDanger);
        }

        $user = $confirmation->user;
        $user->active = 1;

        if (!$user->save() || !$confirmation->delete()) {
            $flashDanger = 'There was an error confirming your account. Please contact support.';
            return Redirect::home()->withFlashDanger($flashDanger);
        }

        $flashSuccess = 'Your account is confirmed! You may proceed to login.';
        return Redirect::route('get.users.login')->withFlashSuccess($flashSuccess);
    }

    public function logout()
    {
        Auth::logout();

        $flashInfo = 'You have been logged out.';
        return Redirect::route('get.users.login')->withFlashInfo($flashInfo);
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
