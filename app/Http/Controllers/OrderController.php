<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Salesman;


class OrderController extends Controller
{
    public function orderIndex(){
        $orders = Order::get();
        return view ('order', ['orders' => $orders]);
    }


    public function createOrder(Request $request) {

        $data = $request->validate([
            'order_date' => ['required', 'date'],
            'amount' => ['required', 'numeric'],
            'customer_id' => ['required', 'exists:customers,customer_id'],
            'salesman_id' => ['required', 'exists:salesmans,salesman_id'],
        ]);
    
     
        $order = Order::create([
            'order_date' => $data['order_date'],
            'amount' => $data['amount'],
            'customer_id' => $data['customer_id'],
            'salesman_id' => $data['salesman_id'],
        ]);
    
        
        return redirect()->route('indexorder')->with('success', 'Order berhasil dibuat.');
    }

    public function destroy($order_id)
    {
        $order = Order::where('order_id', $order_id)->firstOrFail();
        $order->delete();
    
        return redirect()->back()->with('success', 'order deleted successfully.');
    }

    public function edit($order_id)
    {
        $order = Order::findOrFail($order_id);

        return view('orders.edit', compact('orders'));
    }

    public function update(Request $request, $order_id)
    {
    $validatedData = $request->validate([
        'order_date' => 'required',
        'amount' => 'required',
        'customer_id' => 'required',
        'salesman_id' => 'required',
    ]);

    $order = Order::findOrFail($order_id);
    $order->order_date = $validatedData['order_date'];
    $order->amount = $validatedData['amount'];
    $order->customer_id = $validatedData['customer_id'];
    $order->salesman_id = $validatedData['salesman_id'];
    $order->save();

    return redirect()->back()->with('success', 'Order updated successfully.');
    }

    
}
