<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\SubscriptionPlan;
use Symfony\Component\HttpFoundation\Response;

class CheckSubscriptionExpiry
{
    public function handle($request, Closure $next)
    {
        // $user = auth()->user();
        $data= SubscriptionPlan::where('user_id', auth()->user()->id)->first();
        
        if(isset($data->expiry_date)==false || $data->status==0)
        {
            return redirect()->route('expire');
        }
        
        else if($data->expiry_date && Carbon::now()->gte($data->expiry_date)) {
            // User's subscription has expired; you can redirect them or return an error response
            return redirect()->route('expire');
        }

        return $next($request);
    }
}
