<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     // * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $customers = Customer::all();
		return $customers;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
		//store		
		$customer = Customer::create([
			'first_name' => $request->input('first_name'),
			'last_name' => $request->input('last_name'),
			'phone' => $request->input('phone'),
			'email' => $request->input('email'),
			'address' => $request->input('address'),
			'city' => $request->input('city'),
			'state' => $request->input('state'),
			'zipcode' => $request->input('zipcode')
		]);		
		//response with message
		if($customer->save()){
			return response()->json(['message', 'Customer Added']);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$customer = Customer::where('id', '=', $id)->get();
		return $customer;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $customer = Customer::find($id);		
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		//find customer
       $customer = Customer::findOrFail($id);	    
	   
	   $customer->update([
			'first_name' => $request->input('first_name'),
			'last_name' => $request->input('last_name'),
			'phone' => $request->input('phone'),
			'email' => $request->input('email'),
			'address' => $request->input('address'),
			'city' => $request->input('city'),
			'state' => $request->input('state'),
			'zipcode' => $request->input('zipcode')
	   ]);
	   
	   return $customer;
	   
		//update record			
		// $customer->first_name = $request->input('first_name');
		// $customer->last_name = $request->input('last_name');
		// $customer->phone = $request->input('phone');
		// $customer->email = $request->input('email');
		// $customer->address = $request->input('address');
		// $customer->city = $request->input('city');
		// $customer->state = $request->input('state');
		// $customer->zipcode = $request->input('zipcode');	
		
		//response with message
		// if($customer->update($request->all())){
			// return response()->json(['message', 'Customer Updated']);
		// }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		Customer::destroy($id);       
		return response()->json(['message', 'Customer Deleted']);
    }
}
