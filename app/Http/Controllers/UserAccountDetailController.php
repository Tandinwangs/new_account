<?php

namespace App\Http\Controllers;

use App\Models\UserAccountDetail;
use App\Http\Requests\StoreUserAccountDetailRequest;
use App\Http\Requests\UpdateUserAccountDetailRequest;

class UserAccountDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserAccountDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserAccountDetail $userAccountDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserAccountDetail $userAccountDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserAccountDetailRequest $request, UserAccountDetail $userAccountDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserAccountDetail $userAccountDetail)
    {
        //
    }

    
    public function checkAccountNumber($accountNumber)
    {
        $exists = UserAccountDetail::where('account_number', $accountNumber)->first();

        return response()->json(['exists' => $exists]);
    }
}
