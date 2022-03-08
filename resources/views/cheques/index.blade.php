@extends('layouts.layout')
@section('content')

 <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Réglements</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active">Réglements</li>
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
                                        @can('cheque-create')
                                       <a role="button" href="#" class="btn btn-danger mb-2" data-toggle="modal" data-target="#exampleModal">
                                        Effectué un réglement

                                             <span class="btn-label btn-label-right">
                                                <i class="fas fa-money-check-alt"></i>
                                            </span>
                                        </a>
                                        @endcan
                                        <br>
                                    </center><br>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-money-check-alt"></i> Effectué un réglement</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                            <div class="modal-body">
                             {!! Form::open(array('route' => 'stats-cheques.store','method'=>'POST')) !!}
                              @csrf
                                <div class="form-group">
                                    <label for="name">Date chèque :</label>
                                    <input type="date" name="date_cheque" class="form-control" id="date_cheque"required="">

                                          @if ($errors->has('date_cheque'))
                                                            <span style="color: red;">{{ $errors->first('date_cheque') }}</span>
                                                            @endif
                                                         </div>

                                             <div class="form-group">
                                                    <label for="name">Type d'opération :</label>
                            <select class="form-control" name="type_op" id="type_op" aria-label="Default select example">
                               
                                  <option value="Chèque">Chèque</option>
                                  <option value="Virment">Virment</option>
                                  <option value="Espèce">Espèce</option>
                         
                                </select>

                          @if ($errors->has('type_op'))
                                            <span style="color: red;">{{ $errors->first('type_op') }}</span>
                                            @endif
                            </div>

                            <div class="form-group">
                                                    <label for="name">Designation :</label>
                                                    <input type="text" name="designation" class="form-control" id="designation"required="">

                          @if ($errors->has('designation'))
                                            <span style="color: red;">{{ $errors->first('designation') }}</span>
                                            @endif
                            </div>
                            <div class="form-group">
                                                    <label for="name">Tiré/Veré (par) :</label>
                                                    <input type="text" name="verse_par" class="form-control" id="verse_par">

                          @if ($errors->has('verse_par'))
                                            <span style="color: red;">{{ $errors->first('verse_par') }}</span>
                                            @endif
                            </div>
                            <div class="form-group">
                                                    <label for="name">Numéro du marché :</label>
                                                    <input type="number" name="n_marche" class="form-control" id="n_marche">

                          @if ($errors->has('n_marche'))
                                            <span style="color: red;">{{ $errors->first('n_marche') }}</span>
                                            @endif
                            </div>



                            <div class="form-group">
                                <label for="societe">Amical :</label>
                                <select class="form-control" name="societe" id="societe" aria-label="Default select example">
                                @foreach ($data['societes'] as $societe)
                                  <option value="{{ $societe->raison_social }}"> {{ $societe->raison_social }}</option>
                                @endforeach
                                </select>
                 
                            </div>

                            
                            <div class="form-group">
                    <label for="name">Credit :</label>
                    <input type="number" name="credit" class="form-control" id="credit" placeholder="Balance DHS">

                          @if ($errors->has('credit'))
                                            <span style="color: red;">{{ $errors->first('credit') }}</span>
                                            @endif
                            </div>
                            <div class="form-group">
                    <label for="name">Débit :</label>
                    <input type="number" name="debit" class="form-control" id="debit" placeholder="Balance DHS">

                          @if ($errors->has('debit'))
                                            <span style="color: red;">{{ $errors->first('debit') }}</span>
                                            @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Enregistré</button>

                                </div>

                             </div>

                                                </div>
                                            
                                            </div>
                                        </div>
                                    </div>
                                      {!! Form::close() !!}

                                     <div class="container">
                                        @can('cheque-list')
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="emptableid" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Date chèque</th>
                                                    <th>Type d'opération</th>
                                                    <th>Désignation</th>
                                                    <th>Versé par</th>
                                                    <th>N marché</th>
                                                    <th>Realisé par</th>
                                                    <th>Débit</th>
                                                    <th>Credit</th>
                                                    <th>Date</th>
                                                    <th>Action </th>
                                                </tr>
                                            </thead>
                                             <tbody>

                                             </tbody>
                                        
                                        </table>
                                        
                                    </div>
                                    <!-- end table-responsive-->
                                    <script src="{{ asset('static/js/jquery.min.js') }}"></script>
                                    <script src="{{ asset('static/js/jquery.dataTables.min.js') }}"></script>
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                        $("#emptableid").DataTable({
                                                serverSide: true,
                                                ajax: {
                                                    url: '{{url('chequesajax')}}',
                                                    data: function (data) {
                                                        data.params = {
                                                            sac: "helo"
                                                        }
                                                    }

                                                },
                                                buttons: true,
                                                searching: true,
                                                scrollY: 500,
                                                scrollX: false,
                                                scrollCollapse: true,
                                                dom: 'Bfrtip',
                                                buttons: ['copyHtml5',
                                                'excelHtml5',
                                                'csvHtml5',
                                                'pdfHtml5'],
                                                    columns: [
                                                    {data: "date_cheque", className: 'date_cheque'},
                                                    {data: "type_op", className: 'type_op'},
                                                    {data: "designation", className: 'designation'},
                                                    {data: "verse_par", className: 'verse_par'},
                                                    {data: "n_marche", className: 'n_marche'},
                                                    {data: "realise_par", className: 'realise_par'},
                                                    {data: "debit", className: 'debit'},
                                                    {data: "credit", className: 'credit'},
                                                    {data: "created_at", className: 'created_at'},
                                                    {
                                                    data: 'action', 
                                                    name: 'action', 
                                                    orderable: true, 
                                                    searchable: true
                                                },
                                                
                                                ]  
                                            });
                                    
                                        });
                     
                            </script>
                            @else
                                    <center>
                                        <i class="fas fa-exclamation-triangle fa-7x" style="color:red;"></i>
                                    <h2>Vous n'êtes pas autorisé à voir les réglement</h2>
                                    </center>
                                    @endcan
                                    </div>
                                    <!-- end table-responsive-->

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