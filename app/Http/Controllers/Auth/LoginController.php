<?php

namespace App\Http\Controllers\Auth;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(!auth()->attempt($request->only('email', 'password'))){
            return back()->with('status', 'invalid login detail');
        }
        return redirect()->route('posts');
    }
}
