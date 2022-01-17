@extends('layouts.app')

@section('content')

 <welcome-component :app_config="{{json_encode($appConfig)}}"></welcome-component>
 <footer-component :app_config="{{json_encode($appConfig)}}"></footer-component>

@endsection

