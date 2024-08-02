<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->role === 'editor')) {
            return $next($request);
        }

        // Nếu không phải là admin, trả về lỗi 403 Forbidden
        return abort(403);
    }
}
