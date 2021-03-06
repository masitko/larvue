<?php

namespace App\Tables\Builders\Administration;

use App\School;
use LaravelEnso\VueDatatable\app\Classes\Table;

class SchoolTable extends Table
{
    protected $templatePath = __DIR__.'/../../Templates/Administration/schools.json';

    public function query()
    {
        return School::select(\DB::raw('
            schools.*, schools.id as "dtRowId", people.name as admin
        '))
        ->leftJoin('users', 'schools.admin_id', '=', 'users.id')
        ->leftJoin('people', 'users.person_id', '=', 'people.id')
        ;
    }
}
