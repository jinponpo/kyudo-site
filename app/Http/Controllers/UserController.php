<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function show(string $name)
    {
        $user = User::where('name', $name)->first();
        
        $articles = $user->articles->sortByDesc('created_at');
 
        return view('users.show', [
            'user' => $user,
            'articles' => $articles,
        ]);
    }
}
