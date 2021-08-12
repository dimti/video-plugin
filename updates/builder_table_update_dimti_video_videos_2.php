<?php namespace Dimti\Video\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDimtiVideoVideos2 extends Migration
{
    public function up()
    {
        Schema::table('dimti_video_videos', function($table)
        {
            $table->string('thumbnail_url', 255);
        });
    }
    
    public function down()
    {
        Schema::table('dimti_video_videos', function($table)
        {
            $table->dropColumn('thumbnail_url');
        });
    }
}
