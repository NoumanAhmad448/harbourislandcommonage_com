<?php

namespace App\Console\Commands\Log;

use Illuminate\Console\Command;

class StorageLink extends Command {
    // Command name
    protected $signature = 'strge:ln
            ';

    // Description
    protected $description = 'link storage folder and change the permission of storage folder';

    public function handle() {

        exec('pwd');

        $unlink_storage = 'unlink ~/public_html/website_7171ee6c/public/storage';
        $storage = 'ln -s ~/public_html/website_7171ee6c/storage/app/public ~/public_html/website_7171ee6c/public/storage';
        $change_permission = 'chmod -R 777 ~/public_html/website_7171ee6c/storage/';
        $show_public_dir = 'ls ~/public_html/website_7171ee6c/public -l';

        debug_logs($unlink_storage);
        debug_logs($storage);
        debug_logs($change_permission);

        exec($unlink_storage);
        exec($storage);
        exec($change_permission);
        $this->info(__('messages.cnsl_msg', ['msg' => 'storage folder has been linked']));
        exec($show_public_dir);
    }
}
