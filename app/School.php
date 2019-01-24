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

  public function contact()
  {
      return $this->belongsTo(User::class, 'admin_id');
  }

  public function delete()
  {
      try {
          parent::delete();
      } catch (\Exception $e) {
          throw new ConflictHttpException(__(
              'The school is being used in the system and cannot be deleted'
          ));
      }

      return ['message' => 'The school was successfully deleted'];
  }

}
