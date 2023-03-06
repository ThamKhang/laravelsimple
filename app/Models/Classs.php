<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classs extends Model
{
    use HasFactory;

    protected $table = 'class';
    protected $primaryKey = 'id_class';
    protected $fillable = ['quality'];
    public $timestamps = true;
    protected $hidden = ['created_at', 'updated_at'];

    public function books()
    {
        return $this->hasMany(Book::class, 'id_class', 'id_class');
    }
}
