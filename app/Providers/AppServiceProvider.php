<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::directive('price', function ($amount) {
            return "<?php echo 'Rp ' . number_format($amount, 0, ',', '.'); ?>";
        });

        Blade::directive('sizeLabel', function ($size) {
            return "<?php echo \App\Providers\AppServiceProvider::sizeLabel($size); ?>";
        });
    }

    public static function sizeLabel($size)
    {
        $sizes = [
            '3m' => '3 - 6 bulan',
            '6m' => '6 - 9 bulan',
            '9m' => '9 - 12 bulan',
            '12m' => '12 - 18 bulan',
            '18m' => '18 - 24 bulan',
            '2t' => '2 tahun',
            '3t' => '3 tahun',
            '4t' => '4 tahun',
            '5t' => '5 tahun',
            'xs-a' => 'Anak - XS',
            's-a' => 'Anak - S',
            'm-a' => 'Anak - M',
            'l-a' => 'Anak - L',
            'xs-r' => 'Remaja - XS',
            's-r' => 'Remaja - S',
            'm-r' => 'Remaja - M',
            'l-r' => 'Remaja - L',
            'xs-w' => 'Wanita - XS',
            's-w' => 'Wanita - S',
            'm-w' => 'Wanita - M',
            'l-w' => 'Wanita - L',
            'xl-w' => 'Wanita - XL',
            'xs-p' => 'Pria - XS',
            's-p' => 'Pria - S',
            'm-p' => 'Pria - M',
            'l-p' => 'Pria - L',
            'xl-p' => 'Pria - XL',
        ];

        return $sizes[$size] ?? $size;
    }
}
