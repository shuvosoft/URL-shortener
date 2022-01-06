@extends('layouts.backend.app')

@section('content')
{{--    <h2>hello profile</h2>--}}
<profile-component :profile="{{Auth::user()}}"></profile-component>
@endsection
