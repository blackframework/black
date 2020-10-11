<?php

namespace App\Console\Commands;

use Illuminate\Filesystem\Filesystem;

class ErrorLogsClearCommand extends Command
{
    protected $name = 'clear:error-logs';
    protected $description = 'Remove Errors Logs Rendered Templates';

    public function handler()
    {
        $this->info("==============================");
        $this->info("Removing Errors Logs Templates");
        $this->info("==============================");

        $files = app()->resolve(Filesystem::class);
        $path = storage_path('error_logs');

        throw_when(!$path, "Error logs cache path not found", \RuntimeException::class);

        collect($files->glob("{$path}/*"))->each(fn ($error_log) => $files->delete($error_log));

        $this->info("================================");
        $this->info("Error Logs Cleared Successfully!");
        $this->info("================================");
    }
}
