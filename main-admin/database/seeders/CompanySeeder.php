<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'name' => 'Tech Solutions Inc.',
                'description' => 'A leading technology company specializing in software development and IT consulting.',
                'industry' => 'Information Technology',
                'company_size' => '201-500',
                'location' => 'San Francisco, CA',
                'website' => 'https://techsolutions.example.com',
                'about_us' => 'Tech Solutions Inc. has been providing innovative technology solutions for over 15 years. Our team of expert developers and consultants work with clients worldwide to deliver cutting-edge software solutions.',
                'employee_benefits' => 'Health insurance, 401(k) matching, flexible working hours, remote work options, professional development budget',
                'work_culture' => 'We foster a collaborative, innovative environment where creativity and technical excellence are valued.',
                'application_process' => 'Submit your resume and portfolio through our careers page. Selected candidates will be contacted for initial screening.',
                'is_active' => true,
            ],
            [
                'name' => 'Global Marketing Agency',
                'description' => 'Full-service marketing agency helping brands grow their online presence.',
                'industry' => 'Marketing & Advertising',
                'company_size' => '51-200',
                'location' => 'New York, NY',
                'website' => 'https://globalmarketing.example.com',
                'about_us' => 'Global Marketing Agency specializes in digital marketing, brand strategy, and creative campaigns. We help businesses of all sizes achieve their marketing goals.',
                'employee_benefits' => 'Health and dental insurance, paid time off, professional development, team outings',
                'work_culture' => 'Fast-paced, creative environment where ideas are encouraged and collaboration is key.',
                'application_process' => 'Apply online with your resume and cover letter. We review all applications within 2 weeks.',
                'is_active' => true,
            ],
            [
                'name' => 'HealthCare Plus',
                'description' => 'Premier healthcare consultancy providing strategic solutions to healthcare organizations.',
                'industry' => 'Healthcare',
                'company_size' => '500+',
                'location' => 'Boston, MA',
                'website' => 'https://healthcareplus.example.com',
                'about_us' => 'HealthCare Plus partners with hospitals, clinics, and healthcare systems to improve operational efficiency and patient care.',
                'employee_benefits' => 'Comprehensive health coverage, retirement plans, continuing education support, work-life balance programs',
                'work_culture' => 'Mission-driven culture focused on improving healthcare outcomes.',
                'application_process' => 'Send your application through our website. Initial interviews are conducted virtually.',
                'diversity_inclusion' => 'We are committed to building a diverse and inclusive workplace where everyone feels valued.',
                'is_active' => true,
            ],
        ];

        foreach ($companies as $companyData) {
            \App\Models\Company::updateOrCreate(
                ['name' => $companyData['name']],
                $companyData
            );
        }
    }
}
