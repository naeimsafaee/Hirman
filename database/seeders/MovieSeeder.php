<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<20;$i++)
        {
            Movie::query()->create([
                'title' => 'جدای ' . $i,
                'en_title' => 'Sep  ' . $i,
                'content' => 'ورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز وورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و',
                'image' => 'movies\August2021\jswv75nGpycxEy3gbJ8Y.jpg',
                'festival_winner' => ($i%2==0) ? 1 : 0,
                'release_at' => date('Y-m-d H:i:s', strtotime("+1" .$i." day"))
            ]);
        }
    }
}
