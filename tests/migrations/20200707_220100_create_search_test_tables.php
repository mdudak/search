<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('video_id')->nullable();
            $table->string('title');
            $table->date('published_at')->nullable();
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('post_id');
            $table->string('body');
            $table->date('published_at')->nullable();
            $table->timestamps();
        });

        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->date('published_at')->nullable();
            $table->timestamps();
        });

        Schema::create('video_json', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->json('title');
            $table->string('subtitle')->nullable();
            $table->date('published_at')->nullable();
            $table->timestamps();
        });

        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('subtitle');
            $table->string('body');

            $table->fullText('title');
            $table->fullText(['title', 'subtitle']);
            $table->fullText(['title', 'subtitle', 'body']);

            $table->unsignedInteger('video_id')->nullable();

            $table->timestamps();
        });

        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('body')->nullable();

            $table->fullText('title');
            $table->fullText(['title', 'subtitle']);
            $table->fullText(['title', 'subtitle', 'body']);

            $table->unsignedInteger('video_id')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('videos');
        Schema::dropIfExists('video_json');
        Schema::dropIfExists('blogs');
        Schema::dropIfExists('pages');
    }
};
