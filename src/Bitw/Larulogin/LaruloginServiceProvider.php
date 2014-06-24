<?php namespace Bitw\Larulogin;

use Illuminate\Support\ServiceProvider;

class LaruloginServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

    public function boot()
    {
        $this->package('bitw/larulogin');

        include __DIR__ . '/../../routes.php';

        $this->addFormMacro();
    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

    public function addFormMacro()
    {
        app('form')->macro('uLogin', function($options = array())
        {
            if(\Auth::check()) return '';

            if(!isset($options['mode'])) $options['mode'] = app('config')->get('larulogin::mode');

            $configOptions = app('config')->get('larulogin::modes', array());

            $mergedOptions = ['options' => array_merge($configOptions, $options)];

            $options = $mergedOptions['options'][$options['mode']];

            $data_ulogin = str_replace('%2C', ',', http_build_query($options, '', ';'));
/*
            $data = array(
                'options'		=> $mergedOptions,
            );
*/
            $view = app('config')->get('larulogin::views.ulogin');

            return \View::make($view, $options, ['data_ulogin'=>$data_ulogin]);
        });
    }

}
