<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Peminjaman alat Laptop</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,600,700" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-900 font-sans antialiased">
    <div class="min-h-screen flex flex-col items-center p-6 lg:p-12">
        
        <header class="w-full max-w-6xl flex justify-between items-center mb-16">
            <div class="flex items-center gap-2">
                <div class="bg-red-600 p-2 rounded-xl shadow-lg shadow-red-200">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <span class="text-2xl font-bold tracking-tighter text-gray-800">laptop</span>
            </div>
            <nav class="flex gap-6 items-center">
                <a href="/login" class="text-sm font-semibold text-gray-600 hover:text-red-600 transition">Masuk</a>
                <a href="/register" class="px-6 py-2.5 bg-gray-900 text-white rounded-full text-sm font-bold hover:bg-black transition shadow-md">Daftar</a>
            </nav>
        </header>

        <main class="w-full max-w-6xl flex flex-col lg:flex-row gap-16 items-center flex-grow">
            <div class="flex-1 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-red-50 text-red-600 text-xs font-bold uppercase tracking-widest mb-6">
                    <span class="relative flex h-2 w-2">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-2 w-2 bg-red-600"></span>
                    </span>
                    Tersedia untuk Mahasiswa & Staff
                </div>
                <h1 class="text-5xl lg:text-7xl font-extrabold text-gray-900 leading-[1.05] mb-8">
                    Peminjaman Laptop <br><span class="text-red-600 italic">Makin Mudah.</span>
                </h1>
                <p class="text-xl text-gray-500 mb-10 max-w-xl leading-relaxed">
                    
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <button class="px-10 py-5 bg-red-600 text-white rounded-2xl font-bold text-lg shadow-xl shadow-red-200 hover:bg-red-700 hover:-translate-y-1 transition-all">
                        Cek Katalog Alat
                    </button>
                </div>
            </div>

            <div class="flex-1 w-full max-w-md lg:max-w-none grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-gray-100 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:scale-110 transition-transform">
                        <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
                    </div>
                    <h3 class="text-4xl font-bold text-gray-900 mb-1">100+</h3>
                    <p class="text-gray-500 font-medium text-sm">Peminjam Aktif</p>
                </div>

                <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-gray-100">
                    <div class="w-12 h-12 bg-green-100 text-green-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg">Kondisi Prima</h3>
                    <p class="text-gray-500 text-sm leading-relaxed text-balance">Semua unit sudah melewati Quality Control sebelum diserahkan.</p>
                </div>

                </div>
            </div>
        </main>

    
    </div>
</body>
</html>