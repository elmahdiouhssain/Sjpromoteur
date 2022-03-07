<!DOCTYPE html>
<html lang="ar" dir="rtl" xml:lang="ar" xmlns="http://www.w3.org/1999/xhtml">
<!--<![endif]-->
<head>
    <html prefix="og: http://ogp.me/ns#">
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sjpromorteur | confirmation de paiement</title> 
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('static/css/bootstrap.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('static/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">

<body>
    <style type="text/css">
        html {
        direction: rtl;
        text-align: right;
        }
        @page {
            margin: 0.3cm;
        }

    </style>
<div class="container">   
@if(!$data['adherant']->societe_id == 0)
<?php $getdata = DB::select('select * from amicals where id='.$data['adherant']->societe_id); ?>
<div class="card">
<h1 style="text-align:center; color: skyblue; font-size:36px;"><b>{{$getdata[0]->raison_social}}</b></h1>
<p>&nbsp;</p>
</div>

<p dir="RTL" style="text-align:left"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong><strong>في</strong><strong>&nbsp;:</strong><strong>&nbsp;</strong><strong style="text-align:center"><?php echo date("d-m-Y");?>&nbsp;</strong></p>



<p dir="RTL" style="font-size:25px;">&nbsp;</p>
<p dir="RTL" style="font-size:25px;">&nbsp;</p>

<h1 dir="RTL" style="text-align:center" style="font-size:32px;"><strong style="font-size:60px;"><u>اشهاد</u></strong></h1>


<p dir="RTL" style="font-size:25px;">&nbsp;</p>

<p dir="RTL" style="font-size:30px"><strong>&nbsp; &nbsp; &nbsp; - تشهد {{ $getdata[0]->raison_social_ar }} انها تسلمت من السيد(ة) {{$data['adherant']->ar_name}} رقم البطاقة الوطنية {{$data['adherant']->id_national}} مبلغ ما مجموعه {{$data['m_total1']}} درهم <br>و تعتبر دفعة كاملة مستوفات للأشغال الكبرى 

@if ($data['adherant']->sous_sol == 1)
 و {{$data['adherant']->sousol_prix}} درهم للمراب تحت ارضي
@else
@endif
للشقة المتواجدة ب{{ $getdata[0]->raison_social_ar }}</strong></p>



<p dir="RTL" style="font-size:25px;">&nbsp;</p>

<p dir="RTL" style="text-align:center" style="font-size:25px;"><strong style="font-size:25px;">و السلام</strong><strong>&nbsp;&nbsp;</strong></p><br><br><br>
<p dir="RTL" style="font-size:25px;"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong><strong>إمضاء الرئيس</strong></p>


<div style="page-break-after: always;" ></div>


@else
<center>
  <br><br>
  <h4>L'adhèrant assigné sur la partie lotissement. Pour géneré un authorisation du paiement , s'il vous plait choissi l 'icon sous le titre lotissement.</h4><br>
  <h4>Authorisation du paiement pour lotissment est en development....</h4>
</center>
@endif
</div>
</body>