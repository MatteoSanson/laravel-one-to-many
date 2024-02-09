<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        for ($i = 0; $i < 25; $i++){
            $project = new Project();
            $project->title = $faker->sentence(3);
            $project->type = $faker->randomElement(['html', 'javascript', 'php', 'laravel', 'css', 'vue', 'vuejs', 'c++', 'vite', 'react']);
            $project->visibility = $faker->randomElement(['public', 'private']);
            $project->slug = Str::of($project->title)->slug('-');

            $project->save();
        }
        
    }
}
