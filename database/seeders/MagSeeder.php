<?php

namespace Database\Seeders;

use App\Models\Mag;
use Illuminate\Database\Seeder;

class MagSeeder extends Seeder
{

    public function run()
    {
        for($i=0;$i<20;$i++)
        {
            if($i%2 == 0) {
                $isVideo = 0;
                $image = 'mags\August2021\hAcSiWsDLjf8lhj6H2pI.jpg';
                $video = null;
            } else {
                $isVideo = 1;
                $image = 'mags\August2021\hAcSiWsDLjf8lhj6H2pI.jpg';
                $video = '[{"download_link":"festivals\\August2021\\YLyqvO3uHpAUqpjCLQXB.mp4","original_name":"123.mp4"}]';
            }
            switch ($i%3) {
                case 0:
                    $type = "blog";
                    break;
                case 1:
                    $type = "internal";
                    break;
                case 2:
                    $type = "foreign";
                    break;
            }
            Mag::query()->create([
                'title' => 'خبر و مقاله ' . $i,
                'content' => 'ورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز وورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و',
                'isVideo' => $isVideo,
                'video' => $video,
                'image' => $image,
                'type' => $type
            ]);
        }
    }
}
