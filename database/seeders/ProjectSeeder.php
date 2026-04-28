<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Smart City Initiative',
                'slug' => 'smart-city-initiative',
                'category' => 'Public Sector',
                'excerpt' => 'Transforming urban infrastructure through human-centered design and data-driven insights.',
                'content' => '<h1>Smart City Initiative</h1><p>Transforming urban infrastructure through human-centered design and data-driven insights.</p>',
                'image' => '',
                'stats' => [['value' => '85%', 'label' => 'Citizen Satisfaction']],
                'is_featured' => true,
                'status' => 'published',
                'order' => 1,
            ],
            [
                'title' => 'Digital Banking Platform',
                'slug' => 'digital-banking-platform',
                'category' => 'Financial Services',
                'excerpt' => 'Reimagining banking experience for the next generation of customers.',
                'content' => '<h1>Digital Banking Platform</h1><p>Reimagining banking experience for the next generation of customers.</p>',
                'image' => '',
                'stats' => [['value' => '2M+', 'label' => 'Active Users']],
                'is_featured' => false,
                'status' => 'published',
                'order' => 2,
            ],
            [
                'title' => 'Healthcare Innovation Lab',
                'slug' => 'healthcare-innovation-lab',
                'category' => 'Healthcare',
                'excerpt' => 'Designing patient-centered healthcare solutions for better outcomes.',
                'content' => '<h1>Healthcare Innovation Lab</h1><p>Designing patient-centered healthcare solutions for better outcomes.</p>',
                'image' => '',
                'stats' => [['value' => '40%', 'label' => 'Efficiency Gain']],
                'is_featured' => false,
                'status' => 'published',
                'order' => 3,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
