<?php

/*
 | Every editable text/image on the static pages lives here with its default.
 | Format:  'field_key' => ['Label in admin', 'type', 'default value']
 | Types: text | textarea | image | file | list
 | list = one item per line, parts separated by |
 | In Blade use: cms('page.field_key')  /  cms_lines('page.field_key')  /  img(cms('page.field_key'))
 */
return [

    'pages' => [

        'site' => ['label' => 'Header & Footer', 'fields' => [
            'logo'       => ['Logo image (leave empty for text logo)', 'image', null],
            'demo_label' => ['Header button text', 'text', 'Request Demo'],
            'phone'      => ['Phone', 'text', '+880 1958 688224'],
            'email'      => ['Email', 'text', 'info@upstra.com'],
            'city'       => ['Office city', 'text', 'Dhaka'],
            'address'    => ['Address', 'text', 'Khawaja Tower, 95 Bir Uttam AK Khandakar Rd, Mohakhali C/A, Dhaka 1212'],
            'deck'       => ['Company deck (PDF)', 'file', null],
            'deck_meta'  => ['Company deck label', 'text', '3 MB, PDF'],
            'copyright'  => ['Copyright line', 'text', '© 2026 UPSTRA. All copyrights are reserved.'],
        ]],

        'home' => ['label' => 'Home page', 'fields' => [
            'hero_title_1' => ['Hero title (dark part)', 'text', 'Largest Google Cloud Billing Partner'],
            'hero_title_2' => ['Hero title (red part)', 'text', 'in Bangladesh.'],
            'hero_text'    => ['Hero text', 'textarea', 'Upstra is privileged to be the largest Google Cloud Account Manager in Bangladesh territory. As a billing partner, we help businesses to manage their billing accounts, and providing billing related support.'],
            'hero_button'  => ['Hero button text', 'text', 'Product & Services'],
            'hero_image'   => ['Hero background image (fills the whole section)', 'image', 'images/upstrabg.jpeg'],
            'products_label' => ['Products section label', 'text', 'Products & Services'],
            'products_title' => ['Products section title', 'text', 'Enterprise Cloud & Data Stack'],
            'products_text'  => ['Products section text', 'textarea', 'Tailored cloud architecture, deep product analytics, and threat defense for mission-critical digital transformation.'],
            'stats_label'  => ['Achievements label', 'text', 'Our Achievements'],
            'stats_title'  => ['Achievements title', 'text', 'Numbers That Speak'],
            'stats'        => ['Numbers (number|label)', 'list', "11|Years of Experience\n30|Trusted Employees\n15|Projects Delivered\n18|Valued Clients\n35|Trusted Partners"],
            'clients_title' => ['Clients title', 'text', 'Trusted by Leading Clients'],
            'clients_text'  => ['Clients text', 'textarea', 'Empowering top businesses with reliable, innovative solutions that deliver results and the confidence of a proven partner.'],
            'portfolio_title' => ['Portfolio title', 'text', 'Real Solutions. Real Impact'],
            'portfolio_text'  => ['Portfolio text', 'textarea', 'Explore our portfolio showcasing successful projects with leading clients, where innovative solutions meet measurable results, proven expertise, and lasting impact across industries.'],
            'testimonials_title' => ['Testimonials title', 'text', 'What Our Clients Say'],
            'testimonials_text'  => ['Testimonials text', 'textarea', 'Read feedback from real people who trust UPSTRA to power their cloud journey'],
            'approach_title' => ['How we work title', 'text', 'How We Work'],
            'steps'        => ['How we work steps (title|text)', 'list', "Understand|We always try to understand the products, services & business process of the customer.\nPlan|We identify the problem the business is having and make a requirement analysis for the client\nImplement|We always try to understand the products, services & business process of the customer.\nSupport|We always try to understand the products, services & business process of the customer."],
            'wizard_title' => ['Wizard title', 'text', '3-Step Enterprise Requirement Wizard'],
            'wizard_text'  => ['Wizard text', 'text', 'Get an immediate cloud migration blueprint & expert recommendation'],
            'wizard_objectives' => [
                'Wizard step 1 options (title|text|image)', 
                'list',
                "Cloud Migration|AWS / On-Prem to GCP / Tencent|images/settings-sliders_1.svg\n" .
                "Product Analytics|Mixpanel Funnels & BigQuery ML|images/settings-sliders_1.svg\n" .
                "Cyber Security|Mandiant Threat Defense & Audit|images/settings-sliders_1.svg"
            ],
            'wizard_current' => ['Wizard step 2 options (one per line)', 'list', "On-premises servers\nAWS\nAnother cloud provider\nStarting from scratch"],
            'cta_title_1' => ['Bottom banner title (dark)', 'text', 'Your Cloud Journey'],
            'cta_title_2' => ['Bottom banner title (red)', 'text', 'Starts Here'],
            'cta_text'    => ['Bottom banner text', 'textarea', 'Move beyond limitations with the power of Google Cloud. Let Upstra Communication Limited help you innovate, scale, and grow.'],
            'cta_button'  => ['Bottom banner button', 'text', 'Get Started Today'],
        ]],

        'products' => ['label' => 'Product & Services page', 'fields' => [
            'hero_title_1' => ['Hero title (dark)', 'text', 'Enterprise'],
            'hero_title_2' => ['Hero title (red)', 'text', 'Cloud & Data Stack'],
            'hero_text'    => ['Hero text', 'textarea', 'Tailored cloud architecture, deep product analytics, and threat defense for mission-critical digital transformation.'],
            'hero_image'   => ['Hero background image (fills the whole section)', 'image', 'images/products-hero-bg.png'],
            'partners'     => ['Partner names under hero (one per line)', 'list'],
            'section_label' => ['Section label', 'text', 'Products & Services'],
            'section_title' => ['Section title', 'text', 'Enterprise Cloud & Data Stack'],
            'section_text'  => ['Section text', 'textarea', 'Tailored cloud architecture, deep product analytics, and threat defense for mission-critical digital transformation.'],
            'tabs' => ['Product tabs (tab name|heading|description|points separated by ;|highlights as Label=Badge separated by ;)', 'list',
                "Google Cloud Platform|Google Cloud Premier Tier Reseller|Upstra is Bangladesh's certified GCP partner offering direct billing in BDT, local cloud architectural advisory, Kubernetes modernization, and BigQuery data warehousing support.|Seamless In-Country BDT Payment Settlement;BigQuery ML & Enterprise AI pipeline setups;24/7 Localized DevOps & Reliability Engineering|BigQuery Enterprise Data Warehouse=Scale-out;Google Kubernetes Engine (GKE)=Auto-Pilot;Vertex AI & Generative Search=AI Native\n" .
                "Tencent Cloud|Tencent Cloud Partner|Scalable cloud infrastructure, content delivery and security services for businesses growing across Asia.|Cloud servers and managed databases;Global content delivery;Local onboarding and support|Cloud Virtual Machines=Elastic;Content Delivery Network=Global;Managed Databases=Managed\n" .
                "Mixpanel Analytics|Product Analytics with Mixpanel|Understand how people move through your product with funnels, retention and cohort reports.|Event tracking setup and data modeling;Funnel and retention dashboards;BigQuery export and ML-ready data|Funnels=Insights;Retention Cohorts=Growth;BigQuery Export=Connected\n" .
                "Mandiant Security|Mandiant Threat Defense|Frontline threat intelligence, incident response and security audits to protect mission-critical workloads.|24/7 threat detection and response;Security posture assessments;Incident response retainers|Threat Intelligence=Frontline;Security Validation=Proactive;Incident Response=24/7"],
            'tab_icon_1' => ['Tab 1 icon (SVG or PNG)', 'file', 'images/icons/google.svg'],
            'tab_icon_2' => ['Tab 2 icon (SVG or PNG)', 'file', 'images/icons/cloud.svg'],
            'tab_icon_3' => ['Tab 3 icon (SVG or PNG)', 'file', 'images/icons/chart-pie.svg'],
            'tab_icon_4' => ['Tab 4 icon (SVG or PNG)', 'file', 'images/icons/shield-check.svg'],
            'tab_icon_5' => ['Tab 5 icon (SVG or PNG)', 'file', null],
            'tab_icon_6' => ['Tab 6 icon (SVG or PNG)', 'file', null],
            'cap_title' => ['Capabilities title', 'text', 'Cloud Capabilities Build for Scale'],
            'capabilities' => ['Capability cards (title|text)', 'list', "Cloud Infrastructure & Migration|Secure, scalable cloud foundations and migration.\nData & AI Modernization|BigQuery, ML pipelines, Vertex AI\nManaged Kubernetes & DevOps|GKE modernization, automation, 24/7 reliability"],
            'stack_title' => ['Connected stack title', 'text', 'One Connected Enterprise Stack'],
            'stack_text'  => ['Connected stack text', 'text', 'Best-in-class platforms working together to accelerate your business outcomes.'],
            'stack' => ['Connected stack items (name|text)', 'list', "Google Cloud Platform|Enterprise-grade cloud infrastructure and AI-powered services.\nTencent Cloud|BigQuery, ML pipelines, Vertex AI\nMixpanel Analytics|GKE modernization, automation, 24/7 reliability\nMandiant Security|GKE modernization, automation, 24/7 reliability"],
            'cta_title_1' => ['Banner title (dark)', 'text', 'Build Your Next-Generation'],
            'cta_title_2' => ['Banner title (red)', 'text', 'Digital Foundation'],
            'cta_button'  => ['Banner button', 'text', 'Talk to an Expert'],
        ]],

        'about' => ['label' => 'About Us page', 'fields' => [
            'hero_title_1' => ['Hero title (dark)', 'text', "Bangladesh's Premier"],
            'hero_title_2' => ['Hero title (red)', 'text', 'Google Cloud Partner'],
            'hero_text'    => ['Hero text', 'textarea', 'Upstra Communications Limited is the first Premier partner of Google Cloud Platform (GCP) in Bangladesh, and the largest billing partner of Google Cloud in the country.'],
            'hero_button'  => ['Hero button', 'text', 'Our Journey'],
            'hero_image'   => ['Hero background image (fills the whole section)', 'image', 'images/about-hero-bg.png'],
            'who_label' => ['Who we are label', 'text', 'Who We Are'],
            'who_title' => ['Who we are title', 'text', 'Innovating Today, Building Tomorrow'],
            'who_text'  => ['Who we are text', 'textarea', "Upstra Communications Limited is a subsidiary of Sheba Group, which has over 20+ years of management experience with a proven track record in rendering technologically advanced products and services.\nIn 2021, we started our services of Google Cloud Consultancy and providing Google Suite in Bangladesh. Through our dedication and expertise, we have become the largest billing partner of Google Cloud in Bangladesh and are now honored as the first Premier Partner, along with being a partner of Google Workspace and Google for Education."],
            'who_image' => ['Who we are image (logo card)', 'image', null],
            'purpose_label' => ['Purpose label', 'text', 'Our Mission & Vision'],
            'purpose_title' => ['Purpose title', 'text', 'Our Purpose'],
            'purpose_text'  => ['Purpose text', 'textarea', 'We are driven by a clear mission and a bold vision to empower businesses and communities through cloud innovation.'],
            'mission_title' => ['Mission title', 'text', 'Our Mission'],
            'mission_text'  => ['Mission text', 'textarea', 'To combine the Quran and Sunnah with modern information and technology education, and to produce skilled, ethical, and capable Muslim youth.'],
            'vision_title'  => ['Vision title', 'text', 'Our Vision'],
            'vision_text'   => ['Vision text', 'textarea', 'A generation of Hafiz-e-Quran who lead in both worldly and religious knowledge, and who serve the ummah and the nation with honesty.'],
            'team_label' => ['Team label', 'text', 'Our Team'],
            'team_title' => ['Team title', 'text', 'A Team of Experts'],
            'team_text'  => ['Team text', 'textarea', 'Our team brings together deep industry expertise, technical excellence, and a shared commitment to help our clients thrive in the cloud era.'],
            'journey_label' => ['Journey label', 'text', 'Our Journey'],
            'journey_title' => ['Journey title', 'text', 'A Journey of Growth & Trust'],
            'journey_text'  => ['Journey text', 'textarea', "From a trusted technology partner to Bangladesh's first Premier Google Cloud Partner - our journey is driven by a passion for innovation and a commitment to our clients."],
            'journey' => ['Timeline (year|text)', 'list', "2021|Started Google Cloud Consultancy and Google Suite in Bangladesh\n2023|Started Google Cloud Consultancy and Google Suite in Bangladesh\n2024|Started Google Cloud Consultancy and Google Suite in Bangladesh\n2026|Started Google Cloud Consultancy and Google Suite in Bangladesh"],
            'cta_title_1' => ['Banner title (dark)', 'text', 'Build Your Next-Generation'],
            'cta_title_2' => ['Banner title (red)', 'text', 'Digital Foundation'],
            'cta_button'  => ['Banner button', 'text', 'Talk to an Expert'],
        ]],

        'career' => ['label' => 'Career page & job perks', 'fields' => [
            'hero_title_1' => ['Hero title (dark)', 'text', 'Build Your'],
            'hero_title_2' => ['Hero title (red)', 'text', 'Career with Us'],
            'hero_tagline' => ['Hero tagline (separate with |)', 'text', 'Grow|Innovate|Make an Impact'],
            'hero_button'  => ['Hero button', 'text', 'Apply Now'],
            'hero_image'   => ['Hero image', 'image', 'images/career-hero.jpg'],
            'job_image'    => ['Job details page hero image', 'image', 'images/job-hero.jpg'],
            'why_title' => ['Why work with us title', 'text', 'Why Work With Us?'],
            'why_text'  => ['Why work with us text', 'text', 'We are the best custom software development company for custom software development outsourcing.'],
            'why' => ['Why work with us cards (title|text)', 'list', "Innovative Culture|We celebrate fresh ideas and innovation here. Your creativity and passion for technology will thrive.\nGrowth Opportunities|We celebrate fresh ideas and innovation here. Your creativity and passion for technology will thrive.\nWork-Life Balance|We celebrate fresh ideas and innovation here. Your creativity and passion for technology will thrive.\nCollaborative Team|We celebrate fresh ideas and innovation here. Your creativity and passion for technology will thrive."],
            'perks_title' => ['Perks title', 'text', 'Perks & Benefits'],
            'perks_text'  => ['Perks text', 'text', 'We are the best custom software development company for custom software development outsourcing.'],
            'perks' => ['Perks (one per line)', 'list', "Competitive Salary\nCarry Forward Leave\nFriendly Environment\nFestival Bonus\nQuarterly Team Outings\nAnnual Leave\nPerformance Bonus\nLunch Facilities\nKnowledge Sharing Session\nAnnual Retreat & Family Tour\nUnlimited Tea, Coffee.\nCasual & Sick Leave\nBereavement Leave\nTraining and Learning Materials to Improve Skills\nMaternal and Parental Leave"],
            'openings_title' => ['Openings title', 'text', 'Current Openings'],
            'openings_text'  => ['Openings text', 'text', 'We are the best custom software development company for custom software development outsourcing.'],
            'contact_label' => ['Form label', 'text', 'Get in touch'],
            'contact_title' => ['Form title', 'text', "Didn't Find Your Ideal Role?"],
            'contact_text'  => ['Form text', 'textarea', "We'd still love to hear from you. Share your details and we'll reach out when a matching opportunity opens."],
        ]],

        'blog' => ['label' => 'Blog page', 'fields' => [
            'hero_title' => ['Title', 'text', 'Inside News : Stories and Interviews'],
            'hero_text'  => ['Text', 'text', 'Subscribe to learn about new product features, the latest in technology and updates.'],
            'recent_title' => ['Recent posts title', 'text', 'Recent Blog Post'],
            'all_title'    => ['All posts title', 'text', 'All Blog Posts'],
        ]],

        'contact' => ['label' => 'Contact page', 'fields' => [
            'title' => ['Title', 'text', 'Contact Us'],
            'text'  => ['Text', 'text', 'Any question or remarks? Just write us a message!'],
            'info_title' => ['Info card title', 'text', 'Contact Information'],
            'info_text'  => ['Info card text', 'text', 'Say something to start a live chat!'],
            'subjects'   => ['Subject options (one per line)', 'list', "General Inquiry\nRequest a Demo\nSupport\nPartnership"],
        ]],
    ],

    /*
     | Database-backed lists managed with one generic CRUD screen.
     | 'fields' => [column => [Label, type]]   types: text textarea date number image file checkbox
     */
    'resources' => [
        'posts' => ['label' => 'Blog posts', 'model' => \App\Models\Post::class, 'slug' => 'title', 'order' => ['published_at', 'desc'],
            'columns' => ['title', 'author', 'published_at', 'is_featured'],
            'fields' => ['title' => ['Title', 'text'], 'author' => ['Author', 'text'], 'published_at' => ['Publish date', 'date'],
                'image' => ['Cover image', 'image'], 'excerpt' => ['Short summary', 'textarea'], 'body' => ['Full article', 'textarea'],
                'is_featured' => ['Show in "Recent" (top 3)', 'checkbox']]],
        'openings' => ['label' => 'Job openings', 'model' => \App\Models\Opening::class, 'slug' => 'title', 'order' => ['posted_on', 'desc'],
            'columns' => ['title', 'experience', 'posted_on', 'apply_before', 'is_open'],
            'defaults' => ['work_mode' => 'In House', 'job_type' => 'Full Time', 'salary' => 'Negotiable', 'location' => 'Mohakhali', 'is_open' => true],
            'fields' => ['title' => ['Job title', 'text'], 'experience' => ['Experience (e.g. 2+ Years)', 'text'], 'work_mode' => ['Work mode', 'text'],
                'job_type' => ['Job type', 'text'], 'salary' => ['Salary', 'text'], 'location' => ['Location', 'text'],
                'posted_on' => ['Posted on', 'date'], 'apply_before' => ['Apply before', 'date'], 'description' => ['Description', 'textarea'],
                'responsibilities' => ['Responsibilities (one per line)', 'textarea'], 'requirements' => ['Requirements (one per line)', 'textarea'],
                'is_open' => ['Accepting applications', 'checkbox']]],
        'members' => ['label' => 'Team members', 'model' => \App\Models\Member::class, 'order' => ['sort', 'asc'],
            'columns' => ['name', 'role', 'sort'],
            'fields' => ['name' => ['Name', 'text'], 'role' => ['Role', 'text'], 'photo' => ['Photo', 'image'], 'sort' => ['Order (small number first)', 'number']]],
        'clients' => ['label' => 'Clients', 'model' => \App\Models\Client::class, 'order' => ['sort', 'asc'],
            'columns' => ['name', 'sort'],
            'fields' => ['name' => ['Client name', 'text'], 'logo' => ['Logo', 'image'], 'sort' => ['Order', 'number']]],
        'projects' => ['label' => 'Portfolio', 'model' => \App\Models\Project::class, 'order' => ['sort', 'asc'],
            'columns' => ['title', 'category', 'sort'],
            'fields' => ['title' => ['Title', 'text'], 'category' => ['Category (GCP, Workspace, Security...)', 'text'], 'image' => ['Image', 'image'],
                'link' => ['Link (optional)', 'text'], 'sort' => ['Order', 'number']]],
        'testimonials' => ['label' => 'Testimonials', 'model' => \App\Models\Testimonial::class, 'order' => ['id', 'desc'],
            'columns' => ['name', 'position'],
            'fields' => ['quote' => ['Quote', 'textarea'], 'name' => ['Name', 'text'], 'position' => ['Position, company', 'text'], 'photo' => ['Photo', 'image']]],
        'messages' => ['label' => 'Contact messages', 'model' => \App\Models\Message::class, 'readonly' => true, 'order' => ['id', 'desc'],
            'columns' => ['first_name', 'last_name', 'email', 'phone', 'subject', 'created_at']],
        'applications' => ['label' => 'Job applications', 'model' => \App\Models\Application::class, 'readonly' => true, 'order' => ['id', 'desc'],
            'columns' => ['first_name', 'last_name', 'email', 'resume', 'created_at'], 'files' => ['resume']],
        'subscribers' => ['label' => 'Newsletter subscribers', 'model' => \App\Models\Subscriber::class, 'readonly' => true, 'order' => ['id', 'desc'],
            'columns' => ['email', 'created_at']],
    ],
];
