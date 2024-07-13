<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public static function resetPriorities()
    {
        DB::transaction(function () {
            $priority = 1;

            self::orderBy('priority', 'asc')->each(function ($task) use (&$priority) {
                $task->priority = $priority++;

                $task->save();
            });
        });
    }
}
