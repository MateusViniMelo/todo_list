<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';
    protected $fillable = ["title", "description", "date", "is_completed", "is_important", "user_id"];

  

    protected $casts = [
        "title" => "string",
        "description" => "string",
        "date" => "string",
        "is_completed" => "boolean",
        "is_important" => "boolean",
        "user_id" => "integer",
    ];

    public function scopeByUserAuth(Builder $query): Builder
    {

        return $query->where("user_id", Auth::user()->id);
    }
    public function scopeWhereImportant(Builder $query): Builder
    {

        return $query->where("is_important", true);
    }

    public function scopeWhereCompleted(Builder $query): Builder
    {

        return $query->where("is_completed", true);
    }
    public function isFromAuthUser(): bool
    {

        return $this->user_id == Auth::user()->id;

    }

   
}
