<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        return view("customer");
    }


    public function addCustomer(Request $request)
    {
        try {
            $customer = new Customer;
            $customer->id = $request->customerID;
            $customer->name = $request->customerName;
            $customer->address = $request->customerAddress;
            $customer->salary = $request->customerSalary;
            $res = $customer->save();
        } catch (QueryException $q) {
            return response($q->getMessage() . "", 200)
                ->header('Content-Type', 'plain/text');
        }
        return response($res . "", 200)
            ->header('Content-Type', 'plain/text');

    }


    public function deleteCustomer(Request $request)
    {
        try {
            DB::transaction(function () {
                global $request;
                $customerID = $request->customerID;
                return Customer::destroy($customerID);
            });
        }catch (QueryException $q){
            return response($q->getMessage() . "", 200)
                ->header('Content-Type', 'plain/text');
        }


    }


    public function searchCustomer(Request $request)
    {
        $cusID = $request->customerID;
        $resp = Customer::find($cusID);
        return response()->json($resp);
    }

    public function updateCustomer(Request $request)
    {
        $cusID = $request->customerID;
        $customer = Customer::find($cusID);
        if ($customer) {
            $customer->id = $request->customerID;
            $customer->name = $request->customerName;
            $customer->address = $request->customerAddress;
            $customer->salary = $request->customerSalary;
            $res = $customer->save();
            return $res . "";
        }
    }

    public function getAll()
    {
        $res = Customer::all();
        return $res;
    }

}
