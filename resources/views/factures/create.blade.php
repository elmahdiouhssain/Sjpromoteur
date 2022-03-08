@extends('layouts.layout')
@section('content') 
<div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Nouvelle facture : </h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="container">
                            <div class="card mb-3">
                        <center><h1>Etape 1 : Préparation du facture</h1></center>
                        <div class="card">
                            <div class="container">
                                <br><center>@include('flash-message')</center>
                                  <form action="/factures/store/" method="POST">
                                    @csrf
                           
                                <div class="form-group">
                                    <label for="fournisseurs_id">Fournisseur :</label>
                                    <select class="form-control" name="fournisseurs_id" id="fournisseurs_id">
                                        @foreach ($data['suppliers'] as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->raison_s }}</option>
                                        @endforeach 
                                    </select>
                                    @if ($errors->has('fournisseurs_id'))
                                    <span style="color: red;">{{ $errors->first('fournisseurs_id') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="total_ht">Libèlle :</label>
                                    <input  type=text name="f_libelle" class="form-control" id="f_libelle" value="">
                                </div>

                                <div class="form-group">
                                    <label for="total_ht">Réference :</label>
                                    <input  type=text name="reference" class="form-control" id="reference" value="">
                                </div>

                                <div class="form-group">
                                    <label for="total_tva">Type du facture :</label>
                                    <select class="form-control" id="type_facture" name="type_facture">
                                        <option value="Facture">Facture</option>
                                        <option value="Bon de commande">Bon de commande</option>
                                        <option value="Demande de prix">Demande de prix</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="total_tva">Status :</label>
                                    <select class="form-control" id="is_paid" name="is_paid">
                                        <option value="1" class="badge badge-success">Payé</label></option>
                                        <option value="0" class="badge badge-warning">NonPayé</label></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="total_tva">Lieu de livraison :</label>
                                    <input  type=text name="lieu_livraison" class="form-control" id="lieu_livraison" value="">
                                </div>
                                <div class="form-group">
                                    <label for="total_tva">N° Tele :</label>
                                    <input  type=text name="n_tele" class="form-control" id="n_tele" value="">
                                </div>
                                <div class="form-group">
                                    <label for="company_id">Sociète :</label>
                                    <select class="form-control" name="company_id" id="company_id">
                                        @foreach ($data['companys'] as $company)
                                        <option value="{{ $company->id }}">{{ $company->raison_social }}</option>
                                        @endforeach 
                                    </select>
                                    @if ($errors->has('company_id'))
                                    <span style="color: red;">{{ $errors->first('company_id') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="realise_par">Facturé par :</label>
                                    <input readonly type=text step=any name="realise_par" class="form-control" id="realise_par" value="{{Auth::user()->name}}">
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-danger btn-sm btn-block" type="submit"><i class="fas fa-file-invoice"></i> Etape suivant</button>
                                </div>
                                </form>
                                </div>
                            </div>

                            </div>
                            <!-- end card-body -->
                            </div>
                        
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- END container-fluid -->
            </div>
            <!-- END content -->
        </div>
        <!-- END content-page -->
@endsection