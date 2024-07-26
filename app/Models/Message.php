<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chatter;
use Illuminate\Database\Eloquent\Casts\AsCollection;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['content'];




    // IF SOMETHING DOESN'T WORK, TRY TO DELETE " casts() "
    /**
     * Summary of casts
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'options' => AsCollection::using(Message::class)
        ];
    }


    public function chatter() {
        return $this->belongsToMany(Chatter::class);
    }
}
