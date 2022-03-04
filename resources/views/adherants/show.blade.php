@extends('layouts.layout')
@section('content')
<div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="col-xs-12 ">
                            <div class="card mb-3">
                            <center>@include('flash-message')</center>
                                <div class="card-header">
                                    <h3 style="color:green;"><i class="fas fa-file-word"></i> Calcul genèral  : <a href="{{route('pdf.preview', $data['ads']->id )}}" target="_blank" class="btn btn-danger btn-xs"><i class="fas fa-download"></i> Rapport (PDF)</a>
                                    @can('adherant-edit')
                                    <a href="{{ route('adherants.edit',$data['ads']->id) }}" class="btn btn-dark btn-sm"><i class="fas fa-cog"></i></a>
                                    @endcan
                                    @can('adherant-delete')
                                    {!! Form::open(['method' => 'DELETE','route' => ['adherants.destroy', $data['ads']->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Supprimé', ['class' => 'btn btn-danger btn-sm','onclick'=>"return confirm('Vous etes-sur supprimé l adherant')"]) !!}
                                    {!! Form::close() !!}
                                    @endcan

                                    </h3>
                                    <div class="text-right">
                                                @if ($data['ads']->is_canceled === 0)
                                                <span style="color:green;">Situation : <i class="fas fa-dot-circle"></i> Continué</span>
                                                @else
                                                <span style="color:red;">Situation : <i class="fas fa-dot-circle"></i> Abondonné</span>
                                                @endif
                                            </div>
                                            <div class="card">
                                            <h5 style="color:red;">S il vous plait avant de selectioné une certificat , completé la premièr étape pour bien imprimé. <a href="{{route('newcert', $data['ads']->id )}}" class="fas fa-edit"></a></h5>
                                        </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                    <div class="col">
                                        <li>Montant d'immobilier : <i1 style="color:red;">{{ $data['m_imm'] }} (DHS)</i1></li><br>
                                        <li>Montant versé : <i1 style="color:red;">{{ $data['ads']->montant_verse }} (DHS)</i1></li><br>
                                        <li>Montant du tranches : <i1 style="color:red;">{{ $data['t_tranches'] }} (DHS)</i1></li><br>
                                        @if ($data['ads']->pm2 === "0")
                                        <li>Montant réste : <i1 style="color:red;"> ---- (DHS)</i1></li>
                                        @else
                                        <li>Montant réste : <i1 style="color:red;">{{$data['m_reste']}} (DHS)</i1></li>   
                                        @endif
                                    </div>
                                    <div class="col">
                                        <center>
                                            <label><u>Lotissements: </u></label><br>
                                            <a href="#" class="fas fa-file-word fa-2x"></a><br>
                                            <span><b>Authorisation de paiement</b></span><br>

                                            <a href="#" target="_blank" class="fas fa-file-word fa-2x"></a><br>
                                            <span><b>Confirmation de paiement</b></span><br>

                                            <a href="#" target="_blank" class="fas fa-file-word fa-2x"></a><br>
                                            <span><b>Demande d'annulation</b></span><br>
                                        </center>
                                    </div>
                                    <div class="col">
                                        <center>
                                            <label><u>Amicals : </u></label><br>
                                            <a href="{{route('newcert', $data['ads']->id )}}" class="fas fa-file-word fa-2x"></a><br>
                                            <span><b>Authorisation de paiement</b></span><br>

                                            <a href="{{route('newconfirmation', $data['ads']->id )}}" target="_blank" class="fas fa-file-word fa-2x"></a><br>
                                            <span><b>Confirmation de paiement</b></span><br>

                                            <a href="{{route('annulation', $data['ads']->id )}}" target="_blank" class="fas fa-file-word fa-2x"></a><br>
                                            <span><b>Demande d'annulation</b></span><br>
                                        </center>
                                    </div>
                                    </div>
                                </div>
                                <!-- end card-body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                        @can('tranche-list')
                    <div class="col-xs-12 ">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <center>
                                    <h3 style="color:blue;"><i class="fas fa-money-check"></i> Paiement details [ {{ $data['ads']->nom_complete }} ]  
                                    </h3>
                                    </center>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                <div class="col">
                                    @can('tranche-create')
                                    <form action="/adherants/inserttranch" method="POST">
                                        @csrf
                                        <input type="hidden" name="adherant_id" value="{{ $data['ads']->id }}">
                                        <div class="form-group">
                                                    <label>Observation : </label>
                                                    {!! Form::text('observation', null, array('placeholder' => 'Paiement1','class' => 'form-control')) !!}
                                                    @if ($errors->has('observation'))
                                                            <span style="color: red;">{{ $errors->first('observation') }}</span>
                                                            @endif
                                                </div>
                                                <div class="form-group">
                                                    <label>Montant versé : (DHS)</label>
                                                    {!! Form::number('montant_verse', null, array('placeholder' => '300 000','class' => 'form-control', 'step' => 'any')) !!}
                                                    @if ($errors->has('montant_verse'))
                                                            <span style="color: red;">{{ $errors->first('montant_verse') }}</span>
                                                            @endif
                                                </div>
                                                <div class="form-group">
                                                <button type="submit" class="btn btn-danger "><i class="fas fa-money-check"></i> Ajouté</button>
                                        </div>
                                   </form>
                                   @else
                                   <center>
                                   <i class="fas fa-exclamation-triangle fa-7x" style="color:red;"></i>
                                   <h5 style="color:red;">Vous n'aves pas l'access pour inseré une tranche pour l'adhèrant !</h5>
                                   </center>
                                   @endcan
                                </div>
                                 <div class="col">
                                    <?php $i=0;?>
                                    @foreach ($data['tranches'] as $tr)
                                    <?php $i+=1;?>
                                    <p style="color:red;">Montant {{$i}} 
                                        @can('tranche-delete')
                                        <a href="/adherants/del/tranch/{{ $tr->id }}" class="fas fa-trash" style="color:red;" onclick="return confirm('Vous etez sur supprimé le paiement ?')"></a>
                                        @endcan
                                    </p><p>{{ $tr->montant_verse }} (DHS)| à : {{ $tr->created_at }}</p>
                                    @endforeach
                                </div>
                                </div>
                                </div>
                                <!-- end card-body -->
                            </div>
                            <!-- end card -->
                        </div>
                        @endcan
                        <!-- end col -->
                        <div class="col-xs-12 ">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <center>
                                    <h3 style="color:red;"><i class="far fa-user"></i> : {{ $data['ads']->nom_complete }} || ( {{ $data['ads']->imm_type }} ) || N*Dossier :  ( {{ $data['ads']->n_dossier }} )</h3>
                                    </center>
                                </div>
                                <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Nom complèt : </label>
                                                    <input readonly class="form-control" name="name" type="text" value="{{ $data['ads']->nom_complete }}" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Telephone : </label>
                                                    <input readonly class="form-control" name="email" type="email" value="{{ $data['ads']->gsm }}" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Identité : </label>
                                                    <input readonly class="form-control" name="id_national" type="text" value="{{ $data['ads']->id_national }}" required />
                                                </div>
                                        </div>
                                        <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Lotissement : </label>
                                                    <input readonly class="form-control" name="id_national" type="text" value="{{ $data['ads']->lotisment }}" required />
                                                </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Montant versé : (DHS)</label>
                                                    <input readonly class="form-control" name="name" type="text" value="{{ $data['ads']->montant_verse }}" required />
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Facade : </label>
                                                    <input readonly class="form-control" name="email" type="email" value="{{ $data['ads']->facade }}" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Bloc : </label>
                                                    <input readonly class="form-control" name="name" type="text" value="{{ $data['ads']->bloc }}" required />
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Coté : </label>
                                                    <input readonly class="form-control" name="email" type="email" value="{{ $data['ads']->cote }}" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Mètre carré : </label>
                                                    <input readonly class="form-control" name="name" type="text" value="{{ $data['ads']->m2 }}" required />
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Prix Mètre carré : </label>
                                                    <input readonly class="form-control" name="email" type="email" value="{{ $data['ads']->pm2 }}" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Sous sol : </label>
                                                    @if ($data['ads']->sous_sol === 1)
                                                    <input readonly class="form-control" name="name" type="text" value="OUI" required />
                                                    @else
                                                    <input readonly class="form-control" name="name" type="text" value="NON" required />
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Commercial : </label>
                                                    <input readonly class="form-control" name="email" type="email" value="{{ $data['ads']->commerciale }}" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Observation : </label>
                                                    <textarea class="form-control" readonly>{{ $data['ads']->observation }}</textarea>
                                                </div>
                                        </div>
                                    </div>
                                    <!-- end card-body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                      <div class="card mb-3">
                                <div class="card-header">
                                    <center>
                                    <h3 style="color:black;"><i class="fas fa-passport"></i> Adherant documents  : </h3>
                                    </center>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                           <?php 
                                           $u_imgs = DB::select('select * from images where adherant_id='.$data['ads']->id);
                                            ?>
                                            @foreach ($u_imgs as $x)
                                        <div class="card-group">
                                          <div class="card">
                                            <center>
                                            <a href="/docs/{{$x->image_path}}" target="_blank" class="fas fa-file fa-7x"></a>
                                            </center>
                                            <div class="card-body">
                                              <h5 class="card-title">Nom : {{$x->name}}</h5>
                                              <p class="card-text">Type : {{$x->file_type}}</p>
                                            </div>
                                            <div class="card-footer">
                                              <small class="text-muted">Enregitré le : {{$x->created_at}}</small>
                                            </div>
                                          </div>
                                          </div>
                                            @endforeach
                                        </div>
                                        <!-- end card-body -->
                                    </div>
                                    <!-- end card -->
                                </div>
                                <!-- END container-fluid -->
                            </div>
                            <!-- END content -->
                        </div>
                        <!-- END content-page -->
                         @endsection