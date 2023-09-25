<?php
  
namespace App\Http\Controllers;
 
use App\Models\Plan;
use App\Models\Product;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
  
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
        $today = DB::table('orders')->whereDate('ordered_at',now()->toDateString())->get();
        $todayorders = $today->count();
        $todayincome = $today->sum('amount');
        $month = DB::table('orders')->whereYear('ordered_at', now()->year)
        ->whereMonth('ordered_at', now()->month)->get();
        $monthorders = $month->count();
        $monthincome = $month->sum('amount');
        $users = User::where('type',2)->get()->count();
        $admins = User::where('type',1)->get()->count();
        $products = Product::get()->count();
        $plans = plan::get()->count();
        // dd($products);
        
        return view('admin.Home',compact('todayorders','todayincome','monthorders','monthincome','users','admins','products','plans'));
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