<!DOCTYPE html>
<html class="no-js">
<!--<![endif]-->
<head>
    <html prefix="og: http://ogp.me/ns#">
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rapport Employeé | <?php echo date("d-m-Y");?></title>
</head>
<?php $getdata = DB::select('select * from companys where id='.$data['emp']->company_id);?>

<center>
<table class="minimalistBlack">
<tbody>
<tr>
<td style="font-size:25px;">Nom complèt : </td>
<td style="font-size:25px;">{{ $data['emp']->nom_complete }}</td>

</tr>
<tr>
<td style="font-size:25px;">N°dossier : </td>
<td style="font-size:25px;">{{ $data['emp']->n_dossier }}</td>

</tr>
<tr>
<td style="font-size:25px;">Cart national : </td>
<td style="font-size:25px;">{{ $data['emp']->cin }}</td>

</tr>
<tr>
<td style="font-size:25px;">Caise sociale : </td>
<td style="font-size:25px;">{{ $data['emp']->cnss }}</td>
</tr>


<tr>
<td style="font-size:25px;">N°télèphone : </td>
<td style="font-size:25px;">{{ $data['emp']->n_telephone }}</td>
</tr>
<tr>
<td style="font-size:25px;">N°compte : </td>
<td style="font-size:25px;">{{ $data['emp']->n_banquer }}</td>
</tr>

<tr>
<td style="font-size:25px;">Date debut : </td>
<td style="font-size:25px;">{{ Carbon\Carbon::parse($data['emp']->date_debut)->format('Y-m-d') }}</td>
</tr>

<tr>
<td style="font-size:25px;">Addresse 1 :</td>
<td style="font-size:25px;">{{ $data['emp']->addr1 }}</td>
</tr>

<tr>
<td style="font-size:25px;">Addresse 2 :</td>
<td style="font-size:25px;">{{ $data['emp']->addr2 }}</td>
</tr>

<tr>
<td style="font-size:25px;">Addresse 3 :</td>
<td style="font-size:25px;">{{ $data['emp']->addr3 }}</td>
</tr>

<tr>
<td style="font-size:25px;">Date naissance :</td>
<td style="font-size:25px;">{{ Carbon\Carbon::parse($data['emp']->date_n)->format('Y-m-d') }}</td>
</tr>

<tr>
<td style="font-size:25px;">Prix/jour :</td>
<td style="font-size:25px;">{{ $data['emp']->prix_jour }} (DHS)</td>
</tr>

<tr>
<td style="font-size:25px;">Sociétè :</td>
<?php $getdata = DB::select('select * from companys where id='.$data['emp']->company_id);?>
<td style="font-size:25px;">{{ $getdata[0]->raison_social }}</td>
</tr>

<tr>
<td style="font-size:25px;">Enregistré à :</td>
<td style="font-size:25px;">{{ $data['emp']->created_at }}</td>
</tr>
</tbody>
</table>

<h2>Paiements details : </h2>

<table class="minimalistBlack">
<tbody>
<?php $getpaiements = DB::select('select * from paiementemployees where employee_id='.$data['emp']->id);?>
@foreach ($getpaiements as $paie)
<tr>
<td style="font-size:25px;">Montant : {{ $paie->salaire_total }}</td>
<td style="font-size:25px;">Date debut : {{ $paie->debut }}</td>
<td style="font-size:25px;">Date fin : {{ $paie->fin }}</td>
<td style="font-size:25px;">N°jour : {{ $paie->n_jours }}</td>
<td style="font-size:25px;">Prix/jour : {{ $paie->prix_jour }}(DHS)</td>
</tr>
@endforeach
<br>
</tbody>
</table>
</center>

<center><footer style="font-size:20px;">Copyright {{$getdata[0]->raison_social}} | {{$getdata[0]->ville}} . ICE : xxxxxxx . {{$getdata[0]->details}}</footer></center>

<style type="text/css">
	table.minimalistBlack {
  border: 3px solid #000000;
  width: 100%;
  text-align: left;
  border-collapse: collapse;
}
table.minimalistBlack td, table.minimalistBlack th {
  border: 1px solid #000000;
  padding: 5px 4px;
}
table.minimalistBlack tbody td {
  font-size: 13px;
}
table.minimalistBlack thead {
  background: #CFCFCF;
  background: -moz-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
  background: -webkit-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
  background: linear-gradient(to bottom, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
  border-bottom: 3px solid #000000;
}
table.minimalistBlack thead th {
  font-size: 15px;
  font-weight: bold;
  color: #000000;
  text-align: left;
}
table.minimalistBlack tfoot {
  font-size: 14px;
  font-weight: bold;
  color: #000000;
  border-top: 3px solid #000000;
}
table.minimalistBlack tfoot td {
  font-size: 14px;
}

@page {
                margin: 0cm 0cm;
            }

            /** Define now the real margins of every page in the PDF **/
            body {
                margin-top: 2cm;
                margin-left: 2cm;
                margin-right: 2cm;
                margin-bottom: 2cm;
            }

            /** Define the header rules **/
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;

                /** Extra personal styles **/
                background-color: white;
                color: white;
                text-align: center;
                line-height: 1.5cm;
            }

            /** Define the footer rules **/
            footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 2cm;

                /** Extra personal styles **/
                background-color: white;
                color: black;
                text-align: center;
                line-height: 1.5cm;
            }
</style>