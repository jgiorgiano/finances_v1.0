<?php

namespace App\Http\Middleware;

use Closure;
use App\Repositories\GroupMemberRepository as member;

class groupMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( in_array($request->group, member::hasGroups() )){            
            
            return $next($request);
            
        }
        
        return redirect()->route('home');

    }
}
