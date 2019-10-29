<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use App\Http\Resources\CustomerResource;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = customer::latest()->get();

        return new CustomerResource($customers);
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
        $data = request()->validate([
            'name' => 'required'
        ]);

        $customer = customer::create($data);

        return response()->json([
            'sucess'=>"custmer list updated"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = customer::findorFail($id);

        return new CustomerResource($customer);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = customer::findorFail($id);

        $data = request()->validate([
            'name' => 'required'
        ]);

        $customer->update($data);

        return response()->json([
            'success'=>"customer updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(is_numeric($id)){
            $customer = customer::findorfail($id);
            if ($customer->delete()){
                return response()->json([
                    'sucess'=> 'customer deleted!',
                ]);
            };
        }else{
            return response()->json([
                'sucess'=> 'enter a proper id',
            ]);
        }


    }
}
