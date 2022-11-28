<?php

namespace App\Console\Commands;

use App\Models\MailTemplate;
use App\Models\Member;
use App\Notifications\BirthdayEmailNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class BirthdayCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'birthday:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Birhtday Mail Notifications to Members';

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
        info("Cron Job running at ". now());
        $members=Member::whereMonth('date_of_birth', Carbon::now()->format('m'))->whereDay('date_of_birth', Carbon::now()->format('d'))->get();
        if(count($members)>0){
            $tem=MailTemplate::first();
            foreach ($members as $member){
                $data  = ['subject' => $tem->subject, 'line_1' => $tem->line1, 'line_2' => $tem->line2, 'url' => $tem->url];
                foreach ($data as $index => $val){
                    $data[$index]=str_replace(['{member_name}','{date_of_birth}'],[$member->first_name.' '.$member->surname,date('d-m-Y')],$val);
                }
                Notification::send($member, new BirthdayEmailNotification($data));
            }
        }
        return 0;
    }
}
