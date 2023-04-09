<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ageCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     * @throws \Exception
     */
    public function handle(Request $request, Closure $next)
    {
        $date = $request->birthdate;
        $date_different = date_diff(new \DateTime($date), new \DateTime())->y;
        if($date_different && $date_different<18){
            return redirect('home');
        }
        return $next($request);
    }
}
