<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Api\TheMovieDatabase\TheMovieDatabaseService;

class MoviesController extends Controller
{
    private $service;
    public int $page;
    public $popularMovies;

    public function __construct()
    {
        $this->service = new TheMovieDatabaseService();

        $this->popularMovies = $this->service
            ->popularMovies()
            ->get();
    }

    public function index()
    {
        return view('movies', [
            'popularMovies' => $this->popularMovies
        ]);
    }

    public function setPage(int $page)
    {
        $this->popularMovies = $this->service
            ->popularMovies()
            ->fromPage($page)
            ->get();

        return json_encode($this);
    }
}
