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

    public function indexVilles()
    {
        return view('admin.admin-ges-villes', ['villes' => Ville::all()]);
    }

    public function createVille(Request $request)
    {
        $ville = new Ville();
        $ville->create(['name' => $request->ville]);

        if ($ville) {
            return back()->within('status', 'Ville cr????e avec succ??s!');
        } else {
            return back()->within('status', 'Ville non cr????e, r??essayez!');
        }
    }

    public function editVille($id, Request $request)
    {
        $ville = Ville::find($id);

        if ($ville->update(['name' => $request->name])) {
            return back()->within('status', 'Ville modifi??e avec succ??s!');
        } else {
            return back()->within('status', 'Ville non modifi??e, r??essayez!');
        }

    }

    public function deleteVille($id)
    {
        $ville = Ville::find($id);

        if ($ville->delete()) {
            return back()->within('status', 'Ville supprim??e avec succ??s!');
        } else {
            return back()->within('status', 'Ville non supprim??e, r??essayez!');
        }

    }

    public function indexGares()
    {
        return view('admin.admin-ges-gares', ['gares' => Gare::all()]);
    }

    public function createGare(Request $request)
    {
        $gare = new Gare();
        $gare->create(['name' => $request->gare]);

        if ($gare) {
            return back()->within('status', 'Gare cr????e avec succ??s!');
        } else {
            return back()->within('status', 'Gare non cr????e, r??essayez!');
        }
    }

    public function editGare($id, Request $request)
    {
        $ville = Gare::find($id);

        if ($ville->update(['name' => $request->name])) {
            return back()->within('status', 'Gare modifi??e avec succ??s!');
        } else {
            return back()->within('status', 'Gare non modifi??e, r??essayez!');
        }

    }

    public function deleteGare($id)
    {
        $ville = Gare::find($id);

        if ($ville->delete()) {
            return back()->within('status', 'Gare supprim??e avec succ??s!');
        } else {
            return back()->within('status', 'Gare non supprim??e, r??essayez!');
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
            return back()->with('status', 'La ville et l\'heure de d??part ainsi que la ville et l\'heure d\'arriv??e doivent ??tre diff??rentes');
        }else{
            $destination = Destination::create($data);
            if($destination)
            {
                return back()->with('status', 'Destination cr????e avec succ??s !');
            }else
            {
                return back()->with('status', 'Echec de cr??ation de destination, r??essayez !');
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
            return back()->with('status', 'Destination modifi??e avec succ??s');
        }else
        {
            return back()->with('status', 'Destination non modifi??e, r??essayez !');
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

    public function lockUnlockUser($id){
        $user = User::find($id);

        if($user->actif == 0){
            $user->actif = 1;
            $user->update();
        }elseif ($user->actif == 1) {
            $user->actif = 0;
            $user->update();
        }

        return Redirect::back()->with('status', 'Utilisateur activ??/desactiv?? avec succ??s');
    }

    public function roleUser($id){
        $user = User::find($id);

        if($user->rule_id == 3){
            $user->rule_id = 2;
            $user->update();
        }elseif ($user->rule_id == 2) {
            $user->rule_id = 3;
            $user->update();
        }

        return Redirect::back()->with('status', 'R??le d\'utilisateur chang?? avec succ??s');
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
            return Redirect::back()->with('status', 'Utilisateur supprim?? avec succ??s !');
        }else{
            return Redirect::back()->with('status', 'Utilisateur non supprim??, r??essayez !');
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

                return back()->with('status', 'Mot de passe mis ?? jour');
            }else{
                return back()->with('status', "Assurez-vous de renseigner le m??me mot de passe dans les champs 'Nouveau mot de passe' et 'Confirmer votre mot de passe");
            }
        }
    }

    public function changeTravelStatus($id, $status){
        $travel = Travel::find($id);

        if($status === "null"){
            $travel->state = null;
        }else{
            $travel->state = $status;
        }

        if($travel->update()){
            return back()->with('status', 'Statut du voyage chang?? avec succ??s !');
        }else{
            return back()->with('status', 'Statut non modifi??, r??essayez !!');
        }
    }
}
