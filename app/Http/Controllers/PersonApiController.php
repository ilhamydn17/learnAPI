<?php

namespace App\Http\Controllers;

use App\Http\Resources\PersonResorce;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PersonResorce::collection(Person::paginate(2));
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        return new PersonResorce($person);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Person $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        //
    }
}
