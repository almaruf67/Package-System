<?php
  
namespace App\Http\Controllers;
 
use App\Models\Plan;
use Illuminate\View\View;
use Illuminate\Http\Request;
  
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        $plans = Plan::orderBy('id')->get();
        return view('home',compact('plans'));
    } 

    public function expire()
    {
        $plans = Plan::orderBy('id')->get();
        return view('manager.expire',compact('plans'));
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('admin.Home');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome()
    {
        return view('manager.Home');
    }
}