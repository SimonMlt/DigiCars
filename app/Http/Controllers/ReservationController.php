<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        //
        $reservations = Reservation::get()->all();
        return view('reservationdates', compact('reservations'));
    }
    

    public function index2()
    {
        //
        return view('reservationvalider');
    }

    public function index3()
    {
        //
        // $user = Auth::user();
        $id = Auth::id();
        // Auth::id();
        $reservations = Reservation::where('account_id','=', "{$id}")->where('date','>=', date("y/m/d"))->orderBy('date', 'asc')->orderBy('timeslot', 'asc')->get()->all();
        return view('listereservations', compact('reservations'));
    }

    public function indexBack()
    {
        //
        $reservations = Reservation::get()->all();
        return view('Back/backreservationdates', compact('reservations'));
    }
    

    public function indexBack2()
    {
        //
        return view('Back/backreservationvalider');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        //
        return view('reservationheures');

    }

    public function createBack()
    {
        //
        return view('Back/backreservationheures');

    }

    public function createBackDetails()
    {
        //
        return view('Back/backreservationdetails');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        $attributes = request()->validate([
            'account_id'=>'required',
            'name'=>'required',
            'email'=>'required',
            'motif'=>'required',
            'date'=>'required',
            'timeslot'=>'required',
        ]);
        $reservations = Reservation::create($attributes);
        return redirect()->route('reservationsvalider');
    }

    public function storeBack(Request $request)
    {
        //
        $attributes = request()->validate([
            'account_id'=>'required',
            'name'=>'required',
            'email'=>'required',
            'motif'=>'required',
            'date'=>'required',
            'timeslot'=>'required',
        ]);
        $reservations = Reservation::create($attributes);
        return redirect()->route('backreservationsvalider');
    }

    // public function storeBackDetails(Request $request)
    // {
    //     //
    //     $attributes = request()->validate([
    //         'account_id'=>'required',
    //         'name'=>'required',
    //         'email'=>'required',
    //         'motif'=>'required',
    //         'date'=>'required',
    //         'timeslot'=>'required',
    //     ]);
    //     $reservations = Reservation::create($attributes);
    //     return redirect()->route('backreservationsvalider');
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    // public function edit(Reservation $reservation)
    // {
    //     //
    // }

    public function edit($id)
    {
        //
        $reservations = Reservation::findOrFail($id);
        return view ('editreservation', compact('reservations'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Reservation $reservation)
    // {
    //     //
    // }

    public function update(Request $request, $id)
    {
        $attributes = request()->validate([
            'date' => 'required',
            'timeslot' => 'required',
            'name' => 'required',
            'email' => 'required',
            'motif' => 'required',
            
        ]);
        $reservations = Reservation::findOrFail($id);
        $reservations->update($attributes);
        return redirect()->route('reservationsliste');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservations = Reservation::findOrFail($id);
        $reservations-> delete();
        return redirect()->route('backreservationsdates');
    }

    public function destroyList($id)
    {
        //
        $reservations = Reservation::findOrFail($id);
        $reservations->delete();
        return redirect()->route('reservationsliste');
    }
}
