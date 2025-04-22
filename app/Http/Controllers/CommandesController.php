<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use App\Models\Commandes;
use App\Models\DetailsCommandes;
use
    App\Models\Produits;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CommandesController extends BaseController
{

    public function index()
    {
        $commandes= Commandes::all();
        return view('admin.commandes',compact('commandes'));

    }

    public function create()
    {
        $commande = new Commandes();
        return view('commandes',compact('commande'));
    }
    public function edit(string $id)
    {
        $commandes = Commandes::findOrFail($id);
        return view('admin.commandes', compact('commandes'));
    }

    public function update(Request $request)
    {
        $result = $request->validate([
            'prenom_nom' => 'required',
            'telephone' => 'required',
            'email' => 'required',
            'adresse' => 'required',
            'statut' => 'required',

        ]);

        $commande= Commandes::find($request->id);

        // Utiliser les mêmes noms de champs que dans store()
        $commande->prenom_nom = $request->prenom_nom;
        $commande->telephone = $request->telephone;
        $commande->email = $request->email;
        $commande->adresse = $request->adresse;
        $commande->statue = $request->statue;


        $commande->save();
        return redirect()->route('admin.commandes');

    }










    public function destroy(string $id)
    {

        $ev =new Commandes();
        $ev->find($id)->delete();
        return to_route('admin.commandes');
    }


    public function store(Request $request)
    {
        // Validation des données

        $subject = 'Commande';

        $validated = $request->validate([
            'prenom_nom' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'adresse' => 'required|string|max:255',
            'statut' => 'required|string|max:50',

        ]);


        // Calcul du montant total à partir du panier
        $total = 0;
        if(session('panier')) {
            foreach(session('panier') as $item) {
                $total += $item['prix'] * $item['quantite'];
            }
        }

        // Démarrer une transaction DB pour garantir l'intégrité des données
        DB::beginTransaction();

        try {

            $commande = Commandes::create([
                'prenom_nom' => $validated['prenom_nom'],
                'telephone' => $validated['telephone'],
                'email' => $validated['email'],
                'adresse' => $validated['adresse'],
                'statut' => $validated['statut'],
            ]);

            // Enregistrement des détails de la commande
            if(session('panier')) {
                foreach(session('panier') as $id => $item) {
                    DetailsCommandes::create([
                        'commandes_id' => $commande->id,
                        'nom' => $item['nom'],
                        'prix' => $item['prix'],
                        'quantite' => $item['quantite'],
                        'sous_total' => $item['prix'] * $item['quantite'],
                        'total' => $total,
                    ]);
                }
            }

            $details = DetailsCommandes::where('commandes_id', $commande->id)->get();
            Mail::to('papeibrahima2000@gmail.com')->send(new Email($commande, $details,$subject));

            // Valider la transaction
            DB::commit();

            // Vider le panier
            session()->forget('panier');

            return redirect()->route('commande', ['id' => $commande->id])
                ->with('success', 'Votre commande a été enregistrée avec succès');

        } catch (\Exception $e) {
            DB::rollBack();
            // Afficher l'erreur pour le débogage
            dd($e->getMessage());

            return redirect()->back()
                ->with('error', 'Erreur: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function show($id)
    {
        $commandes = Commandes::findOrFail($id);
        $details = DetailsCommandes::where('commandes_id', $id)->get();

        return view('admin.details', compact('commandes', 'details'));
    }

}
