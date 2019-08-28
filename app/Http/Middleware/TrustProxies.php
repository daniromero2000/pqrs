<?php

namespace App\Http\Middleware;

<<<<<<< HEAD
use Fideloper\Proxy\TrustProxies as Middleware;
use Illuminate\Http\Request;
=======
use Illuminate\Http\Request;
use Fideloper\Proxy\TrustProxies as Middleware;
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
<<<<<<< HEAD
     * @var array
=======
     * @var array|string
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
     */
    protected $proxies;

    /**
     * The headers that should be used to detect proxies.
     *
<<<<<<< HEAD
     * @var string
=======
     * @var int
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
     */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;
}
