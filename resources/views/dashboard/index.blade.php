@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label">Name</label>
                                <div class="col-sm-8">
                                    <div class="form-control-plaintext">{{Auth::user()->name}}</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <div class="form-control-plaintext">{{Auth::user()->email}}</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label">Profile Picture</label>
                                <div class="col-sm-8">
                                    <img src="{{ asset(Auth::user()->profile_url) }}" height="150" width="150"
                                         alt="profile-picture"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <div class="form-control-plaintext">{{Auth::user()->dob}}
                                        ({{current_age(Auth::user()->dob) }} years)
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label">Address</label>
                                <div class="col-sm-8">
                                    <div class="form-control-plaintext">{{Auth::user()->address}}</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mobile-number" class="col-sm-4 col-form-label">Mobile Number</label>
                                <div class="col-sm-8">
                                    <div class="form-control-plaintext">{{Auth::user()->mobile_no}}</div>
                                </div>
                            </div>
                            <div class="">
                                <a class="btn btn-primary" href="{{ route('profile.edit',"me") }}">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
