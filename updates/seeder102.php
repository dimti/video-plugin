<?php namespace Dimti\Video\Updates;

use Dimti\Video\Models\Settings;
use Seeder;
use System\Models\File;

class Seeder102 extends Seeder
{
    public function run()
    {
        $settings = Settings::instance();

        assert($settings instanceof Settings);

        if (!$settings->preview) {
            $settings->preview = (new File())->fromFile(
                dirname(__FILE__) .
                '/../assets/images/video_preview_placeholder.jpg'
            );

            $settings->save();
        }
    }
}