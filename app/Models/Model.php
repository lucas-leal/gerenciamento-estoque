<?php

namespace App\Models;

use Faker\Provider\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\SoftDeletes;

abstract class Model extends EloquentModel
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;

    public function save(array $options = [])
    {
        $this->id = $this->id ?? Uuid::uuid();

        parent::save($options);
    }
}
