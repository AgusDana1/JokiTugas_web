<div class="mt-28 flex flex-col items-center">
    <div class='w-11/12'>
        <img src="{{ asset('img/imgBlog/unseen-studio-s9CC2SKySJM-unsplash.jpg') }}"
        class="w-full h-full object-cover shadow-lg" 
        alt="">
    </div>

        {{-- rectangle biru --}}
        <div class="w-full bg-blue-500 h-3 shadow-lg mt-8"></div>
        {{-- wave --}}
        <img class="h-auto object-cover w-full" src="{{ asset('svg/wave-kebalik3.svg') }}" alt="">

        {{-- Joki Tugas untuk anak sekolah --}}
        <div>
            <h1 class="text-center text-2xl font-normal text-gray-950 mb-0">
                Joki Tugas
            </h1>
            <h2 class="text-center text-3xl font-bold text-gray-950 mb-0">
                Jasa Joki tugas anak
            </h2>
            <h2 class="text-center text-3xl font-bold text-gray-950 mb-7">
                sekolah dari SD - SMA
            </h2>

            <!-- Grid Layout -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4 sm:gap-6 mt-10">
            <!-- Joki Tugas SD -->
            <div class="flex flex-col items-center bg-blue-500 rounded-xl p-4 shadow-xl">
                <img src="{{ asset('img/imgBlog/20 Things We Miss When We Leave Indonesia _ WowShack 1.png') }}" 
                alt="Joki Tugas SD" 
                class="rounded-lg w-5/6 md:w-full h-36 sm:h-48 lg:h-64 object-cover">
                <p class="mt-4 font-bold text-white font-poppins text-lg">Joki Tugas SD</p>
            </div>

            <!-- Joki Tugas SMP -->
            <div class="flex flex-col items-center bg-blue-500 rounded-xl p-4 shadow-xl">
                <img src="{{ asset('img/imgBlog/7 Cara Masuk Perguruan Tinggi Negeri dengan Mudah.png') }}" 
                alt="Joki Tugas SMP" 
                class="rounded-lg w-5/6 md:w-full h-36 sm:h-48 lg:h-64 object-cover">
                <p class="mt-4 font-bold text-white font-poppins text-lg">Joki Tugas SMP</p>
            </div>

            <!-- Joki Tugas SMA/SMK -->
            <div class="flex flex-col items-center mt-8 bg-blue-500 rounded-xl p-4 shadow-xl">
                <img src="{{ asset('img/imgBlog/100 Contoh Soal Cerdas Cermat Pengetahuan Umum Disertai Jawabannya.png') }}" 
                alt="Joki Tugas SMA/SMK" 
                class="rounded-lg w-5/6 md:w-full h-36 sm:h-48 lg:h-64 object-cover">
                <p class="mt-4 font-bold text-white font-poppins text-lg">Joki Tugas SMA/SMK</p>
            </div>

            <!-- Revisi Gratis -->
            <div class="flex flex-col items-center mt-8 bg-blue-500 rounded-xl p-4 shadow-xl">
                <img src="{{ asset('img/imgBlog/download (2).png') }}" 
                alt="Revisi Gratis" 
                class="rounded-lg w-5/6 md:w-full h-36 sm:h-48 lg:h-64 object-cover">
                <p class="mt-4 font-bold text-white font-poppins text-lg">Revisi Gratis</p>
            </div>
        </div>
    </div>

    {{-- Penjelasan tentang Jasa Joki Tugas --}}
    <div class="mt-16">
        <h2 class="text-center text-xl md:text-3xl font-bold text-gray-950 mb-0">
            Penjelasan Tentang Jasa
        </h2>
        <h2 class="text-center text-xl md:text-3xl font-bold text-gray-950 mb-20"> 
            Joki Tugas
        </h2>

        <div class="w-full flex flex-wrap lg:flex-nowrap p-6">
            <!-- Gambar -->
            <div class="w-full lg:w-1/2 flex justify-center lg:justify-end px-8 py-4">
                <div class="overflow-hidden w-2/3 lg:w-3/4">
                    <img class="w-full h-auto object-cover rounded-lg" src="{{ asset('img/imgBlog/unsplash_AjGYOg18LJ0.png') }}" alt="Tugas Individu">
                </div>
            </div>
        
            <!-- Teks -->
            <div class="w-full lg:w-1/2 flex items-center lg:justify-start px-8">
                <p class="font-poppins w-full lg:w-1/2 text-sm text-center lg:text-left leading-relaxed">
                    Di Sheets Si Joki Tugas kamu bisa dibuatkan tugas individu ataupun kelompok mulai dari tugas makalah, ppt ataupun tugas rumah, dan tugas akan dikerjakan oleh orang yang ahli dan profesional dalam bidangnya.
                </p>
            </div>
        </div>
        
        <div class="w-full flex flex-wrap lg:flex-nowrap p-6">
            <!-- Gambar -->
            <div class="w-full lg:w-1/2 flex justify-center lg:justify-end px-8 py-4">
                <div class="overflow-hidden w-2/3 lg:w-3/4">
                    <img class="w-full h-auto object-cover rounded-lg" src="{{ asset('img/imgBlog/unsplash_9zo9aAsZJZ8 (1).png') }}" alt="Revisi Gratis">
                </div>
            </div>
        
            <!-- Teks -->
            <div class="w-full lg:w-1/2 flex items-center lg:justify-start px-8">
                <p class="font-poppins w-full lg:w-1/2 text-sm text-center lg:text-left leading-relaxed">
                    Di Sheets Si Joki Tugas kamu dapat melakukan revisi secara gratis tanpa ada biaya tambahan, dan juga para pekerja akan menyesuaikan apa yang kamu minta.
                </p>
            </div>
        </div>
    </div>
</div>