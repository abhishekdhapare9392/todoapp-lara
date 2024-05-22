<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('todos:overdue')->daily()->at('06:00')->timezone('Asia/Kolkata')->weekdays();
