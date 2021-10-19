<?php

namespace Rabianr\Auth;

use Closure;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Illuminate\Support\Collection;

class HandleAuthBasic
{
    /** @var Collection $users */
    protected $users;

    public function __construct()
    {
        $this->users = collect(config('authbasic.users'));
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
            || ! $this->users->containsStrict([ $request->getUser(), $request->getPassword() ])
        ) {
            throw new UnauthorizedHttpException('Basic', 'Invalid credentials.');
        }

        return $next($request);
    }
}
