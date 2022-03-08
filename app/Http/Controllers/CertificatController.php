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
    function __construct()
    {
        $this->middleware('permission:certificat-list|certificat-create|certificat-edit|certificat-delete', ['only' => ['index','store']]);
        $this->middleware('permission:certificat-create', ['only' => ['create','store']]);
        $this->middleware('permission:certificat-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:certificat-delete', ['only' => ['destroy']]);
    }
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

    public function show($id)
    {
        $data['cert'] = Certificat::find($id);
        return view('certificats.show',compact('data'));
    }

    public function update(Request $request,$id) {
            $cert_titre = $request->input('cert_titre');
            $cert_body = $request->input('cert_body');
            DB::update('update certs set cert_titre=?,cert_body=? where id = ?',[$cert_titre,$cert_body,$id]);

            return redirect('/certificats')->with('success', 'La certifiacat est a jour avec succée');

        }

    public function destroy($id) {

        $pack = Certificat::find($id);
        $pack->delete();
        return redirect('/certificats')->with('success', 'Certificats supprimé avec succée');

    }
}
