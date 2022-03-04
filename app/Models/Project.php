<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Http\Concerns\HasUUID;

class Project extends Model
{
    use HasFactory;
    use HasUUID;
    protected $fillable = ['name', 'duration', 'description', 'level', 'status'];

    /*
    |------------------------------------------------------------------------------------
    | Relations
    |------------------------------------------------------------------------------------
    */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withTimeStamps();
    }
}
