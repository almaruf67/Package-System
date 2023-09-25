<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SubscriptionPlan;

class UserController extends Controller
{
    public function index()
    {
        $Users = User::orderBy('id', 'asc')->where('type', '2')->paginate(10);
        // dd($Users->subscription);
        
        return view('admin.user.customer', compact('Users'));
    }

    public function adminshow()
    {
        $Users = User::orderBy('id', 'asc')->where('type', '1')->paginate(10);
        // dd($Users);
        return view('admin.user.admin', compact('Users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('Admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;

        $user->save();
        if ($user->type = '0') {
            return redirect('admin/user');
        } else {
            return redirect('admin/admin');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $User = User::findOrFail($id);
        $User->delete();

        return redirect()->back();
    }
}
