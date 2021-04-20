<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ShowTrans extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Show:Trans';

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
     * @return int
     */
    public function handle()
    {
        echo 'awdawdawdawd';
           date_default_timezone_set('Asia/Almaty');
            
           
            $date = date('Y-m-d H:i:s');
               
                
            $m =  \App\Models\Match::all();
            
            foreach ($m as $v)
            {
                
                
             $start =  \Carbon\Carbon::parse($v->start_time);
                  $start2 =  \Carbon\Carbon::parse($date);
                
               if($start->year == $start2->year && $start->month == $start2->month &&  $start->day == $start2->day  && $start2->minute - $start->minute <=5  ){
                   
                            $v->is_begin = 1;  

                }
                
                $v->save();
            }
        return 0;
    }
}
