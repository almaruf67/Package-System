<?php

namespace App\Http\Controllers;

use App\Models\plan;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\Vue;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = plan::paginate('5');
        // dd($plans);
        return view('admin.Plan.index',compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Plan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $plan = new plan();

        $plan->name = $request->name;
        $plan->price = $request->price;
        $plan->contributors = $request->contributors;
        $plan->details = $request->details;
        $plan->save();

        return redirect()->route('plans.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $plan = plan::findOrFail($id);

        return view('admin.Plan.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $plan = plan::findOrFail($id);
        $plan->name = $request->name;
        $plan->price = $request->price;
        $plan->contributors = $request->contributors;
        $plan->details = $request->details;

       $plan->save();

        return redirect()->route('plans.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plan = plan::findOrFail($id);
        $plan->delete();

        return redirect()->back();
    }
}
