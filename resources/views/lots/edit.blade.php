@extends('layouts.layout')
@section('content')
<div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Modifier une Lotissement <a href='/lots/del/<?php echo$lot->id; ?>' onclick="return confirm('Vous etes-sur supprimé lotissement ?')" class='btn btn-danger fas fa-trash btn-sm'></a></h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active"> une Lotissement</li>
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

                                    {!! Form::model($lot, ['method' => 'PATCH','route' => ['lots.update', $lot->id]]) !!}
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
                                            <strong>Couleur du lotissement:</strong>
                                            {!! Form::color('color', null, array('placeholder' => 'color','class' => 'form-control')) !!}
                                            @if ($errors->has('color'))
                                                            <span style="color: red;">{{ $errors->first('color') }}</span>
                                                            @endif
                                        </div>
                                    </div>
                                  
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Ville du lotissement:</strong>
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