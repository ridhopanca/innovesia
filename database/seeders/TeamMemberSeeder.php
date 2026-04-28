<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            [
                'name' => 'Ahmad Fauzi',
                'slug' => 'ahmad-fauzi',
                'role' => 'Founder & CEO',
                'bio' => 'Visionary leader with 15+ years of innovation strategy experience.',
                'image' => '',
                'category' => 'Leadership',
                'order' => 1,
                'status' => 'published',
            ],
            [
                'name' => 'Sarah Chen',
                'slug' => 'sarah-chen',
                'role' => 'Head of Design Research',
                'bio' => 'Expert in ethnographic research and human-centered design methodologies.',
                'image' => '',
                'category' => 'Research',
                'order' => 2,
                'status' => 'published',
            ],
            [
                'name' => 'Budi Santoso',
                'slug' => 'budi-santoso',
                'role' => 'Innovation Strategist',
                'bio' => 'Specializes in digital transformation and innovation ecosystem building.',
                'image' => '',
                'category' => 'Strategy',
                'order' => 3,
                'status' => 'published',
            ],
            [
                'name' => 'Dewi Putri',
                'slug' => 'dewi-putri',
                'role' => 'Policy Advisor',
                'bio' => 'Former government advisor with deep expertise in public sector innovation.',
                'image' => '',
                'category' => 'Policy',
                'order' => 4,
                'status' => 'published',
            ],
        ];

        foreach ($members as $member) {
            TeamMember::create($member);
        }
    }
}
