<?php

namespace App\Console\Commands;

use App\Services\Api\TheMovieDatabase\TheMovieDatabaseService;
use Illuminate\Console\Command;

class Playground extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:play';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //$ids = ['767', '87107', '550'];
        $service = new TheMovieDatabaseService();

        // foreach ($ids as $id) {
        //     $json = $service
        //         ->detailMovies()
        //         ->fromMovie($id)
        //         ->get();

        //         ds($json);
        // }

        // $json = $service
        //     ->detailMovies()
        //     ->fromMovie(87108)
        //     ->get();
        return Command::SUCCESS;
    }
}
