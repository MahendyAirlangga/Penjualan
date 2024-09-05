<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salesman;


class SalesmanController extends Controller
{
    public function salesmanIndex(){
        $salesmans = Salesman::get();
        return view('salesman', ['salesmans' => $salesmans] );
    }


    // public function getBarang(){
    //     $barangs = Barang::get();
    //     return view('admin.barang', ['barangs' => $barangs]);
    // }

    public function addsalesman(Request $request){
        // dd($request);
        $salesman = $request -> validate([
            'salesman_name' => ['required'],
            'salesman_city' => ['required'],
            'commission' => ['required'],
        ]);

        $salesman = Salesman::create($salesman);
        return redirect()->route('indexsalesman');
    }

    public function destroy($salesman_id)
    {
        $salesman = Salesman::where('salesman_id', $salesman_id)->firstOrFail();
        $salesman->delete();
    
        return redirect()->back()->with('success', 'salesman deleted successfully.');
    }

    public function edit($salesman_id)
    {
        // Temukan barang berdasarkan ID
        $salesman = Salesman::findOrFail($salesman_id);

        // Kirim data ke view 'barang.edit'
        return view('salesmans.edit', compact('salesmans'));
    }

    public function update(Request $request, $salesman_id)
    {
    // Validasi input
    $validatedData = $request->validate([
        'salesman_name' => 'required',
        'salesman_city' => 'required',
        'commission' => 'required',
    ]);

    // Temukan salesman berdasarkan ID dan update
    $salesman = Salesman::findOrFail($salesman_id);
    $salesman->salesman_name = $validatedData['salesman_name'];
    $salesman->salesman_city = $validatedData['salesman_city'];
    $salesman->commission = $validatedData['commission'];
    $salesman->save();

    // Redirect kembali dengan pesan sukses
    return redirect()->back()->with('success', 'Customer updated successfully.');
    }

}
