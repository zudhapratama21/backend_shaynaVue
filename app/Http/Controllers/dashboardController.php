<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $income = Transaction::where('trancation_status','SUCCESS')->sum('trancation_total');
        $sales = Transaction::count();
        $item = Transaction::orderBy('id','DESC')->take(5)->get();

        $pie=[
            'pending' => Transaction::where('trancation_status','PENDING')->count(),
            'success' => Transaction::where('trancation_status','SUCCESS')->count(),
            'failed' => Transaction::where('trancation_status','FAILED')->count()

        ];
        return view('pages.dashboard',[
            'income' => $income,
            'sales' => $sales,
            'items' => $item,
            'pie' =>$pie
        ]);
    }
}
