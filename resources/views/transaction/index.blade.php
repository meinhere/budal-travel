<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <x-slot:background>{{ $background }}</x-slot:background>

  <div class="flex flex-wrap justify-center max-w-6xl gap-4 pt-4 mx-2 md:pt-20 md:flex-nowrap md:mx-auto">
    <div class="max-w-sm bg-white shadow rounded-xl">
      <div class="relative w-full h-20 overflow-hidden rounded-t-xl">
        <img class="relative -translate-y-1/3" src="{{ url($card_background) }}" alt="Card Background" />
      </div>
      
      <div class="px-5 py-6">
          {{-- Kota dan Bus --}}
          <div class="py-2">
            <h3 class="text-xl text-secondary-base">Semarang, Jawa Tengah</h3>
            <p class="pt-1 text-sm text-gray-500">Jetbus 5 by Adiputro Malang</p>
          </div>
          
          {{-- Detail Wisata --}}
          <div class="py-2">
            <p class="text-sm">Wisata : Museum Lawang Sewu, Oleh-Oleh Khas Semarang, Masjid Agung Jawa Tengah</p>
          </div>
          
          {{-- Status Pembayaran --}}
          <div class="flex gap-4 py-2">
            <h3 class="inline-block text-lg text-secondary-base">Status Pembayaran:</h3>
            <div class="flex items-center gap-1">
              {{-- <x-bi-circle-fill class="w-3 h-3 text-green-400" /> --}}
              <span>Lunas</span>
            </div>
          </div>

          {{-- Total & Detail --}}
          <div class="flex items-center justify-between gap-4 py-2">
            <div class="flex gap-2">
              <span class="text-sm">Total</span>
              <h3 class="text-3xl text-primary-300">Rp 700.000</h3>
            </div>
            <a href="/transaction/1" class="px-6 py-3 text-sm text-white uppercase rounded-lg bg-primary-200 font-extralight">Details</a>
          </div>
      </div>
    </div>
    <div class="max-w-sm bg-white shadow rounded-xl">
      <div class="relative w-full h-20 overflow-hidden rounded-t-xl">
        <img class="relative -translate-y-1/3" src="{{ url($card_background) }}" alt="Card Background" />
      </div>
      
      <div class="px-5 py-6">
          {{-- Kota dan Bus --}}
          <div class="py-2">
            <h3 class="text-xl text-secondary-base">Semarang, Jawa Tengah</h3>
            <p class="pt-2 text-sm text-gray-500">Jetbus 5 by Adiputro Malang</p>
          </div>
          
          {{-- Detail Wisata --}}
          <div class="py-2">
            <p class="text-sm">Wisata : Museum Lawang Sewu, Oleh-Oleh Khas Semarang, Masjid Agung Jawa Tengah</p>
          </div>
          
          {{-- Status Pembayaran --}}
          <div class="flex gap-4 py-2">
            <h3 class="inline-block text-lg text-secondary-base">Status Pembayaran:</h3>
            <div class="flex items-center gap-1">
              {{-- <x-bi-circle-fill class="w-3 h-3 text-green-400" /> --}}
              <span>Lunas</span>
            </div>
          </div>

          {{-- Total & Detail --}}
          <div class="flex items-center justify-between gap-4 py-2">
            <div class="flex gap-2">
              <span class="text-sm">Total</span>
              <h3 class="text-3xl text-primary-300">Rp 700.000</h3>
            </div>
            <a href="/transaction/1" class="px-6 py-3 text-sm text-white uppercase rounded-lg bg-primary-200 font-extralight">Details</a>
          </div>
      </div>
    </div>
    <div class="max-w-sm bg-white shadow rounded-xl">
      <div class="relative w-full h-20 overflow-hidden rounded-t-xl">
        <img class="relative -translate-y-1/3" src="{{ url($card_background) }}" alt="Card Background" />
      </div>
      
      <div class="px-5 py-6">
          {{-- Kota dan Bus --}}
          <div class="py-2">
            <h3 class="text-xl text-secondary-base">Semarang, Jawa Tengah</h3>
            <p class="pt-2 text-sm text-gray-500">Jetbus 5 by Adiputro Malang</p>
          </div>
          
          {{-- Detail Wisata --}}
          <div class="py-2">
            <p class="text-sm">Wisata : Museum Lawang Sewu, Oleh-Oleh Khas Semarang, Masjid Agung Jawa Tengah</p>
          </div>
          
          {{-- Status Pembayaran --}}
          <div class="flex gap-4 py-2">
            <h3 class="inline-block text-lg text-secondary-base">Status Pembayaran:</h3>
            <div class="flex items-center gap-1">
              {{-- <x-bi-circle-fill class="w-3 h-3 text-green-400" /> --}}
              <span>Lunas</span>
            </div>
          </div>

          {{-- Total & Detail --}}
          <div class="flex items-center justify-between gap-4 py-2">
            <div class="flex gap-2">
              <span class="text-sm">Total</span>
              <h3 class="text-3xl text-primary-300">Rp 700.000</h3>
            </div>
            <a href="/transaction/1" class="px-6 py-3 text-sm text-white uppercase rounded-lg bg-primary-200 font-extralight">Details</a>
          </div>
      </div>
    </div>
  </div>
</x-layout>
