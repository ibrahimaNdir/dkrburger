<?php

namespace App\Http\Controllers;

use App\Models\DetailsCommandes;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class DetailsCommandesController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $details = DetailsCommandes::all();
        return view('admin.detailscommandes',compact('details'));

    }


}
