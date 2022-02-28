@extends('layouts.layout')
@section('content')
 <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Certificats du systèm</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active">Certificats du systèm</li>
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
                                        @include('flash-message')<br>
                                        @can('certificat-list')
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-file-word"></i> List des certificat</button>
                                        @endcan
                                        </center>
                                </div>
                            </div>
                            <!-- end card-->
                        </div>
                    </div>
                    <!-- end row-->
                     <div class="modal-body">
                              {!! Form::model($data['cert'], ['method' => 'PATCH','route' => ['certificats.update', $data['cert']->id]]) !!}
                                @csrf
                                                    
                                 <div class="form-group">
                                    <label for="name">Certificat titre :</label>
                                    <input type="text" name="cert_titre" class="form-control" id="cert_titre" placeholder="Titre" value="{{$data['cert']->cert_titre}}">

                                          @if ($errors->has('cert_titre'))
                                                            <span style="color: red;">{{ $errors->first('cert_titre') }}</span>
                                                            @endif
                                                         </div>
                                            <div class="form-group">
                                              <label for="body">Certificat contenu  :</label>
                                              <textarea class="ckeditor form-control" name="cert_body" id="cert_body">{{$data['cert']->cert_body}}</textarea>
                                                    @if ($errors->has('cert_body'))
                                                                      <span style="color: red;">{{ $errors->first('cert_body') }}</span>
                                                                      @endif
                                                  </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Enregistré</button>

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