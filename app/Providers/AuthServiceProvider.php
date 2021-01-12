<?php

namespace App\Providers;

use App\Policies\CategoryPolicy;
use App\Product;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->defineGateCategory();
        $this->defineGateProduct();

        Gate::define('menu-list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.list_menu'));
         });

        //  Gate::define('product-edit', function ($user, $id) {
            //  $product = Product::find($id);
            //  dd($id);
            // return $user->checkPermissionAccess(config('permissions.access.list_menu'));
        //  });
    }

    public function defineGateCategory(){
        Gate::define('category-list', 'App\Policies\CategoryPolicy@view');
        Gate::define('category-create', 'App\Policies\CategoryPolicy@create');
        Gate::define('category-edit', 'App\Policies\CategoryPolicy@update');
        Gate::define('category-delete', 'App\Policies\CategoryPolicy@delete');
   
    }

    public function defineGateProduct(){
        Gate::define('product-edit', 'App\Policies\ProductPolicy@update');
   
    }
}
