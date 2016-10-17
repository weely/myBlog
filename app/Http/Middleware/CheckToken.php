<?php

namespace App\Http\Middleware;

use Closure;
use Config;
use App\Token;
use Request as Requests;
use Redis_Laravel;

class CheckToken
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
        $cache = Config::get('cache.default');
        if ($cache == 'redis') {
            return $next($request);
        } else {
            $token = Token::where('token',$request->header('_token'))->first();
            if ($token) {
                $now = time();
                $last_time = strtotime($token->last_access_at);
                $diff = $now - $last_time;
                if ($diff < 3600) {
                    $token->update([
                        'last_access_at' => date('Y-m-d H:i:s', $now),
                        'user_ip' => Requests::getClientIp()
                    ]);
                    return $next($request);
                } else {
                    return response('Token已过期', 401);
                }
            } else {
                return response('Token不存在', 401);
            }
        }
    }
}
