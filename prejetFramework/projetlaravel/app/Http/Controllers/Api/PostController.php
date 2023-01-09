<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\utilisateur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Utilisateurs;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class PostController extends Controller
{





    function generateMatricule($n = 3)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return '2022-' . $randomString;
    }





    public function create(Request $request)
    { $etat = '1';
        $user =new Utilisateur;
        $user->matricule = $this->generateMatricule();
        $user->nom = $request->get('nom');
        $user->prenom = $request->get('prenom');
        $user->email = $request->get('email');

        $user->motdepasse = $request->get('motdepasse');

        $user->role = $request->get('role');
        $user->etat = $etat;
        $user->photo = 'avatarr.jpg';
        $user->save();

        return response()->json($user);
    }

    public function show(string $id)
    {
        $users = Utilisateur::findOrFail($id);

        return response()->json($users);
    }

    public function update(string $id, Request $request)
    {

        { $user =  Utilisateur::findOrFail($id);

            $email = $request->get('email');

        
            if ($user->email !== $email) {

                $u =  Utilisateur::all();
                foreach ($u as $user) {
            if ($user->email === $email) {

                $request->validate([

                    'email' => ['confirmed'],

                ]);
            }
        }
         }

        $user =  Utilisateur::findOrFail($id);
        $user->nom = $request->get("nom");
        $user->prenom = $request->get("prenom");
        $user->email = $request->get("email");
        $user->date_modification = date("y-m-d h:i:s");
        $user->save();
 return response()->json($user);
    }



    }

    public function destroy(string $id)
    {
        Utilisateur::destroy($id);

        $users = Utilisateur::all();
        return response()->json($users);

    }








    public function data()
    {
        $users = Utilisateur::all();
        return response()->json($users);

    }
}
