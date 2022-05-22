<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Bag;

class Project extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'request', 'details', 'state','intialcost'
    ];

    /**
     * Get the user that owns the Poject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get all of the eng for the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function eng()
    {
        return $this->BelongsTo(User::class, 'eng_id', 'id');
    }

    /**
     * Get all of the Bag for the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Bags() 
    {
        return $this->hasMany(Bag::class, 'project_id', 'id');
    }
    /**
     * Get all of the File for the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Files() 
    {
        return $this->hasMany(File::class, 'project_id', 'id');
    }
}
