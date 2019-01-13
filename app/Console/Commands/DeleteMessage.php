<?php

namespace App\Console\Commands;

use DB;
use App\Models\Message;
use Illuminate\Console\Command;

class DeleteMessage extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'message:delete';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'message:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all messages with timestamp older than n days.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $day = (int) config('main.delete.days');

        if ($day > 0) {
            return Message::where('timestamp', '<', DB::raw("UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL $day DAY))"))
                ->delete();
        }

        return 0;
    }
}