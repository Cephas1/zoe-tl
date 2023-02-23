<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Gare;
use App\Models\Travel;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinations = Destination::all();
        $villes = Ville::all();

        //dd($villes);
        foreach ($destinations as $value) {

            foreach ($villes as $key2 => $value2) {

                if($value2->id === $value->ville_d){

                    $value->ville_d = $value2->name;
                }elseif ($value2->id === $value->ville_a) {

                    $value->ville_a = $value2->name;
                }
            }
        }

        //dd($destinations);
        return view('index', ['destinations' => $destinations,
                              'villes' => $villes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tarifs()
    {
        $destinations = destination::all();
        $villes = ville::all();

        foreach ($destinations as $value) {

            foreach ($villes as $key2 => $value2) {

                if($value2->id === $value->ville_d){

                    $value->ville_d = $value2->name;
                }elseif ($value2->id === $value->ville_a) {

                    $value->ville_a = $villes[$key2]->name;
                }
            }
        }

        return view('tarifs', ['destinations' => $destinations,
                               'villes' => $villes]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createReservation()
    {
        $destinations = destination::all();
        $villes = Ville::all();

        foreach ($destinations as $value) {

            foreach ($villes as $key2 => $value2) {

                if($value2->id === $value->ville_d){

                    $value->ville_d = $villes[$key2]->name;
                }elseif ($value2->id === $value->ville_a) {

                    $value->ville_a = $villes[$key2]->name;
                }
            }
        }
        $gares = Gare::all();

        return view('reserver', ['reservations' => $destinations,
                                 'villes' => $villes,
                                 'gares' => $gares]);
    }

    public function storeReservation(Request $request)
    {
        $data = [
            'code' => now(),
            'price' => $request['price'],
            'places' => $request['places'],
            'destination_id' => $request['destination_id'],
            'date_v' => $request['date_v'],
            'user_id' => Auth::user()->id
        ];

        $voyage = new Travel();

        $voyage->create($data);

        if($voyage){
            return redirect('reserver')->with('status', 'Réservation enregistrée avec succès, consultez votre profil pour plus de details !');
        }else{
            return redirect('reserver')->with('status', 'Réservation non enregistrée, prière de bien vouloir réessayer !');
        }
        //put code below inside view corresponding
       /* @if(session('status'))
            <div class = "alert alert-success">
                {{ session('status') }}
            </div>
        @endif*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function contacts()
    {
        $villes = Ville::all();

        return view('contact', ['villes'=>$villes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
