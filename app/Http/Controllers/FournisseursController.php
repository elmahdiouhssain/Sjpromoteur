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

    public function FournisseurAjax(Request $request){

        if ($request->ajax()) {
            $fournisseurs = Fournisseur::latest()->get();
            return Datatables::of($fournisseurs)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='/fournisseurs/$row->id' class='btn btn-dark btn-sm'><i class='fas fa-cog'></i></a>";
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function store(Request $request)
        {
            $this->validate($request, [
            'raison_s' => 'required|unique:fournisseurs',
            'ice' => 'required|unique:fournisseurs',
                
        ]);
            
        $post = new Fournisseur();
        $post->raison_s = $request->input('raison_s');
        $post->ice = $request->input('ice');
        $post->addr1 = $request->input('addr1');
        $post->n_telephone = $request->input('n_telephone');
        $post->realise_par = \Auth::User()->name;
        $post->email = $request->input('email');
        $post->c_bancaire = $request->input('c_bancaire');
        $post->observations = $request->input('observations');


        $duplicate = Fournisseur::where('raison_s', $post->raison_s)->first();
        if ($duplicate) {
          return redirect('/fournisseurs')->with('danger', 'Fournisseur est déja inseré');
        }

        $post->save();
        return redirect('/fournisseurs')->with('success', 'Fournisseur enregistré avec succeé');
        }

        public function show($id) {
            $fournisseur = DB::select('select * from fournisseurs where id ='.$id);
            return view('fournisseurs.editfournisseur',['fournisseur'=>$fournisseur]);

        }

        public function update(Request $request,$id) {
            $raison_s = $request->input('raison_s');
            $ice = $request->input('ice');
            $addr1 = $request->input('addr1');
            $n_telephone = $request->input('n_telephone');
            $email = $request->input('email');
            $c_bancaire = $request->input('c_bancaire');
            $observations = $request->input('observations');

            DB::update('update fournisseurs set raison_s=?,ice=?,addr1=?,n_telephone=?,email=?,c_bancaire=?,observations=? where id = ?',[$raison_s,$ice,$addr1,$n_telephone,$email,$c_bancaire,$observations,$id]);

            return redirect('/fournisseurs')->with('success', 'Le fournisseurs est Modifier avec succée');

        }

        public function destroy($id) {

            $pack = Fournisseur::find($id);
            $pack->delete();
            return redirect('/fournisseurs')->with('success', 'Fournisseurs supprimé avec succée');

        }



}
