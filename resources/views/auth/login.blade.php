<x-guest-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:background>{{ $background }}</x-slot:background>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    {{-- Logo --}}
    <div class="flex justify-center pb-2">
        <a href="/"><x-application-logo class="w-56" /></a>
    </div>

    {{-- Heading --}}
    <div class="pb-7">
        <h2 class="text-3xl font-semibold text-primary-200">Login</h2>
        <p class="pt-2 text-xs tracking-wider text-grey-200 font-extralight">Silahkan login menggunakan akun anda</p>
    </div>

    {{-- Form --}}
    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Username --}}
        <div class="flex flex-col gap-2 mb-4">
          <div class="relative h-11">
            <x-input-auth type="text" id="username" name="username" value="{{ old('username') }}" />
            <x-label-auth for="username">Username</x-label-auth>
          </div>
          <x-input-error :messages="$errors->get('username')" class="mb-3"></x-input-error>
        </div>
        
        {{-- Password --}}
        <div class="flex flex-col gap-2 mb-4" x-data="{ show: false, val: '' }">
          <div class="relative h-11">
            <x-input-auth x-show="!show" type="password" id="password" name="password" x-model="val" />
            <x-input-auth x-show="show" type="text" id="password" name="password" x-model="val" value="{{ old('password') }}" />
            <x-label-auth for="password">Password</x-label-auth> 

            <button type="button" @click="show = !show">
              <x-bi-eye-fill x-show="show" class="absolute block w-6 h-6 top-3 right-4 text-primary-base hover:cursor-pointer"/>
              <x-bi-eye-slash-fill x-show="!show" class="absolute block w-6 h-6 top-3 right-4 text-primary-base hover:cursor-pointer"/>
            </button>
          </div>
          <x-input-error :messages="$errors->get('password')" class="mb-3"></x-input-error>
        </div>

        {{-- Remember Me --}}
        <div class="inline-flex items-center">
          <input
            type="checkbox"
            class="rounded-md focus:ring-0 focus:ring-transparent"
            id="remember"
            name="remember"
          />
          <label for="remember" class="pl-2 text-sm font-light tracking-wide text-primary-base">Ingat Saya?</label>
        </div>

        <button
          class="block w-full px-6 py-3 mt-6 text-xs tracking-wider text-center text-white align-middle bg-blue-500 rounded-lg "
          type="submit"
        >
          Login
        </button>

        <p class="block mt-6 text-sm antialiased font-normal leading-relaxed text-center text-gray-500">
          Belum punya akun? 
          <a class="underline transition-colors text-primary-base hover:text-primary-200"
            href="/register">
            Buat akun
          </a>
        </p>
    </form>
</x-guest-layout>
