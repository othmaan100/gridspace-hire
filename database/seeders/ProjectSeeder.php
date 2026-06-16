<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        // AI: "Generate past project history for 10 freelancers with realistic titles, client names and earnings"
        $projects = [

            // Aisha Bello (freelancer_id: 1)
            ['freelancer_id' => 1, 'title' => 'Built SaaS Billing Dashboard', 'description' => 'Developed a full billing and subscription management dashboard using Laravel + Vue.js for a fintech startup.', 'client_name' => 'PayNow Inc.', 'amount_earned' => 2200.00, 'completed_at' => '2024-11-15'],
            ['freelancer_id' => 1, 'title' => 'REST API for Mobile App', 'description' => 'Designed and built a secure REST API consumed by an iOS and Android app with JWT authentication.', 'client_name' => 'Trackr Labs', 'amount_earned' => 1800.00, 'completed_at' => '2025-01-20'],
            ['freelancer_id' => 1, 'title' => 'E-learning Platform Backend', 'description' => 'Built course management, enrollment, and progress tracking backend for an online education platform.', 'client_name' => 'LearnSpace', 'amount_earned' => 3100.00, 'completed_at' => '2025-03-10'],

            // James Okafor (freelancer_id: 2)
            ['freelancer_id' => 2, 'title' => 'Dockerized Microservices Setup', 'description' => 'Containerized a monolithic PHP app into microservices using Docker Compose and set up CI/CD on GitHub Actions.', 'client_name' => 'ShipFast Co.', 'amount_earned' => 2500.00, 'completed_at' => '2024-10-05'],
            ['freelancer_id' => 2, 'title' => 'PostgreSQL Performance Tuning', 'description' => 'Optimized slow queries and added indexing for a high-traffic PostgreSQL database, reducing query time by 70%.', 'client_name' => 'DataBridge Ltd.', 'amount_earned' => 1400.00, 'completed_at' => '2025-02-18'],

            // Sara Mensah (freelancer_id: 3)
            ['freelancer_id' => 3, 'title' => 'Redesigned Mobile Banking App UI', 'description' => 'Created a full Figma prototype and implemented the frontend using React and Tailwind CSS for a mobile banking app.', 'client_name' => 'NeoBank Africa', 'amount_earned' => 3500.00, 'completed_at' => '2024-12-01'],
            ['freelancer_id' => 3, 'title' => 'Design System for SaaS Product', 'description' => 'Built a reusable component library and design system covering typography, colors, buttons, and forms.', 'client_name' => 'Gridflow SaaS', 'amount_earned' => 2800.00, 'completed_at' => '2025-04-22'],

            // Chidi Nwosu (freelancer_id: 4)
            ['freelancer_id' => 4, 'title' => 'Sales Analytics Dashboard', 'description' => 'Built interactive Power BI dashboards pulling from SQL data warehouse for a retail chain with 50+ stores.', 'client_name' => 'RetailMax NG', 'amount_earned' => 1600.00, 'completed_at' => '2024-09-30'],
            ['freelancer_id' => 4, 'title' => 'Automated Monthly Report Script', 'description' => 'Wrote Python scripts to auto-generate and email monthly KPI reports from raw CSV data exports.', 'client_name' => 'Opex Solutions', 'amount_earned' => 900.00, 'completed_at' => '2025-01-08'],
            ['freelancer_id' => 4, 'title' => 'Customer Churn Prediction Model', 'description' => 'Built a machine learning model in Python to predict customer churn with 82% accuracy using historical data.', 'client_name' => 'TeleVast', 'amount_earned' => 2100.00, 'completed_at' => '2025-05-01'],

            // Linda Tran (freelancer_id: 5)
            ['freelancer_id' => 5, 'title' => 'WooCommerce Store Setup', 'description' => 'Set up a full WooCommerce store with custom theme, payment gateway integration, and product catalog migration.', 'client_name' => 'BeautyShelf', 'amount_earned' => 1200.00, 'completed_at' => '2024-08-14'],
            ['freelancer_id' => 5, 'title' => 'WordPress Speed Optimization', 'description' => 'Reduced page load time from 8s to under 2s through caching, image compression, and plugin cleanup.', 'client_name' => 'BlogNation', 'amount_earned' => 600.00, 'completed_at' => '2025-03-25'],

            // Emeka Eze (freelancer_id: 6)
            ['freelancer_id' => 6, 'title' => 'Delivery Tracking Mobile App', 'description' => 'Built a Flutter app with real-time delivery tracking using Firebase and Google Maps API.', 'client_name' => 'QuickDeliver', 'amount_earned' => 2700.00, 'completed_at' => '2024-11-30'],
            ['freelancer_id' => 6, 'title' => 'Fitness App MVP', 'description' => 'Developed a cross-platform fitness tracker app with workout logging, progress charts, and push notifications.', 'client_name' => 'FitPulse', 'amount_earned' => 3200.00, 'completed_at' => '2025-04-10'],

            // Grace Kim (freelancer_id: 7)
            ['freelancer_id' => 7, 'title' => 'AWS Infrastructure Setup', 'description' => 'Provisioned scalable AWS infrastructure using Terraform for a growing SaaS platform including EC2, RDS, and S3.', 'client_name' => 'CloudNest', 'amount_earned' => 4000.00, 'completed_at' => '2024-10-20'],
            ['freelancer_id' => 7, 'title' => 'CI/CD Pipeline Implementation', 'description' => 'Built a full CI/CD pipeline using GitHub Actions with automated testing, staging deployment, and production rollout.', 'client_name' => 'DevPipe Co.', 'amount_earned' => 2200.00, 'completed_at' => '2025-02-05'],

            // Tunde Adeyemi (freelancer_id: 8)
            ['freelancer_id' => 8, 'title' => 'SEO Audit & Recovery Campaign', 'description' => 'Conducted full technical SEO audit and content strategy overhaul, recovering 40% lost organic traffic in 3 months.', 'client_name' => 'ShopNaija', 'amount_earned' => 1500.00, 'completed_at' => '2024-12-18'],
            ['freelancer_id' => 8, 'title' => 'Google Ads Campaign Management', 'description' => 'Managed $10K/month Google Ads budget, achieving 3.2x ROAS for a D2C skincare brand.', 'client_name' => 'GlowUp Beauty', 'amount_earned' => 1800.00, 'completed_at' => '2025-03-01'],

            // Amara Diallo (freelancer_id: 9)
            ['freelancer_id' => 9, 'title' => 'API Documentation for Developer Portal', 'description' => 'Wrote complete REST API documentation using OpenAPI/Swagger for a payments company developer portal.', 'client_name' => 'PayStack Clone', 'amount_earned' => 1100.00, 'completed_at' => '2024-09-12'],
            ['freelancer_id' => 9, 'title' => 'User Guide for SaaS Platform', 'description' => 'Created a comprehensive 60-page user guide with screenshots and tutorials for a project management SaaS tool.', 'client_name' => 'TaskFlow Pro', 'amount_earned' => 850.00, 'completed_at' => '2025-01-30'],

            // Kevin Osei (freelancer_id: 10)
            ['freelancer_id' => 10, 'title' => 'Real-time Chat App', 'description' => 'Built a real-time messaging app using React, Node.js, and Socket.io with group chat and file sharing features.', 'client_name' => 'ConnectTeam', 'amount_earned' => 2900.00, 'completed_at' => '2024-11-05'],
            ['freelancer_id' => 10, 'title' => 'GraphQL API Migration', 'description' => 'Migrated a legacy REST API to GraphQL, reducing over-fetching and improving frontend performance significantly.', 'client_name' => 'DataSync Inc.', 'amount_earned' => 2300.00, 'completed_at' => '2025-04-15'],
        ];

        DB::table('projects')->insert($projects);
    }
}