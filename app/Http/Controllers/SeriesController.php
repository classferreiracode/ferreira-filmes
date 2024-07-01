<?php

namespace App\Http\Controllers;

use App\Services\Api\TheMovieDatabase\TheMovieDatabaseService;

class SeriesController extends Controller
{
    private $service;
    public int $page;

    public function __construct()
    {
        $this->service = new TheMovieDatabaseService();
    }

    public function index()
    {
        return view('series', [
            'popularTv' => $this->service->popularSeries()->get(),
        ]);
    }

    public function setPage(int $page)
    {
        $popularTv = $this->service
            ->popularSeries()
            ->fromPage($page)
            ->get();

        return json_encode($popularTv);
    }
}
