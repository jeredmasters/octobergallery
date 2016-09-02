<?php namespace JeredMasters\Gallery;

use Backend;
use Lang;
use System\Classes\PluginBase;

/**
 * Gallery Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Advanced Gallery',
            'description' => 'Manage your set of images here, display is themes concern!',
            'author'      => 'Jered Masters',
            'icon'        => 'icon-picture-o'
        ];
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            //'Increative\Gallery\Components\Galleries' => 'gallery',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'jeredmasters.gallery.manage' => [
                'tab' => 'Gallery',
                'label' => Lang::get('increative.gallery::lang.plugin.permissions.manage'),
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
        return [
            'gallery' => [
                'label'       => 'Gallery',
                'url'         => Backend::url('jeredmasters/gallery/galleries'),
                'icon'        => 'icon-picture-o',
                'permissions' => ['jeredmasters.gallery.manage'],
                'order'       => 500,
            ],
        ];
    }

}
