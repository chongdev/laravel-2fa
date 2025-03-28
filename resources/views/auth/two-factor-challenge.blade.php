@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header pt-md-4">
                        <h1 class="fw-bold text-center">{{ __('Two-factor authentication') }}</h1>
                    </div>

                    <div class="card-body">
                        <p class="text-center">
                            {{ __('Please enter your authentication code to login.') }}
                        </p>

                        <form method="POST" action="{{ route('two-factor.login') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="code"
                                    class="col-form-label text-md-right">{{ __('Authentication code:') }}</label>

                                <div>
                                    <input id="code" type="code"
                                        class="form-control @error('code') is-invalid @enderror" name="code" required
                                        autocomplete="current-code" />

                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-grid pb-md-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
