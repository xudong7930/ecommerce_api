<?php

use Illuminate\Foundation\Inspiring;


Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('helper:func', function () {

})->describe('Make global function file');



