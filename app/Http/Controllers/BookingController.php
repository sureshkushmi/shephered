<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
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
    public function store(Request $request)
    {
     $request->validate([
        'destination'  => 'required',
        'depart_date'  => 'required|date_format:m/d/Y',
        'return_date'  => 'required|date_format:m/d/Y|after_or_equal:depart_date',
        'duration'     => 'required',
    ]);

    // ✅ Convert to MySQL format (Y-m-d)
    $depart_date = Carbon::createFromFormat('m/d/Y', $request->depart_date)->format('Y-m-d');
    $return_date = Carbon::createFromFormat('m/d/Y', $request->return_date)->format('Y-m-d');

    // ✅ Save to DB
    Booking::create([
        'destination' => $request->destination,
        'depart_date' => $depart_date,
        'return_date' => $return_date,
        'duration'    => $request->duration,
    ]);
        return redirect()->back()->with('success', 'Booking submitted successfully!');


    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
