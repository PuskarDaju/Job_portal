<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsUserAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $user=Auth::user();
        if($user->role=="admin"){
            return $next($request);
        }
        return response()->json(['message'=>'You are not admin'],403);
    }
}

