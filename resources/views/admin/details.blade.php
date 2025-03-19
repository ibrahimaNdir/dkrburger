@extends('admin.sidebar')
@section('content')

    <div class="container text-center">
    <pre>
=================================
           🍔 ISI BURGER 🍔
           Dakar - Plateau
           📞 77 889 99 00
=================================
        🆔 Ticket N° {{ $commandes->id }}
        📅 {{ date('d M Y - H:i', strtotime($commandes->created_at)) }}
        👤 Client : {{ $commandes->prenom_nom }}
        📞 Téléphone : {{ $commandes->telephone }}

        @foreach ($details as $detail)
            🍔 {{ $detail->quantite }} x {{ $detail->nom }}   {{ number_format($detail->sous_total, 0, ',', ' ') }} FCFA
        @endforeach
-----------------------------------------

🚚 Frais de Livraison    {{ number_format($commandes->frais_livraison, 0, ',', ' ') }} FCFA
---------------------------------
🛒 TOTAL           {{ number_format($details->sum('total') + $commandes->frais_livraison, 0, ',', ' ') }} FCFA
💵 Paiement : En Espece
✅ Statut : {{ $commandes->statut }}
=================================
Merci pour votre commande ! 🎉
    </pre>
    </div>
@endsection
