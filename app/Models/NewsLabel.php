<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsLabel extends Model
{
    use HasFactory;
    protected $table = 'news_label_fix';
    public $timestamps = false;
    protected $fillable = [
  'title',
  'kota',
  'label'
];
}
