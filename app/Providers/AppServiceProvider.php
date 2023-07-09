<?php

namespace App\Providers;

use App\Http\Resources\QuoteResource;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // => Cara untuk menghilangkan envelop pada saat data API ditampilkan adalah sebagai berikut
        // QuoteResource::withoutWrapping(); // Hanya pada class QuoteResource
        // atau
        // JsonResource::withoutWrapping(); // Untuk semua class yang mewarisi JsonResource
    }
}
