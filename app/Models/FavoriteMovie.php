<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class FavoriteMovie extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'movie_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getMovieIdByUser()
    {
        return FavoriteMovie::where('user_id', Auth::id())->orderBy('created_at', 'desc')->pluck('movie_id')->toArray();
    }
}
