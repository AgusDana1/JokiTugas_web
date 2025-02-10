<div class="mt-28 w-full p-8 flex flex-col items-center bg-white">
    <div class="w-full p-8 flex flex-col lg:flex-row items-center bg-white">
      <!-- Kolom Teks -->
      <div class="lg:w-2/3 text-center lg:text-left">
        <h1 class="font-extrabold font-poppins text-blue-700 text-4xl">CONTACT US</h1>
        <p class="text-gray-950 mt-4">
          Bergabunglah bersama kami di Sheets Si Teman Tugasmu dan jadilah bagian dari tim profesional yang membantu ribuan siswa dan siswi meraih kesuksesan akademik! Jika Anda memiliki keahlian di bidang penulisan, analisis, atau penyelesaian tugas akademik, inilah kesempatan Anda untuk mengembangkan potensi sekaligus mendapatkan penghasilan tambahan. Bersama Sheets Si Teman Tugasmu, kita tidak hanya bekerja, tetapi juga memberikan dampak positif bagi dunia pendidikan!
        </p>
      </div>
    
      <!-- Kolom Gambar -->
      <div class="mt-8 lg:mt-0 lg:w-1/3 flex justify-center">
        <div class="w-40 h-40 sm:w-48 sm:h-48 md:w-52 md:h-52 rounded-full bg-gradient-to-r from-blue-300 via-blue-500 to-blue-700 p-2">
          <img
            src="{{ asset('img/imgCaraOrder/Premium Photo _ Beautiful young Asian woman in green sweater smiling pointing fingers down, inviting customers to special event isolated over purple background.jpeg') }}"
            alt="Gambar"
            class="w-full h-full object-cover rounded-full"
          />
        </div>
      </div>
    </div>
    
    {{-- feedback & map --}}
    <section class="py-10 px-6 bg-blue-100 rounded-lg">
      <div class="w-full mx-auto bg-white p-8 rounded-lg shadow-lg"> 
        <h1 class="text-2xl font-bold font-poppins text-blue-700 mb-6">Berikan Feedback Anda</h1>

        <div class="flex flex-col md:flex-row gap-8">
          {{-- Formulir Feedback --}}
          <div class="w-full md:h-1/2">
            {{-- <h2 class="text-md font-semibold text-gray-800 mb-3">Berikan Feedback Anda:</h2> --}}
            <form action="{{ route('send.feedback') }}" method="POST" class="space-y-4">
              @csrf
              <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama:</label>
                <input type="text" id="name" name="name" required class="mt-1 block w-full px-4 py-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
              </div>

              <div>
                <label for="message" class="block text-sm font-medium text-gray-700">Feedback Anda:</label>
                <textarea name="message" id="message" rows="3" required class="mt-1 block w-full px-4 py-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"></textarea>
              </div>

              <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700">Kirim Feedback</button>
            </form>
          </div>

          {{-- Map/ lokasi developer --}}
          <div class="w-full md:w-full">
            <h2 class="text-md font-semibold text-gray-700 mb-3">Lokasi Kami:</h2>
            <iframe 
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d348.63021292103696!2d115.21133528663292!3d-8.662935090727101!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd241bcc5518d9b%3A0xa17951d58d07f5f2!2sSATE%20BABI%20DAN%20AYAM%20MEN%20EKE!5e0!3m2!1sid!2sid!4v1739159252646!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" 
            frameborder="0"
            class="w-full h-64 rounded-md shadow-md"
            allowfullscreen=""
            loading="lazy"></iframe>
          </div>
        </div>
      </div>
    </section>
  </div>