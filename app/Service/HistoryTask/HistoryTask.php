<?php

namespace App\Service\HistoryTask;

use App\Models\TasksHistory;

class HistoryTask
{
    public function saveHistoryTask($id,$array)
    {
        $history = new TasksHistory();
        $history->task_id = $id;
        $history->creator_id = $array['creator_id'];
        $history->title = $array['title'];
        $history->content = $array['content'];
        $history->status_id = $array['status_id'];
        $history->updated_at = $array['updated_at'];
        $history->save();
    }

}
