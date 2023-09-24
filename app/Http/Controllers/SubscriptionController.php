<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\models\SubscriptionPlan;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller
{
    // protected $primaryKey = 'id';
    public function subscribe($id)
    { 
        // $price = 50;
        $order_details = DB::table('orders')
            ->where('transaction_id', $id)
            ->select('user_id','type', 'amount')->first();
        // dd($order_details);
        $plan = 1;
        if($order_details->type=='Business')
            {$plan= 3;}
        elseif($order_details->type=='Professional')
        {$plan= 6;}
        elseif($order_details->type=='Premium')
        {$plan= 12;}
        $subscription = SubscriptionPlan::where('user_id', $order_details->user_id)->first();
        // dd($subscription);
        if ($subscription) {
            $subscription->type = $order_details->type;
            $subscription->price = $subscription->price + $order_details->amount;
            $subscription->duration = $plan;
            $subscription->activation_date =  Carbon::now();
            $subscription->expiry_date = Carbon::parse($subscription->expiry_date)->addMonth($plan);
            $subscription->save();
        } else {
            $insert = SubscriptionPlan::insert([
                'type' => $order_details->type,
                'price' => $order_details->amount,
                'duration'  => $plan,
                'user_id'  =>  auth()->user()->id,
                'activation_date'  =>  Carbon::now(),
                'expiry_date'  =>  Carbon::now()->addMonth($plan),
            ]);
        }
        return redirect()->route('manager.home');


    }

    public function expire()
    {
        return view('manager.expire');
    }

    public function panel()
    {
        return view('manager.Panel.panel');
    }

    public function order(Request $request)
    {
        $info = $request->all();
    //    dd($info);
       return View('manager.payment',compact('info'));
    }
}
