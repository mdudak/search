<?php

declare(strict_types=1);

namespace Konekt\Search\Tests;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
