<?php

namespace App\Http\Middleware;

use App\Http\Requests\ForgotPasswordRequest;
use Closure;
use Illuminate\Http\Request;

class DoesEmailExist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $forgotPasswordReq = new ForgotPasswordRequest();
        $validated = $request->validate($forgotPasswordReq->rules(), $forgotPasswordReq->getErrorMessages());
        return $next($request);
    }
}
