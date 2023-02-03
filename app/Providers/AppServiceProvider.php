<?php

namespace App\Providers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFour();

        Session::put('selected_categories', []);
        Session::put('query', '');
        // Session::put('selected_category', '');

        if (!Collection::hasMacro('paginate')) {

            Collection::macro(
                'paginate',
                function ($perPage = 15, $page = null, $options = []) {
                    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
                    return (new LengthAwarePaginator(
                        $this->forPage($page, $perPage),
                        $this->count(),
                        $perPage,
                        $page,
                        $options
                    ))->withPath('')->onEachSide(0);
                }
            );
        }
    }
}
