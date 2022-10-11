@extends('layouts.app')

@section('content')
<div class="flex w-full h-full justify-center items-center">
    <div class="card flex flex-col justify-center items-center p-12 w-full md:w-[50%]">
        <div class="text-2xl font-semibold mb-4">{{ __('Login') }}</div>
            @if (session('resent'))
                <div class="py-2 px-6 w-full border border-green-700 bg-green-400 mb-4" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
            <form class="w-full flex flex-col" method="POST" action="{{ route('login') }}">
                @csrf
                <button type="submit" class="text-md text-white px-8 py-2 bg-green-600 rounded mb-4">{{ __('click here to request another') }}</button>.
            </form>
        </div>
    </div>
</div>
@endsection
