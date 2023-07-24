<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Http\Requests\PropertyContactRequest;
use App\Mail\PropertyContactMail;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.properties.index',[
            'properties'=>Property::orderBy('created_at','desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property= new Property();
        $property->fill([
            'surface'=>40,
            'rooms'=>3,
            'bedrooms'=>1,
            'etage'=>0,
            'ville'=>'Casablanca',
            'code_postale'=>40000,
            'etat'=>false,
        ]);
        return view('admin.properties.form',[
            'property' => $property,
            'options' => Option::pluck('name','id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        $property= Property::create($request->validated());
        $property->option()->sync($request->validated('options'));
        return to_route('admin.property.index')->with('success','le bien a été ajouter');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.properties.form',[
            'property'=>$property,
            'options' => Option::pluck('name','id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->option()->sync($request->validated('options'));
        $property->update($request->validated());
        return to_route('admin.property.index')->with('success','le bien a été modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return to_route('admin.property.index')->with('success','le bien a été supprimer');
    }

    public function contact(Property $property,PropertyContactRequest $request)
    {
        Mail::send(new PropertyContactMail($property,$request->validated()));
        return back()->with('success','Votre Message a été envoyé');
    }
}
