<?php

namespace Slim\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * Class SessionMiddleware
 * 
 * @author Andrew Dyer <andrewdyer@outlook.com>
 * @category Middleware
 * @see https://github.com/andrewdyer/slim3-session
 */
class SessionMiddleware
{

    /**
     * 
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param callable $next
     * @return Response
     */
    public function __invoke(Request $request, Response $response, callable $next)
    {
        if (session_id() == "") {
            session_start();
        }

        $response = $next($request, $response);

        return $response;
    }

}
