<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use LaravelEnso\TrackWho\app\Traits\CreatedBy;
use LaravelEnso\TrackWho\app\Traits\UpdatedBy;
use LaravelEnso\AddressesManager\app\Traits\Addressable;


class School extends Model
{
  use Addressable, CreatedBy, UpdatedBy;

  protected $guarded = [];
}
