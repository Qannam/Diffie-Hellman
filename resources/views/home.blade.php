@extends('layout')
@section('title', 'Diffie Hellman Home')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Diffie Hellman Calculator') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{'/calculate'}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="prime_number" class="col-md-4 col-form-label text-md-right">{{ __('Prime Number (q)') }}</label>

                                <div class="col-md-6">
                                    <input id="prime_number" type="text" class="form-control{{ $errors->has('prime_number') ? ' is-invalid' : '' }}" name="prime_number" value="{{ old('prime_number') }}" autofocus>

                                    @if ($errors->has('prime_number'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('prime_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="primitive_root" class="col-md-4 col-form-label text-md-right">{{ __('Primitive Root (a)') }}</label>

                                <div class="col-md-6">
                                    <input id="primitive_root" type="text" class="form-control{{ $errors->has('primitive_root') ? ' is-invalid' : '' }}" name="primitive_root" value="{{ old('primitive_root') }}" autofocus>

                                    @if ($errors->has('primitive_root'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('primitive_root') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="secret_key_a" class="col-md-4 col-form-label text-md-right">{{ __('Secret Key For A (Xa)') }}</label>

                                <div class="col-md-6">
                                    <input id="secret_key_a" type="text" class="form-control{{ $errors->has('secret_key_a') ? ' is-invalid' : '' }}" name="secret_key_a" value="{{ old('secret_key_a') }}" autofocus>

                                    @if ($errors->has('secret_key_a'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('secret_key_a') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="secret_key_b" class="col-md-4 col-form-label text-md-right">{{ __('Secret Key For B (Xb)') }}</label>

                                <div class="col-md-6">
                                    <input id="secret_key_b" type="text" class="form-control{{ $errors->has('secret_key_b') ? ' is-invalid' : '' }}" name="secret_key_b" value="{{ old('secret_key_b') }}" autofocus>

                                    @if ($errors->has('secret_key_b'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('secret_key_b') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <p class="text-secondary">* If you leave an empty field, we will create a random number</p>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection