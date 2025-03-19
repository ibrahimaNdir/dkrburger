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
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class StatsController extends BaseController
{

    public function index()
    {
        $year = Carbon::now()->year;
        $chartData = $this->getChartData($year);

        return view('admin.stats', [
            'chartData' => json_encode($chartData),
            'currentYear' => $year
        ]);
    }

    public function getChartData($year = null)
    {
        $year = $year ?? Carbon::now()->year;

        $commandesParMois = Commandes::selectRaw('EXTRACT(MONTH FROM created_at) as mois, COUNT(*) as total')
            ->whereYear('created_at', $year)
            ->groupBy('mois')
            ->orderBy('mois')
            ->get();

        $moisLabels = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'];
        $data = array_fill(0, 12, 0);

        foreach ($commandesParMois as $commande) {
            $index = intval($commande->mois) - 1; // Convertir en entier
            $data[$index] = $commande->total;
        }

        return [
            'labels' => $moisLabels,
            'data' => $data,
        ];



    }





}
