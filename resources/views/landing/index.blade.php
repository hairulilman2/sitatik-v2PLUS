<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SITATIK+</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        html {
            scroll-behavior: smooth;
        }

        section {
            scroll-margin-top: 100px;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .hero-gradient {
            background: radial-gradient(
                circle at top right,
                #1e293b 0%,
                #0f172a 100%
            );
        }

        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.65);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            z-index: 100;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .modal-overlay.active {
            display: flex;
        }

        .modal-box {
            animation: modalIn 0.25s ease-out;
        }

        @keyframes modalIn {
            from {
                opacity: 0;
                transform: translateY(16px) scale(0.98);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .modal-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>


<body class="bg-slate-50 text-slate-700 font-sans leading-relaxed">

    <header class="bg-white/80 backdrop-blur-md border-b border-slate-100 sticky top-0 z-50">

        <div class="max-w-7xl mx-auto px-6 py-3 flex items-center relative">

            {{-- Logo --}}
            <div class="flex items-center gap-4 z-10">

                <img src="/logo.png" class="h-10" alt="Logo SITATIK+">

                <div class="hidden sm:block border-l border-slate-200 pl-4">

                    <span class="font-bold text-slate-800 text-xl tracking-tight leading-none">
                        SITATIK<span class="text-blue-600">+</span>
                    </span>

                    <p class="text-[8px] uppercase text-slate-500 tracking-[0.2em] font-bold mt-0.5">
                        Sistem Informasi Data Statistik
                    </p>

                </div>

             </div>

            <nav class="hidden md:flex items-center gap-2 ml-auto mr-4">
                <a href="#beranda"
                    class="nav-link px-6 py-2 rounded-full text-sm font-medium transition hover:text-blue-600">Beranda</a>
                <a href="#tentang"
                    class="nav-link px-6 py-2 rounded-full text-sm font-medium transition hover:text-blue-600">Tentang</a>
                <a href="#statistik"
                    class="nav-link px-6 py-2 rounded-full text-sm font-medium transition hover:text-blue-600">Statistik</a>
                <a href="#layanan"
                    class="nav-link px-6 py-2 rounded-full text-sm font-medium transition hover:text-blue-600">layanan</a>
            </nav>

            <!-- Hapus ml-auto di div ini -->
            <div class="hidden md:flex items-center gap-2">
                <a href="/login"
                    class="bg-blue-600 text-white px-6 py-2.5 rounded-full text-sm font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-200 active:scale-95">
                    Masuk
                </a>
            </div>

        </div>

    </header>


    <section id="beranda"
        class="relative hero-gradient text-white pt-24 pb-32 overflow-hidden">

        <div
            class="absolute top-0 left-1/4 w-96 h-96 bg-blue-600/20 rounded-full blur-[120px]">
        </div>

        <div
            class="absolute bottom-0 right-1/4 w-96 h-96 bg-indigo-600/10 rounded-full blur-[120px]">
        </div>


        <div class="max-w-4xl mx-auto px-6 text-center relative z-10">

            <div
                class="inline-flex items-center gap-2 bg-white/10 border border-white/20 px-4 py-2 rounded-full text-xs font-medium mb-8 backdrop-blur-md">

                <span class="flex h-2 w-2 rounded-full bg-blue-400 animate-pulse"></span>

                Provinsi Sulawesi Tengah

            </div>


            <img
                src="/logo.png"
                class="mx-auto h-28 mb-8 drop-shadow-2xl"
                alt="SITATIK+">


            <h1 class="text-6xl font-black tracking-tighter mb-6">

                <span class="text-blue-500">
                    SITATIK
                </span>

                <span class="text-white">
                    +
                </span>

            </h1>


            <p class="text-slate-400 text-xl leading-relaxed max-w-2xl mx-auto">

                Sistem Informasi Data Statistik Provinsi Sulawesi Tengah

            </p>

        </div>

    </section>


    <section class="-mt-16 relative z-20">

        <div class="max-w-7xl mx-auto px-6">

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                @foreach (
                    [
                        [
                            'label' => 'Kategori',
                            'value' => $statistik['kategori'],
                            'icon' => '📁'
                        ],
                        [
                            'label' => 'Data',
                            'value' => $statistik['data'],
                            'icon' => '📈'
                        ],
                        [
                            'label' => 'Pengguna',
                            'value' => $statistik['pengguna'],
                            'icon' => '👤'
                        ],
                        [
                            'label' => 'Pengunjung',
                            'value' => $statistik['pengunjung'],
                            'icon' => '🌐'
                        ]
                    ] as $item
                )

                    <div
                        class="glass-card p-8 rounded-[2rem] border border-white shadow-xl flex flex-col items-center text-center group hover:-translate-y-2 transition-all duration-300">

                        <span
                            class="text-2xl mb-4 grayscale group-hover:grayscale-0 transition">
                            {{ $item['icon'] }}
                        </span>

                        <h3 class="text-4xl font-black text-slate-800 leading-none">
                            {{ $item['value'] }}
                        </h3>

                        <p
                            class="text-[10px] mt-3 text-slate-400 uppercase font-bold tracking-[0.15em]">

                            Total {{ $item['label'] }}

                        </p>

                    </div>

                @endforeach

            </div>

        </div>

    </section>

    <section class="py-32">

        <div class="max-w-7xl mx-auto px-6">

            <div
                class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">

                <div class="max-w-xl">

                    <h2
                        class="text-3xl font-black text-slate-800 mb-4 tracking-tight">

                        Sumber Data Statistik

                    </h2>

                    <p class="text-slate-500">

                        Data yang dikelola berasal dari berbagai instansi resmi
                        di lingkungan Pemerintah Provinsi Sulawesi Tengah.

                    </p>

                </div>

            </div>



@php

    $daftarDinas = [
        [
            'nama' => 'Dinas Pendidikan dan Kebudayaan Provinsi Sulawesi Tengah',
            'gambar' => 'image/dinas-pendidikan.jpg',
        ],
        [
            'nama' => 'Dinas Kesehatan Provinsi Sulawesi Tengah',
            'gambar' => 'image/dinas-kesehatan.jpg',
        ],
        [
            'nama' => 'Dinas Bina Marga dan Penataan Ruang Provinsi Sulawesi Tengah',
            'gambar' => 'image/dinas-bina-marga.jpg',
        ],
        [
            'nama' => 'Dinas Cipta Karya dan Sumber Daya Air Provinsi Sulawesi Tengah',
            'gambar' => 'image/dinas-cipta-karya.jpg',
        ],
    ];

@endphp

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                @foreach ($daftarDinas as $dinas)

                    <div
                        class="group p-8 bg-white rounded-3xl border border-slate-200/60 hover:border-blue-500/30 hover:shadow-2xl hover:shadow-blue-500/10 transition-all duration-500">

                        <div
                            class="w-16 h-16 bg-slate-50 text-blue-600 flex items-center justify-center rounded-2xl mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-500 shadow-inner">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-8 h-8">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />

                            </svg>

                        </div>


                        <p class="font-bold text-slate-800 leading-snug">

                            {{ $dinas }}

                        </p>


                        <div
                            class="mt-4 w-8 h-1 bg-slate-100 group-hover:w-full transition-all duration-500 rounded-full">
                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </section>


    <section
        id="tentang"
        class="py-24 bg-slate-900 text-white relative overflow-hidden">

        <div
            class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-20 items-center">


            <div class="relative">

                <div
                    class="absolute -top-10 -left-10 w-32 h-32 bg-blue-600/30 blur-3xl">
                </div>


                <h2 class="text-4xl font-black mb-6 tracking-tight">

                    Tentang SITATIK+

                </h2>


                <p class="text-slate-400 text-lg mb-12">

                    SITATIK+ dikembangkan oleh Dinas Komunikasi, Informatika,
                    Persandian dan Statistik sebagai pusat rujukan data yang andal.

                </p>


                <div class="space-y-6">

                    @foreach (
                        [
                            [
                                'title' => 'Lengkap',
                                'desc' => 'Menghimpun seluruh data statistik wilayah'
                            ],
                            [
                                'title' => 'Mudah',
                                'desc' => 'Akses cepat dengan antarmuka yang efisien'
                            ],
                            [
                                'title' => 'Dinamis',
                                'desc' => 'Update berkala sesuai pertumbuhan data'
                            ]
                        ] as $item
                    )

                        <div
                            class="flex items-start gap-5 p-4 rounded-2xl hover:bg-white/5 transition">

                            <div
                                class="flex-shrink-0 w-10 h-10 bg-blue-500/20 text-blue-400 flex items-center justify-center rounded-lg font-bold">

                                ✓

                            </div>


                            <div>

                                <h3 class="font-bold text-white text-lg">

                                    {{ $item['title'] }}

                                </h3>

                                <p class="text-slate-400 text-sm">

                                    {{ $item['desc'] }}

                                </p>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>



            <div
                class="hidden md:block bg-gradient-to-br from-blue-500 to-indigo-700 h-[500px] rounded-[3rem] p-1 shadow-2xl overflow-hidden rotate-3 hover:rotate-0 transition-transform duration-700">

                <div
                    class="w-full h-full bg-slate-900 rounded-[2.8rem] flex items-center justify-center p-12 overflow-hidden">

                    <span class="text-8xl opacity-20 font-black">

                        <span class="text-blue-500">
                            SITATIK
                        </span>

                        <span class="text-white">
                            +
                        </span>

                    </span>

                </div>

            </div>

        </div>

    </section>


    <section id="statistik" class="py-32">

        <div class="max-w-7xl mx-auto px-6">


            <div class="text-center mb-16">

                <h2
                    class="text-4xl font-black text-slate-800 mb-4 tracking-tight">

                    Kategori Data Statistik

                </h2>


                <h3 class="text-slate-500 text-lg">

                    Jelajahi berbagai kategori data yang tersedia di SITATIK+

                </h3>

            </div>



            {{-- KARTU KATEGORI --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($kategori as $item)

                    @php

                        /*
                        Mendukung 2 format data:

                        1. String:
                           'Perkebunan'

                        2. Array:
                           [
                               'nama' => 'Perkebunan',
                               'deskripsi' => 'Data luas dan produksi kebun',
                               'gambar' => 'image/perkebunan.jpg'
                           ]
                        */

                        $namaKategori = is_array($item)
                            ? ($item['nama'] ?? '')
                            : $item;

                        $deskripsiKategori = is_array($item)
                            ? ($item['deskripsi'] ?? '')
                            : '';

                        $gambarKategori = asset(
                            is_array($item)
                                ? ($item['gambar'] ?? 'image/default-kategori.jpg')
                                : 'image/default-kategori.jpg'
                        );

                    @endphp



                    <div
                        class="kategori-card group bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 cursor-pointer"

                        data-nama="{{ $namaKategori }}"
                        data-deskripsi="{{ $deskripsiKategori }}"
                        data-gambar="{{ $gambarKategori }}">


                        {{-- GAMBAR KARTU --}}
                        <div
                            class="relative w-full h-40 bg-slate-100 overflow-hidden">

                            <img
                                src="{{ $gambarKategori }}"
                                alt="{{ $namaKategori }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">


                            <span
                                class="absolute top-3 left-3 bg-blue-600 text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-full shadow-lg">

                                Tersedia

                            </span>

                        </div>



                        {{-- INFORMASI KARTU --}}
                        <div class="p-5">

                            <h3
                                class="font-bold text-slate-800 text-base leading-tight mb-1">

                                {{ $namaKategori }}

                            </h3>


                            @if (!empty($deskripsiKategori))

                                <p
                                    class="text-xs text-slate-400 leading-relaxed">

                                    {{ $deskripsiKategori }}

                                </p>

                            @endif



                            <div
                                class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between">

                                <span
                                    class="text-blue-600 font-bold text-sm group-hover:underline">

                                    Lihat Data

                                </span>


                                <div
                                    class="w-8 h-8 bg-slate-50 rounded-full flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white text-blue-600 transition flex-shrink-0">

                                    <span class="text-xl leading-none">
                                        ›
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

            </div>

        </div>

    </section>

    <div id="kategoriModal" class="modal-overlay">


        <div
    class="modal-box bg-white rounded-[2rem] shadow-2xl w-full max-w-4xl overflow-hidden">

    <div class="grid grid-cols-1 md:grid-cols-2 min-h-[450px]">

                <div
                    class="relative bg-slate-200 min-h-[300px] md:min-h-[450px] overflow-hidden">


                    {{-- Gambar --}}
                    <img
                        id="modalGambar"
                        src=""
                        alt="Gambar kategori"
                        class="absolute inset-0 w-full h-full object-cover">


                    {{-- Overlay --}}
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent">
                    </div>


                    {{-- Informasi di atas gambar --}}
                    <div
                        class="absolute bottom-0 left-0 right-0 p-8 text-white">


                        <span
                            class="inline-block bg-blue-600 text-white text-[10px] font-bold uppercase tracking-[0.15em] px-4 py-2 rounded-full mb-4 shadow-lg">

                            Kategori Data

                        </span>


                        <h2
                            id="modalNama"
                            class="text-3xl md:text-4xl font-black leading-tight drop-shadow-lg">

                            Nama Kategori

                        </h2>

                    </div>

                </div>
                    <div class="p-7 md:p-8 flex flex-col relative">
                    <button
                        onclick="closeKategoriModal()"
                        type="button"
                        aria-label="Tutup modal"
                        class="absolute top-6 right-6 w-10 h-10 rounded-full bg-slate-100 hover:bg-slate-200 flex items-center justify-center text-slate-500 hover:text-slate-700 transition">

                        <span class="text-xl">
                            ✕
                        </span>

                    </button>



                    <div class="pr-10">


                        <p
                            class="text-xs uppercase tracking-[0.2em] font-bold text-blue-600 mb-3">

                            Informasi Kategori

                        </p>


                        <h3
                            id="modalNamaDetail"
                              class="text-3xl font-black text-slate-800 leading-tight">

                            Nama Kategori

                        </h3>


                        <div
                            class="w-16 h-1 bg-blue-600 rounded-full mt-5 mb-8">
                        </div>



                        {{-- Deskripsi --}}
                        <div>

                            <h4
                                class="text-sm font-bold uppercase tracking-wider text-slate-700 mb-3">

                                Deskripsi

                            </h4>


                            <p
                                id="modalDeskripsi"
                                class="text-slate-500 leading-relaxed text-base">

                                Deskripsi kategori.

                            </p>

                        </div>


                    </div>


                    <div class="mt-auto pt-10">


                        <div
                            class="bg-blue-50 border border-blue-100 rounded-xl p-4 mb-5">

                            <p class="text-sm text-blue-700 leading-relaxed">

                                Untuk melihat data statistik secara lengkap,
                                silakan masuk terlebih dahulu.

                            </p>

                        </div>



                        <a
                            href="/login"
                            class="w-full flex items-center justify-center gap-3 bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-xl transition shadow-lg shadow-blue-200 active:scale-[0.98]">

                            <span>
                                Lihat Lebih Lanjut
                            </span>

                            <span class="text-xl">
                                →
                            </span>

                        </a>


                    </div>

                </div>

            </div>

        </div>

    </div>


    <footer class="bg-slate-950 text-white pt-24 pb-12">

        <div class="max-w-7xl mx-auto px-6">

            <div class="grid md:grid-cols-12 gap-12 pb-20">


                {{-- SITATIK --}}
                <div class="md:col-span-5">

                    <div class="flex items-center gap-3 mb-6">

                        <span class="text-2xl font-black">

                            <span class="text-blue-500">
                                SITATIK
                            </span>

                            <span class="text-white">
                                +
                            </span>

                        </span>

                    </div>


                    <p class="text-slate-400 leading-relaxed max-w-sm">

                        Sistem informasi data statistik terpadu oleh
                        Bidang Statistik Dinas Komunikasi, Informatika,
                        Persandian dan Statistik Provinsi Sulawesi Tengah.

                    </p>

                </div>



                {{-- LINK --}}
                <div class="md:col-span-3">

                    <h3 class="font-bold text-lg mb-6 text-white">
                        Link Terkait
                    </h3>


                    <ul class="space-y-4">

                        <li>

                            <a
                                href="https://sultengprov.go.id/"
                                target="_blank"
                                class="text-slate-400 hover:text-blue-400 transition flex items-center gap-2">

                                Situs Provinsi Sulteng

                            </a>

                        </li>


                        <li>

                            <a
                                href="https://diskominfo.sultengprov.go.id/"
                                target="_blank"
                                class="text-slate-400 hover:text-blue-400 transition flex items-center gap-2">

                                Situs DKIPS

                            </a>

                        </li>

                    </ul>

                </div>



                {{-- HUBUNGI --}}
                <div class="md:col-span-4">

                    <h3 class="font-bold text-lg mb-6 text-white">
                        Hubungi Kami
                    </h3>


                    <div
                        class="space-y-4 bg-white/5 p-6 rounded-3xl border border-white/10">


                        {{-- TELEPON --}}
                        <p class="flex items-center gap-4 text-slate-400">

                            <span
                                class="bg-blue-500/20 p-2 rounded-lg text-blue-400 flex items-center justify-center">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    class="w-5 h-5">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />

                                </svg>

                            </span>

                            (0451) 452909

                        </p>



                        {{-- EMAIL --}}
                        <p class="flex items-center gap-4 text-slate-400">

                            <span
                                class="bg-blue-500/20 p-2 rounded-lg text-blue-400 flex items-center justify-center">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    class="w-5 h-5">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />

                                </svg>

                            </span>

                            info@diskominfo.go.id

                        </p>

                    </div>

                </div>

            </div>



            {{-- COPYRIGHT --}}
            <div class="border-t border-white/10 pt-8 text-center">

                <p class="text-slate-500 text-sm">

                    © {{ date('Y') }} Diskominfo Santik Sulawesi Tengah

                </p>

            </div>

        </div>

    </footer>


    <script>

        const sections = document.querySelectorAll("section");

        const navLinks = document.querySelectorAll(".nav-link");


        window.addEventListener("scroll", () => {

            let current = "";


            sections.forEach(section => {

                const sectionTop = section.offsetTop - 150;


                if (scrollY >= sectionTop) {

                    current = section.getAttribute("id");

                }

            });


            navLinks.forEach(link => {

                link.classList.remove(
                    "bg-white",
                    "text-blue-600",
                    "shadow-sm"
                );


                if (link.getAttribute("href") === "#" + current) {

                    link.classList.add(
                        "bg-white",
                        "text-blue-600",
                        "shadow-sm"
                    );

                }

            });

        });


        const kategoriModal =
            document.getElementById("kategoriModal");


        /*
        Membuka modal
        */
        function openKategoriModal(data) {

            /*
            Nama kategori di bagian gambar
            */
            document.getElementById("modalNama").textContent =
                data.nama;


            /*
            Nama kategori di bagian kanan
            */
            document.getElementById("modalNamaDetail").textContent =
                data.nama;


            /*
            Deskripsi
            */
            document.getElementById("modalDeskripsi").textContent =
                data.deskripsi ||
                "Data statistik kategori ini belum memiliki deskripsi.";


            /*
            Gambar
            */
            document.getElementById("modalGambar").src =
                data.gambar;

            kategoriModal.classList.add("active");

            document.body.style.overflow = "hidden";

        }

        function closeKategoriModal() {

            kategoriModal.classList.remove("active");

            document.body.style.overflow = "";

        }


        document
            .querySelectorAll(".kategori-card")
            .forEach((card) => {

                card.addEventListener("click", () => {

                    openKategoriModal({

                        nama: card.dataset.nama,

                        deskripsi: card.dataset.deskripsi,

                        gambar: card.dataset.gambar

                    });

                });

            });



        kategoriModal.addEventListener("click", (e) => {

            if (e.target === kategoriModal) {

                closeKategoriModal();

            }

        });

        document.addEventListener("keydown", (e) => {

            if (e.key === "Escape") {

                closeKategoriModal();

            }

        });

    </script>


</body>

</html>