<?php namespace Dimti\Video\Models;

use Model;
use System\Behaviors\SettingsModel;
use System\Models\File;

class Settings extends Model
{
    public $implement = [SettingsModel::class];

    // A unique code
    public $settingsCode = 'dimti_video_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';

    public $attachOne = [
        'preview' => File::class,
    ];
}
