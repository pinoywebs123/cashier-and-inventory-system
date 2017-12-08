<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class StaffController extends Controller
{
	public function __construct(){
		$this->middleware('authcheck');
	}
    public function staff_main(){
    	return view('staff.main');
    }
    public function staff_logout(){
    	Auth::logout();
    	return redirect()->route('login');
    }
    public function staff_items(){
        return view('staff.items');
    }
    public function staff_orders(){
        return view('staff.orders');
    }
    public function staff_totals(){
        return view('staff.totals');
    }
    public function staff_reports(){
    	return view('staff.reports');
    }
}

