<!DOCTYPE html>
<html lang="ar" dir="rtl" xml:lang="ar" xmlns="http://www.w3.org/1999/xhtml">
<!--<![endif]-->
<head>
    <html prefix="og: http://ogp.me/ns#">
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sjpromorteur | authorisation de paiement</title> 
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
<p style="text-align:center"><b>الحمد لله وحده </b></p>
<p>&nbsp;</p> 
<p style="text-align:right"><strong>{{ $getdata[0]->raison_social_ar }}</strong></p>
<p dir="RTL" style="text-align:left"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong><strong>في</strong><strong>&nbsp;:</strong><strong>&nbsp;</strong><strong><?php echo date("d-m-Y");?>&nbsp;</strong></p>


<h4 dir="RTL" style="text-align:left">
من رئيس
{{ $getdata[0]->raison_social_ar }}<br />
    إلى السيد (ة):&nbsp;{{$data['adherant']->ar_name}}&nbsp;<x1 style="text-transform: uppercase;">{{$data['adherant']->id_national}}</x1></h4>


<h1 dir="RTL" style="text-align:center"><strong><u>إذن بالــــــــدفــع</u></strong></h1>
<p dir="RTL" style="font-size:18px";><strong>مكان المشروع&nbsp;</strong><strong>:</strong><strong>&nbsp;الحي الصناعي أكادير</strong></p>
<p dir="RTL" style="font-size:18px";><strong>الموضوع : إذن بدفع التزاماتك المالية في حساب الودادية.</strong></p>
<p dir="RTL" style="font-size:18px";><strong>بناءا على:</strong></p>
<p dir="RTL" style="font-size:18px";><strong>-&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong><strong>الظهير الشريف رقم 976 &ndash; 1 &ndash; 58 بتاريخ جمادى الأولى 1378 هـ الموافق ل 15 نونبر 1958 م كما تم تغييره و تتميمه بمقتضى الظهير الشريف رقم : 206-02-1 الصادر في 12 جمادى الأولى 1423 هـ الموافق ل : 23 يوليوز 2002 م.</strong></p>
<p dir="RTL" style="font-size:18px";><strong>-&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong><strong>مقتضيات القانون الأساسي و النظام الداخلي للودادية المصادق عليها في الجمع العام التأسيسي و خاصة الفصول:</strong></p>
<p dir="RTL" style="font-size:18px";><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;- الفصل 22 من القانون الأساسي للودادية.</strong></p>
<p dir="RTL" style="font-size:18px";><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;- الفصل 8 من النظام الداخلي للودادية.</strong></p>
<p dir="RTL" style="font-size:18px";><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;- الفصل 9 من النظام الداخلي للودادية.</strong></p>
<p dir="RTL" style="font-size:18px";>يشرفني أن أخبركم انه تمت الموافقة على الإذن بدفع جميع التزاماتك المالية تجاه الودادية في حسابها رقم&nbsp;:</p>
<p dir="RTL" style="font-size:18px";><xc dir="LTR">{{ $getdata[0]->rib }}</xc>&nbsp;&nbsp;المفتوح لدى {{ $getdata[0]->details }}&nbsp;<strong>المتعلقة </strong><strong>ب{{$data['adherant']->ar_immtype}}&nbsp; 
@if ($data['adherant']->n_appartement == "")@elseرقم  {{ $data['adherant']->n_appartement }}&nbsp;@endif
بمساحة {{$data['adherant']->m2}}</strong>&nbsp;<strong>متر مربع تقريبا بثمن</strong><strong> {{$data['adherant']->pm2}} </strong><strong>درهم للمتر مربع الواحد  
@if ($data['adherant']->balcon == 1)
<strong>و  {{$data['adherant']->balcon_superficier}} متر مربع تقريبا ب {{$data['adherant']->balcon_prix}} درهم  للمتر  مربع بالشرفة  </strong>
@else
@endif
للأشغال الكبرى {{$data['adherant']->etage}} {{$data['adherant']->ar_facade}}&nbsp;</strong>@if ($data['adherant']->sous_sol == 1)
<strong>مع مرأب تحت ارضي</strong>
@else
@endif
@if ($data['adherant']->bloc == "")@else<strong>{{ $data['adherant']->bloc}}&nbsp;</strong>@endif
المشروع المزمع إنجازه و المسمى {{ $getdata[0]->raison_social_ar }}&nbsp;التي ترغبون في الاستفادة منها .</p>
<p dir="RTL" style="font-size:18px";>&nbsp;</p>
<p dir="RTL" style="text-align:center"><strong>و السلام</strong><strong>&nbsp;&nbsp;</strong></p><br><br><br>
<p dir="RTL" style="font-size:18px";><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong><strong>إمضاء الرئيس</strong></p>


