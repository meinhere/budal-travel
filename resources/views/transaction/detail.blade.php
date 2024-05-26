<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <x-slot:background>{{ $background }}</x-slot:background>
  
  <div class="max-w-6xl gap-4 pt-8 mx-2md:pt-14 md:mx-auto">
    
    @if (session()->has('success'))
    <div id="alert-3" class="flex items-center justify-center max-w-xl p-4 mx-auto mb-4 text-green-800 bg-green-200 rounded-lg dark:bg-gray-800 dark:text-green-400" role="alert">
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

    <div class="max-w-xl px-4 py-4 mx-2 bg-white shadow md:mx-auto rounded-xl">
      {{-- Kota dan Bus --}}
      <div class="relative py-2" x-data="{ link: '/transaction' }">
        <h3 class="text-2xl text-secondary-base">{{ $reservasi->kota->nama_kota }}, {{ $reservasi->kota->provinsi->nama_provinsi }}</h3>
        <p class="pt-1 text-sm text-gray-500">{{ $reservasi->bus->nama_bus }}</p>
        
        <button @click="window.location = link" class="absolute right-1 top-2">
          @svg('bi-x-lg', 'w-6 h-6')
        </button>
      </div>

      {{-- Detail Wisata --}}
      <div class="flex flex-wrap gap-2 py-2 md:flex-nowrap">
        <div class="basis-full md:basis-4/6">
          <p>Wisata:</p>
          <ul class="pl-8 list-disc">
            @foreach ($reservasi_detail as $rd)
              <li>{{ $rd->wisata->nama_wisata }}</li>
            @endforeach
          </ul>
        </div>
        <div class="basis-full md:basis-2/6">
          <p>Include:</p>
          <ul class="pl-8 list-disc">
            @if ($reservasi->tarif_masuk == 'ya')
              <li>Tiket Masuk</li>
              <li>Parkir</li>
            @endif
            @if ($reservasi->jumlah_makan > 0)
              <li>Makan</li>
            @endif
          </ul>
        </div>
      </div>
      
      {{-- Status Pembayaran --}}
      <div class="flex gap-4 py-2">
        <h3 class="inline-block text-secondary-base">Status Pembayaran:</h3>
        <div class="flex items-center gap-1">
          @if ($reservasi->status_reservasi->kode_status == 1)
            @svg('bi-circle-fill', 'w-3 h-3 text-green-500')
          @elseif ($reservasi->status_reservasi->kode_status == 2)
            @svg('bi-circle-fill', 'w-3 h-3 text-rose-500')
          @else
            @svg('bi-circle-fill', 'w-3 h-3 text-yellow-500')
          @endif
          <span>{{ $reservasi->status_reservasi->deskripsi }}</span>
        </div>
      </div>

      {{-- Total & Detail --}}
      @php $total = 0 @endphp
      @foreach ($reservasi_detail as $rd)
          @php $total += $rd->wisata->tarif_masuk_wisata + ($reservasi->tarif_masuk == 'ya') ? $rd->wisata->tarif_parkir : 0 @endphp
      @endforeach
      @php
          $total += $reservasi->bus->harga_sewa + ($reservasi->harga_makan * $reservasi->jumlah_makan * $reservasi->jumlah_penumpang)
      @endphp

      <div class="flex items-center justify-between gap-4 py-2">
        <div class="flex gap-2">
          <span class="text-sm">Total</span>
          <h3 class="text-3xl text-primary-300">Rp {{ number_format($total, 0, ',', '.')}}</h3>
        </div>
      </div>
      
      {{-- Button --}}
      <div class="flex justify-center gap-3 py-4">
        <!-- Modal toggle -->
        <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="block py-3 text-sm font-medium text-center text-white uppercase bg-blue-500 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 px-7" type="button">
          Berikan Ulasan
        </button>
        
        <a href="/transaction" class="px-6 py-3 text-sm font-medium text-white uppercase rounded-lg bg-primary-200">Kembali</a>
      </div>
    </div>
  </div>

  <!-- Main modal -->
  <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-center p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                <h3 class="flex text-xl font-semibold text-gray-900 dark:text-white">
                    Berikan Ulasan
                    📝
                </h3>
            </div>
            <form action="{{ route('feedback.store') }}" method="post" x-data="{ btnActive: '' }">
              @csrf
              <!-- Modal body -->
              <div class="p-4 space-y-4 md:p-5">
                  {{-- Reservasi Kode --}}
                  <input type="hidden" name="reservasi_kode" value="{{ $reservasi->kode_reservasi }}">

                  {{-- Ekspresi --}}
                  <div x-data="{ emoji: 1, active: false }">
                    <h4 class="text-lg font-semibold leading-relaxed">Pilih Ekspresi Anda</h4>
                    <div class="flex justify-center gap-6">
                      @svg('bi-emoji-smile', ['class' => 'w-8 h-8 hover:cursor-pointer', '@click' => 'emoji = 1', ':class' => 'emoji == 1 ? "text-blue-500" : "text-primary-300"'])
                      @svg('bi-emoji-frown', ['class' => 'w-8 h-8 hover:cursor-pointer', '@click' => 'emoji = 2', ':class' => 'emoji == 2 ? "text-blue-500" : "text-primary-300"'])
                      @svg('bi-emoji-neutral', ['class' => 'w-8 h-8 hover:cursor-pointer', '@click' => 'emoji = 3', ':class' => 'emoji == 3 ? "text-blue-500" : "text-primary-300"'])

                      <input type="hidden" name="kategori_kode" :value="emoji">
                    </div>
                  </div>

                  {{-- Komentar --}}
                  <div>
                    <h4 class="text-lg font-semibold leading-relaxed">Berikan Ulasan</h4>
                    <textarea x-model="btnActive" class="w-full p-2 border border-gray-200 rounded-lg focus:border-transparent focus:outline-none focus:ring-2 focus:ring-primary-300" name="ulasan" id="ulasan" cols="30" rows="5" placeholder="Jika anda memiliki masukan tambahan, silahkan ketik disini..."></textarea>
                  </div>
              </div>
              <!-- Modal footer -->
              <div class="flex items-center justify-center gap-4 p-4 rounded-b border-gray cursor-default-200 md:p-5">
                  <button data-modal-hide="default-modal" type="button" class="py-2.5 px-12 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-black hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">Back to Homepage</button>
                  <button :type="btnActive ? 'submit' : 'button'" :class="btnActive ? 'bg-blue-700 hover:bg-blue-800' : 'bg-gray-400 cursor-default'" class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-12 py-2.5 text-center">Submit Feedback</button>
              </div>
            </form>
        </div>
    </div>
</div>
  
</x-layout>
