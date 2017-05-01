<?php 
namespace App\Http\Controllers;

use \Illuminate\Http\Response;

class PageController extends Controller {
    
    // Login 
    public function login() {
        return view('layouts.login');
    }
    // SignUp
    public function signup() {
        return view('layouts.signup');
    }
}
?>