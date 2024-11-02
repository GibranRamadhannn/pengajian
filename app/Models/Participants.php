<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{
    use HasFactory;
    protected $table = 'participants';

    protected $fillable = [
        'name',
        'age',
        'phone',
        'gender',
        'status_check_in',
        'lunch_voucher_1',
        'lunch_voucher_2',
        'barcode_check_in_1',
        'barcode_check_out_1',
        'barcode_check_in_2',
        'barcode_check_out_2'
    ];
}
