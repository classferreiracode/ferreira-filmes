<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\TheMovieDatabase\TheMovieDatabaseService;
use App\Services\Api\ViaCep\ViaCepService;

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
            ->Person()
            ->fromPerson(976)
            ->get();

        ds($json);
        return Command::SUCCESS;
    }
}
