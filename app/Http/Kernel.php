    <?php
namespace App\Http;

use App\Http\Middleware\Tenants_Middleware;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The middleware classes that are global to the entire application.
     *
     * @var array
     */
    protected $middleware = [
        // Global middleware...
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\Tenants_Middleware::class, // Your custom middleware
            // Other middleware...
        ],

        'api' => [
            // API middleware...
        ],
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'tenants' => \App\Http\Middleware\Tenants_Middleware::class, // Route middleware
        // Other route middleware...
    ];
}
