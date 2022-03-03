@extends('layouts.layout')
@section('content')
<div class="content-page">

            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Utilisateur details</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active">Utilisateur details</li>
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

                        <br>
                        <div class="container">
                           <div class="row">
                            <div class="col">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Le nom utilisateur:</strong>
                                        {{ $user->name }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        {{ $user->email }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Roles:</strong>
                                        @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                                <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Télèphone:</strong>
                                        {{ $user->tele }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Crédit:</strong>
                                        {{ $user->credit }} PTS
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Total clients:</strong>
                                        {{ $user->total_clients }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Total revenue:</strong>
                                        {{ $user->total_revenue }} (DHS)
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Dernier authentification:</strong>
                                        -----
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Enregistré à:</strong>
                                        {{ $user->created_at }} 
                                    </div>
                                </div>
                            </div>
                        

                        <div class="col">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                       
                                        <center><img src="..." class="rounded float-left" alt="..."></center><br>
                                    </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Date de naissance:</strong>
                                        {{ $user->date_n }} 
                                    </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Addresse:</strong>
                                        {{ $user->addresse }} 
                                    </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Rib:</strong>
                                        {{ $user->rib }} 
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Caise social(cnss):</strong>
                                        {{ $user->cnss }} 
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Ip Addresse:</strong>
                                        {{ $user->ipaddr }} 
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Mac addresse:</strong>
                                        {{ $user->mac_device }} 
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>



                                      </div>
                <!-- END container-fluid -->

            </div>
            <!-- END content -->

        </div>
        <!-- END content-page -->


        @endsection