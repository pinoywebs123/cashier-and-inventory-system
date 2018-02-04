<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\staff\addinventory;
use App\Inventory;
use App\Item;
use App\Order;
use App\Total;
use App\Report;
class StaffController extends Controller
{
	public function __construct(){
		$this->middleware('authcheck');
	}
    public function staff_main(){
        $items = Inventory::all();
    	return view('staff.main', compact('items'));
    }
    public function staff_logout(){
    	Auth::logout();
    	return redirect()->route('login');
    }
    public function staff_items(){
        $items = Item::all();
        return view('staff.items', compact('items'));
    }
    public function staff_orders(){
        $items = Order::all();
        return view('staff.orders', compact('items'));
    }
    public function staff_totals(){
        $total = 0;
        $items = Total::all();
        foreach($items as $item){
            $total = $total + $item->sub_total;
        }
       
        return view('staff.totals', compact('items','total'));
    }
    public function staff_reports(){
        $items = Report::all();
    	return view('staff.reports', compact('items'));
    }
    public function staff_new_inventory(Request $request, addinventory $check){
        $inventory = new Inventory;
        $inventory->item_code = $request['item_code']; 
        $inventory->name =  $request['item_name'];
        $inventory->quantity = $request['item_quantity'];
        $inventory->price = $request['item_price'];
        $inventory->save();

        $item = new Item;
        $item->item_code = $request['item_code']; 
        $item->name =  $request['item_name'];
        $item->quantity = $request['item_quantity'];
        $item->price = $request['item_price'];
        $item->save();

        return redirect()->back()->with('add_ok', 'You have added new item successfully!');
    }

    public function staff_select_order($item_id){
        $order = new Order;
        $order->item_id = $item_id;
        $order->status_id = 0;
        $order->save();

        return redirect()->back()->with('get_oder', 'Order has been selected!');
    }

    public function staff_delete_order($order_id){
        $find = Order::findOrFail($order_id);

        if($find){
            $find->delete();
            return redirect()->back()->with('del', 'Order has been remove!');
        }
    }

    public function staff_order_to_pay(Request $request, $order_id){

        $quantity = $request['quantity'];
        $order = Order::findOrFail($order_id);
        $order->item->item_code;
        $update_quantity = $order->item->quantity - $quantity;
        Item::where('id', $order->item_id)->update(['quantity'=> $update_quantity]);
        $total = new Total;
        $total->item_code = $order->item->item_code;
        $total->quantity = $quantity;
        $total->sub_total = $order->item->price * $quantity;
        $total->save();
        $order->delete();

        return redirect()->back()->with('pay_order', 'Orde has been submitted successfully!');
    }

    public function staff_total_payment(){
         $totals = Total::all();
         foreach($totals as $tot){

            $rep = new Report;
            $rep->item_code = $tot->item_code;
            $rep->quantity = $tot->quantity;
            $rep->sub_total = $tot->sub_total;
            $rep->save();
            $tot->delete();
         }

         return redirect()->back()->with('total_pay', 'All items has been paid successfully!');
    }
}

