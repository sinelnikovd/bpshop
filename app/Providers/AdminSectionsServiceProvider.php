<?php

namespace App\Providers;

use SleepingOwl\Admin\Contracts\Widgets\WidgetsRegistryInterface;
use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        \App\User::class => 'App\Http\Sections\Users',
        \App\Manufacturer::class => 'App\Http\Sections\Manufacturers',
        \App\Categorie::class => 'App\Http\Sections\Categories',
        \App\Mark::class => 'App\Http\Sections\Marks',
        \App\Auto::class => 'App\Http\Sections\Autos',
        \App\Product::class => 'App\Http\Sections\Products',
        \App\Order::class => 'App\Http\Sections\Orders',
        \App\Page::class => 'App\Http\Sections\Pages',
    ];

    /**
     * Register sections.
     *
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
    	//

        parent::boot($admin);

        $this->app->call([$this, 'registerViews']);
    }

    /**
     * @var array
     */
    protected $widgets = [
        \App\Widgets\OrderChart::class,
    ];

    /**
     * @param WidgetsRegistryInterface $widgetsRegistry
     */
    public function registerViews(WidgetsRegistryInterface $widgetsRegistry)
    {
        foreach ($this->widgets as $widget) {
            $widgetsRegistry->registerWidget($widget);
        }
    }
}
