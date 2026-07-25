{{-- resources/views/store.blade.php --}}
@extends('layouts.app')

@section('navbar_style', 'sticky')

@section('title', 'Store | lustreco®')

@section('content')

{{-- Hero Section --}}
<section class="relative bg-black text-white py-16 md:py-24 overflow-hidden">
    {{-- Background Glow --}}
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-0 right-0 w-64 h-64 bg-white rounded-full blur-3xl animate-pulse delay-1000"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <div class="inline-block p-4 bg-white/10 backdrop-blur-sm rounded-2xl mb-6 hover:scale-105 transition-transform duration-300">
            <i class="fa-solid fa-store text-5xl md:text-6xl text-white"></i>
        </div>
        <h1 class="text-4xl md:text-6xl font-black tracking-tight animate-fade-in-up">Our Store</h1>
        <p class="text-sm md:text-base text-gray-400 uppercase tracking-[0.3em] mt-3 animate-fade-in-up animation-delay-200">Visit our physical studio in Yogyakarta</p>
        <div class="w-16 h-1 bg-white mx-auto mt-6 rounded-full"></div>
    </div>
</section>

{{-- Content --}}
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    {{-- Alamat & Peta --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-5xl mx-auto mb-12">
        {{-- Info Alamat --}}
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 md:p-10 flex flex-col justify-center hover:shadow-2xl transition-shadow duration-300 group">
            {{-- Location --}}
            <div class="flex items-start gap-4 mb-6 hover:bg-gray-50/50 p-3 rounded-2xl transition-colors duration-200 -mx-3">
                <div class="w-12 h-12 bg-black rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                    <i class="fa-solid fa-location-dot text-white text-xl"></i>
                </div>
                <div>
                    <h3 class="text-sm font-bold uppercase tracking-widest text-gray-400 mb-1">Alamat Studio</h3>
                    <p class="text-gray-700 leading-relaxed">
                        Gg. Karti Praptono Jl. Tegalsari Raya No.D22,<br>
                        Karang Moko, Sariharjo, Kec. Ngaglik,<br>
                        Kabupaten Sleman, Daerah Istimewa Yogyakarta 55581
                    </p>
                    <a href="https://maps.google.com/maps?q=Jl.+Tegalsari+Raya+No.D22,+Sariharjo,+Ngaglik,+Sleman" 
                       target="_blank" 
                       class="inline-block mt-2 text-sm font-medium text-black hover:underline transition">
                        <i class="fa-solid fa-arrow-up-right-from-square mr-1"></i> Buka di Maps
                    </a>
                </div>
            </div>

            {{-- Hours --}}
            <div class="flex items-start gap-4 mb-6 hover:bg-gray-50/50 p-3 rounded-2xl transition-colors duration-200 -mx-3">
                <div class="w-12 h-12 bg-black rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                    <i class="fa-regular fa-clock text-white text-xl"></i>
                </div>
                <div>
                    <h3 class="text-sm font-bold uppercase tracking-widest text-gray-400 mb-1">Jam Operasional</h3>
                    <div class="space-y-1 text-sm text-gray-700">
                        <div class="flex justify-between hover:text-black transition-colors">
                            <span>Senin - Jumat</span>
                            <span class="font-medium">10.00 - 20.00</span>
                        </div>
                        <div class="flex justify-between hover:text-black transition-colors">
                            <span>Sabtu</span>
                            <span class="font-medium">10.00 - 18.00</span>
                        </div>
                        <div class="flex justify-between hover:text-black transition-colors">
                            <span>Minggu & Hari Libur</span>
                            <span class="font-medium text-red-500">Tutup</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Contact --}}
            <div class="flex items-start gap-4 hover:bg-gray-50/50 p-3 rounded-2xl transition-colors duration-200 -mx-3">
                <div class="w-12 h-12 bg-black rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                    <i class="fa-regular fa-envelope text-white text-xl"></i>
                </div>
                <div>
                    <h3 class="text-sm font-bold uppercase tracking-widest text-gray-400 mb-1">Kontak</h3>
                    <div class="space-y-1 text-sm">
                        <a href="mailto:hello@lustreco.com" class="text-gray-700 hover:text-black transition flex items-center gap-2">
                            <i class="fa-regular fa-envelope text-xs"></i> hello@lustreco.com
                        </a>
                        <a href="tel:+6281234567890" class="text-gray-700 hover:text-black transition flex items-center gap-2">
                            <i class="fa-solid fa-phone text-xs"></i> +62 812 3456 7890
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Google Maps --}}
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-2 overflow-hidden hover:shadow-2xl transition-shadow duration-300 group">
            <div class="relative overflow-hidden rounded-2xl">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.123456789!2d110.38480745944583!3d-7.714528873225591!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5a6b8b9c9b9f%3A0x123456789abcdef!2sJl.%20Tegalsari%20Raya%20No.D22%2C%20Karang%20Moko%2C%20Sariharjo%2C%20Kec.%20Ngaglik%2C%20Kabupaten%20Sleman%2C%20Daerah%20Istimewa%20Yogyakarta%2055581!5e0!3m2!1sen!2sid!4v1700000000000"
                    width="100%"
                    height="100%"
                    style="border:0; min-height: 350px;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    class="hover:scale-[1.02] transition-transform duration-500">
                </iframe>
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/5 transition-colors duration-300 pointer-events-none"></div>
            </div>
            <p class="text-xs text-gray-400 text-center mt-2">
                <i class="fa-regular fa-map mr-1"></i> Klik peta untuk memperbesar
            </p>
        </div>
    </div>

    {{-- Payment & Shipment --}}
    <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-sm border border-gray-100 p-8 md:p-10 hover:shadow-xl transition-shadow duration-300">
        <div class="text-center mb-8">
            <h4 class="text-xs font-bold uppercase tracking-widest text-gray-400">Metode Pembayaran</h4>
            <div class="flex flex-wrap items-center justify-center gap-5 mt-4">
                @php
                    $paymentLogos = [
                        ['src' => 'https://tse1.mm.bing.net/th/id/OIP.SJk3_1NbGUAvZ-bJslHM4wHaC0?r=0&pid=Api&P=0&h=180', 'alt' => 'QRIS', 'class' => 'h-7'],
                        ['src' => 'https://tse1.mm.bing.net/th/id/OIP.BgWRZO7z2VuHDvJVh4q-0gHaCT?r=0&pid=Api&P=0&h=180', 'alt' => 'OVO', 'class' => 'h-6'],
                        ['src' => 'https://upload.wikimedia.org/wikipedia/commons/a/ad/Bank_Mandiri_logo_2016.svg', 'alt' => 'Mandiri', 'class' => 'h-6'],
                        ['src' => 'https://upload.wikimedia.org/wikipedia/commons/6/68/BANK_BRI_logo.svg', 'alt' => 'BRI', 'class' => 'h-6'],
                        ['src' => 'https://tse1.mm.bing.net/th/id/OIP.7ac-BBuYSK0mgmanTkM5hwHaCJ?r=0&pid=Api&P=0&h=180', 'alt' => 'BNI', 'class' => 'h-5'],
                        ['src' => 'https://tse2.mm.bing.net/th/id/OIP.nisHwf4UfdBIJWh6EcVA6gHaB2?r=0&pid=Api&P=0&h=180', 'alt' => 'Permata Bank', 'class' => 'h-6'],
                        ['src' => 'https://upload.wikimedia.org/wikipedia/commons/a/a0/Bank_Syariah_Indonesia.svg', 'alt' => 'BSI', 'class' => 'h-6'],
                        ['src' => 'https://upload.wikimedia.org/wikipedia/commons/a/ac/CIMB_Niaga_logo.svg', 'alt' => 'CIMB Niaga', 'class' => 'h-6'],
                        ['src' => 'https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg', 'alt' => 'Mastercard', 'class' => 'h-7'],
                    ];
                @endphp
                @foreach($paymentLogos as $logo)
                    <img src="{{ $logo['src'] }}" alt="{{ $logo['alt'] }}" 
                         class="{{ $logo['class'] }} object-contain grayscale hover:grayscale-0 transition-all duration-300 hover:scale-110 hover:drop-shadow-lg cursor-pointer">
                @endforeach
            </div>
        </div>

        <div class="text-center pt-6 border-t border-gray-100">
            <h4 class="text-xs font-bold uppercase tracking-widest text-gray-400">Metode Pengiriman</h4>
            <div class="flex justify-center items-center mt-4">
                <img src="https://tse4.mm.bing.net/th/id/OIP.2j4gL2L4bv2w5hByr8syMgHaC-?r=0&pid=Api&P=0&h=180" alt="JNE Express" 
                     class="h-8 object-contain grayscale hover:grayscale-0 transition-all duration-300 hover:scale-110 hover:drop-shadow-lg cursor-pointer">
            </div>
        </div>
    </div>

</div>

{{-- Custom Animation CSS --}}
<style>
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
    }
    .animation-delay-200 {
        animation-delay: 0.2s;
        opacity: 0;
    }
    .delay-1000 {
        animation-delay: 1s;
    }
</style>

@endsection