<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Deposit;
use App\Http\Controllers\mail\Mailer;
use Carbon\Carbon;
class IgnoreDepositsCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        $deposits = Deposit::where('status', 0)->get();
        foreach ($deposits as $deposit) {
            $created = new Carbon($deposit->created_at);
            $now = Carbon::now();
            if($created->diff($now)->days >= 2){
                $deposit->status = -1; // ignoring deposit
                $deposit->save();
                Mailer::sendDepositIgnoredMail($deposit);
            }
        }
    }
}
