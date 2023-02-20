<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Gare;
use App\Models\Travel;
use App\Models\User;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Travel::count();
        $reservations_validees = Travel::where('state', 1)->count();
        $reservations_annulees = Travel::where('state', null)->count();
        $reservations_en_attente = Travel::where('state', 0)->count();
        //$clients_count = User::where('rule_id', 1)->count();
        $villes = Ville::all();

        $clients = travel::get()->groupBy('name');
        foreach ($clients as $key => $value) {
            foreach ($value as $key2 => $value2) {

                $destination = Destination::find($value2->destination_id);

                if($destination){
                    $value2->destination_id = $destination;
                }
            }
        }

        foreach ($clients as $value) {
            foreach ($value as $value2) {

                foreach ($villes as $key => $value) {
                    if($value2->destination_id->ville_d == $value->id){
                        $value2->destination_id->ville_d = $value->name;
                    }
                    if($value2->destination_id->ville_a == $value->id){
                        $value2->destination_id->ville_a = $value->name;
                    }
                    $value2->user_id = User::find($value2->user_id)->first();
                }
            }
        }

        //dd($clients);


        return view('admin.admin-index',  ['reservations'=>$reservations,
                                            'reservations_validees'=>$reservations_validees,
                                            'reservations_annulees'=>$reservations_annulees,
                                            'reservations_en_attente'=>$reservations_en_attente,
                                            //'clients_count'=>$clients_count,
                                            'clients'=>$clients,
                                            'villes'=>$villes]);


    }

    public function editVille($id, Request $request)
    {
        $ville = Ville::find($id);

        if ($ville->update(['name' => $request->name])) {
            return back()->within('status', 'Ville modifiée avec succès!');
        } else {
            return back()->within('status', 'Ville non modifiée, réessayez!');
        }

    }

    public function deleteVille($id)
    {
        $ville = Ville::find($id);

        if ($ville->delete()) {
            return back()->within('status', 'Ville supprimée avec succès!');
        } else {
            return back()->within('status', 'Ville non supprimée, réessayez!');
        }

    }

    public function editGare($id, Request $request)
    {
        $ville = Gare::find($id);

        if ($ville->update(['name' => $request->name])) {
            return back()->within('status', 'Gare modifiée avec succès!');
        } else {
            return back()->within('status', 'Gare non modifiée, réessayez!');
        }

    }

    public function deleteGare($id)
    {
        $ville = Gare::find($id);

        if ($ville->delete()) {
            return back()->within('status', 'Gare supprimée avec succès!');
        } else {
            return back()->within('status', 'Gare non supprimée, réessayez!');
        }

    }

    public function saveDestination(Request $request)
    {
        $data = [
            'ville_d' => $request->ville_d,
            'ville_a' => $request->ville_a,
            'heure_d' => $request->heure_d,
            'heure_a' => $request->heure_a,
            'price' => $request->price
        ];

        if($data['ville_d'] === $data['ville_a'] || $data['heure_d'] === $data['heure_a'])
        {
            return back()->with('status', 'La ville et l\'heure de départ ainsi que la ville et l\'heure d\'arrivée doivent être différentes');
        }else{
            $destination = Destination::create($data);
            if($destination)
            {
                return back()->with('status', 'Destination créée avec succès !');
            }else
            {
                return back()->with('status', 'Echec de création de destination, réessayez !');
            }
        }
    }

    public function editDestination(Request $request)
    {
        $data = [
            'id' => $request->id,
            'ville_d' => $request->ville_d,
            'ville_a' => $request->ville_a,
            'heure_d' => $request->heure_d,
            'heure_a' => $request->heure_a,
            'price' => $request->price
        ];

        $destination = Destination::where('id', $data['id'])->update($data);

        if ($destination) {
            return back()->with('status', 'Destination modifiée avec succès');
        }else
        {
            return back()->with('status', 'Destination non modifiée, réessayez !');
        }
    }

    public function destinations()
    {
        $destinations = Destination::all();
        $villes = Ville::all();
        $gares = Gare::all();

        foreach ($destinations as $value2) {

            foreach ($villes as $value) {
                if($value2->ville_d == $value->id){
                    $value2->ville_d = $value->name;
                }
                if($value2->ville_a == $value->id){
                    $value2->ville_a = $value->name;
                }
            }
        }

        return view('admin.admin-ges-destination', ['destinations'=>$destinations,
                                                    'villes'=>$villes,
                                                    'gares'=>$gares]);
    }
    public function indexUtilisateurs(){}
    public function indexMonCompte(){}


    public function tarifs()
    {
        $tarifs = Destination::all();

        return view('admin.admin-ges-tarifs', ['tarifs'=>$tarifs]);
    }

    public function users()
    {
        $users = User::where('id', '>', 1)->get()->load('rule');

        return view('admin.admin-ges-users', ['users'=>$users]);

    }

    public function user()
    {
        $user = User::where('id', Auth::user()->id)->first()->load('rule');
        //dd($user);

        return view('admin.admin-mon-compte', ['user'=>$user]);

    }

    public function updateUser(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;
        $user->phone = $request->phone;

        if($user->save()){
            return Redirect::back()->with('status', 'Updated successfully');
        }else{
            return Redirect::back()->with('status', 'Fail to update');
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if($user->delete()){
            return Redirect::back()->with('status', 'Utilisateur supprimé avec succès !');
        }else{
            return Redirect::back()->with('status', 'Utilisateur non supprimé, réessayez !');
        }
    }

    public function updatePassword(Request $request, $id){
        $data = [
            'last_password' => $request['last_password'],
            'password' => $request['password'],
            'password2' => $request['password2']
        ];

        $user = User::find($id);

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

    public function changeTravelStatus($id, $status){
        $travel = Travel::find($id);
        $travel->state = $status;

        if($travel->save){
            return back()->with('status', 'Statut du voyage changé avec succès !');
        }else{
            return back()->with('status', 'Statut non modifié, réessayez !!');
        }
    }
}
