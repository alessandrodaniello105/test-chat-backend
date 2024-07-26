<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Message;

class Chatter extends Model
{
    use HasFactory;

    protected $fillable = ["username", "ip_address", "is_banned"];

    public function messages():BelongsToMany {
        return $this->belongsToMany(Message::class, "chatter_message", "chatter_id", "message_id");
    }
}
