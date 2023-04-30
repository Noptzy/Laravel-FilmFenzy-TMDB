<html>

<head>
    <title>Film Fenzy | Movie Rating Web</title>
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('img/filmico.png') }}" type="image/x-icon">
</head>

<body>
    {{-- header section --}}
    <div class="w-full h-auto min-h-screen flex flex-col">
        {{-- header --}}
        <div class="w-full bg-white h-[89px] drop-shadow-lg flex flex-row items-center">
            <div class="w-1/3 pl-10 ">
                <a href=""
                    class="font-bold text-2xl font-quicksand text-black hover:text-develope-900 duration-200">FilmFenzy</a>
            </div>
            <div class="w-1/3 flex items-center justify-center">
                <a href="/movie"
                    class="uppercase text-base mx-5 text-black font-bold hover:text-develope-500 duration-200 font-inter ">Movie</a>
                <a href="/tv-shows"
                    class="uppercase text-base mx-5 text-black font-bold hover:text-develope-500 duration-200 font-inter ">Tv
                    Series</a>
            </div>
            <div class="w-1/3 pr-10 flex flex-row justify-end ">
                <a href="/search">
                    <img src="{{ asset('img/cari.png') }}" alt=""
                        class="fill-black group-hover:fill-develope-500 duration-200" width="32" height="32">
                </a>
            </div>

        </div>

        {{-- banner section --}}
        @foreach ($banner as $bannerItem)
            <div class="w-full h-[512px] bg-transparent relative flex flex-col">


                {{-- banner data --}}
                <div class="w-full h-full absolute flex flex-row items-center slide">

                    {{-- Gambar --}}
                    <img class="w-full h-full object-cover absolute"
                        src="{{ $imagesBaseURL }}/original{{ $bannerItem->backdrop_path }}" alt="">

                    {{-- overlay --}}
                    <div class="w-full h-full absolute bg-black bg-opacity-40"></div>

                    <div class="w-10/12 flex flex-col ml-28 z-10  ">
                        <span class="font-bold font-inter text-4xl text-white">{{ $bannerItem->title }}</span>
                        <span
                            class="font-inter text-xl text-white w-1/2 line-clamp-2">{{ $bannerItem->overview }}</span>
                        <a href="/movie/{{ $bannerItem->id }}"
                            class="w-fit bg-develope-500 text-white pl-2 pr-4 py-2 mt-5 font-inter text-lg flex flex-row rounded-full items-center hover:drop-shadow-lg duration-200">
                            <img src="{{ asset('img/play-24.png') }}" width="17" height="17" alt="">
                            <span class="pl-1">Detail</span>
                        </a>
                    </div>

                </div>
        @endforeach

        {{-- Prev Button --}}
        <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1/12 flex justify-center" onclick="moveSlide(-1)">
            <button class="bg-white p-3 rounded-full opacity-20 hover:opacity-100 duration-100">
                <img src="{{ asset('img/kiri.png') }}" alt="arrow png" width="24" height="24">
            </button>
        </div>


        {{-- Next Button --}}
        <div class="absolute right-0 top-1/2 -translate-y-1/2 w-1/12 flex justify-center" onclick="moveSlide(1)">
            <button class="bg-white p-3 rounded-full opacity-20 hover:opacity-100 duration-100">
                <img src="{{ asset('img/kanan.png') }}" alt="arrow png" width="24" height="24">
            </button>
        </div>

        {{-- indicator --}}
        <div class="absolute bottom-0 w-full mb-8">
            <div class="w-full flex flex-row items-center justify-center">
                <div class="w-2.5 h-2.5 rounded-full mx-1 cursor-pointer dot" onclick="currentSlide(1)"></div>
                <div class="w-2.5 h-2.5 rounded-full mx-1 cursor-pointer dot" onclick="currentSlide(2)"></div>
                <div class="w-2.5 h-2.5 rounded-full mx-1 cursor-pointer dot" onclick="currentSlide(3)"></div>
            </div>
        </div>
    </div>

    </div>

    @include('compo.popmovie')

    <!-- Content Top 10 Movie-->

    @include('compo.top10movie')
    {{-- End Top 10 Movie --}}

    {{-- Content Top 10 TV Show --}}
    @include('compo.top10tv')
    {{-- End Content Top 10 TV Show --}}

    {{-- Footer --}}
    @include('compo.footer')
    {{-- End Footer  --}}
        <script>
            // Default active slide
            let slideIndex = 1;
            showSlide(slideIndex);

            function showSlide(position) {
                let index;
                const slidesArray = document.getElementsByClassName("slide");
                const dotsArray = document.getElementsByClassName("dot");

                // Looping effect
                if (position > slidesArray.length) {
                    slideIndex = 1;
                }

                if (position < 1) {
                    slideIndex = slidesArray.length;
                }

                // Hide all slides
                for (index = 0; index < slidesArray.length; index++) {
                    slidesArray[index].classList.add('hidden');
                }

                // Show active slide
                slidesArray[slideIndex - 1].classList.remove('hidden');

                // Remove active status
                for (index = 0; index < dotsArray.length; index++) {
                    dotsArray[index].classList.add('bg-white');
                    dotsArray[index].classList.remove('bg-black');
                    dotsArray[index].classList.add('bg-white');
                }

                // Set active status
                dotsArray[slideIndex - 1].classList.remove('bg-white');
                dotsArray[slideIndex - 1].classList.add('bg-black');
                dotsArray[slideIndex - 1].classList.remove('bg-white');

            }

            function moveSlide(moveStep) {
                showSlide(slideIndex += moveStep)
            }

            function currentSlide(position) {
                showSlide(slideIndex = position);
            }
        </script>

</body>

</html>
