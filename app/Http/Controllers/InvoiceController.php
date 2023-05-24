<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    public function index()
    {
    $query = Invoice::query();
    $query->when(request('search_client','search_date_from','search_payment_method'), function($query){
    $query->where('invoice_to', 'like', '%' . request('search_client') . '%');
    $query->where('payment_method', 'like', '%' . request('search_payment_method') . '%');
    $query->whereDate('date', 'like', '%' . request('search_date_from') . '%');
  });
  return $query->orderBy('id','asc')->get();


        // $invoices = Invoice::all(['id','date','due_date','invoice_to','item','cost','quantity','price','description','sales_person','note','payment_method','payment_terms','client_notes','payment_stub','created_at']);
        // return response()->json($invoices);
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|string',
            'due_date' => 'required|string',
            'invoice_to' => 'required|string',
            'item' => 'required|string',
            'cost' => 'required|string',
            'quantity' => 'required|string',
            'price' => 'nullable|string',
            'description' => 'required|string',
            'sales_person' => 'required|string',
            'note' => 'required|string',
            'payment_method' => 'required|string',
            'payment_terms' => 'required|boolean',
            'client_notes' => 'required|boolean',
            'payment_stub' => 'required|boolean',
        ]);

        $invoice = new Invoice([
            'date'  => $request->date,
            'due_date'  => $request->due_date,
            'invoice_to'  => $request->invoice_to,
            'item'  => $request->item,
            'cost'  => $request->cost,
            'quantity'  => $request->quantity,
            'price'  => $request->cost * $request->quantity,
            'description'  => $request->description,
            'sales_person'  => $request->sales_person,
            'note'  => $request->note,
            'payment_method'  => $request->payment_method,
            'payment_terms'  => $request->payment_terms,
            'client_notes'  => $request->client_notes,
            'payment_stub'  => $request->payment_stub,
        ]);

        if($invoice->save()){
            return response()->json([
            'message' => 'Successfully created invoice!',
            ],201);
        }
        else{
            return response()->json(['error'=>'Provide proper details']);
        }
    }

    public function show(Invoice $invoice)
    {
        return response()->json($invoice);
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return response()->json([
            'message'=>'Invoice Deleted Successfully!!'
        ]);
    }

    public function update(Request $request, Invoice $invoice)
    {
        $invoice->fill($request->post())->save();
        return response()->json([
            'message'=>'Invoice Updated Successfully!!',
            'invoice'=>$invoice
        ]);
    }
}
