<?php

namespace App\Models;

use App\Http\Concerns\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;
    use HasUUID;
    protected $fillable = ['name'];
    /*
|------------------------------------------------------------------------------------
|Relations
|------------------------------------------------------------------------------------
*/

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
    /*
|------------------------------------------------------------------------------------
| Scope
|------------------------------------------------------------------------------------
*/
    public function scopeMine($q)
    {
        return $q->where('user_id', auth()->id());
    }
    /*
|------------------------------------------------------------------------------------
| Attributes
|------------------------------------------------------------------------------------
*/
    public function getIsMineAttribute()
    {
        return $this->user_id === auth()->id();
    }
}
