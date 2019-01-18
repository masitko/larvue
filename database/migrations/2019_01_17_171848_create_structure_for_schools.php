<?php

use LaravelEnso\StructureManager\app\Classes\StructureMigration;

class CreateStructureForSchools extends StructureMigration
{
    protected $permissions = [
        ['name' => 'administration.schools.index', 'description' => 'Show index for school', 'type' => 0, 'is_default' => false],
        ['name' => 'administration.schools.create', 'description' => 'Create school', 'type' => 1, 'is_default' => false],
        ['name' => 'administration.schools.store', 'description' => 'Store a new school', 'type' => 1, 'is_default' => false],
        ['name' => 'administration.schools.show', 'description' => 'Show school', 'type' => 1, 'is_default' => false],
        ['name' => 'administration.schools.edit', 'description' => 'Edit school', 'type' => 1, 'is_default' => false],
        ['name' => 'administration.schools.update', 'description' => 'Update school', 'type' => 1, 'is_default' => false],
        ['name' => 'administration.schools.destroy', 'description' => 'Delete school', 'type' => 1, 'is_default' => false],
        ['name' => 'administration.schools.initTable', 'description' => 'Init table for school', 'type' => 0, 'is_default' => false],
        ['name' => 'administration.schools.tableData', 'description' => 'Get table data for school', 'type' => 0, 'is_default' => false],
        ['name' => 'administration.schools.exportExcel', 'description' => 'Export excel for school', 'type' => 0, 'is_default' => false],
        ['name' => 'administration.schools.options', 'description' => 'Get school options for select', 'type' => 0, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Schools', 'icon' => 'hotel', 'route' => 'administration.schools.index', 'order_index' => 180, 'has_children' => false
    ];

    protected $parentMenu = 'Administration';
}

