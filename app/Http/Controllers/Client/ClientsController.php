<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Travel;
use App\Models\User;
use App\Models\Ville;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Travel::where('user_id', Auth::user()->id)->count();
        $reservations_validees = Travel::where('state', 1)->where('user_id', Auth::user()->id)->count();
        $reservations_annulees = Travel::where('state', null)->where('user_id', Auth::user()->id)->count();
        $reservations_en_attente = Travel::where('state', 0)->where('user_id', Auth::user()->id)->count();
        $villes = Ville::all();

        $travels = travel::where('user_id', Auth::user()->id)->get()->load('destination');
        foreach ($travels as $value) {

            $value->created_at = Carbon::parse($value->created_at)->format('Y-m-d');
            //dd($value->created_at);
            foreach ($villes as $key2 => $value2) {

                if($value2->id === $value->destination->ville_d){

                    $value->destination->ville_d = $villes[$key2]->name;
                }elseif ($value2->id === $value->destination->ville_a) {

                    $value->destination->ville_a = $villes[$key2]->name;
                }
            }
        }

        //dd($travels);

        return view('client.client-dashboard', ['reservations'=>$reservations,
                                                'reservations_validees'=>$reservations_validees,
                                                'reservations_annulees'=>$reservations_annulees,
                                                'reservations_en_attente'=>$reservations_en_attente,
                                                'travels'=>$travels,
                                                'villes'=>$villes]);
    }

    public function user()
    {
        $user = User::where('id', Auth::user()->id)->load('villes');

        return view('clent.client-mon-compte', 'user');

    }

    public function updateUser(Request $request)
    {
        $data = [
            'name'=>$request['name'],
            'phone'=>$request['phone']
        ];

        $user = User::where('id', Auth::user()->id)->get();

        if($user->update($data)){
            return Redirect::back()->with('status', 'Updated successfully');
        }else{
            return Redirect::back()->with('status', 'Fail to update');
        }
    }

    public function updatePassword(Request $request){
        $data = [
            'last_password' => $request['last_password'],
            'password' => $request['password'],
            'password2' => $request['password2']
        ];

        $user = User::find(Auth::user()->id);

        if(Hash::make($data['last_password']) === $user->password){
            if ($data['password'] === $data['password2']) {
                $user->password = Hash::make($data['last_password']);
                $user->save();

                return back()->with('status', 'Mot de passe mis à jour');
            }else{
                return back()->with('status', "Assurez-vous de renseigner le même mot de passe dans les champs 'Nouveau mot de passe' et 'Confirmer votre mot de passe");
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function post(Request $request)
    {
        $data = [
            'code' => now(),
            'name' => $request->name,
            'number' => $request->number,
            'price' => $request->price,
            'places' => $request->places,
            'gare_d' => $request->gare_d,
            'gare_a' => $request->gare_a,
            'destination_id' => $request->destination_id,
            'user_id' => Auth::user()->id,
            'state' => 0
        ];

        $submit = Travel::create($data);

        if($submit){
            return back()->with('status', 'Votre voyage a été enregistré avec succès, vous serez contacté sous peu par un de nos agents pour finaliser la réservation.');
        }else{
            return back()->with('status', "Votre voyage n'a pas été enregistré, verifiez les informations soumises puis réessayez! ");
        }

    }

    public function travelDenied($travel_id){
        $travel = Travel::where('id', $travel_id)->first();

        $travel->state = null;
        $travel->update();

        return back()->with('status', "Votre réservation a été annulée avec succès! ");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
