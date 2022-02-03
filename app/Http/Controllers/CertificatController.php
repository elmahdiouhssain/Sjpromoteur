<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostFormRequest;
use Response;
use App\Models\User;
//use App\Models\Cheque;
use App\Models\Certificat;

class CertificatController extends Controller
{
    //
    public function index() {
        $data['title'] = "Sjpromoteur Certificats";
        //$data['cheques'] = Cheque::all();
        $data['certificats'] = Certificat::all();
        return view('certificats.index',compact('data'));
    }

     public function store(Request $request)
        {
        
        $post = new Certificat();
        $post->cert_titre = $request->get('cert_titre');
        $post->cert_body = $request->get('cert_body');
        $post->created_by = \Auth::User()->name;

        $duplicate = Certificat::where('cert_titre', $post->cert_titre)->first();
        if ($duplicate) {
          return redirect('/certificats')->withErrors('Certificat déja existe.')->withInput();
        }
        $post->save();
        return redirect('/certificats')->with('success', 'Certificat enregistré avec succeé');
        }

    public function destroy($id) {

        $pack = Certificat::find($id);
        $pack->delete();
        return redirect('/certificats')->with('success', 'Certificats supprimé avec succée');

    }
}
