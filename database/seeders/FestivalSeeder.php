<?php

namespace Database\Seeders;

use App\Models\Festival;
use Illuminate\Database\Seeder;

class FestivalSeeder extends Seeder
{

    public function run()
    {
        for($i=0;$i<20;$i++)
        {
            if($i%2 == 0) {
                $type = "playtime";
                $festivity_at = date('Y-m-d H:i:s', strtotime("+10 day"));
            } else {
                $type = "news";
                $festivity_at = null;
            }
            Festival::query()->create([
                'title' => 'فستیوال ' . $i,
                'content' => 'ورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز وورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و',
                'isVideo' => 0,
                'video' => null,
                'image' => 'festivals/July2021/QnCENOS5cjU2kpRwhVeZ.jpg',
                'type' => $type,
                'festivity_at'=> $festivity_at
            ]);
        }
    }
}
