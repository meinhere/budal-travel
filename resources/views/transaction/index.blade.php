<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <x-slot:background>{{ $background }}</x-slot:background>

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

  <div class="flex flex-col justify-center max-w-6xl gap-4 pt-4 mx-2 md:pt-20">
    @if ($reservasi->isEmpty())
    <div class="flex flex-wrap justify-center w-full gap-4 p-5 rounded-lg lg:w-3/4 lg:flex-nowrap lg:mx-auto bg-primary-base">
      <h3 class="text-xl text-secondary-base">Belum ada Riwayat Transaksi yang dilakukan</h3>
    </div>
    @else
      <div class="flex flex-wrap justify-center w-full gap-4 lg:flex-nowrap lg:mx-auto">
        @foreach ($reservasi as $r)
        <div class="max-w-sm bg-white shadow rounded-xl">
          <div class="relative w-full h-20 overflow-hidden rounded-t-xl">
            <img class="relative -translate-y-1/3" src="{{ url($card_background) }}" alt="Card Background" />
          </div>
          
          <div class="flex flex-col justify-between px-5 py-4 h-80">
              {{-- Kota dan Bus --}}
              <div class="py-2">
                <h3 class="text-xl text-secondary-base">{{ $r->kota->nama_kota }}, {{ $r->kota->provinsi->nama_provinsi }}</h3>
                <p class="pt-1 text-sm text-gray-500">{{ $r->bus->nama_bus }}</p>
              </div>
              
              {{-- Detail Wisata --}}
              <div class="py-2">
                <p class="text-sm">Wisata : 
                  @foreach ($r->reservasi_detail as $rd)
                    @if ($loop->iteration <= 5)
                      {{ $rd->wisata->nama_wisata }}{{ $loop->last || $loop->iteration == 5 ? '' : ', ' }}    
                    @endif
                  @endforeach
                </p>
              </div>
              
              {{-- Status Pembayaran --}}
              <div class="flex gap-4 py-2">
                <h3 class="inline-block text-lg text-secondary-base">Status Pembayaran:</h3>
                <div class="flex items-center gap-1">
                  @if ($r->status_reservasi->kode_status == 1)
                    @svg('bi-circle-fill', 'w-3 h-3 text-green-500')
                  @elseif ($r->status_reservasi->kode_status == 2)
                    @svg('bi-circle-fill', 'w-3 h-3 text-rose-500')
                  @else
                    @svg('bi-circle-fill', 'w-3 h-3 text-yellow-500')
                  @endif
                  <span>{{ $r->status_reservasi->deskripsi }}</span>
                </div>
              </div>

              {{-- Total & Detail --}}
              @php $total = $r->bus->harga_sewa @endphp
              @foreach ($r->reservasi_detail as $rd)
                  @php $total += $rd->wisata->tarif_parkir + ($r->tarif_masuk == 'ya') ?  $rd->wisata->tarif_masuk_wisata * $r->jumlah_penumpang : 0 @endphp
              @endforeach
              @php
                  $total += $r->harga_makan * $r->jumlah_makan * $r->jumlah_penumpang
              @endphp

              <div class="flex items-center justify-between gap-4 py-2">
                <div class="flex gap-2">
                  <span class="text-sm">Total</span>
                  <h3 class="text-2xl text-primary-300">Rp {{ number_format($total, 0, ',', '.') }}</h3>
                </div>
                <a href="{{ route('riwayat.show', $r->kode_reservasi) }}" class="px-6 py-3 text-sm text-white uppercase rounded-lg bg-primary-200 font-extralight">Details</a>
              </div>
          </div>
        </div>
        @endforeach 
      </div>

      <div>
        {{ $reservasi->links() }}
      </div>
    @endif
  </div>
</x-layout>
