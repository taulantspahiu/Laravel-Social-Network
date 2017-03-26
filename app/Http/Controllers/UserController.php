<?php 
namespace App\Http\Controllers;

use App\User;
use \Illuminate\Http\Request;
use \Illuminate\Support\Facades\Auth;

class UserController extends Controller {
    
    public function postSignUp(Request $request){
        $this->validate($request, [
            'email' => 'required|email|unique:users', // emaili eshte required 
                                            // emaili eshte name te viewsi, 
                                            // duhet te jete unik ne databaze,
                                            // ti perkase tabeles users
                                            // te migrationsi duhet jete nje fushe me emrin email te tabela users
            'name-signup' => 'required|max:120', // maksimum 120 karakteresh
            'password-signup' => 'required|min:4'
        ]);
        
        $email = $request['email'];
        $first_name = $request['name-signup'];
        $password = bcrypt($request['password-signup']);
        
        $user = new User();
        $user->email = $email;
        $user->first_name = $first_name;
        $user->password = $password;
        $user->save();
        
        Auth::login($user);
        \Log::notice($user);
        return redirect()->route('dashboard');
    }
    
    public function postSignIn(Request $request){
        $this->validate($request, [
            'email-login' => 'required',
            'password-login' => 'required'
        ]);
        
        
        if (Auth::attempt(['email' => $request['email-login'], 'password' => $request['password-login']])) {
            return redirect()->route('dashboard');
        } 
        return redirect()->back();
    }
    
    public function getLogout(Request $request){
        Auth::logout();
        return redirect()->route('home');
    }
}
?>