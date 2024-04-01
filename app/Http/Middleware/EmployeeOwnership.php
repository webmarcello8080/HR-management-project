<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // check if user is logged and it's an employee
        if(auth()->check() && auth()->user()->hasRole('employee') && auth()->user()->employee){
            // check if this route has an employee in it and if the employee ID matches with the AUTH employee ID
            if($request->route('employee') && $request->route('employee')->id == auth()->user()->employee->id){
                return $next($request);
            }
        }

        // ADMIN always has auth on this
        if(auth()->check() && auth()->user()->hasRole('admin')){
            return $next($request);
        }

        return abort(403);
    }
}
