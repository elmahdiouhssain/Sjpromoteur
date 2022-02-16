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
                        <div class="container">
                            <div class="card mb-3">
                                        <center>
                                        @include('flash-message')
                                        </center>
                                <div class="card-header">
                                    <h3><i class="far fa-user"></i> Authentification</h3>
                                </div>
                                <div class="card-body">
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


                        <div class="container">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3><i class="far fa-user"></i> Profile informations</h3>
                                </div>
                                <div class="card-body">

                                    <form class="form-horizontal" method="POST" action="{{ route('updateprofile',Auth::user()->id) }}">
                                        {{ csrf_field() }}
                                        <div class="container">
                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Numèro du télèphone</label>
                                           
                                                <input type="text" class="form-control" id="tele" name="tele" placeholder="+21260000000" value="{{Auth::user()->tele}}">
                                                @if ($errors->has('tele'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('tele') }}</strong>
                                                    </span>
                                                @endif
                                              </div>
                                              <div class="form-group">
                                                <label>Rib</label>
                                           
                                                <input type="text" class="form-control" id="rib" name="rib" placeholder="01236655444444" value="{{Auth::user()->rib}}">
                                                @if ($errors->has('rib'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('rib') }}</strong>
                                                    </span>
                                                @endif
                                              </div>
                                              <div class="form-group">
                                                <label>Cnss</label>
                                             
                                                <input type="text" class="form-control" id="cnss" name="cnss" placeholder="3214550000" value="{{Auth::user()->cnss}}">
                                                @if ($errors->has('cnss'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('cnss') }}</strong>
                                                    </span>
                                                @endif
                                              </div>
                                              <div class="form-group">
                                                <label>Date naissance</label>
                                                
                                                <input type="date" class="form-control" id="date_n" name="date_n" placeholder="11/11/2022" value="{{Auth::user()->date_n}}">
                                                @if ($errors->has('date_n'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('date_n') }}</strong>
                                                    </span>
                                                @endif
                                              </div>
                                            </div>
                                            <div class="col">
                                            <div class="card-header">

                                                    <h3><i class="far fa-file-image"></i> Photo</h3>
                                            </div>

                                                <div class="card-body text-center">
                                                <style>
                                                   
                                                    dl, ol, ul {
                                                        margin: 0;
                                                        padding: 0;
                                                        list-style: none;
                                                    }
                                                    .imgPreview img {
                                                        padding: 8px;
                                                        max-width: 100px;
                                                    } 
                                                </style>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                        <div class="user-image mb-3 text-center">
                                                            <div class="imgPreview"> </div>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                        <input type="file" name="imageFile[]" class="custom-file-input" id="images" >
                                                            @if ($errors->has('imageFile[]'))
                                                                                <span style="color: red;">{{ $errors->first('imageFile[]') }}</span>
                                                                                @endif
                                                            <label class="custom-file-label" for="images">Choose image</label>
                                                        </div>
                                                        
                                                    </div>
                                                    <br>

                                                    <div class="form-group">
                                                        <label>Addresse</label>
                                                        <input type="text" class="form-control" id="addresse" name="addresse" placeholder="hay alhoda 4 imm 7" value="{{Auth::user()->addresse}}">
                                                        @if ($errors->has('addresse'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('addresse') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    </div>
                                                    
                                                </div>
                                                <!-- end card-body -->
                                            </div>
                                            <div class="form-group">
                                                    <button type="submit" class="btn btn-dark btn-block"><i class="fas fa-save"></i> Enregisré</button>
                                                </div>
                            <!-- end card -->
                                    </form>

                                </div>
                                <!-- end card-body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                        
                       
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