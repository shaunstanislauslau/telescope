<?php

namespace Laravel\Telescope\Console;

use Illuminate\Console\Command;
use Laravel\Telescope\Contracts\PrunableRepository;

class PruneCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'telescope:prune';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prune stale entries from the Telescope database';

    /**
     * Execute the console command.
     *
     * @param  \Laravel\Telescope\Contracts\PrunableRepository  $storage
     * @return void
     */
    public function handle(PrunableRepository $storage)
    {
        $this->info($storage->prune(now()->subHours(24)).' entries pruned.');
    }
}
