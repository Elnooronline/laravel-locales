<?php

namespace Tests;

use Elnooronline\LaravelLocales\Facades\Locales;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Elnooronline\LaravelLocales\Providers\LocalesServiceProvider;

class TestCase extends OrchestraTestCase
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->app['config']->set([
            'locales' => [
                'en' => [
                    'code' => 'en',
                    'name' => 'English',
                    'dir' => 'ltr',
                    'flag' => '/images/flages/us.png'
                ],
                'ar' => [
                    'code' => 'ar',
                    'name' => 'العربية',
                    'dir' => 'rtl',
                    'flag' => '/images/flages/sa.png'
                ],
            ]
        ]);
    }

    /**
     * Load package service provider
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [LocalesServiceProvider::class];
    }

    /**
     * Load package alias
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Locales' => Locales::class,
        ];
    }
}