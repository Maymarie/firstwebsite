<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'web/books',       // Exclude this route for creating and listing books
        'web/books/*',     // Exclude all routes with dynamic segments like update and delete
    ];
}
