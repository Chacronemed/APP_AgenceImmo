<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\SearchPropertiesRequest;
use App\Mail\PropertyContactMail;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomePropertyController extends Controller
{
//    public function index(SearchPropertiesRequest $request)
//    {
//        $query= Property::query();
//        if ($request->has('prix')){  you need validated instead of has
//            $query=$query->where('prix','<=',$request->input('prix'));       you need validated instead of input
//        }
//        return view('PropertyShow.index',[
//            'properties'=>$query->paginate(16),
//            'input'=>$request->validated(),
//        ]);
//    }
    public function index(SearchPropertiesRequest $request)
    {
        $query = Property::query();
        if ($request->has('prix') && is_numeric($request->input('prix'))) {
            $query = $query->where('prix', '<=', $request->input('prix'));
        }
        if ($request->has('surface') && is_numeric($request->input('surface'))) {
            $query = $query->where('surface', '>=', $request->input('surface'));
        }
        if ($request->has('rooms') && is_numeric($request->input('rooms'))) {
            $query = $query->where('rooms', '>=', $request->input('rooms'));
        }
        if ($request->has('title') && is_string($request->input('title'))) {
            $query = $query->where('title', 'LIKE', '%' . $request->input('title') . '%');
        }

        return view('PropertyShow.index', [
            'properties' => $query->paginate(16),
            'input' => $request->validated(),
        ]);
    }


    public function show(string $slug,Property $property)
    {
        $expectedSlug= $property->getSlug();
        if($slug !==$expectedSlug){
            return to_route('Property.show',['slug'=>$expectedSlug,'property'=>$property]);
        }
        return view('PropertyShow.show',[
            'property'=>$property,
            'options' => Option::pluck('name','id'),
        ]);
    }

}
