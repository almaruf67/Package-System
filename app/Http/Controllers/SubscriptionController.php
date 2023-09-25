<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Plan;
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
            ->select('user_id', 'type', 'amount')->first();
        // dd($order_details);
        $plan = 1;
        if ($order_details->type == 'Business') {
            $plan = 3;
        } elseif ($order_details->type == 'Professional') {
            $plan = 6;
        } elseif ($order_details->type == 'Premium') {
            $plan = 12;
        }
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
        return redirect()->route('panel');
    }

    public function Subshow()
    {
        $plans = SubscriptionPlan::whereHas('users', function ($query) {
            $query->where('type', '2'); 
        })->paginate(10);
        
        return view('admin.user.sub', compact('plans'));
    }

    public function panel()
    {
        return view('manager.Panel.panel');
    }

    public function order(Request $request)
    {
        $info = $request->all();
        // dd($info);
        $Plan = Plan::findOrFail($request->id);
        //    dd($Plan);
        return View('manager.payment', compact('info', 'Plan'));
    }

    

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request)
    {
        $Subplan = SubscriptionPlan::findOrFail($request->id);
        $Subplan->status = $request->status;

        $Subplan->save();

        return redirect()->route('Subshow');
    }

    public function destroy(string $id)
    {
        $Subplan = SubscriptionPlan::findOrFail($id);
        $Subplan->delete();

        return redirect()->back();
    }
}