<div style="page-break-after: always;" ></div>


<p style="text-align:center"><b>الحمد لله وحده</b></p>
<p>&nbsp;</p>
<p style="text-align:right"><strong>{{ $getdata[0]->raison_social_ar }}</strong></p>
<p dir="RTL" style="text-align:left"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong><strong>في</strong><strong>&nbsp;:</strong><strong>&nbsp;</strong><strong><?php echo date("d-m-Y");?>&nbsp;</strong></p>


<h4 dir="RTL" style="text-align:left">
من رئيس
{{ $getdata[0]->raison_social_ar }}<br />
    إلى السيد (ة):&nbsp;{{$data['adherant']->ar_name}}&nbsp;<x1 style="text-transform: uppercase;">{{$data['adherant']->id_national}}</x1></h4>

<p dir="RTL" style="font-size:18px";>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>&nbsp; &nbsp; &nbsp; &nbsp;</strong></p>
<h3 dir="RTL" style="text-align:center"><strong>مكان المشروع&nbsp;</strong><strong>:</strong><strong>&nbsp;الحي الصناعي أكادير</strong></h3>
<p dir="RTL" style="font-size:18px";><strong>الموضوع: في شان استفادتكم من خدمات الودادية.</strong></p>
<p dir="RTL" style="font-size:18px";><strong>بناءا على:</strong></p>
<p dir="RTL" style="font-size:18px";><strong>-&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong><strong> - الظهير الشريف رقم 376- 1 – 58 بتاريخ جمادى الأولى 1378 هــ الموافق لــ 15 نونبر 1958 م كما تم تغييره وتتميمه بمقتضى الظهير الشريف رقم: 206-02-1 الصادر في 12 جمادى الأولى 1423 هــ الموافق لـ: 23 يوليوز 2002 م. تأسست ودادية النسيم..</strong></p>
<p dir="RTL" style="font-size:18px";><strong>-&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong><strong>مقتضيات القانون الأساسي و النظام الداخلي للودادية المصادق عليها في الجمع العام التأسيسي و خاصة الفصول:</strong></p>
<p dir="RTL" style="font-size:18px";><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;- الفصل 16 من القانون الأساسي للودادية.                            </strong></p>
<p dir="RTL" style="font-size:18px";><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;- الفصل 2 من النظام الداخلي للودادية.       </strong></p>
<p dir="RTL" style="font-size:18px";><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - الفصل 3 من النظام الداخلي للودادية.  </strong></p>
<p dir="RTL" style="font-size:18px";>يشرفني أن أخبركم انه تمت الموافقة على استفادتكم من ،&nbsp;
<strong>{{ $data['adherant']->ar_immtype }} بمساحة{{ $data['adherant']->m2 }}  متر مربع تقريبا ب {{ $data['adherant']->pm2 }} درهم للمتر مربع الواحد للأشغال الكبرى {{ $data['adherant']->etage }} </strong>@if ($data['adherant']->sous_sol == 1)
<strong>مع مرأب تحت ارضي</strong>
@else
@endif
المشروع المزمع إنجازه والمسمى الإقامة السكنية {{ $getdata[0]->raison_social_ar }}, التي ترغبون في الاستفادة منها.</p>
<p dir="RTL" style="font-size:18px";>&nbsp;</p>
<p dir="RTL" style="text-align:center"><strong>و السلام</strong><strong>&nbsp;&nbsp;</strong></p><br><br><br>
<p dir="RTL" style="font-size:18px";><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong><strong>إمضاء الرئيس</strong></p>


<div style="page-break-after: always;" ></div>


<p style="text-align:center"><b>الحمد لله وحده</b></p>
<p>&nbsp;</p>
<p style="text-align:right"><strong>{{ $getdata[0]->raison_social_ar }}</strong></p>
<p dir="RTL" style="text-align:left"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong><strong>في</strong><strong>&nbsp;:</strong><strong>&nbsp;</strong><strong><?php echo date("d-m-Y");?>&nbsp;</strong></p>


<h4 dir="RTL" style="text-align:left">
من رئيس
{{ $getdata[0]->raison_social_ar }}<br />
    إلى السيد (ة):&nbsp;{{$data['adherant']->ar_name}}&nbsp;<x1 style="text-transform: uppercase;">{{$data['adherant']->id_national}}</x1></h4>

