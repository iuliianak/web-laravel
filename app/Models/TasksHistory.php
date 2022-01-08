<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TasksHistory extends Model
{
    protected $table = 'tasks_history';
    public $timestamps = false;

    public function tasks()
    {
        return $this->belongsTo(Task::class);
    }

    public function statuses()
    {
        return $this->belongsTo(Status::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'creator_id_foreign2');
    }

}
