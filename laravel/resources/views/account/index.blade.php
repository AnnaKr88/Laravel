@extends('layouts.app')

@section('title')
    Личный кабинет: {{ Auth::user()->name }}
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Профиль') }}</div>

                    <div class="card-body">
                        <h3>Профиль: {{ Auth::user()->name }}</h3>
                        <h5>{{ Auth::user()->rights }}</h5>
                        @if(Auth::user()->rights == 'admin')
                            <a href="{{ route('admin.index') }}">Admin panel</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


