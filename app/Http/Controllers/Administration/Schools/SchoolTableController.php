<?php

namespace App\Http\Controllers\Administration\Schools;

use App\Tables\Builders\Administration\SchoolTable;
use App\Http\Controllers\Controller;
use LaravelEnso\VueDatatable\app\Traits\Excel;
use LaravelEnso\VueDatatable\app\Traits\Datatable;

class SchoolTableController extends Controller
{
    use Datatable, Excel;

    protected $tableClass = SchoolTable::class;
}
