<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonResourceCollection;
use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    //Get all persons
    public function index(): PersonResourceCollection
    {
        return new PersonResourceCollection(Person::paginate());
    }

    //Create a person
    public function create()
    {
        //
    }

    //Store a person
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'city' => 'required'
        ]);
        $person = Person::create($request->all());
        return new PersonResource($person);
    }

    //Get a single person
    public function show(Person $person): PersonResource
    {
        return new PersonResource($person);
    }

    //Update a person
    public function update(Person $person, Request $request): PersonResource
    {
        $person->update($request->all());
        return new PersonResource($person);
    }

    //Delete a person
    public function destroy(Person $person)
    {
        $person->delete();
        return response()->json('msg', 'deleted successfully');
    }
}