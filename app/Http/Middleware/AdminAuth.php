<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role = session('role');
        if ($role !== 'admin'){
            return redirect()->route('home')->with('error', 'Bạn không có quyền truy cập trang quản trị.');
        }
        return $next($request);
    }
}
