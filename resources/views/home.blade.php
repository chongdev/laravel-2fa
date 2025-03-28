@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (!auth()->user()->two_factor_secret)
                            You have not enabled two factor authentication

                            <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                                @csrf

                                <button type="submit" class="btn btn-primary">
                                    Enable two factor authentication
                                </button>
                            </form>
                        @else
                            You have enabled two factor authentication

                            <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">
                                    Disable two factor authentication
                                </button>
                            </form>
                        @endif

                        @if (session('status') == 'two-factor-authentication-enabled')
                            {!! auth()->user()->twoFactorQrCodeSvg() !!}
                            <p>Save these recovery codes in a secure password manager. They can be used to recover access to
                                your account if you lose your two factor authentication device.</p>
                            <ul>
                                @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as $code)
                                    <li>{{ $code }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
