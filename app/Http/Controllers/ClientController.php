<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{

    public function espace_membre(Request $request){

        if($request->session()->get('client')){
            return view('espaceclient');
        }else{
            return redirect('/login')->with('status', 'Vous devez vous connecter pour acceder au site.');
        }
        
    }

    public function form_register(Request $request)
    {
        if($request->session()->get('client')){
            return redirect('/espace-client')->with('status', 'Vous devez vous déconnecter avant de vous re-inscrire.');
        }

        return view('register');
    }

    public function form_login(Request $request)
    {
        if($request->session()->get('client')){
            return redirect('/espace-client')->with('status', 'Vous devez vous déconnecter avant de vous re-connecter.');
        }
        return view('login');
    }

    public function traitement_register(Request $request)
    {
        $request->validate([
            'email' => 'email|required|unique:clients',
            'password' => 'required|min:8',
            'nom' => 'required',
            'prenom' => 'required',
        ]);

        $client = new Client();
        $client->email = $request->input('email');
        $client->password = bcrypt($request->input('password'));
        $client->nom = $request->input('nom');
        $client->prenom = $request->input('prenom');
        $client->save();

        return redirect('/register')->with('status', 'Votre compte a bien été créé.');

    }

    public function traitement_login(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required|min:8',
        ]);

        $client = Client::where('email', $request->input('email'))->first();

        if($client){
            if(Hash::check($request->input('password'), $client->password)){

                $request->session()->put('client', $client);

                return redirect('/espace-client');

            }else{
                return back()->with('status', 'Identifiant ou mot de passe incorrect.');
            }
        }else{
            return back()->with('status', 'Désolé! vous n\'avez pas de compte cet email.');
        }

    }

    public function logout(Request $request)
    {
        $request->session()->forget('client');

        return redirect('/login')->with('status', 'Vous venez de vous déconnecter.');
    }

}
