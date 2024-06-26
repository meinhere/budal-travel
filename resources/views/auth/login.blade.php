<x-guest-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:background>{{ $background }}</x-slot:background>
    <x-slot:background_caption>{{ $background_caption }}</x-slot:background_caption>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    
    {{-- Logo --}}
    <div class="flex justify-center pb-2">
      <a href="/"><x-application-logo class="w-56" /></a>
    </div>

    @if (session()->has('success'))
    <div id="alert-3" class="flex items-center justify-center p-4 mx-auto mb-4 text-green-800 bg-green-200 rounded-lg dark:bg-gray-800 dark:text-green-400" role="alert">
        @svg('bi-info-circle', 'w-6 h-6 text-green-500')
        <span class="sr-only">Info</span>
        <div class="text-sm font-medium ms-3">
            {{ session('success') }}
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
            <span class="sr-only">Close</span>
            @svg('bi-x-lg', 'w-6 h-6')
        </button>
    </div>
    @endif

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
            <x-input-auth x-show="show" type="text" id="password" name="password" x-model="val" />
            <x-label-auth for="password">Password</x-label-auth> 

            <button type="button" @click="show = !show">
              @svg('bi-eye-fill', ['class' => 'absolute block w-6 h-6 top-3 right-4 text-primary-base hover:cursor-pointer', 'x-show' => 'show'])
              @svg('bi-eye-slash-fill', ['class' => 'absolute block w-6 h-6 top-3 right-4 text-primary-base hover:cursor-pointer', 'x-show' => '!show'])
            </button>
          </div>
          <x-input-error :messages="$errors->get('password')" class="mb-3"></x-input-error>
        </div>

        {{-- Remember Me --}}
        <div class="flex items-center gap-2">
          <input
            type="checkbox"
            class="rounded-md focus:ring-0 focus:ring-transparent"
            id="remember"
            name="remember"
          />
          <label for="remember" class="text-sm font-light tracking-wide text-primary-base">Ingat Saya?</label>
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
