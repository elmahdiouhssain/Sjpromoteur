@extends('layouts.layout')
@section('content')
<div class="content-page">

            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Ajouter une sociète</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active"> une sociète</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                            <div class="card mb-3">
                                <div class="card-header">
                                        <center>
                                        @include('flash-message')
                                        </center>
                                </div>
                                <div class="container">
                                    {!! Form::open(array('route' => 'companys.store','method'=>'POST')) !!}
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Raison social:</strong>
                                            {!! Form::text('raison_social', null, array('placeholder' => 'Raison social','class' => 'form-control')) !!}
                                            @if ($errors->has('raison_social'))
                                                            <span style="color: red;">{{ $errors->first('raison_social') }}</span>
                                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Raison social(AR):</strong>
                                            {!! Form::text('raison_social_ar', null, array('placeholder' => 'Nom arabic','class' => 'form-control')) !!}
                                            @if ($errors->has('raison_social_ar'))
                                                            <span style="color: red;">{{ $errors->first('raison_social_ar') }}</span>
                                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Logo du sociète:</strong>
                                            {!! Form::text('logo', null, array('placeholder' => 'Logo url','class' => 'form-control')) !!}
                                            @if ($errors->has('logo'))
                                                            <span style="color: red;">{{ $errors->first('logo') }}</span>
                                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>RIB du sociète:</strong>
                                            {!! Form::text('rib', null, array('placeholder' => 'Rib number','class' => 'form-control')) !!}
                                            @if ($errors->has('rib'))
                                                            <span style="color: red;">{{ $errors->first('rib') }}</span>
                                                            @endif
                                        </div>
                                    </div>
                                     <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Details du sociète:</strong>
                                            {!! Form::text('details', null, array('placeholder' => 'observation','class' => 'form-control')) !!}
                                            @if ($errors->has('details'))
                                                            <span style="color: red;">{{ $errors->first('details') }}</span>
                                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Fax du sociète:</strong>
                                            {!! Form::text('fax', null, array('placeholder' => '+212500000000','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Ice du sociète:</strong>
                                            {!! Form::text('ice', null, array('placeholder' => '05556320000','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Ville du sociète:</strong>
                                            {!! Form::text('ville', null, array('placeholder' => 'Tiznit','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                  
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">Enregistré</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}

                                </div>
                <!-- END container-fluid -->

            </div>
            <!-- END content -->

        </div>
        <!-- END content-page -->

        @endsection