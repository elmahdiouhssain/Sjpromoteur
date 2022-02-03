<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostFormRequest;
use Response;
use App\Models\User;
use App\Models\Cheque;
use App\Models\Societe;

class StatistiquesController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('permission:statistiques-list|statistiques-create|statistiques-edit|statistiques-delete', ['only' => ['index','store']]);
        $this->middleware('permission:statistiques-create', ['only' => ['create','store']]);
        $this->middleware('permission:statistiques-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:statistiques-delete', ['only' => ['destroy']]);
    }

    public function index() {
        $data['title'] = "Sjpromoteur Statistiques";
        //$data['cheques'] = Cheque::all();
        return view('statistiques.index');
    }
}
