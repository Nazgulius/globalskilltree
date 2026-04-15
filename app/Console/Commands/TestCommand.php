<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:test-command')]
#[Description('Command for testing generations command')]
class TestCommand extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        echo "Test handle complite command!";
    }
}
