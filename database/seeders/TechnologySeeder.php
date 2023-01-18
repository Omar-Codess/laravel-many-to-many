<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['html', 'css', 'sass', 'Vue', 'JS', 'Bootstrap', 'php', 'Laravel'];

        foreach ($technologies as $technology) {
            $new_technology = new Technology();
            $new_technology->title = $technology;
            $new_technology->slug = Str::slug($new_technology->title, '-');
            $new_technology->save();
        }
    }
}
