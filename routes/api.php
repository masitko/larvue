<?php

Route::middleware(['auth', 'core'])
  ->group(function () {
        // add your local routes
  });

Route::namespace('Administration\Schools')
  ->prefix('administration/schools')->as('administration.schools.')
  ->group(function () {
    Route::get('initTable', 'SchoolTableController@init')
      ->name('initTable');
    Route::get('tableData', 'SchoolTableController@data')
      ->name('tableData');
    Route::get('exportExcel', 'SchoolTableController@excel')
      ->name('exportExcel');

    Route::get('options', 'SchoolSelectController@options')
      ->name('options');
  });

Route::namespace('Administration\Schools')
  ->prefix('administration')->as('administration.')
  ->group(function () {
    Route::resource('schools', 'SchoolController'); // if it's the case, use `except` or `only` to avoid generating unused routes
  });
