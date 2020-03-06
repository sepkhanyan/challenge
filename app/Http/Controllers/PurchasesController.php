<?php

namespace App\Http\Controllers;

use App\Offering;
use App\Purchase;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $purchases = Purchase::with('offering')->get();
        $purchasesData = [];
        foreach($purchases as $purchase){

            $purchasesData [] = [
                'id' => $purchase->id,
                'offeringTitle' => $purchase->offering->title,
                'quantity' => $purchase->quantity,
                'unitPrice' => $purchase->offering->price,
                'total' => $purchase->quantity * $purchase->offering->price
        ];

        }


        return response()->json([
            'purchases' => $purchasesData,
            'user' => $user
        ]);

    }

    public function purchaseCreate(Request $request)
    {
        $request->validate([
            'customer' => 'required',
            'offer' => 'required|integer',
            'quantity' => 'required|integer'
        ]);
        $user = auth()->user();

        $purchase = new Purchase();
        $purchase->offeringID = $request->get('offer');
        $purchase->customerName = $request->get('customer');
        $purchase->quantity = $request->get('quantity');

        $purchase->save();



        return response()->json('Successfully created.');
    }

    public function getOfferings()
    {
        $offerings = Offering::all();


        return response()->json([
            'offerings' => $offerings,
        ]);

    }
}
