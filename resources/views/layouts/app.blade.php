<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/semantic.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    @stack('style')
</head>
<body>
    <div id="app">
        <div class="ui large top fixed menu">
            <a class="item" href="{{ url('/') }}">
                {{-- <img src="/images/logo.png"> --}}
                {{ config('app.name', 'Laravel') }}
            </a>
            <div class="right menu">
                @guest
                    <a class="ui item" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a class="ui item" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <div class="ui item dropdown">
                        <div class="text">{{ Auth::user()->name }}</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <a class="item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
        </div>

        <main class="ui container">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/semantic.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/fontawesome.all.min.js') }}"></script>
    <script>
        $('.ui.dropdown').dropdown();
    </script>
    @stack('script')

    {!! Toastr::message() !!}
</body>
</html>
