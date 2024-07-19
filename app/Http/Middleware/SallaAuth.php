<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Symfony\Component\HttpFoundation\Response;

class SallaAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guest())
            abort(401);

        $user = Auth::user();
        if (is_null($user->store))
            return redirect()->route('index');

        if ($user->store->access_token_expire_at->isPast()){

            return redirect()->route('dashboard.store.index')->with(['message' => 'برجاء الربط مع متجرك في سله']);
        }

        return $next($request);
    }
}
