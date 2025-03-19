<!DOCTYPE html>
<html>
<head>
    <title>  {{$subject}};</title>
</head>
<body>
<h1>Nouvelle commande #{{ $commande->id }}</h1>

<h2>Informations client :</h2>
<p><strong>Nom :</strong> {{ $commande->prenom_nom }}</p>
<p><strong>Téléphone :</strong> {{ $commande->telephone }}</p>
<p><strong>Email :</strong> {{ $commande->email }}</p>
<p><strong>Adresse :</strong> {{ $commande->adresse }}</p>

<h2>Détails de la commande :</h2>
<table border="1" cellpadding="8" cellspacing="0">
    <thead>
    <tr>
        <th>Produit</th>
        <th>Prix</th>
        <th>Quantité</th>
        <th>Sous-total</th>
    </tr>
    </thead>
    <tbody>
    @foreach($details as $detail)
        <tr>
            <td>{{ $detail->nom }}</td>
            <td>{{ $detail->prix }} Fcfa</td>
            <td>{{ $detail->quantite }}</td>
            <td>{{ $detail->sous_total }} Fcfa</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td colspan="3"><strong>Total</strong></td>
        <td>{{ $details->first()->total }} €</td>
    </tr>
    </tfoot>
</table>

<p>Merci de traiter cette commande rapidement.</p>
</body>
</html>
