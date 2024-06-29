<?php

namespace App\Http\Controllers;

use App\Services\Api\TheMovieDatabase\TheMovieDatabaseService;

class MoviesController extends Controller
{
    private $service;
    public int $page;
    public $popularMovies;

    public function __construct()
    {
        $this->service = new TheMovieDatabaseService();
    }

    public function index()
    {
        return view('movies', [
            'popularMovies' => $this->service->popularMovies()->get(),
        ]);
    }

    public function setPage(int $page)
    {
        return $this->popularMovies = $this->service
            ->popularMovies()
            ->fromPage($page)
            ->get();
    }
}
