<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkroute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $role=Auth::user()->role;
        if($role=='0'){
        return redirect('transport/user');
        }
        
        elseif($role=='1'){
        return redirect('transport/staff');
        }
        
        elseif($role=='2'){
        return view('transport/admin');
        }
        
        else{
            return redirect()->back();
        }
        return $next($request);
    }
}
