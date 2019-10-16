<?php

namespace Stickee\LaravelSftpDualAuth;

use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;
use Storage;

/**
 * SftpDualAuthServiceProvider
 */
class SftpDualAuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Create an instance of the sftp dual auth driver.
         *
         * @param \Illuminate\Foundation\Application $app The app container
         * @param array $config The disk configuration
         *
         * @return \Illuminate\Contracts\Filesystem\Filesystem
         */
        Storage::extend('sftp_dual_auth', function (Application $app, array $config) {
            $adapter = new SftpDualAuthAdapter($config);
            $filesystem = new Filesystem($adapter, count($config) > 0 ? $config : null);

            return new FilesystemAdapter($filesystem);
        });
    }
}
