<?php

namespace App\Http\Controllers\Administration\Schools;

use App\School;
use App\Http\Controllers\Controller;
use LaravelEnso\Select\app\Traits\OptionsBuilder;

class SchoolSelectController extends Controller
{
    use OptionsBuilder;

    protected $model = School::class;

    //protected $queryAttributes = ['name'];

    //public function query()
    //{
    //    return School::query();
    //}
}
