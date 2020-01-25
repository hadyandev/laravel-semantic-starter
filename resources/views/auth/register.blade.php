@extends('layouts.app')

@section('content')
<br><br><br><br>
<div class="ui two column grid centered">
    <div class="column">
        <div class="ui fluid card">
            <div class="content">
                <div class="header">{{ __('Register') }}</div>
            </div>
            <div class="content">
                <form class="ui fluid form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="field">
                        <label for="name">{{ __('Name') }}</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Type your name" autofocus>
                        @error('name')
                            <div class="ui pointing red basic label">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="email">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Type your email" autofocus>
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

                    <div class="field">
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Retype your password">
                    </div>
                    <button type="submit" class="ui fluid secondary button">{{ __('Register') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
