<?php

namespace App\Http\Controllers;

use App\Services\Api\TheMovieDatabase\TheMovieDatabaseService;

class PersonController extends Controller
{
    private TheMovieDatabaseService $service;

    public function __construct()
    {
        $this->service = new TheMovieDatabaseService();
    }

    public function index()
    {
        return view('persons', [
            'persons' => $this->service->peopleList()->get(),
        ]);
    }

    public function profile(int $id)
    {
        return view('profile', [
            'person' => $this->service->Person()->fromPerson($id)->get(),
        ]);
    }
}
