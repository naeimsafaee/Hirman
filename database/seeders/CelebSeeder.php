<?php

namespace Database\Seeders;

use App\Models\Celeb;
use Illuminate\Database\Seeder;

class CelebSeeder extends Seeder
{
    public function run()
    {
        $celebs = [
            [
                'name' => 'مهران مدیری',
                'image' => 'assets/photo/mehranmodiri.png',
                'job' => 'director',
            ],
            [
                'name' => 'ویشکا آسایش',
                'image' => 'assets/photo/vishka-asayesh.png',
                'job' => 'writer',
            ],
            [
                'name' => 'بهنام تشکر',
                'image' => 'assets/photo/behnam-tashakor.png',
                'job' => 'producer',
            ],
            [
                'name' => 'پیمان قاسم خانی',
                'image' => 'assets/photo/peyman-ghasemkhani.png',
                'job' => 'actor',
            ],
            [
                'name' => 'سیما تیرانداز',
                'image' => 'assets/photo/sima-tirandaz.png',
                'job' => 'actor',
            ],
            [
                'name' => 'گلاره عباسی',
                'image' => 'assets/photo/gelareh-abbasi.png',
                'job' => 'actor',
            ],
            [
                'name' => 'اندیشه فولادوند',
                'image' => 'assets/photo/andisheh-fooladvand.png',
                'job' => 'actor',
            ],
            [
                'name' => 'نیما شعبان زاده',
                'image' => 'assets/photo/nima-shabanzadeh.png',
                'job' => 'actor',
            ],
        ];
        foreach($celebs as $celeb)
        {
            Celeb::query()->create([
                'name' => $celeb['name'],
                'image' => $celeb['image'],
                'job' => $celeb['job'],
            ]);
        }
    }
}