<p dir="RTL" style="font-size:18px";>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>&nbsp; &nbsp; &nbsp; &nbsp;</strong></p>
<h3 dir="RTL" style="text-align:center"><strong>مكان المشروع&nbsp;</strong><strong>:</strong><strong>&nbsp;الحي الصناعي أكادير</strong></h3>
<p dir="RTL" style="font-size:18px";><strong>الموضوع: في شان انخراطكم في الودادية.</strong></p>
<p dir="RTL" style="font-size:18px";><strong>بناءا على:</strong></p>
<p dir="RTL" style="font-size:18px";><strong>-&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong><strong>  - الظهير الشريف رقم 376- 1 – 58 بتاريخ جمادى الأولى 1378 هــ الموافق لــ 15 نونبر 1958 م كما تم تغييره وتتميمه بمقتضى الظهير الشريف رقم: 206-02-1 الصادر في 12 جمادى الأولى 1423 هــ الموافق لـ: 23 يوليوز 2002 م. تأسست ودادية النسيم.</strong></p>
<p dir="RTL" style="font-size:18px";><strong>-&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong><strong> - مقتضيات القانون الأساسي والنظام الداخلي وخاصة:</strong></p>
<p dir="RTL" style="font-size:18px";><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;- الفصل 7 من القانون الاساسي للودادية.</strong></p>
<strong><p dir="RTL" style="font-size:18px";>يشرفني أن أخبركم انه تمت الموافقة على انخراطكم في وداديتنا، كما أدعوكم على أن يكون انخراطكم ايجابيا من اجل تحقيق هدف الودادية.&nbsp;:</p></strong>
<p dir="RTL" style="font-size:18px";>&nbsp;</p>
<p dir="RTL" style="text-align:center"><strong>و السلام</strong><strong>&nbsp;&nbsp;</strong></p><br><br><br>
<p dir="RTL" style="font-size:18px";><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong><strong>إمضاء الرئيس</strong></p>

<div style="page-break-after: always;" ></div>

<p style="text-align:center"><b>الحمد لله وحده</b></p>
<p>&nbsp;</p>
<p style="text-align:right"><strong>{{ $getdata[0]->raison_social_ar }}</strong></p>
<p dir="RTL" style="text-align:left"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong><strong>في</strong><strong>&nbsp;:</strong><strong>&nbsp;</strong><strong><?php echo date("d-m-Y");?>&nbsp;</strong></p>


<h4 dir="RTL" style="text-align:left">
من رئيس
{{ $getdata[0]->raison_social_ar }}<br />
    إلى السيد (ة):&nbsp;{{$data['adherant']->ar_name}}&nbsp;<x1 style="text-transform: uppercase;">{{$data['adherant']->id_national}}</x1></h4>

<p dir="RTL" style="font-size:18px";>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>&nbsp; &nbsp; &nbsp; &nbsp;</strong></p>
<h1 dir="RTL" style="text-align:center"><strong><u>وثيقة العضوية</u></strong></h1>
<br>
<p dir="RTL" style="font-size:18px";><strong>مكان المشروع&nbsp;</strong><strong>:</strong><strong>&nbsp;الحي الصناعي أكادير</strong></p>

<p dir="RTL" style="font-size:18px";>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>&nbsp; &nbsp; &nbsp; &nbsp;</strong></p>
<center>
<p dir="RTL" style="font-size:18px";><strong>الموضوع : منح وثيقة العضوية.</strong></p></center>

<p dir="RTL" style="font-size:18px";>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>&nbsp; &nbsp; &nbsp; &nbsp;</strong></p>

<p dir="RTL" style="font-size:19px;">-      يشرفني أن أخبركم أنه تم منحكم صفة العضوية في وداديتنا وبالتالي فإنكم تمتلكون الحق في الاستفادة من خدماتنا&nbsp;

<strong>ب{{ $data['adherant']->ar_immtype }} بمساحة {{ $data['adherant']->m2 }} متر مربع تقريبا ب {{ $data['adherant']->pm2 }}درهم للمتر مربع الواحد للأشغال الكبرى {{ $data['adherant']->etage }} @if ($data['adherant']->sous_sol == 1)
مع مرأب تحت ارضي
@else
@endif  المشروع المزمع إنجازه و المسمى {{ $getdata[0]->raison_social_ar }}&nbsp;التي ترغبون في الاستفادة منها .</p>

</strong></p>


<br><br>
<p dir="RTL" style="font-size:18px";>&nbsp;</p>
<p dir="RTL" style="text-align:center"><strong>و السلام</strong><strong>&nbsp;&nbsp;</strong></p>


<p dir="RTL" style="font-size:18px";><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong><strong>إمضاء الرئيس</strong></p>

    
<p dir="RTL" style="font-size:18px";>&nbsp;</p>


<p dir="RTL" style="font-size:18px";>&nbsp;</p>
<br><br><footer>
<p><strong>ملاحظة:</strong>في حالة الرغبة في التنازل عن هذا الحق، يجب الحصول على موافقة مكتب الودادية، حماية لحقوق الراغب في الاستفادة من هذا الحق.</p>
</footer>

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