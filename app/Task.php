<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','description'];

    /**
     * Get the user that owns the task.
     */
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
