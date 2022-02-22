@extends('layouts.layout')
@section('content')

 <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">List des employées</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active">Les employées</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card mb-3">
                                <div class="card-header">
                                        <center>
                                        @include('flash-message')
                                        </center>
                                </div>
                                <div class="card-body">
                                    <center>
                                        @can('employees-create')
                                    
                                       <a role="button" href="{{ route('emps.create') }}" class="btn btn-success mb-2" >
                                        Ajouter un employeé
                                             <span class="btn-label btn-label-right">
                                                <i class="fas fa-dolly"></i>
                                            </span>
                                        </a><br>
                                        @endcan

                                    <br>
                                    </center><br>
                                    <div class="container">
                                        @can('employees-list')
                                    <div class="table-responsive">
                                        <table class="display" id="example" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>N complèt</th>
                                                    <th>Fonction</th>
                                                    <th>Date debut</th>
                                                    <th>Total/jours</th>
                                                    <th>M.global(DHS)</th>
                                                    <th>Realisé par</th>
                                                    <th>Enregisté le</th>
                                                    <th>Action </th>
                                                </tr>
                                            </thead>
                                             <tbody>
                                                
                                                @foreach ($data['employees'] as $emp)
                                                <?php
                                                $njrs_ouvriers = DB::select('select * from paiementemployees where employee_id='.$emp->id);
                                                $njrsclc = 0;
                                                $m_tot = 0;
                                                foreach($njrs_ouvriers as $key ) {
                                                    $njrsclc+= $key->n_jours;
                                                    $m_tot+= $key->salaire_total;
                                                }
              
                                                ?>
                                                <tr>
                                                <td>{{ $emp->nom_complete }}</td>
                                                <td><label class="badge badge-warning">{{ $emp->fonction }}</label></td>
                                                <td>{{ $emp->date_debut }}</td>

                                                <td>{{$njrsclc}} (jrs)</td>
                                                <td>{{$m_tot}} (DHS)</td>
                                                <td>{{ $emp->realise_par }}</td>
                                                <td>{{ $emp->created_at }}</td>
                                                <td>
                                                <a href='/emps/{{ $emp->id }}/edit/' class='btn btn-dark fas fa-cog btn-sm'></a> 
                                                <a href='/emps/{{$emp->id}}/' class='btn btn-primary fas fa-eye btn-sm'></a>
                                                <a href='/employees/contract/{{$emp->id}}' target="_blank" class='btn btn-success fas fa-save btn-sm'></a>
                                                </td>
                                                </tr>
                                                @endforeach
                                             </tbody>
                                        
                                        </table>
                                       
                                    </div>
                                    <!-- end table-responsive-->
                                    <script src="{{ asset('static/js/jquery.min.js') }}"></script>
                                    <script src="{{ asset('static/js/jquery.dataTables.min.js') }}"></script>
                                    <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('#example').DataTable( {
                                            "scrollX": true,
                                            dom: 'Bfrtip',
                                            buttons: [
                                                'copy', 'csv', 'excel', 'pdf', 'print'
                                            ]} );} );</script>
                                    @else

                                    <center>
                                        <i class="fas fa-exclamation-triangle fa-7x" style="color:red;"></i>
                                    <h2>Vous n'êtes pas autorisé à voir les employeés</h2>
                                    </center>
                                    @endcan
                                    </div>
                                </div>
                                <!-- end card-body-->

                            </div>
                            <!-- end card-->

                        </div>

                    </div>
                    <!-- end row-->

                </div>
                <!-- END container-fluid -->
            </div>
            <!-- END content -->
        </div>
        <!-- END content-page -->

@endsection

  





