# Stickee Laravel SFTP Dual Auth

Provides a dual-authentication filesystem driver for [Laravel](https://laravel.com/).
The built-in sftp driver supports key-based login and password-based login, but not both at the same time. This driver provides that capability.

## Installation

Install with composer:

`composer require stickee/laravel-sftp-dual-auth`

If you don't use auto-discovery, add the SftpDualAuthServiceProvider to the providers array in *config/app.php*

```
Stickee\LaravelSftpDualAuth\SftpDualAuthServiceProvider::class,
```

## Usage

You can noew use *sftp_dual_auth* as a disk driver in *config/filesystems.php*

```
 'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'my_dual_auth' => [
            'driver' => 'sftp_dual_auth',
            'host' => env('MY_SFTP_HOST'),
            'username' => env('MY_SFTP_USERNAME'),
            'password' => env('MY_SFTP_PASSWORD'),
            'privateKey' => env('MY_SFTP_PRIVATE_KEY'),
            'root' => env('MY_SFTP_ROOT', ''),
        ],

    ]
```

See the [League Flysystem SFTP documentation](https://flysystem.thephpleague.com/docs/adapter/sftp/)  ([GitHub](https://github.com/thephpleague/flysystem-sftp)) for information on the configuration options.
