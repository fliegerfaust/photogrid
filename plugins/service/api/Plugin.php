<?php namespace Service\Api;

use System\Classes\PluginBase;

/**
 * Api Plugin Information File
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
            'name'        => 'CloudService API',
            'description' => 'API for cloud web service PhotoGrid.',
            'author'      => 'Denis B',
            'icon'        => 'icon-cloud'
        ];
    }

}
