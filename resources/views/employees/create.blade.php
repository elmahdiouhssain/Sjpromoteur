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
                        <div class="container">
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
                        
                    </div>
                    <!-- end row -->
                </div>
                <!-- END container-fluid -->
            </div>
            <!-- END content -->
        </div>
        <!-- END content-page -->
@endsection