<!DOCTYPE html>
<html lang="ar" dir="rtl" xml:lang="ar" xmlns="http://www.w3.org/1999/xhtml">
<!--<![endif]-->
<head>
    <html prefix="og: http://ogp.me/ns#">
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sjpromorteur | Demande d' annulation</title> 
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

<p style="text-align:center"><b>الحمد لله وحده</b></p>
<p>&nbsp;</p>

<p dir="RTL" style="text-align:left"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong><strong>في</strong><strong>&nbsp;:</strong><strong>&nbsp;</strong><strong><?php echo date("d-m-Y");?>&nbsp;</strong></p>


<h4 dir="RTL" style="text-align:left">

    الاسم الكامل:&nbsp;{{$data['adherant']->ar_name}}&nbsp;<br><x1 style="text-transform: uppercase;"> {{$data['adherant']->id_national}}</x1></h4>


<h1 dir="RTL" style="text-align:center; font-size:55px"><strong><u>طلب الانسحاب</u></strong></h1>

<p dir="RTL" style="font-size:18px";>&nbsp;</p>

<p dir="RTL" style="font-size:25px; text-align:center;">
    <strong style="text-align:center;">الى السيد: رئيس {{$getdata[0]->raison_social_ar}}</strong>
</p>

<p dir="RTL" style="font-size:25px;">&nbsp;</p>

<p dir="RTL" style="font-size:30px"><strong>&nbsp; &nbsp; &nbsp; - يشرفني ان اطلب منكم الانسحاب من الودادية التي تترأسونها ودالك لظروفي الشخصية و تقبلوا فائق التقدير و الاحترام و السلام.
</strong></p>


<p dir="RTL" style="font-size:18px";>&nbsp;</p>


<p dir="RTL" style="text-align:center; font-size:25px"><strong>و السلام</strong><strong>&nbsp;&nbsp;</strong></p><br><br><br>


<p dir="RTL" style="font-size:25px";><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong><strong>إمضاء الرئيس</strong></p>


<div style="page-break-after: always;" ></div>


<p style="text-align:center"><b>الحمد لله وحده</b></p>
<p>&nbsp;</p>

<p dir="RTL" style="text-align:left"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong><strong>في</strong><strong>&nbsp;:</strong><strong>&nbsp;</strong><strong><?php echo date("d-m-Y");?>&nbsp;</strong></p>


<h4 dir="RTL" style="text-align:left">

    الاسم الكامل:&nbsp;{{$data['adherant']->ar_name}}&nbsp;<br><x1 style="text-transform: uppercase;">{{$data['adherant']->id_national}}</x1></h4>


<h1 dir="RTL" style="text-align:center; font-size:55px"><strong><u>اشهاد بالاستلام</u></strong></h1>

<p dir="RTL" style="font-size:18px";>&nbsp;</p>


<p dir="RTL" style="font-size:25px;">&nbsp;</p>

<p dir="RTL" style="font-size:30px"><strong>&nbsp; &nbsp; &nbsp; - أنا الموقع أسفله 
السيد(ة) : {{$data['adherant']->ar_name}} {{$data['adherant']->id_national}} .<br>
أشهد شهادة تامة و كاملة مني بالطوع و الرضا وبكل ما تصح به الشهادة شرعا و قانونا انني تسلمت من {{$getdata[0]->raison_social_ar}} ما مجموعه {{$data['m_total1']}} درهم ودالك مقابل الدفعات التي اودعتها في حساب {{$getdata[0]->raison_social_ar}}.
</strong></p>


<p dir="RTL" style="font-size:18px";>&nbsp;</p>


<p dir="RTL" style="text-align:center; font-size:25px"><strong>و السلام</strong><strong>&nbsp;&nbsp;</strong></p><br><br><br>


<p dir="RTL" style="font-size:25px";><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong><strong>إمضاء الرئيس</strong></p>


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