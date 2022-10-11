<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <link rel="stylesheet" href="{{asset('assets/main.css')}}">
</head>
<body>
    <div class="min-h-screen">
        <div class="absolute inset-0 w-full h-full">
            <div class="w-full h-full flex flex-col items-center p-12">

                <!-- Header -->
                <div class="w-full flex flex-col md:flex-row space-y-2 md:space-y-0 justify-between mb-8">
                    <h2 class="text-lg">@yield('page')</h2>
                    
                    <div class="flex flex-col md:flex-row md:space-x-2 space-y-3 md:space-y-0">
                        @guest
                            @if (Route::has('login'))
                                <a class="text-md text-white px-8 py-2 bg-green-600 rounded" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @endif

                            @if (Route::has('register'))
                                <a class="text-md text-white px-8 py-2 bg-green-600 rounded" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                        
                        @yield('page-button')
                        
                        <a href="{{route('home')}}" class="text-md text-white px-8 py-2 bg-green-600 rounded">Home</a> 
                        @if(auth()->user()->isAdmin())<a href="{{route('admin')}}" class="text-md text-white px-8 py-2 bg-green-600 rounded">Admin</a> @endif
                        
                        <a class="text-md text-white px-8 py-2 bg-green-600 rounded" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @endguest
                    </div>
                </div>

                @yield('content')
            </div>
        </div>
    </div>
    @yield('scripts')
</body>
</html>
