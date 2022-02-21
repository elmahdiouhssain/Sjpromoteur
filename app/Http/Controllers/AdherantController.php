<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostFormRequest;
use Response;
use App\Models\User;
use App\Models\Adherant;
use App\Models\Amical;
use App\Models\Tranche;
use App\Models\Certificat;
use App\Models\Demande;
use App\Models\Image;

use DataTables;


class AdherantController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('permission:adherant-list|adherant-create|adherant-edit|adherant-delete', ['only' => ['index','store']]);
        $this->middleware('permission:adherant-create', ['only' => ['create','store']]);
        $this->middleware('permission:adherant-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:adherant-delete', ['only' => ['destroy']]);
    }

    public function index() {
        $data['title'] = "Sjpromoteur List adherants";
        //$data['adherants'] = Adherant::all();
        $data['amicals'] = Amical::all();
        //dd($data['amicals']);
        return view('adherants.index',compact('data'));
    }
    public function create()
    {   
        $data['societes'] = Amical::all();
        return view('adherants.create',compact('data'));
    }
  

    public function GetAll($id) {
        $data['title'] = "Amical full list";
        $data['adherants'] = DB::table('adherants')->where('societe_id',$id)->get();
        
        return view('adherants.flist',compact('data'));
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom_complete' => 'required|unique:adherants',
            'id_national' => 'required',
            'societe_id' => 'required',
            'montant_verse' => 'required',
        ]);

        $data = new Adherant();
        $data->realise_par = \Auth::User()->name;     
        $data->nom_complete = $request->get('nom_complete');
        $data->id_national = $request->get('id_national');
        $data->montant_verse = $request->get('montant_verse');
        $data->gsm = $request->get('gsm'); 
        $data->facade = $request->get('facade'); 
        $data->cote = $request->get('cote'); 
        $data->bloc = $request->get('bloc'); 
        $data->etage = $request->get('etage');   
        $data->m2 = $request->get('m2');   
        $data->pm2 = $request->get('pm2');   
        $data->sous_sol = $request->get('sous_sol');  
        $data->observation = $request->get('observation'); 
        $data->is_canceled = "0";  
        $data->commerciale = $request->get('commerciale'); 
        $data->imm_type = $request->get('imm_type');
        $data->societe_id = $request->get('societe_id');
        $data->ville = $request->input('ville'); 
        $data->n_dossier = $request->input('n_dossier');
        $data->n_appartement = $request->input('n_appartement');
           
        $data->save();
        return redirect()->route('adherants.index')
                        ->with('success','Adherant ajouter avec succée');
    }

    public function show($id)
    {
        $data['ads'] = Adherant::find($id);
        $data['tranches'] =  $data['ads']->tranches;
        /////calculation du montant immobilier///
        $data['m_imm'] = $data['ads']->pm2 * $data['ads']->m2;
        /////calculation du montant tranches///
        $data['t_tranches'] =$data['tranches']->sum('montant_verse');
        /////calculation du montant total tranches + montant versé///
        $data['m_total1'] = $data['t_tranches'] + $data['ads']->montant_verse;
        /////calculation du montant reste au client///
        $data['m_reste'] = $data['m_imm'] - $data['m_total1'];
        
        return view('adherants.show',compact('data'));
    }
    public function ShowAdherantcert(Request $request,$id)
    {
        $data['adherant'] = Adherant::find($id);
        $so_details = $request->input('so_details');
        
        return view('adherants.certificat',compact('data'));
    }
    public function UpdateArdetails(Request $request,$id) {
        //dd($ar_name);
        $this->validate($request, [
            'ar_name' => 'required',
            'id_national' => 'required',
            'ar_immtype' => 'required',
            'sous_sol' => 'required',
        ]);
        
        $ar_name = $request->input('ar_name');
        $id_national = $request->input('id_national');
        $ar_facade = $request->input('ar_facade');
        $ar_immtype = $request->input('ar_immtype');
        $sous_sol = $request->input('sous_sol');
        $sousol_prix = $request->input('sousol_prix');

        $balcon = $request->input('balcon');
        $balcon_prix = $request->input('balcon_prix');
        $balcon_superficier = $request->input('balcon_superficier');

        //$bloc_active = $request->input('bloc');
        
        DB::update('update adherants set ar_name=?,id_national=?,ar_facade=?,ar_immtype=?,sous_sol=?,sousol_prix=?,balcon=?,balcon_prix=?,balcon_superficier=? where id = ?',[$ar_name,$id_national,$ar_facade,$ar_immtype,$sous_sol,$sousol_prix,$balcon,$balcon_prix,$balcon_superficier,$id]);

    return redirect('/doc/authorisation/'.$id)->with('success', 'Authorisation du paiement generé avec succée');

    }

 
    public function Itbatbidafaa(Request $request,$id)
    {

        $data['adherant'] = Adherant::find($id);
        $data['tranches'] = $data['adherant']->tranches;
        $data['t_tranches'] = $data['tranches']->sum('montant_verse');
        $data['m_total1'] = $data['t_tranches'] + $data['adherant']->montant_verse;

        return view('adherants.confirmation',compact('data'));

    }

    public function Demandedannulation(Request $request,$id)
    {

        $data['adherant'] = Adherant::find($id);
        $data['tranches'] = $data['adherant']->tranches;
        $data['t_tranches'] = $data['tranches']->sum('montant_verse');
        $data['m_total1'] = $data['t_tranches'] + $data['adherant']->montant_verse;

        return view('adherants.annulation',compact('data'));

    }



    public function InsertTranch(Request $request)
    {
        $this->validate($request, [
            'montant_verse' => 'required',
            'observation' => 'required',
        ]);
        $data = new Tranche();
        $data->adherant_id = $request->input('adherant_id');
        $data->observation = $request->input('observation');
        $data->montant_verse = $request->input('montant_verse');    
        $data->save();
        return redirect('/adherants/'.$data->adherant_id)->with('success', 'Payment enregistré avec succée');
    }

        /////////////end demande///////////////////////
    public function destroyTranch($id) {

        $pack = Tranche::find($id);
        $pack->delete();
        //$data->adherant_id = $request->input('adherant_id');
        return redirect()->back()->with('success', 'Paiement supprimé avec succée');

    }

    public function edit($id)
    {
        $ads = Adherant::find($id);
        $data['societes'] = Amical::all();
        return view('adherants.edit',compact('ads','data'));
    }


    public function update(Request $request,$id) {
        $this->validate($request, [
            'nom_complete' => 'required',
            'societe_id' => 'required',
            'montant_verse' => 'required',
        ]);

        //$realise_par = \Auth::User()->name;
        $nom_complete = $request->input('nom_complete');
        $id_national = $request->input('id_national');
        $montant_verse = $request->input('montant_verse');
        $gsm = $request->input('gsm');
        $facade = $request->input('facade');
        $cote = $request->input('cote');
        $bloc = $request->input('bloc');
        $etage = $request->input('etage');
        $m2 = $request->input('m2');
        $pm2 = $request->input('pm2');
        $sous_sol = $request->input('sous_sol');
        $observation = $request->input('observation');
        $is_canceled = $request->input('is_canceled');
        $commerciale = $request->input('commerciale');
        $imm_type = $request->input('imm_type');
        $societe_id = $request->input('societe_id');
        $ville = $request->input('ville');
        $n_dossier = $request->input('n_dossier');
        $n_appartement = $request->input('n_appartement');
        $sousol_prix = $request->input('sousol_prix');  

        //dd($request->input());

        DB::update('update adherants set nom_complete=?, id_national=?,montant_verse=?,gsm=?,facade=?,cote=?,bloc=?,etage=?,m2=?,pm2=?,sous_sol=?,observation=?,is_canceled=?,commerciale=?,imm_type=?,societe_id=?,ville=?,n_dossier=?,n_appartement=?,sousol_prix=? where id = ?',[$nom_complete,$id_national,$montant_verse,$gsm,$facade,$cote,$bloc,$etage,$m2,$pm2,$sous_sol,$observation,$is_canceled,$commerciale,$imm_type,$societe_id,$ville,$n_dossier,$n_appartement,$sousol_prix,$id]);

    return redirect('/adherants/'.$id)->with('success', 'Client modifié avec succée');

    }
    public function destroy($id) {

        $pack = Adherant::find($id);
        $pack->delete();
        return redirect('/adherants')->with('success', 'Adherant supprimé avec succée');

    }

    public function fileUpload(Request $req, $id){
    $req->validate([
      'imageFile' => 'required',
      'imageFile.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048',
      
    ]);

    //dd($id);
    if($req->hasfile('imageFile')) {
        foreach($req->file('imageFile') as $file)
        {
            $name = $file->getClientOriginalName();
            $file->move(public_path().'/docs/', $name);  
            $imgData = $name;  
        }

        $fileModal = new Image();
        $fileModal->adherant_id = $id;
        $fileModal->file_type = $req->input('file_type');
        $fileModal->name = $req->input('name');
        $fileModal->image_path = str_replace('"', "", $imgData);
        $fileModal->save();

       return back()->with('success', 'File has successfully uploaded!');
    }
  }



  public function Adlistajax(Request $request)
{
    if ($request->ajax()) {
            $adherants = Adherant::latest()->get();
            return Datatables::of($adherants)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='/adherants/$row->id/edit/' class='btn btn-dark btn-sm'><i class='fas fa-cog'></i></a> 
                    <a href='/adherants/$row->id/' class='delete btn btn-primary btn-sm'><i class='fas fa-eye'></i></a>";
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                
                ->make(true);
        }
 
}




}
