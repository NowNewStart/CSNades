<?php
namespace App\Http\Controllers;

use Invisnik\LaravelSteamAuth\SteamAuth;
use App\User;
use Auth;
use Session;

class AuthController extends Controller
{
    /**
     * @var SteamAuth
     */
    private $steam;

    public function __construct(SteamAuth $steam)
    {
        $this->steam = $steam;
    }

    public function login()
    {
        if ($this->steam->validate()) {
            $info = $this->steam->getUserInfo();
            if (!is_null($info)) {
                $user = User::where('steamid', $info->getSteamID64())->first();
                if (is_null($user)) {
                    $user = User::create([
                        'nickname' => $info->getNick(),
                        'avatar'   => $info->getProfilePictureFull(),
                        'steamid'  => $info->getSteamID64(),
                        'type'     => 'U'
                    ]);
                }
                Auth::login($user, true);
                Session::flash('flash_success', 'You are now signed in. Have fun!');
                return redirect('/'); // redirect to site
            }
        }
        return $this->steam->redirect(); // redirect to Steam login page
    }

    public function logout() {
        Auth::logout();
        Session::flash('flash_success', 'You are now signed out. Goodbye!');
        return redirect('/');    
    }
}