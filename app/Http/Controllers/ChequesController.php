<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostFormRequest;
use Response;
use App\Models\User;
use App\Models\Cheque;
use App\Models\Amical;
use App\Models\Company;
use App\Models\ChequesImg;

use DataTables;

class ChequesController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:cheque-list|cheque-create|cheque-edit|cheque-delete', ['only' => ['index','store']]);
         $this->middleware('permission:cheque-create', ['only' => ['create','store']]);
         $this->middleware('permission:cheque-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:cheque-delete', ['only' => ['destroy']]);
    }

    public function index() {
        $data['title'] = "Sjpromoteur Cheques";
        $data['societes'] = Amical::all();
        return view('cheques.index',compact('data'));
    }

    public function Chelistajax(Request $request){

        if ($request->ajax()) {
            $cheques = Cheque::latest()->get();
            return Datatables::of($cheques)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='/stats-cheques/$row->id' class='btn btn-dark btn-sm'><i class='fas fa-cog'></i></a>";
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function store(Request $request)
        {
            $this->validate($request, [
            'designation' => 'required|min:3',
            'verse_par' => 'required',
            'n_marche' => 'required',
                
        ]);
            
        $post = new Cheque();
        $post->date_cheque = $request->input('date_cheque');
        $post->type_op = $request->input('type_op');
        $post->designation = $request->input('designation');
        $post->n_marche = $request->input('n_marche');
        $post->realise_par = \Auth::User()->name;
        $post->societe = $request->input('societe');
        $post->verse_par = $request->input('verse_par');
        $post->credit = $request->input('credit');
        $post->debit = $request->input('debit');

        $duplicate = Cheque::where('designation', $post->designation)->first();
        if ($duplicate) {
          return redirect('/stats-cheques')->with('danger', 'Désignation est déja inseré');
        }

        $post->save();
        return redirect('/stats-cheques')->with('success', 'Chèque enregistré avec succeé');
        }
    

    public function show($id) {
    $cheque = DB::select('select * from cheques where id ='.$id);
    $data['societes'] = Amical::all();
    return view('cheques.edit_cheque',['cheque'=>$cheque,'data'=>$data]);

    }

    public function update(Request $request,$id) {
        $date_cheque = $request->input('date_cheque');
        $type_op = $request->input('type_op');
        $designation = $request->input('designation');
        $n_marche = $request->input('n_marche');
        $realise_par = \Auth::User()->name;
        $societe = $request->input('societe');
        $verse_par = $request->input('verse_par');
        $credit = $request->input('credit');
        $debit = $request->input('debit');

    DB::update('update cheques set date_cheque=?,type_op=?,designation=?,n_marche=?,realise_par=?,societe=?,verse_par=?,credit=?,debit=? where id = ?',[$date_cheque,$type_op,$designation,$n_marche,$realise_par,$societe,$verse_par,$credit,$debit,$id]);

    return redirect('/stats-cheques')->with('success', 'Le chèque est Modifier avec succée');

    }

    public function destroy($id) {

        $pack = Cheque::find($id);
        $pack->delete();
        return redirect('/stats-cheques')->with('success', 'Chèque supprimé avec succée');

    }

    public function UploadCheque(Request $req, $id){
    $req->validate([
      'imageFile' => 'required',
      'imageFile.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048',
      
    ]);
    if($req->hasfile('imageFile')) {
        foreach($req->file('imageFile') as $file)
        {
            $name = $file->getClientOriginalName();
            $file->move(public_path().'/cheques/', $name);  
            $imgData = $name;  
        }

        $fileModal = new ChequesImg();
        $fileModal->cheque_id = $id;
        $fileModal->file_type = $req->input('file_type');
        $fileModal->name = $req->input('name');
        $fileModal->image_path = str_replace('"', "", $imgData);
        $fileModal->save();

       return back()->with('success', 'File has successfully uploaded!');
    }
  }

    public function destroyCheque($id) {
        $pack = ChequesImg::find($id);
        $pack->delete();
         return back()->with('success', 'Document est supprimé avec succée');

}



}
