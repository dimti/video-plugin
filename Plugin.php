<?php namespace Dimti\Video;

use Backend;
use Dimti\Video\Classes\Registration\ExtendSettings;
use Dimti\Video\Classes\Registration\ExtendTwig;
use System\Classes\PluginBase;

/**
 * video Plugin Information File
 */
class Plugin extends PluginBase
{
    use ExtendTwig;
    use ExtendSettings;

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'video',
            'description' => 'No description provided yet...',
            'author'      => 'dimti',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Dimti\Video\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'dimti.video.some_permission' => [
                'tab' => 'video',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'video' => [
                'label'       => 'video',
                'url'         => Backend::url('dimti/video/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['dimti.video.*'],
                'order'       => 500,
            ],
        ];
    }
}
