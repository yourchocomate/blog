@extends('layouts.app')

@section('page') Register Page @endsection

@section('content')
<div class="flex w-full h-full justify-center items-center py-16">
    <div class="card flex flex-col justify-center items-center p-12 w-full md:w-[50%]">
        <div class="text-2xl font-semibold mb-4">{{ __('Register') }}</div>
        <form class="w-full flex flex-col" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="flex flex-col">
                <p class="text-sm mb-4">{{ __('Full Name') }}</p>
                <input id="name" type="text" 
                class="w-full  bg-gray-200 text-gray-800 focus:outline-none py-2 px-4 border shadow-inner rounded mb-6 @error('name') focus:outline focus:outline-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="text-red-500 text-sm mt-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="flex flex-col">
                <p class="text-sm mb-4">{{ __('Email Address') }}</p>
                <input id="email" type="email" 
                class="w-full  bg-gray-200 text-gray-800 focus:outline-none py-2 px-4 border shadow-inner rounded mb-6 @error('email') focus:outline focus:outline-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                @error('email')
                    <span class="text-red-500 text-sm mt-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="flex flex-col">
                <p class="text-sm mb-4">{{ __('Password') }}</p>
                <input id="password" type="password" 
                class="w-full  bg-gray-200 text-gray-800 focus:outline-none py-2 px-4 border shadow-inner rounded mb-6 @error('password') focus:outline focus:outline-red-500 @enderror" name="password" value="{{ old('password') }}" required autocomplete="new-password" autofocus>
    
                @error('password')
                    <span class="text-red-500 text-sm mt-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                
                <p class="text-sm mb-4">{{ __('Confirm Password') }}</p>
                <input id="password-confirm" type="password" 
                class="w-full  bg-gray-200 text-gray-800 focus:outline-none py-2 px-4 border shadow-inner rounded mb-6 @error('password') focus:outline focus:outline-red-500 @enderror" name="password_confirmation" value="{{ old('password') }}" required autofocus>

            </div>

            <button type="submit" class="text-md text-white px-8 py-2 bg-green-600 rounded mb-4">
                {{ __('Register') }}
            </button>
        </form>
    </div>
</div>
@endsection
