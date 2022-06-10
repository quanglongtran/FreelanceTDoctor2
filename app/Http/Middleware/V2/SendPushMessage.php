<?php

namespace App\Http\Middleware\V2;

use Closure;

class SendPushMessage
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

        return $next($request);
        if (!isset(session('user')->user_id)) {
            return response()->json([
                'status' => false,
                'data' => [],
                'date' =>  time()
            ]);
        }
    }
}
