<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function taskshistory()
    {
        return $this->hasMany(TasksHistory::class);
    }

    public function statuses()
    {
        return $this->belongsTo(Status::class);
    }

    public function labels()
    {
        return $this->belongsToMany(Label::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class,'creator_id_foreign');
    }
}
