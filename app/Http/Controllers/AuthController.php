<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{

    public function index()
    {
        return view('auth.index');
    }

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('google')->user();

        $id = $user->id;
        $email = $user->email;
        $name = $user->name;
        $avatar = $user->avatar;

        $cekemail = User::where('email', $email)->count();
        if ($cekemail > 0) {
            $avatar_file = $id . ".jpg";
            $filecontent = file_get_contents($avatar);
            File::put(public_path("admin/images/faces/$avatar_file"), $filecontent);

            $user = User::updateOrCreate(
                ['email' => $email],
                [
                    'name' => $name,
                    'google_id' => $id,
                    'avatar' => $avatar_file,
                ]
            );

            Auth::login($user);
            return redirect()->to('dashboard');
        } else {
            return redirect()->to('auth')->with('error', 'akun anda tidak terdaftar');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('auth');
    }
}
