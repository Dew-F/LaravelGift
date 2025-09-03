<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Services\ParseService;
use Illuminate\Console\Command;

class Parse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    public function __construct(protected ParseService $parseService)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $result = $this->parseService->execute(config('services.parsing.url').'/catalog/noutbuki/noutbuki_apple/', 2);
        $this->info($result);
    }
}
