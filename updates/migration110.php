<?php namespace Dimti\Video\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

class Migration110 extends Migration
{
    public function up()
    {
        Schema::table('dimti_video_videos', function ($table) {
            $table->index(['record_type', 'record_id'], 'dimti_video_videos_rt_ri');
        });
    }

    public function down()
    {
        Schema::table('dimti_video_videos', function ($table) {
            $table->dropIndex('dimti_video_videos_rt_ri');
        });
    }
}
