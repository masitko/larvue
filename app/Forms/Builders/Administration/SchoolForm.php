<?php

namespace App\Forms\Builders\Administration;

use App\School;
use LaravelEnso\FormBuilder\app\Classes\Form;

class SchoolForm
{
    private const TemplatePath = __DIR__.'/../../Templates/Administration/school.json';

    private $form;

    public function __construct()
    {
        $this->form = new Form(self::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(School $school)
    {
        return $this->form->edit($school);
    }
}
