@extends('layouts.guest')

@section('content')
<section>
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
    <div class="w-full bg-white rounded-lg shadow-lg sm:max-w-md xl:p-0">
      <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 class="text-xl font-bold text-gray-900 md:text-2xl">Create an account</h1>
        <form method="POST" action="{{ route('register') }}">
          @csrf

          <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Full Name</label>
            <input type="text" name="name" id="name" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5" value="{{ old('name') }}">
            @error('name')
              <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
          </div>

          <div>
            <label for="email" class="block mb-2 mt-2 text-sm font-medium text-gray-900">Email</label>
            <input type="email" name="email" id="email" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5" value="{{ old('email') }}">
            @error('email')
              <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
          </div>

          
          <div>
            <label for="password" class="block mb-2 mt-2 text-sm font-medium text-gray-900">Password</label>
            <input type="password" name="password" id="password" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5">
            @error('password')
              <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
          </div>

          
          <div>
            <label for="password_confirmation" class="block mb-2 mt-2 text-sm font-medium text-gray-900">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5">
            @error('password_confirmation')
              <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
          </div>

          <!-- Submit Button -->
          <button type="submit" class="w-full text-white font-bold bg-blue-700 hover:bg-blue-800 rounded-lg text-sm px-5 py-2.5 text-center mt-6 mb-6 transition-colors">Register</button>

          <!-- Redirect to Login -->
          <p class="text-sm font-light text-gray-500">Already have an account? <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:underline">Sign in</a></p>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
