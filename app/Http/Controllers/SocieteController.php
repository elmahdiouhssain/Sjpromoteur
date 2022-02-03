<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Amical;
use App\Models\Company;
use DataTables;

class SocieteController extends Controller
{
    //
    function __construct()
    {
         $this->middleware('permission:amical-list|amical-create|amical-edit|amical-delete', ['only' => ['index','store']]);
         $this->middleware('permission:amical-create', ['only' => ['create','store']]);
         $this->middleware('permission:amical-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:amical-delete', ['only' => ['destroy']]);
    }

    public function Amicalslistajax(Request $request){
    if ($request->ajax()) {
            $amicals = Amical::latest()->get();
            return Datatables::of($amicals)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='/amicals/$row->id/edit/' class='btn btn-dark btn-sm'><i class='fas fa-cog'></i></a>";
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
 
    }

    public function index() {
        $data['title'] = "Sjpromoteur Amicals";
        $data['societes'] = Amical::all();
        return view('societes.index',compact('data'));
    }

    public function create(){
        return view('societes.create');
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

        $amical = new Amical();
        $amical->raison_social = $request->get('raison_social');
        $amical->raison_social_ar = $request->get('raison_social_ar');
        $amical->rib = $request->get('rib');
        $amical->details = $request->get('details');
        $amical->slug = Str::slug($amical->raison_social);
        $duplicate = Amical::where('slug', $amical->slug)->first();
        if ($duplicate) {
          return redirect('/amicals')->withErrors('Raison social déja exists.')->withInput();
        }
        $amical->save();
        //$input = $request->all();
        //$user = Amical::create($input);
        return redirect()->route('amicals.index')
                        ->with('success','Amical ajouter avec succée');
    }

    public function edit($id)
    {
        $societe = Amical::find($id);
        return view('societes.edit',compact('societe'));
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
        $societe = Amical::find($id);
        $societe->raison_social = $request->input('raison_social');
        $societe->logo = $request->input('logo');
        $societe->details = $request->input('details');
        $societe->raison_social_ar = $request->input('raison_social_ar');
        $societe->rib = $request->input('rib');
        $societe->save();
        return redirect()->route('amicals.index')
                        ->with('success','Amical modifié avec succée');
    }
    public function destroy($id)
    {
        Amical::find($id)->delete();
        return redirect()->route('amicals.index')
                        ->with('success','Amical supprimé avec succée');
    }
}
