<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Api\TheMovieDatabase\TheMovieDatabaseService;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    private $service;
    public function __construct()
    {
        $this->service = new TheMovieDatabaseService();
    }
    public function index()
    {
        return view('welcome');
    }

    public function search(Request $request)
    {
        if ($request->input('query') == '' || $request->input('query') == null) {
            return '';
        }
        return $this->service
            ->search()
            ->fromSearch($request->input('query'))
            ->get();
    }
}
