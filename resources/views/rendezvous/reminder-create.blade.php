@extends('layouts.layout')
@section('content')
<div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">SMS reminder</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active">SMS reminder</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
            
            <div class="row justify-content-center">
                
                <div class="col-8">
                <h4 class="mb-3" style="text-align: center">SMS Reminder :</h4>
                                        <center>
                                        @include('flash-message')
                                        </center>
                <hr>
                    <form method="post" action="{{ route('storeReminder') }}">
                        @csrf
                        
                        
                        <div class="form-group">
                        <label for="mobile_no">Rendez-Vous :</label>
                            <select class="form-control" name="r_name" id="r_name" aria-label="Default select example">
                                @foreach ($data['rends'] as $rend)
                                  <option value="{{ $rend->id }}">{{ $rend->title }}</option>
                                @endforeach
                         
                                </select>
                            
                        </div>
                        <label for="mobile_no">Phone number :</label>
                        <div class="input-group">
                            <input type="tel" class="form-control" name="mobile_no" id="mobile_no"
                                placeholder="Phone number" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 my-3">
                                <label for="date">Notification Date :</label>
                                <input type="date" class="form-control" name="date" id="date" required>
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="time">Notification Time :</label>
                                <input type="time" class="form-control" name="time" id="time" required>
                            </div>
                        </div>
                        <div class="my-3">
                            <label for="message">Reminder Message :</label>
                            <textarea class="form-control" name="message" rows="5" id="message"
                                placeholder="Type in your reminder message here" required></textarea>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Active SMS</button>
                    </form>
                </div>
            </div>
            @endsection
  