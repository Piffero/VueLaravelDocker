<?php

namespace App\modals;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable = [
        'CustomerFirstName',
        'CustomerLastName',
        'CustomerEmail',
        'CustomerGender',
        'CustomerIpAddress',
        'CustomerCompany',
        'CustomerCity',
        'CustomerTitle',
        'CustomerWebSite'
    ];
}
