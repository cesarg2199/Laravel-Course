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
    Artisan::call('backupfiles');
});

Artisan::command('backupsql', function(){
    echo "BACKING UP THE DATABASE...\n";
});

Artisan::command('backupfiles', function() {
    echo "BACKING UP THE FILES TO AWS...\n";
});
