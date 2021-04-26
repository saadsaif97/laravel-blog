<?php

namespace App\Http\Middleware;

use App\Models\Category;
use Closure;
use Illuminate\Http\Request;

class VerifyCategoryCount
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
        if (Category::all()->count() === 0) {
            return redirect(route('category.create'))->with('warning','Please create a category before creating a post.');
        }

        return $next($request);
    }
}
