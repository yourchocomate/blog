@extends('layouts.app')

@section('page') Password Reset Page @endsection

@section('content')
<div class="flex w-full h-full justify-center items-center">
    <div class="card flex flex-col justify-center items-center p-12 w-full md:w-[50%]">
        <div class="text-2xl font-semibold mb-4">{{ __('Reset Password') }}</div>
            @if (session('status'))
                <div class="py-2 px-6 w-full border border-green-700 bg-green-400 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form class="w-full flex flex-col" method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="flex flex-col">
                    <p class="text-sm mb-4">{{ __('Email Address') }}</p>

                    <div class="col-md-6">
                        <input id="email" type="email" class="w-full bg-gray-200 text-gray-800 focus:outline-none py-2 px-4 border shadow-inner rounded mb-6 @error('email') focus:outline focus:outline-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="text-red-500 mt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="text-md text-white px-8 py-2 bg-green-600 rounded mb-6">
                    {{ __('Send Password Reset Link') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
