@extends('layouts.app')

@section('page') Password Reset Page @endsection

@section('content')
<div class="flex w-full h-full justify-center items-center">
    <div class="card flex flex-col justify-center items-center p-12 w-full md:w-[50%]">
        <div class="text-2xl font-semibold mb-4">{{ __('Confirm Password') }}</div>
            {{ __('Please confirm your password before continuing.') }}

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="flex flex-col">
                    <p class="text-sm mb-4">{{ __('Password') }}</p>
                    <input id="password" type="password" class="w-full bg-gray-200 text-gray-800 focus:outline-none py-2 px-4 border shadow-inner rounded mb-6 @error('password') focus:outline focus:outline-red-500 @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="text-red-500 mt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="text-md text-white px-8 py-2 bg-green-600 rounded mb-6">
                    {{ __('Confirm Password') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="text-sm text-black" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection
