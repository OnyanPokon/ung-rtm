<main>
    @push('styles')
        <style>
            .bg-brightness {
                position: relative;
                width: 100%;
                height: 100vh;
            }

            .bg-brightness::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-image: url('/hero/rektorat2.jpg');
                background-size: cover;
                background-position: center;
                filter: brightness(0.2);
                z-index: -1;
            }

            .content {
                position: relative;
                z-index: 1;
            }
        </style>
    @endpush

    <section class="w-full h-screen bg-brightness">
        <div
            class="max-w-screen-xl w-full mx-auto flex-col lg:flex-row flex items-center h-full content lg:justify-between justify-center px-8 py-24 pt-28">
            <div class="flex flex-col gap-y-1 max-w-lg w-full justify-center">
                <h1 class="text-2xl lg:text-5xl text-white font-black">RTM <span
                        class="text-color-primary-500">UNG</span></h1>
                {{-- <p class="text-lg lg:text-2xl text-white font-bold lg:mt-4">Universitas Negeri Gorontalo</p> --}}
                <p class="text-white text-xs lg:text-sm">Aplikasi Survei Penjaminan Mutu Universitas Negeri Gorontalo
                    adalah platform digital yang mengumpulkan data survei dari mahasiswa, dosen, dan staf untuk
                    mendukung penjaminan mutu universitas.</p>
                {{-- <x-button class="w-fit mt-4" onclick="window.location.href='{{ route('list_survei') }}'">
                    Lihat Survei
                </x-button> --}}
            </div>
            <div class="flex justify-center">
                <div class="w-auto p-4">
                    <img src="/hero/hero.png" alt="" class="w-full">
                </div>
            </div>
        </div>
    </section>
    <section class="w-full">
        <div class="">

        </div>
    </section>
</main>
