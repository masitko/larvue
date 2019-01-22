<?php

// Route::middleware(['auth', 'core'])
//   ->group(function () {
//         // add your local routes
//   });

Route::namespace ('Administration\Schools')
  ->middleware(['web', 'auth', 'core'])
  ->prefix('administration')->as('administration.')
  ->group(function () {
    Route::prefix('schools')->as('schools.')
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

    Route::resource('schools', 'SchoolController', ['except' => ['index']]); // if it's the case, use `except` or `only` to avoid generating unused routes
  });

// Route::namespace('Administration\Schools')
//   ->middleware(['web', 'auth', 'core'])
//   ->prefix('administration')->as('administration.')
//   ->group(function () {
//   });
