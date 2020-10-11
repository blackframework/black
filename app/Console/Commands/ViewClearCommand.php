<?php

namespace App\Console\Commands;

use Illuminate\Filesystem\Filesystem;

class ViewClearCommand extends Command
{
    protected $name = 'clear:view';
    protected $description = 'Remove Cache For View Templates';

    public function handler()
    {

        $this->info("=================================");
        $this->info("Removing Cache For View Templates");
        $this->info("=================================");

        $files = app()->resolve(Filesystem::class);
        $path = config('blade.cache');

        throw_when(!$path, "Views cache path not found", \RuntimeException::class);

        collect($files->glob("{$path}/*"))->each(fn ($cached_view) => $files->delete($cached_view));

        $this->info("==================================");
        $this->info("Cached Views Cleared Successfully!");
        $this->info("==================================");

    }
}
