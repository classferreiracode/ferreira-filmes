<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\TheMovieDatabase\TheMovieDatabaseService;

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
        $service = new TheMovieDatabaseService();
        $json = $service
            ->peopleList()
            ->get();

        ds($json);

        return Command::SUCCESS;
    }
}
