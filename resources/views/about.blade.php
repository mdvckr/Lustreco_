{{-- resources/views/about.blade.php --}}
@extends('layouts.app')

@section('navbar_style', 'sticky')

@section('title', 'Tentang lustreco | lustreco®')

@section('content')
{{-- Hero Section --}}
<section class="relative bg-black text-white py-16 md:py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-white rounded-full blur-3xl"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h1 class="text-5xl md:text-7xl font-black tracking-tight">lustreco</h1>
        <p class="text-sm md:text-base text-gray-400 uppercase tracking-[0.3em] mt-3">Streetwear • Yogyakarta</p>
        <div class="w-16 h-1 bg-white mx-auto mt-6"></div>
    </div>
</section>

{{-- Content --}}
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    {{-- Deskripsi Brand --}}
    <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-sm border border-gray-100 p-8 md:p-10 mb-12">
        <p class="text-gray-700 leading-relaxed text-base md:text-lg">
            <strong class="text-black">LUSTRECO</strong> adalah merek ritel gaya hidup asal Indonesia yang didirikan pada tahun 2024.
            Label ini menciptakan pakaian dan aksesori streetwear orisinal bernuansa jiwa muda yang terinspirasi
            dari budaya jalanan perkotaan, estetika bold, dan narasi grafis yang provokatif.
        </p>
        <p class="text-gray-700 leading-relaxed text-base md:text-lg mt-4">
            Dikenal dengan desain oversized yang berani serta filosofi pengerjaan <em class="text-black font-medium">"Crafted in silence"</em>,
            LUSTRECO hadir sebagai simbol rasa percaya diri dan ekspresi diri tanpa kompromi.
            Merek ini beroperasi secara daring melalui situs web dan berbagai platform e-commerce besar,
            serta berkantor pusat di Yogyakarta, Indonesia.
        </p>
    </div>

    {{-- Visi & Misi --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto mb-12">
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-3xl border border-gray-100 p-8 text-center hover:shadow-xl transition shadow-sm group">
            <div class="w-16 h-16 bg-black rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition">
                <i class="fa-regular fa-eye text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-3">Visi</h3>
            <p class="text-sm text-gray-600 leading-relaxed">
                Menjadi ikon streetwear lokal yang diakui global, dengan tetap memegang erat nilai-nilai budaya dan kreativitas anak muda Indonesia.
            </p>
        </div>
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-3xl border border-gray-100 p-8 text-center hover:shadow-xl transition shadow-sm group">
            <div class="w-16 h-16 bg-black rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition">
                <i class="fa-regular fa-flag text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-3">Misi</h3>
            <p class="text-sm text-gray-600 leading-relaxed">
                Memberikan ruang ekspresi melalui desain yang berani, berkualitas, dan relevan dengan semangat generasi muda urban.
            </p>
        </div>
    </div>

    {{-- Payment & Shipment --}}
    <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-sm border border-gray-100 p-8 md:p-10">
        <div class="text-center mb-8">
            <h4 class="text-xs font-bold uppercase tracking-widest text-gray-400">Metode Pembayaran</h4>
            <div class="flex flex-wrap items-center justify-center gap-5 mt-4 opacity-80 hover:opacity-100 transition">
                <img src="https://tse1.mm.bing.net/th/id/OIP.SJk3_1NbGUAvZ-bJslHM4wHaC0?r=0&pid=Api&P=0&h=180" alt="QRIS" class="h-7 object-contain grayscale hover:grayscale-0 transition">
                <img src="https://tse1.mm.bing.net/th/id/OIP.BgWRZO7z2VuHDvJVh4q-0gHaCT?r=0&pid=Api&P=0&h=180" alt="OVO" class="h-6 object-contain grayscale hover:grayscale-0 transition">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/ad/Bank_Mandiri_logo_2016.svg" alt="Mandiri" class="h-6 object-contain grayscale hover:grayscale-0 transition">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/68/BANK_BRI_logo.svg" alt="BRI" class="h-6 object-contain grayscale hover:grayscale-0 transition">
                <img src="https://tse1.mm.bing.net/th/id/OIP.7ac-BBuYSK0mgmanTkM5hwHaCJ?r=0&pid=Api&P=0&h=180" alt="BNI" class="h-5 object-contain grayscale hover:grayscale-0 transition">
                <img src="https://tse2.mm.bing.net/th/id/OIP.nisHwf4UfdBIJWh6EcVA6gHaB2?r=0&pid=Api&P=0&h=180" alt="Permata Bank" class="h-6 object-contain grayscale hover:grayscale-0 transition">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a0/Bank_Syariah_Indonesia.svg" alt="BSI" class="h-6 object-contain grayscale hover:grayscale-0 transition">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/ac/CIMB_Niaga_logo.svg" alt="CIMB Niaga" class="h-6 object-contain grayscale hover:grayscale-0 transition">
                <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" alt="Mastercard" class="h-7 object-contain grayscale hover:grayscale-0 transition">
            </div>
        </div>

        <div class="text-center pt-6 border-t border-gray-100">
            <h4 class="text-xs font-bold uppercase tracking-widest text-gray-400">Metode Pengiriman</h4>
            <div class="flex justify-center items-center mt-4 opacity-80 hover:opacity-100 transition">
                <img src="https://tse4.mm.bing.net/th/id/OIP.2j4gL2L4bv2w5hByr8syMgHaC-?r=0&pid=Api&P=0&h=180" alt="JNE Express" class="h-8 object-contain grayscale hover:grayscale-0 transition">
            </div>
        </div>
    </div>

</div>
@endsection