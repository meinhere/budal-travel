<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:background>{{ $background }}</x-slot:background>

    <div class="max-w-4xl pt-5 mx-2 md:mx-auto">
        <h1 class="text-5xl font-bold leading-snug md:text-6xl text-primary-base md:leading-relaxed">Wujudkan liburan
            yang tak terlupakan bersama kami!</h1>
        <p class="mt-3 text-base md:text-xl text-primary-base">Pesan Bus Pariwisata untuk Jelajahi Destinasi Impian Anda!
        </p>

        <x-input-search :kota="$kota" link="/" />
    </div>
</x-layout>
