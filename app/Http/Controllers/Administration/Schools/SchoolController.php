<?php

namespace App\Http\Controllers\Administration\Schools;

use App\School;
use App\Forms\Builders\Administration\SchoolForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\ValidateSchoolRequest;


class SchoolController extends Controller
{
    public function create(SchoolForm $form)
    {
        return ['form' => $form->create()];
    }

    public function store(ValidateSchoolRequest $request)
    {
        $school = School::create($request->all());

        return [
            'message' => __('The school was successfully created'),
            'redirect' => 'administration.schools.edit',
            'param' => ['school' => $school->id],
        ];
    }

    public function show(School $school)
    {
        return ['school' => $school];
    }

    public function edit(School $school, SchoolForm $form)
    {
        return ['form' => $form->edit($school)];
    }

    public function update(ValidateSchoolRequest $request, School $school)
    {
        $school->update($request->all());

        return ['message' => __('The school was successfully updated')];
    }

    public function destroy(School $school)
    {
        $school->delete();

        return [
            'message' => __('The school was successfully deleted'),
            'redirect' => 'administration.schools.index',
        ];
    }
}
