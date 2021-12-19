<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

//can use this idea to make manual backups of the website.
Artisan::command('backupfull', function(){
    //need to figure out a way to add checks to this to make sure it doesnt get abused
    Artisan::call('backupsql');
    Artisan::call('schema:dump');
    Artisan::call('backupfiles');
});

Artisan::command('backupsql', function(){
    echo "BACKING UP THE DATABASE...\n";
});

Artisan::command('backupfiles', function() {
    /*
        backing up files should include:
            - Participant Files
            - User Files
            - Reciepts
            - Database Dump
            - Migration Files --> or they can be brought in from the git, probably shouldnt save migration files on live enviroment
        will be packaged in a folder with timestamp on aws server
    */
    echo "BACKING UP THE FILES TO AWS...\n";
});
