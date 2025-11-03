@extends('layouts.app')

@section('content')
<div class="relative bg-gray-100 min-h-screen flex items-center justify-center py-16 overflow-hidden">
    <img src="/images/background1.jpg" alt="Background Image"
        class="absolute inset-0 w-full h-full object-cover opacity-50" />

    <div class="relative z-10 bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-3xl font-semibold text-center text-gray-700 mb-6">Login</h2>

        @if (session('status'))
            <div class="bg-green-200 text-green-800 p-4 rounded-lg mb-4">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any() && ! $errors->has('email') && ! $errors->has('password'))
            <div class="bg-red-200 text-red-800 p-4 rounded-lg mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="w-full border border-gray-300 focus:ring-blue-500 focus:border-blue-500 px-4 py-2 mt-1 bg-gray-100 rounded-md shadow-sm focus:outline-none">
                @error('email')
                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" value="{{ old('password') }}" required
                    class="w-full border border-gray-300 focus:ring-blue-500 focus:border-blue-500 px-4 py-2 mt-1 bg-gray-100 rounded-md shadow-sm focus:outline-none">
                @error('password')
                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Sign In
            </button>
        </form>

        <p class="mt-4 text-center text-sm">Don't have an account?
            <a href="/register" class="text-blue-500 hover:underline">Sign up!</a>
        </p>
    </div>
</div>
@endsection
