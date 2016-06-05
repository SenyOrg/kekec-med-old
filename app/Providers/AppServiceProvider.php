<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Form::component('bsText', 'components.form.text', [
            'name',
            'label' => 'ReplaceMe',
            'namespace' => 'formData',
            'value' => null,
            'attributes' => [
                'placeholder' => 'REPLACEME',
            ]
        ]);

        \Form::component('bsFile', 'components.form.file', [
            'name',
            'label' => 'ReplaceMe',
            'namespace' => 'formData',
            'value' => null,
            'attributes' => [
                'placeholder' => 'REPLACEME',
            ]
        ]);

        \Form::component('bsDate', 'components.form.datemask', [
            'name',
            'label' => 'ReplaceMe',
            'namespace' => 'formData',
            'value' => null,
            'attributes' => [
                'placeholder' => 'REPLACEME',
            ]
        ]);

        \Html::macro('activeState', function ($route) {
            return strpos(\Request::url(), route($route)) !== false ? 'active' : '';
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
