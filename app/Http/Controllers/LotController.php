<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
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
use App\Models\Lot;

use DataTables;

class LotController extends Controller
{
    //
    public function index() {
        $data['title'] = "Sjpromoteur lots";
        $data['lots'] = Lot::latest()->get();
        return view('lots.index',compact('data'));
    }
    public function LotsShowAjax(Request $request){

        if ($request->ajax()) {
            $lots = Lot::latest()->get();
            return Datatables::of($lots)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='/lots/$row->id' class='btn btn-dark fas fa-cog btn-sm'></a> ";
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
            }
    }

    public function create(){
        return view('lots.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'raison_social' => 'required',
            'raison_social_ar' => 'required',
            'ville' => 'required',
            'color' => 'required',
        ]);

        $lot = new Lot();
        $lot->raison_social = $request->get('raison_social');
        $lot->raison_social_ar = $request->get('raison_social_ar');
        $lot->ville = $request->get('ville');
        $lot->color = $request->get('color');
        $lot->slug = Str::slug($lot->raison_social);
        $duplicate = Lot::where('slug', $lot->slug)->first();
        if ($duplicate) {
          return redirect('/lots')->withErrors('Raison social déja exists.')->withInput();
        }
        $lot->save();
        return redirect()->route('lots.index')
                        ->with('success','Lotissement ajouter avec succée');
    }

    public function show($id)
    {
        $lot = Lot::find($id);
        return view('lots.edit',compact('lot'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'raison_social' => 'required',
            'raison_social_ar' => 'required',
            'ville' => 'required',
            'color' => 'required',

        ]);
    
        $input = $request->all();
        $lot = Lot::find($id);
        $lot->raison_social = $request->get('raison_social');
        $lot->raison_social_ar = $request->get('raison_social_ar');
        $lot->ville = $request->get('ville');
        $lot->color = $request->get('color');
        $lot->slug = Str::slug($lot->raison_social);
        $duplicate = Lot::where('slug', $lot->slug)->first();
        if ($duplicate) {
          return redirect('/lots')->with('danger','Raison social déja exists.');
        }
        $lot->save();
        return redirect()->route('lots.index')
                        ->with('success','Lotissement modifié avec succée');
    }

    public function destroy($id)
    {
        Lot::find($id)->delete();
        return redirect()->route('lots.index')
                        ->with('success','Lotissement supprimé avec succée');
    }
}
