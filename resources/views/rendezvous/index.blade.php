@extends('layouts.layout')
@section('content')
<div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Calendrier</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active">Calendrier</li>
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
                                        @include('flash-message')
                                        </center>
                                </div>

                                        <script src="{{ asset('static/calendar/jquery.js') }}"></script>
                                        <script>
                                        $(document).ready(function () {
                                        $.ajaxSetup({
                                            headers:{
                                                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                                            },
                                        
                                        });
                                        var x1 = document.getElementById('user_id').value;
                                        var calendar = $('#calendar').fullCalendar({
                                            editable:true,
                                            header:{
                                                left:'prev,next today',
                                                center:'title',
                                                right:'month,agendaWeek,agendaDay'
                                            },
                                            events:'/profile/agenda/'+x1,
                                            selectable:true,
                                            selectHelper: true,
                                            
                                            select:function(start, end, allDay)
                                            {
                                                //jQuery('#modal-add-envent').modal();
                                                
                                                var user_id = document.getElementById('user_id').value;
                                                var title = prompt('Rendez-vous titre:');
                                                if(title)
                                                {
                                                    var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');
                                                    var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');
                                                    $.ajax({
                                                        url:"{{ route('add.reminder') }}",
                                                        type:"POST",
                                                        data:{
                                                            user_id: user_id,
                                                            title: title,
                                                            start: start,
                                                            end: end,
                                                            type: 'add'
                                                        },
                                                        success:function(data)
                                                        {
                                                            calendar.fullCalendar('refetchEvents');
                                                            alert("Rendez-vous enregistré avec succèe");
                                                        }
                                                    })
                                                }
                                            },
                                            editable:true,
                                            eventResize: function(event, delta)
                                            {
                                                var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                                                var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                                                var title = event.title;
                                                var id = event.id;
                                                $.ajax({
                                                    url:"{{ route('add.reminder') }}",
                                                    type:"POST",
                                                    data:{

                                                        title: title,
                                                            start: start,
                                                            end: end,
                                                            id: id,
                                                            type: 'update'
                                                    },
                                                    success:function(response)
                                                    {
                                                        calendar.fullCalendar('refetchEvents');
                                                        alert("Rendez-vous modifié avec succèe");
                                                    }
                                                })
                                            },
                                            eventDrop: function(event, delta)
                                            {
                                                var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                                                var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                                                var title = event.title;
                                                var id = event.id;
                                                $.ajax({
                                                    url:"{{ route('add.reminder') }}",
                                                    type:"POST",
                                                    data:{
                                                        title: title,
                                                            start: start,
                                                            end: end,
                                                        id: id,
                                                        type: 'update'
                                                    },
                                                    success:function(response)
                                                    {
                                                        calendar.fullCalendar('refetchEvents');
                                                        alert("Rendez-vous modifié avec succèe");
                                                    }
                                                })
                                            },
                                    
                                            eventClick:function(event)
                                            {
                                                if(confirm("Vous-etes sur supprimé le rendez-vous !"))
                                                {
                                                    var id = event.id;
                                                    $.ajax({
                                                        url:"{{ route('add.reminder') }}",
                                                        type:"POST",
                                                        data:{
                                                            id:id,
                                                            type:"delete"
                                                        },
                                                        success:function(response)
                                                        {
                                                            calendar.fullCalendar('refetchEvents');
                                                            alert("Rendez-vous supprimé avec succèe");
                                                        }
                                                    })
                                                }
                                            }
                                        });
                                    
                                    });
         
                                        </script>
                                        <div class="container">
                                            <a href="{{ route('rcreatesms') }}" class="btn btn-success btn-sm btn-block" >Alert SMS <i class="fas fa-sms"></i>
                                        </a>
                                        <br>
                                        
                                    <div class="card"><br>

                                            <div class="table-responsive">
                                        <table id="example" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Titre</th>
                                                    <th>Date rendez-vous</th>
                                                    <th>SMS status</th>
                                                </tr>
                                            </thead>
                                                <tbody>
                                                @foreach ($data['rendezvous_user'] as $rend_user)
                                                <tr>
                                                <td>{{$rend_user->title}}</td> 
                                                <td>{{$rend_user->start}}</td>
                                                @if ($rend_user->is_confirme === 1)
                                                <td>
                                                    <span class="badge badge-success"><i class="fas fa-sms"></i> SMS</span>
                                                </td>
                                                
                                                @else
                                                <td>
                                                    <span class="badge badge-warning"><i class="fas fa-sms"></i> SMS</span>
                                                </td>

                                            </tr>
                                                    @endif
                                                @endforeach
                                                </tbody> 
                                        </table>
                                    </div>
                                    <!-- end table-responsive-->





                                            </div>
                                        </div>
                                        <div id="calendar">
                                        <input type="hidden" name="user_id" id="user_id" value="{{ $find->id }}">
                                        </div>


                                        @csrf
                                        <style>#top {
                                            background: #eee;
                                            border-bottom: 1px solid #ddd;
                                            padding: 0 10px;
                                            line-height: 40px;
                                            font-size: 12px;
                                        }

                                        #calendar {
                                            max-width: 900px;
                                            margin: 40px auto;
                                            padding: 0 10px;
                                        }
                                        </style>
                                    </div>
                                </div>
                            </div>
                            @endsection