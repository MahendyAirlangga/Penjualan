<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{

    public function getindexcust(){
        $customers = Customer::get();
        return view('customer', ['customers' => $customers] );
    }

    // public function getBarang(){
    //     $barangs = Barang::get();
    //     return view('admin.barang', ['barangs' => $barangs]);
    // }

    public function addcust(Request $request){
        // dd($request);
        $customer = $request -> validate([
            'customer_name' => ['required'],
            'customer_city' => ['required'],
        ]);

        $customer = Customer::create($customer);
        return redirect()->route('indexcust');
    }

    public function destroy($customer_id)
    {
        $customer = Customer::where('customer_id', $customer_id)->firstOrFail();
        $customer->delete();
    
        return redirect()->back()->with('success', 'Customer deleted successfully.');
    }

    public function edit($customer_id)
    {
        // Temukan barang berdasarkan ID
        $customer = Customer::findOrFail($customer_id);

        // Kirim data ke view 'barang.edit'
        return view('customers.edit', compact('customers'));
    }

    public function update(Request $request, $customer_id)
    {
    // Validasi input
    $validatedData = $request->validate([
        'customer_name' => 'required',
        'customer_city' => 'required',
    ]);

    // Temukan customer berdasarkan ID dan update
    $customer = Customer::findOrFail($customer_id);
    $customer->customer_name = $validatedData['customer_name'];
    $customer->customer_city = $validatedData['customer_city'];
    $customer->save();

    // Redirect kembali dengan pesan sukses
    return redirect()->back()->with('success', 'Customer updated successfully.');
    }

    
}
