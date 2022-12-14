<?php

namespace yzh52521\GeoIP;

use think\Service;

class GeoIPService extends Service
{
    public function register()
    {
        $this->app->bind('geoip', function () {
            return new GeoIP(
                config('geoip', []),
                $this->app->cache
            );
        });

    }

    public function boot()
    {
        $this->commands([
            \yzh52521\GeoIP\console\Publish::class,
            \yzh52521\GeoIP\console\Update::class,
            \yzh52521\GeoIP\console\Clear::class,
        ]);
    }

}