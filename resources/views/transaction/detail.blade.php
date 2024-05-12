<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <x-slot:background>{{ $background }}</x-slot:background>
  
  <div class="max-w-6xl gap-4 pt-8 mx-2 md:pt-14 md:mx-auto">
    <div class="max-w-xl px-4 py-4 mx-2 bg-white shadow md:mx-auto rounded-xl">
      {{-- Kota dan Bus --}}
      <div class="relative py-2" x-data="{ link: '/transaction' }">
        <h3 class="text-2xl text-secondary-base">Semarang, Jawa Tengah</h3>
        <p class="pt-1 text-sm text-gray-500">Jetbus 5 by Adiputro Malang</p>
        
        <button @click="window.location = link" class="absolute right-1 top-2">
          <x-bi-x-lg class="w-6 h-6" />
        </button>
      </div>

      {{-- Detail Wisata --}}
      <div class="flex flex-wrap py-2 sm:gap-8">
        <div>
          <p>Wisata:</p>
          <ul class="pl-8 list-disc">
            <li>Museum Lawang Sewu</li>
            <li>Oleh-Oleh Khas Semarang</li>
            <li>Masjid Agung Jawa Tengah</li>
          </ul>
        </div>
        <div>
          <p>Include:</p>
          <ul class="pl-8 list-disc">
            <li>HTM</li>
            <li>Makan</li>
          </ul>
        </div>
      </div>
      
      {{-- Status Pembayaran --}}
      <div class="flex gap-4 py-2">
        <h3 class="inline-block text-secondary-base">Status Pembayaran:</h3>
        <div class="flex items-center gap-1">
          <x-bi-circle-fill class="w-3 h-3 text-green-400" />
          <span>Lunas</span>
        </div>
      </div>

      {{-- Total & Detail --}}
      <div class="flex items-center justify-between gap-4 py-2">
        <div class="flex gap-2">
          <span class="text-sm">Total</span>
          <h3 class="text-3xl text-primary-300">Rp 700.000</h3>
        </div>
      </div>
      
      {{-- Button --}}
      <div class="flex justify-center py-4">
        <a href="/transaction" class="px-6 py-3 text-sm text-white uppercase rounded-lg bg-primary-200 font-extralight">Kembali</a>
      </div>
    </div>
  </div>
  
</x-layout>
