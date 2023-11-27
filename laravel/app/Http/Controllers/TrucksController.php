<?php

namespace App\Http\Controllers;

use App\Models\Trucks;
use Illuminate\Http\Request;

class TrucksController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('trucks_search');

        $trucks = Trucks::query()
            ->when($search, function ($query, $search) {
                return $query->where('unit_no', 'like', '%' . $search . '%')
                    ->orWhere('year', 'like', '%' . $search . '%')
                    ->orWhere('note', 'like', '%' . $search . '%');
            })
            ->get();

        return view('trucks.index', compact('trucks'));
    }

    public function create()
    {
        return view('trucks.add');
    }

    public function edit($id)
    {
        $truck = Trucks::findOrFail($id);
        return view('trucks.edit', compact('truck'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'unit_no' => 'required|unique:trucks',
            'year' => 'required',
            'note',
        ]);

        $trucks = new Trucks;
        $trucks->unit_no = $request->input('unit_no');
        $trucks->year = $request->input('year');
        $trucks->note = $request->input('note');

        // Save the truck to the database
        $trucks->save();

        // Redirect to the desired page after successful storage
        return redirect()->route('trucks.create')->with('success', 'Truck added successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'unit_no' => 'required|unique:trucks,unit_no,' . $id,
            'year' => 'required',
            'note',
        ]);

        $truck = Trucks::findOrFail($id);
        $truck->unit_no = $request->input('unit_no');
        $truck->year = $request->input('year');
        $truck->note = $request->input('note');

        // Save the updated truck to the database
        $truck->save();

        // Redirect to the desired page after successful update
        return redirect()->route('trucks.index', $id)->with('success', 'Truck info updated successfully');
    }

    public function destroy($id)
    {
        $truck = Trucks::findOrFail($id);
        $truck->delete();

        return redirect()->route('trucks.index')->with('success', 'Truck ' . $truck->unit_no . ' deleted successfully');
    }
}
