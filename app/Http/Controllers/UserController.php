<?php 
namespace App\Http\Controllers;

use App\User;
use \Illuminate\Http\Request;
use \Illuminate\Support\Facades\Auth;

class UserController extends Controller {
    
    public function getDashboard() {
        return view('dashboard');
    }
    
    public function postSignUp(Request $request){
        $this->validate($request, [
            'email' => 'required|email|unique:users', // emaili eshte required 
                                            // emaili eshte name te viewsi, 
                                            // duhet te jete unik ne databaze,
                                            // ti perkase tabeles users
                                            // te migrationsi duhet jete nje fushe me emrin email te tabela users
            'first_name' => 'required|max:120', // maksimum 120 karakteresh
            'password' => 'required|min:4'
        ]);
        
        $email = $request['email'];
        $first_name = $request['first_name'];
        $password = bcrypt($request['password']);
        
        $user = new User();
        $user->email = $email;
        $user->first_name = $first_name;
        $user->password = $password;
        $user->save();
        
        Auth::login($user);
        
        return redirect()->route('dashboard');
    }
    
    public function postSignIn(Request $request){
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->route('dashboard');
        } 
        return redirect()->back();
    }
}
?>