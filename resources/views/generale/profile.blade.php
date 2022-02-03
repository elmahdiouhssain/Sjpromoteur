@extends('layouts.layout')
@section('content')
<div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Mon Profile</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active">Profile</li>
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
                                    <h3><i class="far fa-user"></i> Profile details</h3>
                                </div>
                                <div class="card-body">
                                     <center>
                                        @include('flash-message')
                                        </center>
                                    <form class="form-horizontal" method="POST" action="{{ route('changepasswordpost') }}">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Nom complèt</label>
                                                    <input readonly class="form-control" name="name" type="text" value="{{ Auth::user()->name }}" required />
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input readonly class="form-control" name="email" type="email" value="{{ Auth::user()->email }}" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                <label>Ancien Mot de passe</label>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                                <input type="password" class="form-control" id="current-password" name="current-password" placeholder="Password" required="">
                                                @if ($errors->has('current-password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('current-password') }}</strong>
                                                    </span>
                                                @endif
                                              </div>
                                              </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Nouveau mot de passe</label>
                                                    <input class="form-control" name="new-password" type="password" value="" />
                                                    @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Repeter mot de passe</label>
                                                    <input class="form-control" name="new-password_confirmation" type="password" value="" />
                                                    @if ($errors->has('new-password_confirmation'))
                                    <span class="help-block">
                                        <strong  style="color:red;">{{ $errors->first('new-password_confirmation') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Enregisré</button>
                                        </div>
                                    </form>

                                </div>
                                <!-- end card-body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                        
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3><i class="far fa-file-image"></i> Avatar</h3>
                                </div>

                                <div class="card-body text-center">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <img alt="avatar" class="img-fluid" src="{{ asset('static/images/avatars/avatar2.png') }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button type="button" class="btn btn-danger btn-block mt-3">Supprimé la photo</button>
                                        </div>

                                        <div class="col-lg-12">
                                            <button type="button" class="btn btn-info btn-block mt-3">Change La photo</button>
                                        </div>
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