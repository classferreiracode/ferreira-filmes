<?php

namespace App\Http\Controllers;

use App\Services\Api\TheMovieDatabase\TheMovieDatabaseService;

class SeriesController extends Controller
{
    private $service;
    public int $page;
    public $popularTv;

    public function __construct()
    {
        $this->service = new TheMovieDatabaseService();

        $this->popularTv = $this->service
            ->popularSeries()
            ->get();
    }

    public function index()
    {
        return view('series', [
            'popularTv' => $this->popularTv
        ]);
    }

    public function setPage(int $page)
    {
        $this->popularTv = $this->service
            ->popularSeries()
            ->fromPage($page)
            ->get();

        return json_encode($this);
    }
}
