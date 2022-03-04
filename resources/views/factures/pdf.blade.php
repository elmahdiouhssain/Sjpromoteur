<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>{{$data['fac']->type_facture}} | N° {{$data['fac']->uuid}}</title>
    <link rel="stylesheet" href="style.css" media="all" />
  </head>
  <body>
    <?php $get_comp = DB::select('select * from companys where id='.$data['fac']->company_id); ?>
    <header class="clearfix">
      <div id="logo">
        @if(isset($get_comp[0]))
        <img src="{{$get_comp[0]->logo}}">
        @else
        <h4>Socièté non sélectionné .</h4>
        @endif
      </div>
      <h1>{{$data['fac']->type_facture}} | {{$data['fac']->uuid}}</h1>
      <div id="company" >
        @if(isset($get_comp[0]))
        <h3>Pour : {{$get_comp[0]->raison_social}}</h3>
        <h3>Fax : {{$get_comp[0]->fax}}</h3>
        <h3>Ice : {{$get_comp[0]->ice}}</h3>
        @else
        <h4>Socièté non sélectionné .</h4>
        @endif
       
      </div>
      <div id="project">
        <h3>Libelle :  {{$data['fac']->f_libelle}}</h3>
        <h3>Facturé par :  {{$data['fac']->realise_par}}</h3>
        <h3>Date : {{ Carbon\Carbon::parse($data['fac']->relase_date)->format('Y-m-d') }}</h3>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th><u style="font-size:20px;">ARTICLE</u></th>
            <th><u style="font-size:20px;">UNITAIRE</u></th>
            <th><u style="font-size:20px;">PRIX(DHS)</u></th>
            <th><u style="font-size:20px;">QTY</u></th>
            <th><u style="font-size:20px;">TOTAL</u></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data['prod'] as $pro)
          <tr>
            <td class="service" style="font-size:20px;">{{$pro->designation}}</td>
            <td class="desc" style="font-size:20px;">{{$pro->uml}}</td>
            <td class="unit" style="font-size:20px;">{{$pro->p_u}} (DHS)</td>
            <td class="qty" style="font-size:20px;">{{$pro->qte}}</td>
            <td class="total" style="font-size:20px;">{{$pro->p_t}} (DHS)</td>
          </tr>
          @endforeach
            <hr>
            <td colspan="4" style="font-size:20px;">SUBTOTAL</td>
            <td class="total" style="font-size:20px;">{{$data['fac']->total_ht}} (DHS)</td>
            </tr>
            <hr>
        </tbody>
      </table>

    </main>
    <footer style="font-size:20px;">
      @if(isset($get_comp[0]))
      <u>ADDRESSE</u> : {{$get_comp[0]->details}} .  <u>RIB</u> : {{$get_comp[0]->rib}} . <u>ICE</u> : {{$get_comp[0]->ice}}
      @else
      <h4>Socièté non sélectionné .</h4>
      @endif
    
    </footer>
  </body>
</html>
<style type="text/css">
    .clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 700px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;

}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 10px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
</style>