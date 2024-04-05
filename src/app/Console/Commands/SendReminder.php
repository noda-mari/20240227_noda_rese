<?php

namespace App\Console\Commands;

use App\Mail\ReminderEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;


use Carbon\Carbon;
use App\Models\Reserve;

class SendReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder for reservations';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = Carbon::today();

        $reserves = Reserve::with('user', 'shop')->whereDate('date', $today)->get();

        foreach ($reserves as $reserve) {

            $user = $reserve->user;
            Mail::to($user->email)->send(new ReminderEmail($user, $reserve));
        }
    }
}
