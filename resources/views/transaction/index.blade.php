<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <x-slot:background>{{ $background }}</x-slot:background>

  <div class="flex flex-col justify-center max-w-6xl gap-4 pt-4 mx-2 md:pt-20">
    @if ($reservasi->isEmpty())
      @svg('bi-emoji-frown', ['class' => 'w-24 h-24 text-primary-200'])
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
              @php $total = 0 @endphp
              @foreach ($r->reservasi_detail as $rd)
                  @php $total += $rd->wisata->tarif_masuk_wisata + ($r->tarif_masuk == 'ya') ? $rd->wisata->tarif_parkir : 0 @endphp
              @endforeach
              @php
                  $total += $r->bus->harga_sewa + ($r->harga_makan * $r->jumlah_makan * $r->jumlah_penumpang)
              @endphp

              <div class="flex items-center justify-between gap-4 py-2">
                <div class="flex gap-2">
                  <span class="text-sm">Total</span>
                  <h3 class="text-2xl text-primary-300">Rp {{ number_format($total, 0, ',', '.')}}</h3>
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
