<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopularityRating extends Model
{
    use HasFactory;
    protected $fillable = [
        'word', 'positive_results', 'negative_results', 'popularity_rating'
    ];
}
