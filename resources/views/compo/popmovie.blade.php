    <!-- Header Top 10 Movies Section -->
    <div class="mt-12">
        <span class="ml-28 font-inter font-bold text-xl">Top Populer Movie Of The Week</span>

        <!-- Content Top 10 Movie-->

        <div class="w-auto flex flex-row overflow-x-auto pl-28 pt-6 pb-10">
            @foreach ($trendingMovie as $trendingMovieItem)
                @php
                    $imageTrenBaseURL = 'https://image.tmdb.org/t/p/';
                    
                    $trenID = $trendingMovieItem->id;
                    $trenTitle = $trendingMovieItem->title;
                    $trenPop = $trendingMovieItem->popularity;
                    $trenReal = $trendingMovieItem->release_date;
                    $trenOver = $trendingMovieItem->overview;
                    $trenImage = "{$imageTrenBaseURL}/w500{$trendingMovieItem->poster_path}";
                @endphp
                <a href="movie{{ $trenID }}" class="group">
                    <div
                        class="min-w-[232px] min-h-[428px] bg-white drop-shadow-[0_0px_8px_rgba(0,0,0,0.25)] group-hover:drop-shadow-[0_0px_8px_rgba(0,0,0,0.5)] rounded-[32px] p-5 flex flex-col mr-8 duration-100">
                        <div class="overflow-hidden rounded-[32px]">
                            <img class="w-full h-[300px] rounded-[32px] group-hover:scale-125 duration-200"
                                src="{{ $trenImage }}" />
                        </div>

                        <span
                            class="font-inter font-bold text-xl mt-4 line-clamp-1 group-hover:line-clamp-none">{{ $trenTitle }}</span>
                        <span
                            class="font-inter  text-sm mt-4 line-clamp-1 group-hover:line-clamp-none"></span>
                        <span class="font-inter text-sm mt-1 ">{{ $trenReal }}</span>

                        <div class="flex flex-row mt-1 items-center">
                            <img src="https://img.icons8.com/ios/21/null/fire-element--v1.png"/>

                            <span class="font-inter text-sm ml-1 ">{{ $trenPop }}</span>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
        {{-- End Top 10 Movie --}}
    </div>
