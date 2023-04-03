<?php

declare(strict_types=1);

namespace Konekt\Search\Tests\Examples;

use Illuminate\Database\Eloquent\Model;

class VideoJson extends Model
{
    protected $table = 'video_json';

    protected $casts = ['title' => 'array'];

    public function searchType()
    {
        return 'awesome_video';
    }
}
