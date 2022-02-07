@extends('layouts.layout')
@section('content')
<div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Ajouté un employeé</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active">Ajouté un employeé</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3><i class="fas fa-dolly"></i> Nouveau employeé</h3>
                                </div>
                                <div class="card-body">
                                     <center>
                                        @include('flash-message')
                                        </center>
                                    {!! Form::open(array('route' => 'emps.store','method'=>'POST')) !!}
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Nom complèt</label>
                                                    {!! Form::text('nom_complete', null, array('placeholder' => 'Nom et prénom','class' => 'form-control')) !!}
                                                    @if ($errors->has('nom_complete'))
                                                            <span style="color: red;">{{ $errors->first('nom_complete') }}</span>
                                                            @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Fonction</label>
                                        <select class="form-control" name="fonction" id="fonction" aria-label="Default select example">
                                        <option value="Macon">Macon</option>
                                        <option value="Ouvrier">Ouvrier</option>
                                        <option value="Féreilleur">Féreilleur</option>
                                        <option value="Sécurité">Sécurité</option>
                                 
                                        </select>

                                                    @if ($errors->has('fonction'))
                                                            <span style="color: red;">{{ $errors->first('fonction') }}</span>
                                                            @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Identité (cin)</label>
                                                    {!! Form::text('cin', null, array('placeholder' => 'Y80000','class' => 'form-control')) !!}
                                                    @if ($errors->has('cin'))
                                                            <span style="color: red;">{{ $errors->first('cin') }}</span>
                                                            @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Cnss</label>
                                                    {!! Form::text('cnss', null, array('placeholder' => 'nf555000','class' => 'form-control')) !!}
                                                    @if ($errors->has('cnss'))
                                                            <span style="color: red;">{{ $errors->first('cnss') }}</span>
                                                            @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>N°télèphone</label>
                                                    {!! Form::text('n_telephone', null, array('placeholder' => '+2126000000','class' => 'form-control')) !!}
                                                    @if ($errors->has('n_telephone'))
                                                            <span style="color: red;">{{ $errors->first('n_telephone') }}</span>
                                                            @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Rib</label>
                                                    {!! Form::text('n_banquer', null, array('placeholder' => '0000111122223333444','class' => 'form-control')) !!}
                                                    @if ($errors->has('n_banquer'))
                                                            <span style="color: red;">{{ $errors->first('n_banquer') }}</span>
                                                            @endif
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>N°dossier</label>
                                                    {!! Form::text('n_dossier', null, array('placeholder' => 'em00001','class' => 'form-control')) !!}
                                                    @if ($errors->has('n_dossier'))
                                                            <span style="color: red;">{{ $errors->first('n_dossier') }}</span>
                                                            @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Date debut</label>
                                                    {!! Form::date('date_debut', null, array('placeholder' => '','class' => 'form-control')) !!}
                                                    @if ($errors->has('date_debut'))
                                                            <span style="color: red;">{{ $errors->first('date_debut') }}</span>
                                                            @endif
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Addresse 1 </label>
                                                    {!! Form::text('addr1', null, array('placeholder' => '04 alqods ','class' => 'form-control')) !!}
                                                    @if ($errors->has('addr1'))
                                                            <span style="color: red;">{{ $errors->first('addr1') }}</span>
                                                            @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Addresse 2 </label>
                                                    {!! Form::text('addr2', null, array('placeholder' => '04 alqods ','class' => 'form-control')) !!}
                                                    @if ($errors->has('addr2'))
                                                            <span style="color: red;">{{ $errors->first('addr2') }}</span>
                                                            @endif
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Observation </label>
                                                    {!! Form::textarea('observation', null, array('placeholder' => ' ','class' => 'form-control')) !!}
                                                    @if ($errors->has('observation'))
                                                            <span style="color: red;">{{ $errors->first('observation') }}</span>
                                                            @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Enregisré</button>
                                        </div>
                                </div>
                                <!-- end card-body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                        
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3><i class="far fa-file-image"></i> Paiement</h3>
                                </div>
                                <script>
                                    function findTotal() {
                                        var salaire_total = 0;
                                        var n_jours = document.getElementById("n_jours").value;
                                        var prix_jour = document.getElementById("prix_jour").value;
                                        var salaire_total = n_jours * prix_jour;
                                        document.getElementById("salaire_total").value = salaire_total;
                                    }
                                </script>

                                <div class="card-body text-center">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                    <label>N°jours</label>
                                                    {!! Form::number('n_jours', null, array('placeholder' => '15','class' => 'form-control','id' => 'n_jours')) !!}
                                                    @if ($errors->has('n_jours'))
                                                            <span style="color: red;">{{ $errors->first('n_jours') }}</span>
                                                            @endif
                                                </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                    <label>Prix/jour(DHS)</label>
                                                    {!! Form::number('prix_jour', null, array('placeholder' => '150DHS','class' => 'form-control','id' => 'prix_jour')) !!}
                                                    @if ($errors->has('prix_jour'))
                                                            <span style="color: red;">{{ $errors->first('prix_jour') }}</span>
                                                            @endif
                                                </div>

                                                <div class="form-group">
                                                    <label>Salaire(DHS)</label>
                                                    <input placeholder="1000DHS" class="form-control" id="salaire_total" onblur="findTotal()" name="salaire_total" type="number">
                                                    @if ($errors->has('salaire_total'))
                                                <span style="color: red;">{{ $errors->first('salaire_total') }}</span>
                                                            @endif
                                                </div>
                                            
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                                <!-- end card-body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- END container-fluid -->
            </div>
            <!-- END content -->
        </div>
        <!-- END content-page -->
@endsection