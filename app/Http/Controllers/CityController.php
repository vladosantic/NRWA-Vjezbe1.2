<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function index()
    {
        $city = City::orderBy('ID','desc')->paginate(100);
        return view('city.index', compact('city'));
    }

    public function create()
    {
        return view('city.create');
    }

    public function store(Request $request,)
    {
        $request->validate([
            'Name' => 'required',
            'CountryCode' => 'required',
            'District' => 'required',
            'Population' => 'required',
        ]);
        
        City::create($request->post());

        return redirect()->route('city.index')->with('success','City has been created successfully.');
    }

    public function show(City $city)
    {
        return view('city.show',compact('city'));
    }

    public function edit(City $city)
    {
        return view('city.edit',compact('city'));
    }

    public function update(Request $request, City $city)
    {
        $request->validate([
            'Name' => 'required',
            'CountryCode' => 'required',
            'District' => 'required',
            'Population' => 'required',
        ]);
        
        $city->fill($request->post())->save();

        return redirect()->route('city.index')->with('success','City Has Been updated successfully');
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('city.index')->with('success','City has been deleted successfully');
    }

}
