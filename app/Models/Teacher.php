<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'teachers';

    protected $fillable = ['name','email','phone','address'];
	
}
