<?php

namespace Rabianr\Auth;

use Closure;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Illuminate\Support\Collection;

class HandleAuthBasic
{
    /** @var Collection $credentials */
    protected $credentials;

    public function __construct()
    {
        $this->credentials = collect(config('authbasic.credentials'));
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     * @throws UnauthorizedHttpException
     */
    public function handle($request, Closure $next)
    {
        if (! $request->getUser()
            || ! $this->credentials->containsStrict([ $request->getUser(), $request->getPassword() ])
        ) {
            throw new UnauthorizedHttpException('Basic', 'Invalid credentials.');
        }

        return $next($request);
    }
}
