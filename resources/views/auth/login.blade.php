@extends('layouts.app')

@section('content')
<br><br><br><br>
<div class="ui two column grid centered">
    <div class="column">
        <div class="ui fluid card">
            <div class="content">
                <div class="header">{{ __('Login') }}</div>
            </div>
            <div class="content">
                <form class="ui fluid form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="field">
                        <label for="email">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Type your email">
                        @error('email')
                        <div class="ui pointing red basic label">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Type your password">
                        @error('password')
                            <div class="ui pointing red basic label">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="ui fluid secondary button"><i class="fas fa-sign-in-alt"></i> {{ __('Login') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
