<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static \App\Models\Nota create(array $attributes = [])
 * @method static \Illuminate\Database\Eloquent\Collection all($columns = ['*'])
 */
class Nota extends Model
{
    protected $fillable = ['nota', 'cor'];
}
