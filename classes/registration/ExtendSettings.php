<?php namespace Dimti\Video\Classes\Registration;

use Dimti\Video\Models\Settings;

trait ExtendSettings
{
    public function registerSettings()
    {
        return [
            'settings' => [
                'label' => 'dimti.video::lang.settings.label',
                'description' => 'dimti.video::lang.settings.description',
                'category' => 'dimti.video::lang.settings.category',
                'icon' => 'icon-video',
                'class' => Settings::class,
                'order' => 0,
                'permissions' => ['dimti.video.settings'],
                'keywords' => 'video',
            ],
        ];
    }
}
