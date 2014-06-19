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
            $configOptions = app('config')->get('larulogin::options', array());

            $mergedOptions = array_merge($configOptions, $options);

            $data = array(
                'options'		=> $mergedOptions,
            );

            $view = 'larulogin::ulogin';

            return app('view')->make($view, $data);
        });
    }

}
