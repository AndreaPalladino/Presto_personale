<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class makeUR extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'presto:mUR';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Let user become revisor';

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
        $email = $this->ask("Please insert user mail");

         $user = User::where('email', $email)->first();

         if(!$user) {
             $this ->error("User not found");
             return;
         }
         
         $user->is_revisor = true;

         $user->save();
         $this->info("User {$user->name} is now a revisor");
        
    }
}
