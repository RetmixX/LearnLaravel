<?php

namespace App\Http\Middleware;

use App\DTO\ErrorResponse;
use App\Models\User;
use Closure;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class NoAuth
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

        if (User::findUserOnEmail($request["email"]))
            return $next($request);
        else
            throw new HttpResponseException(response()->json(
                (new ErrorResponse(false, "User already authorized"))->responseMessage()
                , 400));
    }
}
