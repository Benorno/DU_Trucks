<?php

namespace App\Http\Controllers;

use App\Models\Trucks;
use Illuminate\Http\Request;

class TrucksController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('trucks_search');

        // search for trucks
        $trucks = Trucks::query()
            ->when($search, function ($query, $search) {
                // Search for trucks by unit number, year, or note
                return $query->where('unit_no', 'like', '%' . $search . '%')
                    ->orWhere('year', 'like', '%' . $search . '%')
                    ->orWhere('note', 'like', '%' . $search . '%');
            })
            ->get();

        // Return the view with the trucks search results
        return view('trucks.index', compact('trucks'));
    }

    public function create()
    {
        $tillDate = date('Y') + 5;
        return view('trucks.add', compact('tillDate'));
    }

    public function edit($id)
    {
        $truck = Trucks::findOrFail($id);
        $tillDate = date('Y') + 5;
        return view('trucks.edit', compact('truck', 'tillDate'));
    }

    public function store(Request $request)
    {

        // Validate the request
        $request->validate([
            'unit_no' => 'required|unique:trucks',
            'year' => 'required|integer|between:1900,' . (date('Y') + 5),
            'note',
        ]);

        // Create a new truck
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
        // Validate the request
        $request->validate([
            'unit_no' => 'required|unique:trucks,unit_no,' . $id,
            'year' => 'required|integer|between:1900,' . (date('Y') + 5),
            'note',
        ]);

        // Find the truck to be updated
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
        // Find the truck to be deleted
        $truck = Trucks::findOrFail($id);

        // Delete the truck
        $truck->delete();

        // Redirect to the desired page after successful delete
        return redirect()->route('trucks.index')->with('success', 'Truck ' . $truck->unit_no . ' deleted successfully');
    }
}
