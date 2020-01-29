<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\Product;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function company()
    {
        $deliveries = Inventory::all();

        return view( 'inventory.company', compact('deliveries'));

    }


    public function supplier()
    {
        if ( auth()->user()->role_id != 2)
            return redirect()->back();

        $products = Product::all();
        $deliveries = Inventory::where('supplier_id', auth()->user()->id)->get();
//        return $deliveries;
        return view('inventory.supplier', compact('products', 'deliveries'));
    }


    public function deliver(Request $request)
    {
        $input = $request->all();
        $input['supplier_id'] = auth()->user()->id;
        Inventory::create( $input);
        return redirect('supplier');

    }
}
