<?php

namespace Database\Seeders;

use App\Models\{Client, Member, Opening, Post, Project, Testimonial, User};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // CMS login -> CHANGE THIS PASSWORD after first login
        User::updateOrCreate(['email' => 'admin@upstra.com'], ['name' => 'Admin', 'password' => Hash::make('password')]);

        if (!Member::count()) {
            foreach ([['Reaz U Ahmed', 'MD & CEO'], ['Mohammad Somael Kabir', 'COO'], ['Tayab Khan', 'CTO']] as $i => [$n, $r]) {
                Member::create(['name' => $n, 'role' => $r, 'sort' => $i]);
            }
        }
        if (!Client::count()) {
            foreach (['banglalink', 'brac', 'bdnews24.com', 'bKash', 'UCB'] as $i => $n) Client::create(['name' => $n, 'sort' => $i]);
        }
        if (!Project::count()) {
            foreach (['GCP', 'GCP', 'Workspace', 'Workspace', 'Security', 'Security'] as $i => $c) {
                Project::create(['title' => 'Customer Onboarding Solution', 'category' => $c, 'sort' => $i]);
            }
        }
        if (!Testimonial::count()) {
            Testimonial::create([
                'quote' => "UPSTRA's team is high professional and supportive. Their expertise in Google Cloud and commitment to our success have made a real difference for our business.",
                'name' => 'Milon Mahmood', 'position' => 'Managing Director, Company Name',
            ]);
        }
        if (!Post::count()) {
            $vm = "Compute Services Google Compute Engine: Provides virtual machines (VMs) that run on Google's infrastructure, offering flexibility in VM configuration, scalability";
            $posts = [
                ['Role of Gemini1.5 Pro in Malware Analysis', 'The surge in malware has significantly burdened cybersecurity professionals, especially malware analysts, necessitating advanced automation and strategies to combat this persistent threat.', 1],
                ['Overview of GCP', $vm, 1],
                ['MGI partners with Upstra', 'Upstra Communication Limited(UCL) is the first premier partner of Google Cloud Platform in Bangladesh, currently providing', 1],
                ["Google Cloud's new Gen AI tools for retailers", $vm, 0],
                ["Education via Google's Gemini for Workspace", $vm, 0],
                ['Gemini for Workspace (formerly DUET AI)', 'We all have heard about Bard(now Gemini), a language model. But what about the solution that does regular productivity tasks like drafting emails, scheduling meeting etc. for us?', 0],
                ['Mandiant Case Study: Bangladesh Bank', 'In February 2016, 35 fraudulent instructions were issued by security hackers via the SWIFT network to illegally transfer close to US$1 billion from the Federal Reserve Bank of New York account belonging to', 0],
                ['Secure BRAC GCP Infra by Security Command Center', 'BRAC managed its on-prem and cloud infrastructure with standard security practices as per its security policy. BRAC identified some risks in their VPC network fixed as per recommendation.', 0],
                ['Khan Academy Case Study with Google Cloud', 'Khan Academy maintained several website for their video-library. However, the platform showed its limitations with an increase of traffic. The company knew to offload technical concerns', 0],
            ];
            $imgs = [
                'Role of Gemini1.5 Pro in Malware Analysis' => 'gemini', 'Overview of GCP' => 'gcloud', 'MGI partners with Upstra' => 'mgi',
                "Google Cloud's new Gen AI tools for retailers" => 'retail', "Education via Google's Gemini for Workspace" => 'education',
                'Gemini for Workspace (formerly DUET AI)' => 'gcloud', 'Mandiant Case Study: Bangladesh Bank' => 'bank',
                'Secure BRAC GCP Infra by Security Command Center' => 'brac', 'Khan Academy Case Study with Google Cloud' => 'gcloud',
            ];
            foreach ($posts as [$t, $e, $f]) {
                Post::create(['title' => $t, 'slug' => Str::slug($t), 'author' => 'Sadat Ahmed', 'published_at' => '2026-10-20', 'image' => 'images/blog/' . $imgs[$t] . '.jpg',
                    'excerpt' => $e, 'body' => $e, 'is_featured' => (bool) $f]);
            }
        }
        if (!Opening::count()) {
            Opening::create([
                'title' => 'Full Stack Engineer', 'slug' => 'full-stack-engineer', 'experience' => '2+ Years',
                'posted_on' => '2026-12-12', 'apply_before' => '2026-12-27',
                'description' => 'We are looking for a skilled Full Stack Engineer to design, develop, and maintain scalable web applications. You will work closely with product managers, designers, and other engineers to deliver high-quality, user-centric digital solutions. This role requires strong problem-solving skills and hands-on experience across both front-end and back-end technologies.',
                'responsibilities' => "Develop and maintain front-end and back-end components of web applications\nBuild reusable, clean, and efficient code following best practices\nCollaborate with UI/UX designers to implement responsive and intuitive interfaces\nDesign and integrate RESTful APIs and third-party services\nOptimize applications for performance, scalability, and security\nTroubleshoot, debug, and improve existing systems\nParticipate in code reviews and technical discussions\nStay updated with emerging technologies and industry trends",
                'requirements' => "Bachelor's degree in Computer Science or a related field (or equivalent experience)\nProven experience as a Full Stack Engineer or similar role\nStrong knowledge of JavaScript, HTML, CSS, and modern frameworks (React, Vue, or Angular)\nExperience with back-end technologies such as Node.js, Python, Java, or PHP\nHands-on experience with databases (MySQL, PostgreSQL, MongoDB, etc.)\nFamiliarity with version control systems (Git)\nUnderstanding of REST APIs, authentication, and web security best practices\nAbility to write clean, maintainable, and well-documented code\nStrong problem-solving and communication skills",
            ]);
        }
    }
}
