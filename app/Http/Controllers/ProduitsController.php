<?php

namespace App\Http\Controllers;

use App\Models\Produits;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ProduitsController extends BaseController
{


    public function index()
    {
        /*User::create([
            'name' => 'papi',
            'email' => 'pi@gmail.com',
            'password' => bcrypt('passer'),
        ]);*/
        $produits= Produits::all();
        return view('admin.produits',compact('produits'));



    }

    public function indexbis()
    {
        $produits= Produits::all();
        return view('index',compact('produits'));
    }
    public function indexmenu()
    {
        $produits= Produits::all();
        return view('menu',compact('produits'));
    }
    public function indexpanier()
    {
        $produits= Produits::all();
        return view('panier',compact('produits'));
    }








    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produit = new Produits();
        return view('admin.addProduits',compact('produit'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result =   $request->validate(
            [
                'nom' =>  'required',
                'description' =>  'required',
                'prix' =>  'required',
                'image' =>  'required|',

            ]
        );
     Produits::create($result);
        return redirect('admin/produits')->with('success',' Un Nouveau Programme a ete ajouter ');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produit= Produits::find($id);
        return view('admin.addProduits',compact('produit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $produit = Produits::find($request['id']);
        $produit ->nom = $request['nom'];
        $produit ->description = $request['description'];
        $produit ->prix = $request['prix'];
        $produit ->quantite = $request['quantite'];
        $produit ->images = $request['image'];

        $produit ->save();
        return redirect('admin.produits')->with('success','Le Programme est  modifie avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $ev =new Produits();
        $ev->find($id)->delete();
        return to_route('admin.produits');
    }


}
