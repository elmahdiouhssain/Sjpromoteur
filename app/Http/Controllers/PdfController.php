<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Dompdf\Dompdf;
use Mpdf\Mpdf;
use App\Models\User;
use App\Models\Adherant;
use App\Models\Societe;
use App\Models\Tranche;
use App\Models\Certificat;
use App\Models\Demande;
use App\Models\Image;

class PdfController extends Controller
{
    
     // function to display preview
    public function previewRapport($id)
    {
        $data['adherant'] = Adherant::find($id);
        //$data['all_tranches'] = DB::select('select * from tranches where adherant_id ='.$id);
        $data['tranches'] =  $data['adherant']->tranches;
        //$data['certs'] = Certificat::all();
        /////calculation du montant immobilier///
        $data['m_imm'] = $data['adherant']->pm2 * $data['adherant']->m2;
        /////calculation du montant tranches///
        $data['t_tranches'] =$data['tranches']->sum('montant_verse');
        /////calculation du montant total tranches + montant versé///
        $data['m_total1'] = $data['t_tranches'] + $data['adherant']->montant_verse;
        /////calculation du montant reste au client///
        $data['m_reste'] = $data['m_imm'] - $data['m_total1'];


        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('adherants.situation',compact('data')));
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser
        $dompdf->stream('situation.pdf',['Attachment'=>false]);
        $options = $dompdf->getOptions();
        $options->setIsHtml5ParserEnabled(true);

        
        //return view('adherants.situation',compact('data'));
    }

    public function ShowAuthorisation($id) {
        //dd($id);

        $data['adherant'] = Adherant::find($id);
        //dd($data['adherant']->societe_id);
   
        return view('adherants.authorisation', compact('data'));
    }




    
}
