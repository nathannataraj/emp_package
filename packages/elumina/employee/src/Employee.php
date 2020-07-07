<?php

namespace Elumina\Employee;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $fillable = [
        'fullName', 'email', 'profile', 'address', 'status'
    ];
}
