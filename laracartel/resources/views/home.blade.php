@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Welcome ' . Auth::user()->name. ' !') }}
                </div>
            </div>
            @auth
            <div class="card">
                <div class="card-body">
                    @can('manage-clients')
                        <a href="{{ route('commercial.client.index') }}"><button class="btn btn-secondary btn-lg">Clients</button></a>
                    @endcan
                    @can('manage-users')
                        <a href="{{ route('admin.users.index') }}"><button class="btn btn-secondary btn-lg">Utilisateurs</button></a>
                    @endcan
                    @can('manage-transports')
                        <a href="{{ route('commercial.transport.index') }}"><button class="btn btn-secondary btn-lg">Transports</button></a>
                    @endcan
                </div>
            </div>
            @else
            @endauth
        </div>
    </div>
</div>
@endsection
