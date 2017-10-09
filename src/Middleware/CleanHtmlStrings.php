<?php

namespace GRGroup\GRSupport\Middleware;

use Closure;
use GRGroup\GRSupport\Facades\Support;

class CleanHtmlStrings
{
    public function handle($request, Closure $next)
    {
        Support::cleanHtmlStringsFromRequest($request);
        return $next($request);
    }
}
