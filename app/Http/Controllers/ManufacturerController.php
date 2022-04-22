<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function create()
    {
        return view('manufacturer.create');
    }

    public function list()
    {
        $manufacturers = Manufacturer::simplePaginate(20);

        return view('manufacturer.list', ['manufacturers' => $manufacturers], compact('manufacturers'));
    }

    public function store(Request $request)
    {
        $input = $request->except("_token");
        $request->validate([
            'name' => ['bail', 'required', 'string', 'max:255'],
            'country' => ['bail', 'required', 'string', 'max:28'],
        ]);
        $manufacturer = new Manufacturer();
        $manufacturer->fill($input);
        $manufacturer->save();

        return redirect(route('main'))->with('success','You succesfully added new manufacturer!');
    }

    public function edit(Request $request)
    {
        $manufacturer = Manufacturer::find($request->manufacturer_id);

        return view('manufacturer.edit', ['manufacturer' => $manufacturer]);
    }

    public function update(Request $request)
    {
        $input = $request->except("_token");
        $request->validate([
            'name' => ['bail', 'required', 'string', 'max:255'],
            'country' => ['bail', 'required', 'string', 'max:28'],
        ]);
        $manufacturer = Manufacturer::find($request->id);
        $manufacturer->update($input);
        $manufacturer->save();

        return redirect(route('manufacturer_list'))->with('success','You successfully updated manufacturer!');
    }
}
