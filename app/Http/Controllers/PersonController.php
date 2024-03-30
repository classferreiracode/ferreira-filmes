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
        $persons = $this->service
            ->peopleList()
            ->get();

        return view('persons', [
            'persons' => $persons,
        ]);
    }

    public function profile(int $id)
    {
        $person = $this->service
            ->Person()
            ->fromPerson($id)
            ->get();

        //dd($person);

        return view('profile', [
            'person' => $person,
        ]);
    }
}
