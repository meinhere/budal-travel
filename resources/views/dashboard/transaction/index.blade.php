<x-app-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  <div class="min-h-screen pb-12 mx-auto pt-28 lg:pt-12">
      {{-- Content Heading --}}
      <div class="px-4 overflow-hidden shadow-sm sm:px-12 sm:rounded-lg">
          <h2 class="text-3xl font-semibold text-black">Budal Travel Dashboard</h2>
          <p class="pt-2 text-gray-400 font-xs">Manage your bus travel agency operations efficiently with Budal Travel's comprehensive admin dashboard</p>
      </div>

      {{-- Card --}}
      <div class="flex flex-wrap items-center justify-center gap-6 px-6 mb-4 sm:px-12 lg:flex-nowrap mt-14 lg:mt-20">
        <x-card-dashboard-transaction :value="$pendapatan['total']" :profit="true" :presentage="45" :from="4.6">Total Pendapatan</x-card-dashboard-transaction>
        <x-card-dashboard-transaction :value="$pendapatan['success']" :profit="true" :presentage="45" :from="4.6">Sudah Dibayar</x-card-dashboard-transaction>
        <x-card-dashboard-transaction :value="$pendapatan['pending']" :profit="false" :presentage="17" :from="4.6">Belum Dibayar</x-card-dashboard-transaction>
      </div>

      {{-- Detail Transaksi --}}
      <div class="px-4 mt-12 sm:px-6">
        <h2 class="text-lg text-gray-500">Transaksi Terbaru</h2>
        <div class="flex gap-2 mt-4 text-sm">
          <x-nav-link-transaction href="{{ route('dashboard.transaction') }}" :active="request()->is('dashboard/transaction')">All</x-nav-link-transaction>
          <x-nav-link-transaction href="/dashboard/transaction/success" :active="request()->is('dashboard/transaction/success')">Sudah Dibayar</x-nav-link-transaction>
          <x-nav-link-transaction href="/dashboard/transaction/pending" :active="request()->is('dashboard/transaction/pending')">Belum Dibayar</x-nav-link-transaction>
        </div>

        <table class="w-full mx-auto mt-8 text-sm table-auto md:w-3/4 lg:w-2/3">
          <thead>
            <tr>
              <th class="text-left">Pelanggan</th>
              <th>Wilayah Tujuan</th>
              <th>Tanggal</th>
              <th>Metode Pembayaran</th>
              <th class="text-right">Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($reservasi as $r)

            {{-- Total & Detail --}}
            @php $total = $r->bus->harga_sewa @endphp
            @foreach ($r->reservasi_detail as $rd)
                @php $total += $rd->wisata->tarif_parkir + ($r->tarif_masuk == 'ya') ?  $rd->wisata->tarif_masuk_wisata * $r->jumlah_penumpang : 0 @endphp
            @endforeach
            @php
                $total += $r->harga_makan * $r->jumlah_makan * $r->jumlah_penumpang
            @endphp

            <tr>
              <td class="py-4 font-semibold">{{ $r->login->pelanggan->nama_pelanggan }}</td>
              <td class="py-4 text-center">{{ $r->kota->nama_kota }}</td>
                <td class="py-4 text-center">{{ \Carbon\Carbon::parse($r->waktu_reservasi)->format('d M, Y') }}</td>
              <td class="py-4 text-center">{{ $r->metode_bayar }}</td>
              <td class="py-4 font-semibold text-right">Rp {{ number_format($total, 0, ',', '.') }}</td>
            </tr>
            @endforeach
          </tbody>
          </table>

          <div class="w-full mx-auto mt-8 text-sm md:w-3/4 lg:w-2/3">
            {{ $reservasi->links() }}
          </div>
      </div>
  </div>
</x-app-layout>
