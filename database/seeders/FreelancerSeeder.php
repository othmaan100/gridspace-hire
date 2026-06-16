<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FreelancerSeeder extends Seeder
{
    public function run(): void
    {
        // AI: "Generate 10 realistic freelancer profiles with varied skills, hourly rates, ratings and bios for a remote job board seeder"
        $freelancers = [
            [
                'name'           => 'Aisha Bello',
                'title'          => 'Full Stack Laravel Developer',
                'skills'         => json_encode(['Laravel', 'Vue.js', 'MySQL', 'REST API']),
                'hourly_rate'    => 45.00,
                'rating'         => 4.9,
                'bio'            => 'I build scalable web apps with clean code and fast delivery. 5+ years building SaaS products for startups.',
                'avatar'         => 'https://i.pravatar.cc/150?img=1',
                'jobs_completed' => 38,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'name'           => 'James Okafor',
                'title'          => 'Backend PHP Developer',
                'skills'         => json_encode(['PHP', 'Laravel', 'PostgreSQL', 'Docker']),
                'hourly_rate'    => 38.00,
                'rating'         => 4.7,
                'bio'            => 'Specialist in building robust APIs and backend systems. Comfortable with high-traffic applications and DevOps basics.',
                'avatar'         => 'https://i.pravatar.cc/150?img=2',
                'jobs_completed' => 52,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'name'           => 'Sara Mensah',
                'title'          => 'UI/UX Designer & Frontend Dev',
                'skills'         => json_encode(['Figma', 'Tailwind CSS', 'React', 'HTML/CSS']),
                'hourly_rate'    => 50.00,
                'rating'         => 4.8,
                'bio'            => 'I turn ideas into beautiful, user-friendly interfaces. Experienced in design systems, prototyping, and frontend implementation.',
                'avatar'         => 'https://i.pravatar.cc/150?img=5',
                'jobs_completed' => 29,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'name'           => 'Chidi Nwosu',
                'title'          => 'Data Analyst & Python Developer',
                'skills'         => json_encode(['Python', 'Pandas', 'SQL', 'Power BI', 'Excel']),
                'hourly_rate'    => 35.00,
                'rating'         => 4.6,
                'bio'            => 'I help businesses make sense of their data. From dashboards to automated reports, I deliver clear insights fast.',
                'avatar'         => 'https://i.pravatar.cc/150?img=3',
                'jobs_completed' => 41,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'name'           => 'Linda Tran',
                'title'          => 'WordPress & E-commerce Developer',
                'skills'         => json_encode(['WordPress', 'WooCommerce', 'PHP', 'Elementor', 'SEO']),
                'hourly_rate'    => 30.00,
                'rating'         => 4.5,
                'bio'            => 'Fast, reliable WordPress developer with a focus on e-commerce. I build stores that convert and load fast.',
                'avatar'         => 'https://i.pravatar.cc/150?img=9',
                'jobs_completed' => 67,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'name'           => 'Emeka Eze',
                'title'          => 'Mobile App Developer (Flutter)',
                'skills'         => json_encode(['Flutter', 'Dart', 'Firebase', 'REST API']),
                'hourly_rate'    => 42.00,
                'rating'         => 4.7,
                'bio'            => 'Cross-platform mobile developer with apps live on both iOS and Android. I ship quality apps on time.',
                'avatar'         => 'https://i.pravatar.cc/150?img=4',
                'jobs_completed' => 23,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'name'           => 'Grace Kim',
                'title'          => 'DevOps & Cloud Engineer',
                'skills'         => json_encode(['AWS', 'Docker', 'CI/CD', 'Linux', 'Terraform']),
                'hourly_rate'    => 55.00,
                'rating'         => 4.9,
                'bio'            => 'I automate infrastructure and deployment pipelines. Expert in AWS, containerization, and keeping systems running smoothly.',
                'avatar'         => 'https://i.pravatar.cc/150?img=6',
                'jobs_completed' => 31,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'name'           => 'Tunde Adeyemi',
                'title'          => 'SEO & Digital Marketing Specialist',
                'skills'         => json_encode(['SEO', 'Google Ads', 'Content Strategy', 'Analytics']),
                'hourly_rate'    => 28.00,
                'rating'         => 4.4,
                'bio'            => 'I grow organic traffic and manage paid campaigns that deliver ROI. Worked with e-commerce and SaaS brands globally.',
                'avatar'         => 'https://i.pravatar.cc/150?img=7',
                'jobs_completed' => 55,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'name'           => 'Amara Diallo',
                'title'          => 'Technical Writer & Documentation Specialist',
                'skills'         => json_encode(['Technical Writing', 'API Docs', 'Markdown', 'Notion']),
                'hourly_rate'    => 25.00,
                'rating'         => 4.6,
                'bio'            => 'I write developer docs, user guides, and API references that are clear and actually useful. Former software engineer.',
                'avatar'         => 'https://i.pravatar.cc/150?img=8',
                'jobs_completed' => 44,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'name'           => 'Kevin Osei',
                'title'          => 'React & Node.js Developer',
                'skills'         => json_encode(['React', 'Node.js', 'MongoDB', 'GraphQL', 'TypeScript']),
                'hourly_rate'    => 48.00,
                'rating'         => 4.8,
                'bio'            => 'Full stack JavaScript developer specializing in modern React apps with Node backends. I love clean architecture and fast UIs.',
                'avatar'         => 'https://i.pravatar.cc/150?img=10',
                'jobs_completed' => 36,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ];

        DB::table('freelancers')->insert($freelancers);
    }
}