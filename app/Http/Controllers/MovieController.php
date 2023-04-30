<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index()
    {
        $baseURL = env('MOVIE_DB_BASE_URL');
        $imagesBaseURL = env('MOVIE_DB_IMAGE_BASE_URL');
        $apiKey = env('MOVIE_DB_API_KEY');
        $MAX_BANNER = 3;
        $MAX_TRENDING_MOVIE = 10;
        $MAX_MOVIE_ITEM = 10;
        $MAX_TV_SHOWS_ITEM = 10;

        //  Hit Api Banner
        $bannerResponse = Http::get("{$baseURL}/trending/movie/week", [
            'api_key' => $apiKey,
        ]);

        // Persiapan Variable
        $bannerArray = [];

        // Check Api Response
        if ($bannerResponse->successful()) {
            // check data null ato tidak
            $resultArray = $bannerResponse->object()->results;

            if (isset($resultArray)) {
                // Looping Response Data
                foreach ($resultArray as $Item) {
                    // Menyimpan Response data ke variable yg baru
                    array_push($bannerArray, $Item);

                    // Max 3 item ato page
                    if (count($bannerArray) == $MAX_BANNER) {
                        break;
                    }
                }
            }
        }

        //  Hit Api TRENDING MOVIE
        $trendingResponse = Http::get("{$baseURL}/trending/movie/week", [
            'api_key' => $apiKey,
        ]);

        // Persiapan Variable
        $trendingArray = [];

        // Check Api Response
        if ($trendingResponse->successful()) {
            // check data null ato tidak
            $resultArray = $trendingResponse->object()->results;

            if (isset($resultArray)) {
                // Looping Response Data
                foreach ($resultArray as $Item) {
                    // Menyimpan Response data ke variable yg baru
                    array_push($trendingArray, $Item);

                    // Max 10 item ato page
                    if (count($trendingArray) == $MAX_TRENDING_MOVIE) {
                        break;
                    }
                }
            }
        }




        // hIt api top movie
        $topMovieResponse = Http::get("{$baseURL}/movie/top_rated", [
            'api_key' => $apiKey,
        ]);

        // persiapan variabel top movie
        $topMovieArray = [];

        // Cheak API response
        if ($topMovieResponse->successful()) {
            // Check data nul kah
            $resultArray = $topMovieResponse->object()->results;

            if (isset($resultArray)) {
                // Looping Response Data
                foreach ($resultArray as $Item) {
                    // Menyimpan Response data ke variable yg baru
                    array_push($topMovieArray, $Item);

                    // Max 10 item 
                    if (count($topMovieArray) == $MAX_MOVIE_ITEM) {
                        break;
                    }
                }
            }
        }
        
        // hIt api top tv
        $tvResponse = Http::get("{$baseURL}/tv/top_rated", [
            'api_key' => $apiKey,
        ]);

        // persiapan variabel top movie
        $tvArray = [];

        // Cheak API response
        if ($tvResponse->successful()) {
            // Check data nul kah
            $resultArray = $tvResponse->object()->results;

            if (isset($resultArray)) {
                // Looping Response Data
                foreach ($resultArray as $Item) {
                    // Menyimpan Response data ke variable yg baru
                    array_push($tvArray, $Item);

                    // Max 10 item 
                    if (count($tvArray) == $MAX_TV_SHOWS_ITEM) {
                        break;
                    }
                }
            }
        }

        return view('home', [
            'baseURL' => $baseURL,
            'imagesBaseURL' => $imagesBaseURL,
            'apiKey' => $apiKey,
            'banner' => $bannerArray,
            'topMovies' => $topMovieArray,
            'trendingMovie'=>$trendingArray,
            'tvShow' => $tvArray,
        ]);
    }
}
