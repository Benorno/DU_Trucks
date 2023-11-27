<?php

namespace App\Http\Controllers;

use App\Models\Subunits;
use App\Models\Trucks;
use Illuminate\Http\Request;

class SubunitsController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('subunits_search');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // search for subunits
        $subunits = Subunits::query()
            ->join('trucks as main_truck', 'subunits.main_truck', '=', 'main_truck.id')
            ->join('trucks as subunit_truck', 'subunits.subunit', '=', 'subunit_truck.id')
            ->when($search, function ($query, $search) {
                // Search for subunits by unit number
                return $query->where('main_truck.unit_no', 'like', '%' . $search . '%')
                    ->orWhere('subunit_truck.unit_no', 'like', '%' . $search . '%');
            })
            ->when($startDate || $endDate, function ($query) use ($startDate, $endDate) {
                // Filter by dates
                if ($startDate && $endDate) {
                    return $query->whereBetween('subunits.start_date', [$startDate, $endDate])
                        ->whereBetween('subunits.end_date', [$startDate, $endDate]);
                } elseif ($startDate) {
                    return $query->where('subunits.start_date', '>=', $startDate);
                } elseif ($endDate) {
                    return $query->where('subunits.end_date', '<=', $endDate);
                }
            })
            ->select('subunits.*', 'main_truck.unit_no as main_truck_unit_no', 'subunit_truck.unit_no as subunit_truck_unit_no')
            ->get();

        // Update the status of expired subunits
        $this->updateExpiredSubunits();

        // Return the view with the subunits search results
        return view('subunit.index', compact('subunits'));
    }

    private function updateExpiredSubunits()
    {
        Subunits::where('end_date', '<', now())
            ->update(['status' => 'expired']);
    }

    public function edit($id)
    {
        $subunit = Subunits::find($id);
        $trucks = Trucks::all();
        return view('subunit.edit', compact('subunit', 'trucks'));
    }

    public function create()
    {
        $trucks = Trucks::all();
        return view('subunit.add', compact('trucks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'main_truck' => 'required|exists:trucks,id|different:subunit',
            'subunit' => 'required|exists:trucks,id',
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $overlap = Subunits::where('main_truck', $request->main_truck)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                    ->orWhereBetween('end_date', [$request->start_date, $request->end_date]);
            })->exists();

        $isSubunit = Subunits::where('subunit', $request->main_truck)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                    ->orWhereBetween('end_date', [$request->start_date, $request->end_date]);
            })->exists();

        if ($overlap || $isSubunit) {
            return redirect()->back()->withErrors('The main truck is a subunit of another truck during the specified dates or the subunit dates overlap with an existing subunit for the main truck.');
        }

        $subunit = new Subunits($request->all());
        $subunit->save();

        return redirect()->back()->with('success', 'Subunit created successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'main_truck' => 'required|exists:trucks,id|different:subunit',
            'subunit' => 'required|exists:trucks,id',
            'status' => 'required|in:active,inactive,expired',
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $overlap = Subunits::where('main_truck', $request->main_truck)
            ->where('id', '!=', $id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                    ->orWhereBetween('end_date', [$request->start_date, $request->end_date]);
            })->exists();

        $isSubunit = Subunits::where('subunit', $request->main_truck)
            ->where('id', '!=', $id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                    ->orWhereBetween('end_date', [$request->start_date, $request->end_date]);
            })->exists();

        if ($overlap || $isSubunit) {
            return redirect()->back()->withErrors('The main truck is a subunit of another truck during the specified dates or the subunit dates overlap with an existing subunit for the main truck.');
        }

        $subunit = Subunits::find($id);
        $subunit->status = $request->status;
        $subunit->save();

        return redirect()->back()->with('success', 'Subunit updated successfully');
    }
}
