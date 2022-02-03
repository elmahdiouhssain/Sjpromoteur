<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Facture;
use App\Models\Amical;


use DataTables;

class FactureController extends Controller
{

    public function Falistajax(Request $request){
    if ($request->ajax()) {
            $factures = Facture::latest()->get();
            return Datatables::of($factures)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='/factures/$row->id/edit/' class='btn btn-dark btn-sm'><i class='fas fa-cog'></i></a> 
                    <a href='/factures/$row->id/' class='delete btn btn-primary btn-sm'><i class='fas fa-eye'></i></a>";
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
 
}
    //
    public function index() {
        $data['title'] = "Sjpromoteur Factures";
        $data['societes'] = Amical::all();
        return view('factures.index',compact('data'));
    }

    public function create()
    {   //dd(\Auth::User()->name);
        //$data['societes'] = Societe::all();
        return view('factures.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'produit_name.*' => 'required',
            'telephone.*' => 'required',
            'quantite.*' => 'required',
            'prix_u.*' => 'required'
        ]);

        //dd($request->all());
        $data['description']->description = $request->get('description');
        $data['telephone']->telephone = $request->get('telephone');
        $data['total']->total = $request->get('total');
     
        foreach ($request->addMoreInputFields as $key => $value) {
            Facture::create($value);
        }

        return redirect()->route('factures.index')
                        ->with('success','Facture ajouter avec succée');
    }
}
