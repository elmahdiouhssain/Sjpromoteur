@extends('layouts.layout')
@section('content')
<div class="content-page">

            <!-- Start content -->
            <div class="content">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Modification d'utilisateur</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active">Modification d'utilisateur</li>
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
                                {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                                @csrf
                                @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Mot de pass:</strong>
                                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Confirmation mot de pass:</strong>
                                        {!! Form::password('confirm-password', array('placeholder' => 'Confirmation mot de pass','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Role:</strong>
                                        {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Télèphone:</strong>
                                            {!! Form::text('tele', null, array('placeholder' => 'numéro','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                  

                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Administrateur (): </strong>
                    

                    <input type="checkbox" name="is_admin" class="switch-input" value="{{$user->is_admin}}" {{ $user->is_admin == 1 ? 'checked' : null }}/>
                   
                </div>
                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            {!! Form::close() !!}

                                </div>

                    </div>
                <!-- END container-fluid -->

            </div>
            <!-- END content -->

        </div>
        <!-- END content-page -->

        @endsection