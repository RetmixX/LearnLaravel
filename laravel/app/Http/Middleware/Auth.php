<?php

namespace App\Http\Middleware;

use App\DTO\ErrorResponse;
use App\Models\User;
use Closure;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class Auth
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
        $token = $request->header("token")??"";
        if (empty($token))
            throw new HttpResponseException(response()->json(
                (new ErrorResponse(false, "Token is empty"))->responseMessage()
            ,400));

        if (!User::findUserOnToken($token))
            return $next($request);
        else
            throw new HttpResponseException(response()->json(
                (new ErrorResponse(false, "User not authorized"))->responseMessage()
                , 400));
    }
}
