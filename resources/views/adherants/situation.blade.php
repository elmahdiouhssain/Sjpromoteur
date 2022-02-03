<!DOCTYPE html>
<html class="no-js">
<!--<![endif]-->
<head>
    <html prefix="og: http://ogp.me/ns#">
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Situation du bien</title> 
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<?php $getdata = DB::select('select * from amicals where id='.$data['adherant']->societe_id);?>
  
<header>

<span style="color:black; font-size: 40px;">{{ $getdata[0]->raison_social }}</span>
<hr>
</header>


<center>
<br><br><br><span>Adhèrant : {{ $data['adherant']->nom_complete }} || Identité : {{ $data['adherant']->id_national }}</span><br>
<span>Date : <?php echo date("d-m-Y");?></span>
</center>
<center><h2> <u> Immobilier stituation : </u></h2></center><br>
<table class="minimalistBlack">
<thead>
<tr>
<th>Immobilier </th>
<th>Amical</th>
<th>Prix M²</th>
<th>M²</th>
<th>Total</th>
</tr>
</thead>
<tbody>

<tr>
<td>{{ $data['adherant']->imm_type }}</td>
<td>{{ $getdata[0]->raison_social }}</td>
<td>{{ $data['adherant']->pm2 }} (DHS)</td>
<td>{{ $data['adherant']->m2 }} (M²)</td>
<td>{{$data['m_imm']}} (DHS)</td>
</tr>

</tbody>

</tbody>
</table>
<br>
<center><h3>Montant versé : <te style="color:red;">{{ $data['adherant']->montant_verse }} (DHS)</te><h3></center>

<br>

<center><h2><u> Paiement stituation : </u></h2></center><br>
<table class="minimalistBlack">
<thead>
<tr>
<th>Paiements (tranches)</th>
<th>Date</th>
</tr>
</thead>
<tbody>

							<?php $i=0;?>
                                @foreach ($data['tranches'] as $tr)
                                    <?php $i+=1;?>
                                <tr>
                                    <td style="color:red;">Montant {{$i}} || {{ $tr->montant_verse }} (DHS)</te></td>
                                    <td> {{ $tr->created_at }}</td>
                                    </tr>@endforeach

</tbody>
<br>
<center>
	<h3>Total tranches : <te style="color:red;">{{  $data['t_tranches'] }} (DHS).</te></h3>
	<h3>Total tranches + Montant versé : <te style="color:red;">{{  $data['m_total1'] }} (DHS).</te></h3>
    @if ($data['adherant']->pm2 === "0")
    <h3>Le reste : <te style="color:red;"> ***** (DHS).</te></h3>
    @else
    <h3>Le reste : <te style="color:red;">{{  $data['m_reste'] }} (DHS).</te></h3>  
    @endif

	<br>
</center>
</table>

<footer> 
<hr>

  Copyright {{ $getdata[0]->raison_social }} &copy; <?php echo date("Y");?> </footer>
</body>
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