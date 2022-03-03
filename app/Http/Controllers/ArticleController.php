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
use App\Models\ProductFacture;
use DataTables;
class ArticleController extends Controller
{
    public function index() {
        $data['title'] = "Sjpromoteur Articles";
        $data['articles'] = Article::latest()->get();
        return view('articles.index',compact('data'));
    }
    public function ArticlesShowAjax(Request $request){

        if ($request->ajax()) {
            $articles = Article::latest()->get();
            return Datatables::of($articles)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = "<a href='/articles/$row->id' class='btn btn-dark fas fa-cog btn-sm'></a> ";
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
            }
        }

    public function store(Request $request)
        {
            $this->validate($request, [
            'nom' => 'required|min:3',
            'prix' => 'required',
            ]);
            
        $post = new Article();
        $post->nom = $request->input('nom');
        $post->unitaire = $request->input('unitaire');
        $post->prix = $request->input('prix');
        $post->tva = $request->input('tva');
        $post->descrip = $request->input('descrip');
        $post->observations = $request->input('observations');
        $post->realise_par = \Auth::User()->name;
        $post->save();
        return redirect('/articles')->with('success', 'Article enregistré avec succèe !');
    }

    public function destroyArticle($id) {
        $pack = Article::find($id);
        $pack->delete();
        return redirect('/articles')->with('success', 'Article supprimé avec succée');

    }

    public function InvoicesProductShowAjax(Request $request, $invoice_id) {
        $data['title'] = "Articles list ajax";
        $data['invoicesprod'] = DB::select('select * from productsfacture where invoice_id ='.$invoice_id);
        return response()->json($data['invoicesprod']);
    }

    public function storeProdforInvoice(Request $request)
        {
            $this->validate($request, [
                'invoice_id' => 'required',
                'designation' => 'required',
                'uml' => 'required',
                'qte' => 'required',
                'p_u' => 'required',
                'p_t' => 'required',
            ]);
            $prod = new ProductFacture();
            $prod->invoice_id = $request->input('invoice_id');
            $prod->designation = $request->input('designation');
            $prod->uml = $request->input('uml');
            $prod->qte = $request->input('qte');
            $prod->p_u = $request->input('p_u');
            $prod->p_t = $request->input('p_t');
            $prod->save();
            return response()->json([
                    'status'=>200,
                    'message'=>'Product added to invoice successfully',
                ]);
        }


    public function destroyProdArticle($id) {
            $product = ProductFacture::find($id);
            $product->delete();
            return response()->json([
                'status'=>200,
                'message'=>"Produit supprimé avec succée !",
            ]);

    }


    public function show($id){
        $article = DB::select('select * from articles where id ='.$id);
        return view('articles.edit',['article'=>$article]);
    }
    

    public function update(Request $request,$id){
     
        $this->validate($request, [
            'nom' => 'required',
            'prix' => 'required',
        ]);
        $id = $request->input('getid');
        $nom = $request->input('nom');
        $unitaire = $request->input('unitaire');
        $prix = $request->input('prix');
        $tva = $request->input('tva');
        $descrip = $request->input('descrip');
        $observations = $request->input('observations');

        DB::update('update articles set nom=?,unitaire=?,prix=?,tva=?,descrip=?,observations=? where id = ?',[$nom,$unitaire,$prix,$tva,$descrip,$observations,$id]);

        return redirect('/articles')->with('success', 'L Article est Modifier avec succée');
    }

}
