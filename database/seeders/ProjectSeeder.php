<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'name' => 'Project Alpha',
                'description' => 'This is a sample project description.',
            ],
            [
                'name' => 'Project Beta',
                'description' => 'This is another sample project description.',
            ],
            [
                'name' => 'Project Gamma',
                'description' => 'Yet another sample project description.',
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
