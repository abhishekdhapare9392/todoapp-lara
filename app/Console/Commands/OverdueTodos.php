<?php

namespace App\Console\Commands;

use App\Models\Todo;
use Illuminate\Console\Command;

class OverdueTodos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'todos:overdue';

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
        $this->line('Overdue Todos!');
    }
}
