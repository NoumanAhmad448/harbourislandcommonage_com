<?php

namespace App\Console\Commands\Log;

use Illuminate\Console\Command;

class ClearLogFile extends Command
{
    // Command name
    protected $signature = "log:clear {duration=7}
                {ext='*.log'}
    ";

    // Description
    protected $description = 'Clear Laravel log';

    public function handle()
    {
        debug_logs("duration => ".$this->argument('duration'));
        debug_logs("ext => ".$this->argument('ext'));
        $path = storage_path('logs');
        debug_logs($path);

        $command = "find ".$path." -type f -mtime +".$this->argument('duration').
            " -name ".$this->argument('ext')." -execdir rm -- '{}' \;";

        $os = strtolower(substr(PHP_OS, 0, 3));
        if ($os === 'win') {
            // $command = "forfiles /p ".$path." /s /m ".$this->argument('ext')." /D ".$this->argument('duration').
            //             " /C 'cmd /c del @path'";
        }

        debug_logs($command);

        exec($command);
        $this->info(__("messages.cnsl_msg", ['msg' => 'Logs have been cleared']));
    }
}
