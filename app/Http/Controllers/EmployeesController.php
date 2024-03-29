<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostFormRequest;
use Response;
use App\Models\Employees;
use App\Models\EmployeesImg;

use DataTables;

class EmployeesController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:employees-list|employees-create|employees-edit|employees-delete', ['only' => ['index','store']]);
         $this->middleware('permission:employees-create', ['only' => ['create','store']]);
         $this->middleware('permission:employees-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:employees-delete', ['only' => ['destroy']]);
    }
   
    public function index() {
        $data['title'] = "Sjpromoteur List des employeés";
        return view('employees.index',compact('data'));
    }

    public function Employeeslistajax(Request $request){
    if ($request->ajax()) {
            $employees = Employees::latest()->get();
            return Datatables::of($employees)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='/emps/$row->id/edit/' class='btn btn-dark btn-sm'><i class='fas fa-cog'></i></a> 
                    <a href='/emps/$row->id/' class='btn btn-primary btn-sm'><i class='fas fa-eye'></i></a>";
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                
                ->make(true);
        }
 
    }

    public function create()
    {   
        //$data['societes'] = Amical::all();
        $data['title'] = "Sjpromoteur Ajouté un employeé";
        return view('employees.create',compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nom_complete' => 'required|unique:employees',
            'cin' => 'required|unique:employees',   
        ]);

        $data = new Employees();
        $data->realise_par = \Auth::User()->name;     
        $data->nom_complete = $request->get('nom_complete');
        $data->cin = $request->get('cin');
        $data->cnss = $request->get('cnss');
        $data->n_telephone = $request->get('n_telephone');
        $data->fonction = $request->get('fonction'); 
        $data->n_banquer = $request->get('n_banquer'); 
        $data->n_dossier = $request->get('n_dossier');
        $data->date_debut = $request->get('date_debut');
        $data->addr1 = $request->get('addr1');
        $data->addr2 = $request->get('addr2');
        $data->observation = $request->get('observation');
        $data->n_jours = $request->get('n_jours'); 
        $data->prix_jour = $request->get('prix_jour');   
        $data->salaire_total = $request->get('salaire_total');         
        $data->save();
        return redirect()->route('emps.index')
                        ->with('success','Employeé ajouter avec succée');
    }


    public function edit($id)
    {
        $emp = Employees::find($id);
        //$data['societes'] = Amical::all();
        return view('employees.edit',compact('emp'));
    }


    public function update(Request $request,$id) {
        $this->validate($request, [
            'nom_complete' => 'required',
            'cin' => 'required',
        ]);

        //$realise_par = \Auth::User()->name;
        $nom_complete = $request->input('nom_complete');
        $cin = $request->input('cin');
        $cnss = $request->input('cnss');
        $n_telephone = $request->input('n_telephone');
        $fonction = $request->input('fonction');
        $n_banquer = $request->input('n_banquer');
        $n_dossier = $request->input('n_dossier');
        $date_debut = $request->input('date_debut');
        $addr1 = $request->input('addr1');
        $addr2 = $request->input('addr2');
        $observation = $request->input('observation');
        $n_jours = $request->input('n_jours');
        $prix_jour = $request->input('prix_jour');
        $salaire_total = $request->input('salaire_total');

        DB::update('update employees set nom_complete=?,cin=?,cnss=?,n_telephone=?,fonction=?,n_banquer=?,n_dossier=?,date_debut=?,addr1=?,addr2=?,observation=?,n_jours=?,prix_jour=?,salaire_total=? where id = ?',[$nom_complete,$cin,$cnss,$n_telephone,$fonction,$n_banquer,$n_dossier,$date_debut,$addr1,$addr2,$observation,$n_jours,$prix_jour,$salaire_total,$id]);

    return redirect('/emps/'.$id)->with('success', 'Employeé modifié avec succée');

    }

    public function show($id)
    {
        $data['emp'] = Employees::find($id);
        
        return view('employees.show',compact('data'));
    }
    public function destroy($id) {

        $pack = Employees::find($id);
        $pack->delete();
        return redirect('emps')->with('success', 'Employeé supprimé avec succée');

    }

    public function ScanEmpup(Request $req, $id){
    $req->validate([
      'imageFile' => 'required',
      'imageFile.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048',
      
    ]);

    if($req->hasfile('imageFile')) {
        foreach($req->file('imageFile') as $file)
        {
            $name = $file->getClientOriginalName();
            $file->move(public_path().'/employees/', $name);  
            $imgData = $name;  
        }

        $fileModal = new EmployeesImg();
        $fileModal->cheque_id = $id;
        $fileModal->file_type = $req->input('file_type');
        $fileModal->name = $req->input('name');
        $fileModal->image_path = str_replace('"', "", $imgData);
        $fileModal->save();

       return back()->with('success', 'Document assigné avec succé');
    }
  }

  public function destroyEmpDoc($id) {

        $pack = EmployeesImg::find($id);
        $pack->delete();
        return back()->with('success', 'Document supprimé avec succée');

    }



}
