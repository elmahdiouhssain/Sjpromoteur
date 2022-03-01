<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Facture;
use App\Models\Amical;
use App\Models\Fournisseur;
use App\Models\Company;
use App\Models\Article;
use DataTables;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class FactureController extends Controller
{

    public function Falistajax(Request $request){
    if ($request->ajax()) {
            $factures = Facture::latest()->get();
            return Datatables::of($factures)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='/factures/$row->id/' class='fas fa-cog btn btn-primary btn-sm'></a> <a target=__blank href='factures/pdf/$row->id/'class='fas fa-file-download btn btn-success btn-sm'></a> 
                    ";
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
    {   
        $data['suppliers'] = Fournisseur::latest()->get();
        $data['companys'] = Company::latest()->get();
        return view('factures.create',compact('data'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'fournisseurs_id' => 'required',
            'realise_par' => 'required',
            'is_paid' => 'required',

        ]);

        $gen_uuid = IdGenerator::generate(['table' => 'factures', 'field' => 'uuid', 'prefix' =>'SJP-', 'length' => 10 ]);

        $post = new Facture();
        $post->uuid = $gen_uuid;
        $post->company_id = $request->input('company_id');
        $post->fournisseurs_id = $request->input('fournisseurs_id');
        $post->reference = $request->input('reference');
        $post->f_libelle = $request->input('f_libelle');
        $post->type_facture = $request->input('type_facture');
        $post->relase_date = date('Y-m-d H:i:s');
        $post->realise_par = \Auth::User()->name;
        $post->is_paid = $request->input('is_paid');
        $post->save();
        $invoice_id = $post->id;
        return redirect('/factures/'.$invoice_id)->with('success', 'Etape2 : selection du produits ');
    }

    public function show($fa_id)
    {
        $data['facture'] = Facture::find($fa_id);
        $data['products'] = Article::latest()->get();
        return view('factures.show',compact('data'));
    }

    public function createStep3(Request $request, $id){
        $this->validate($request, [
            'total_ht' => 'required',
        ]);
        $id = $request->input('inv_id');
        $total_price = $request->input('total_ht');
        $realise_par = \Auth::User()->name;
        $is_paid = $request->input('is_paid');
        DB::update('update factures set total_ht=?,is_paid=?,realise_par=? where id = ?',[$total_price,$is_paid,$realise_par,$id]);
        
        return redirect('/factures')->with('success', 'Facture enregistré avec succée');
    }

    public function showPDF($invoice_id)
    {

        $data['fac'] = Facture::find($invoice_id);
        $data['prod'] = DB::select('select * from productsfacture where invoice_id ='.$invoice_id);
        return view('factures.pdf',compact('data'));
    }

    

    public function destroy($id) {
            $pack = Facture::find($id);
            $pack->delete();
            return redirect('/factures')->with('success', 'facture supprimé avec succée');

    }
}
