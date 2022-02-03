						
<!DOCTYPE html>
<html class="no-js">
<!--<![endif]-->
<head>
	<html prefix="og: http://ogp.me/ns#">
	<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @if(isset($title))<title>Sjpromorteur | {{ $title }}</title> @else <title>Sjpromorteur | beta version 2021</title> @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="{{ asset('static/css/bootstrap.css') }}" rel="stylesheet" media="screen">
	<link href="{{ asset('static/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
	<link href="{{ asset('static/css/all.css') }}" rel="stylesheet" media="screen">
	<link href="{{ asset('static/css/style.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('static/css/jquery.dataTables.min.css') }}" rel="stylesheet" media="screen">
	<link rel="shortcut icon" href="{{ asset('static/favicon.ico') }}" type="image/x-icon">
	<link rel="icon" href="{{ asset('static/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<link rel="apple-touch-icon" href="{{ asset('static/favicon.ico') }}"/>
	<meta name="theme-color" content="#dc3545">
	<meta name="msapplication-navbutton-color" content="#dc3545">
	</head>
	<div class="container">
		<center><h1>{{$data['title']}}</h1></center>
		
						<div class="table-responsive">
                                        <table id="example" class="display" style="width:100%">
                                            <thead>
                                                <tr>

                                                    <th>Nom & prénom</th>
                                                    <th>N telephone</th>
                                                    <th>Amical</th>
                                                    <th>Coté</th>
                                                    <th>Bloc</th>
                                                    <th>Etage</th>
                                                    <th>M²</th>
                                                    <th>PM²</th>
                                                    <th>Total payé</th>
                                                    <th>Montant réste</th>
                                                    <th>Status</th>

                                                </tr>
                                            </thead>
                                             <tbody>
                                        @foreach ($data['adherants'] as $societe)
                                            <tr>
                                                <td>{{ $societe->nom_complete }}</td>
                                                <td>{{ $societe->gsm }}</td>
                                       <?php $ami = DB::select('select * from amicals where id='.$societe->societe_id);?>
                                                <td>{{ $ami[0]->raison_social }} </td>
                                                <td>{{ $societe->cote }}</td>
                                                <td>{{ $societe->bloc }}</td>
                                                <td>{{ $societe->etage }}</td>
                                                <td>{{ $societe->m2 }}m</td>
                                                <td>{{ $societe->pm2 }} DHS</td>
                                                <?php 
                                                $m_v = $societe->montant_verse;
                                                $all_tranches = DB::select('select * from tranches where adherant_id ='.$societe->id);
                                                $sum = 0;
                                           		foreach($all_tranches as $key ) {
												 	//var_dump($key->montant_verse);
                                           			$sum+= $key->montant_verse;
												}
												//dd($sum);
												$t_paye = $m_v + $sum;
												$t_m2 = $societe->pm2 * $societe->m2;
												$t_rest = $t_m2 - $t_paye;

                                                ?>
                                                <td><?php echo($t_paye) ?> (DHS)</td>

                                                @if ($societe->pm2 === "0")
                                                <td>----</td>
                                                @else
                                                <td><?php echo($t_rest) ?> (DHS)</td>
                                                @endif

                                                @if ($societe->is_canceled === 1)
                                                <td style="color:red;"><i class="fas fa-times"></i> Abondonné</td>
                                                @else
                                                <td style="color:green;">
                                                <b><i class="fas fa-check">Continué</i> </b></td>
                                                @endif
                                                
                                              
                                            </tr>
                                         @endforeach
                                        </table>
                                    </div>
                                    <!-- end table-responsive-->
                                    </div>
    <script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
	<script src="{{ asset('static/js/modernizr.min.js') }}"></script>
	<script src="{{ asset('static/js/jquery.min.js') }}"></script>
	<script src="{{ asset('static/js/popper.min.js') }}"></script>
	<script src="{{ asset('static/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('static/js/bootstrap.js') }}"></script>
	<script src="{{ asset('static/js/detect.js') }}"></script>
	<script src="{{ asset('static/js/fastclick.js') }}"></script>
	<script src="{{ asset('static/js/jquery.blockUI.js') }}"></script>
	<script src="{{ asset('static/js/jquery.nicescroll.js') }}"></script>
	<script src="{{ asset('static/js/admin.js') }}"></script>
    <script src="{{ asset('static/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('static/js/ck/dataTables.buttons.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('static/js/ck/jszip.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('static/js/ck/pdfmake.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('static/js/ck/vfs_fonts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('static/js/ck/buttons.html5.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('static/js/ck/buttons.print.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable( {
                "scrollX": true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]} );} );</script>

    </body>
    </html>