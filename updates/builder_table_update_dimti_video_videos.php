<?php namespace Dimti\Video\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDimtiVideoVideos extends Migration
{
    public function up()
    {
        Schema::table('dimti_video_videos', function($table)
        {
            $table->string('youtube_url', 255);
        });
    }
    
    public function down()
    {
        Schema::table('dimti_video_videos', function($table)
        {
            $table->dropColumn('youtube_url');
        });
    }
}
