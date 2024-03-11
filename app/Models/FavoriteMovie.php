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
        'type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getMovieIdByUser($where = 'movie')
    {
        return FavoriteMovie::select('movie_id', 'type')
            ->where('user_id', Auth::user()->id)
            ->where('type', $where)
            ->get();
    }
}
