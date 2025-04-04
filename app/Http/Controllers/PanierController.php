<?php

namespace App\Http\Controllers;

use
    App\Models\Produits;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class PanierController extends BaseController
{

    public function panier()
    {

        return view('panier');
    }

    public function ajouterAuPanier(Request $request)
    {
        $produitId = $request->input('produit_id');
        $quantite = $request->input('quantite', 1);


        $produit = Produits::find($produitId);

        if (!$produit) {
            return response()->json(['error' => 'Produit non trouvé'], 404);
        }


        $panier = session()->get('panier', []);

        // Vérifier si le produit existe déjà dans le panier
        if (isset($panier[$produitId])) {

            $panier[$produitId]['quantite'] += $quantite;
        } else {
            // Ajouter un nouveau produit au panier
            $panier[$produitId] = [
                'id' => $produit->id,
                'nom' => $produit->nom,
                'description' => $produit->description,
                'prix' => $produit->prix,
                'quantite' => $quantite,
                'image' => $produit->image,  // Ajouter l'image
            ];
        }

        session()->put('panier', $panier);


        $quantiteTotale = 0;
        foreach ($panier as $item) {
            $quantiteTotale += $item['quantite'];
        }

        return response()->json(['message' => 'Panier mis à jour', 'panierCount' => $quantiteTotale], 200);
    }


    public function supprimerDuPanier(Request $request)
    {

        if ($request->id) {
            $panier = session()->get('panier');
            if (isset($panier[$request->id])) {
                // Supprimer l'article du panier
                unset($panier[$request->id]);

                // Mettre à jour le panier dans la session
                session()->put('panier', $panier);
            }

            // Ajouter un message flash de succès

            return to_route('panier');

        }






    }
}
