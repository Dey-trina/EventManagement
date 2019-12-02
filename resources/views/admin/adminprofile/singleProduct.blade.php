
@extends('layouts.master')

@section('pageTitle')
Profile Manage
@endsection

@section('contentHeading')
Profile Manage

@endsection

@section('mainContent')
<img src="{{asset($admin->companyLogo)}}" width="300"> <br> <hr>
Company Name:{{$admin->companyName}} <br> <hr>
Manager Name:{{$admin->managerName}} <br><hr>
Manager Email:{{$admin->managerEmail}} <br><hr>
Mnager Contact Number:{{$admin->managerConNo}} <br><hr>
Address:{{$admin->address}} <br><hr>
Company Description:{{$admin->companyDescription}} <br><hr>
@endsection