<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Amical;
use App\Models\Company;

use DataTables;

class CompanyController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('permission:societe-list|societe-create|societe-edit|societe-delete', ['only' => ['index','store']]);
        $this->middleware('permission:societe-create', ['only' => ['create','store']]);
        $this->middleware('permission:societe-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:societe-delete', ['only' => ['destroy']]);
    }


    public function Complistajax(Request $request){
    if ($request->ajax()) {
            $companys = Company::latest()->get();
            return Datatables::of($companys)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='/companys/$row->id/edit/' class='btn btn-dark btn-sm'><i class='fas fa-cog'></i></a>";
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
 
    }

    public function index() {
        $data['title'] = "Sjpromoteur Societe";
        $data['societes'] = Company::all();
        return view('companys.companys',compact('data'));
    }

    public function create(){
        return view('companys.create');
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
            'raison_social' => 'required',
            'raison_social_ar' => 'required',
            'rib' => 'required',
            'details' => 'required',
 
        ]);

        $company = new Company();
        $company->raison_social = $request->get('raison_social');
        $company->raison_social_ar = $request->get('raison_social_ar');
        $company->rib = $request->get('rib');
        $company->details = $request->get('details');
        $company->fax = $request->get('fax');
        $company->ice = $request->get('ice');
        $company->ville = $request->get('ville');
        $company->slug = Str::slug($company->raison_social);
        $duplicate = Company::where('slug', $company->slug)->first();
        if ($duplicate) {
          return redirect('/companys')->withErrors('Raison social déja exists.')->withInput();
        }
        $company->save();
        return redirect()->route('companys.index')
                        ->with('success','Sociète ajouter avec succée');
    }




    public function edit($id)
    {
        $societe = Company::find($id);
        return view('companys.edit',compact('societe'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'raison_social' => 'required',
            'raison_social_ar' => 'required',
            'rib' => 'required',
            'details' => 'required',

        ]);
    
        $input = $request->all();
        $societe = Company::find($id);
        $societe->raison_social = $request->input('raison_social');
        $societe->logo = $request->input('logo');
        $societe->details = $request->input('details');
        $societe->raison_social_ar = $request->input('raison_social_ar');
        $societe->rib = $request->input('rib');
        $societe->fax = $request->input('fax');
        $societe->ice = $request->input('ice');
        $societe->ville = $request->input('ville');
        $societe->save();
        return redirect()->route('companys.index')
                        ->with('success','Sociète modifié avec succée');
    }
    public function destroy($id)
    {
        Company::find($id)->delete();
        return redirect()->route('companys.index')
                        ->with('success','Sociète supprimé avec succée');
    }



}
