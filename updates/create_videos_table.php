<?php namespace Dimti\Video\Updates;

use Dimti\Video\Models\Video;
use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateVideosTable Migration
 */
class CreateVideosTable extends Migration
{
    public function up()
    {
        Schema::create('dimti_video_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('youtube_short_url');
            $table->string('youtube_embed_url');
            $table->string('video_src_url');
            $table->unsignedInteger('record_id');
            $table->string('record_type');
        });
    }

    public function down()
    {
        Video::has('preview')->with('preview')->get()->each(function (Video $video) {
            $video->preview->delete();
        });

        Schema::dropIfExists('dimti_video_videos');
    }
}