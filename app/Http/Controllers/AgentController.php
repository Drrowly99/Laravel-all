<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Http\Requests\StoreAgentRequest;
use App\Http\Requests\UpdateAgentRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
// use DB;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $agent = Agent::where('AGENT_CODE', 'A007')->get();
        $agent = Agent::find(1)->customer;
        return $agent;
    }

    public function to_one()
    {
        $code = 'A004 ';
        $customer = Agent::where('AGENT_CODE', $code)->first()->customer;
        return $customer;
    }

    public function to_many()
    {
        $code = 'A004 ';
        $customer = Agent::where('AGENT_CODE', $code)->first()->customer_many;
        return $customer;
    }


    public function innerjoin()
    {
        $data = DB::table('agents')
        ->join('customers', 'agents.AGENT_CODE', '=', 'customers.AGENT_CODE' )
        ->select('agents.PHONE_NO as agent_phone', 'customers.PHONE_NO as customer_phone')
        ->get();

        return $data;
    }
    public function leftjoin()
    {
        $data = DB::table('agents')
        ->leftjoin('customers', 'agents.AGENT_CODE', '=', 'customers.AGENT_CODE' )
        ->select('agents.PHONE_NO as agent_phone', 'customers.PHONE_NO as customer_phone')
        ->get();

        return $data;
    }

    public function crossjoin()
    {
        $data = DB::table('agents')
        ->crossJoin('customers')
        ->select('agents.AGENT_CODE as agent_code', 'customers.CUST_CODE as customer_code')
        ->get();

        return $data;
    }

    public function advjoin()
    {
        $data = DB::table('agents')
        ->leftjoin('customers', function($join){
            $join->on('agents.AGENT_CODE', '=', 'customers.AGENT_CODE');
        })
        ->select('agents.AGENT_CODE as agent_code', 'customers.CUST_NAME as cust_name')
        ->get();

        return $data;
    }

    public function union(){
        $code = 'A011';
        $a = DB::table('agents')
        ->where('AGENT_CODE', $code)
        ->select('AGENT_CODE as agent_code', 'AGENT_NAME as agent_name', 'COMMISSION as commission', 'WORKING_AREA as working_area');
        

        $b = DB::table('customers')
        ->where('AGENT_CODE', $code)
        ->select('CUST_CODE as code', 'CUST_NAME as name', 'CUST_CITY as city/commission', 'AGENT_CODE as agent')
        ->union($a)
        ->get();

        $result = $b;
        return $result;
    }

    public function store(StoreAgentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Agent $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit(Agent $agent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAgentRequest  $request
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAgentRequest $request, Agent $agent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agent $agent)
    {
        //
    }
}
