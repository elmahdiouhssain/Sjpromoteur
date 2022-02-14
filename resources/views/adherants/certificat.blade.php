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
                                <div class="card-header">
                                    <?php
                                    $getdata = DB::select('select * from amicals where id='.$data['adherant']->societe_id);
                                    //dd($getdata);    
                                    ?>
                                    <h3 style="color:green;"><i class="fas fa-file-word"></i> Generèr une demande d'authorisation  : <i1 style="color:red;">Mr : {{ $data['adherant']->nom_complete }} </i1> || <ex id="so_details" name="so_details">( {{ $getdata[0]->raison_social }} )</ex></h3>
                                    <input type="hidden" name="so_details" value="{{ $data['adherant']->societe }}" id="so_details">
                                   
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                    <div class="col">
                                      
                                        <form action="/generer/certificat/authorization/<?php echo$data['adherant']->id; ?>" method="POST">
                                        @csrf
                                        
                                       <div class="form-group">
                                                    <label class="pull-right">: الاسم الكامل </label>
                                                
                                    <input type="ar_name" name="ar_name" class="form-control" id="ar_name" value="<?php echo$data['adherant']->ar_name; ?>">

                                                    @if ($errors->has('ar_name'))
                                                            <span style="color: red;">{{ $errors->first('ar_name') }}</span>
                                                            @endif
                                                </div>
                                        <div class="form-group">
                                                <label class="pull-right">: الواجهة </label>
                                                    <select class="form-control pull-right" id="ar_facade" name="ar_facade">
                                                    <option selected><?php echo$data['adherant']->ar_facade; ?></option>
                                                    <option class="pull-right"></option>
                                                    <option class="pull-right">بالواجهتين</option>
                                                    <option class="pull-right">بالواجهة الشرقية</option>
                                                    <option class="pull-right">بالواجهة الغربية</option>
                                                    <option class="pull-right">بالواجهة الشمالية</option>
                                                    <option class="pull-right">بالواجهة الجنوبية</option>
                                                </select>
                                                    @if ($errors->has('ar_facade'))
                                                            <span style="color: red;">{{ $errors->first('ar_facade') }}</span>
                                                            @endif
                                                </div>
                                        <div class="form-group">
                                                    <label class="pull-right">: بطاقة التعريف </label>
                                                    <input type="id_national" name="id_national" class="form-control" id="id_national" value="<?php echo$data['adherant']->id_national; ?>">
                                                    @if ($errors->has('id_national'))
                                                            <span style="color: red;">{{ $errors->first('id_national') }}</span>
                                                            @endif
                                        </div>
                                        <div class="form-group">
                                                    <label class="pull-right">: الشرفة </label>
                                                    <select class="form-control pull-right" id="balcon" name="balcon">
                                                    @if ($data['adherant']->balcon) === 1)
                                                    <option selected value="1" style="color: green;">مفعل</option>
                                                    @else
                                                    <option selected value="0" style="color: red;">غير مفعل</option>
                                                    @endif
                                                  
                                                    <option class="pull-right" style="color: green;" value="1">تفعيل الشرفة</option>
                                                    <option class="pull-right" style="color: red;" value="0">الغاء الشرفة</option>

                                                    </select>
                                                    @if ($errors->has('balcon'))
                                                            <span style="color: red;">{{ $errors->first('balcon') }}</span>
                                                            @endif
                                        </div>
                                        <div class="form-group">
                                                    <label class="pull-right">: ثمن الشرفة </label>
                                                    <input type="balcon_prix" name="balcon_prix" class="form-control" id="balcon_prix" value="<?php echo$data['adherant']->balcon_prix; ?>">
                                                    @if ($errors->has('balcon_prix'))
                                                            <span style="color: red;">{{ $errors->first('balcon_prix') }}</span>
                                                            @endif
                                        </div>
                                        <div class="form-group">
                                                    <label class="pull-right">: مساحة الشرفة </label>
                                                    <input type="text" name="balcon_superficier" class="form-control" id="balcon_superficier" value="<?php echo$data['adherant']->balcon_superficier; ?>">
                                                    @if ($errors->has('balcon_superficier'))
                                                            <span style="color: red;">{{ $errors->first('balcon_superficier') }}</span>
                                                            @endif
                                        </div>
                                        <div class="form-group">
                                                    <label class="pull-right">: نوع العقار </label>
                                                    
                                                    <select class="form-control pull-right" id="ar_immtype" name="ar_immtype">
                                                        <option selected><?php echo$data['adherant']->ar_immtype; ?></option>
                                                    <option class="pull-right">مكتب</option>
                                                    <option class="pull-right">مكتب على الشارع</option>
                                                    <option class="pull-right">محل تجاري</option>
                                                    <option class="pull-right">شقة سكنية</option>
                                                    <option class="pull-right">شقة على الشارع</option>
                                                    <option class="pull-right">شقة داخلية</option>
                                                    </select>

                                                    @if ($errors->has('ar_immtype'))
                                                            <span style="color: red;">{{ $errors->first('ar_immtype') }}</span>
                                                            @endif
                                                </div>
                                                <div class="form-group">
                                                    <label class="pull-right">:  المرأب تحت ارضي</label>
                                                    <select class="form-control pull-right" id="sous_sol" name="sous_sol">
                                                    @if ($data['adherant']->sous_sol) === 1)
                                                    <option selected value="1" style="color: green;">مفعل</option>
                                                    @else
                                                    <option selected value="0" style="color: red;">غير مفعل</option>
                                                    @endif
                                                    
                                                    <option class="pull-right" style="color: green;" value="1">Active sous sole</option>
                                                    <option class="pull-right" style="color: red;" value="0">Desactive sous sole</option>
                                                    </select>
                                                    @if ($errors->has('sous_sol'))
                                                            <span style="color: red;">{{ $errors->first('sous_sol') }}</span>
                                                            @endif
                                                </div>

                                                <div class="form-group">
                                                    <label class="pull-right">: ثمن المرأب تحت ارضي </label>
                                                    <input type="sousol_prix" name="sousol_prix" class="form-control" id="sousol_prix" value="<?php echo$data['adherant']->sousol_prix; ?>">
                                                    @if ($errors->has('sousol_prix'))
                                                            <span style="color: red;">{{ $errors->first('sousol_prix') }}</span>
                                                            @endif
                                                </div>

                                                
                                            <div class="form-group">
                                        
                                                <button type="submit" onclick="_blank" class="btn btn-primary btn-block"><i class="fas fa-file-word"></i> Enregisré</button>
                                       
                                            </div>
                                               
                                    </div>
                                    </form>
                                    </div>
                                  
                                   
                                </div>
                                <!-- end card-body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                </div>
            <!-- END content-page -->
            @endsection