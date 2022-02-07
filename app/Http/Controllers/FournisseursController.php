<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostFormRequest;
use Response;
use App\Models\Fournisseur;

use DataTables;

class FournisseursController extends Controller
{
    //
    public function index() {
        $data['title'] = "Sjpromoteur List fournisseurs";
        $data['fournisseurs'] = Fournisseur::all();
        return view('fournisseurs.index',compact('data'));
    }
}
