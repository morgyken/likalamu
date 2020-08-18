<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


use App\TutorPayments;

use App\Controllers\AdminQuestionController;

class CalculateTutorPayments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:tutorPayments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command tutor payment history';

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
        // insert into tutor payments the database

        $thisfun= AdminQuestionController::calculatePayments();

    }
}
