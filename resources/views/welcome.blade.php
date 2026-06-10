<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Hazree Website</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    
    <!-- Styles -->
    <link href="{{ asset('assets/css/welcome.css') }}" rel="stylesheet" />
</head>
<body>
    <!-- Background -->
    <div class="bg-grid"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <div class="hero">
        <!-- Logo with pulse -->
        <div class="logo-wrapper">
            <div class="logo-pulse"></div>
            <div class="logo-pulse"></div>
            <div class="logo-circle">H</div>
        </div>

        <!-- Main title -->
        <h1>Welcome to Hazree Website</h1>

        <!-- Typing effect subtitle -->
        <div class="typing-wrapper">
            <span class="highlight">Full Stack Developer</span>
            <span id="typing-text"></span>
            <span class="cursor"></span>
        </div>

        <div class="divider"></div>

        <p class="tagline">
            <span id="dynamic-tagline">10+ years of experience building scalable web applications</span>
        </p>

        <!-- Action buttons -->
        <div class="btn-group">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">Get Started</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-secondary">Create Account</a>
                    @endif
                @endauth
            @endif
        </div>

        <!-- Resume highlights -->
        <div class="highlights">
            <div class="highlight-card">
                <div class="highlight-icon">💻</div>
                <div class="highlight-number">10+</div>
                <div class="highlight-label">Years of Experience</div>
            </div>
            <div class="highlight-card">
                <div class="highlight-icon">🚀</div>
                <div class="highlight-number">PHP</div>
                <div class="highlight-label">Laravel · CodeIgniter</div>
            </div>
            <div class="highlight-card">
                <div class="highlight-icon">⚛️</div>
                <div class="highlight-number">React</div>
                <div class="highlight-label">JavaScript · REST APIs</div>
            </div>
            <div class="highlight-card">
                <div class="highlight-icon">🛢️</div>
                <div class="highlight-number">MySQL</div>
                <div class="highlight-label">Database · Performance</div>
            </div>
        </div>

        <!-- Skills strip -->
        <div class="skills-strip">
            <span class="skill-tag">Laravel</span>
            <span class="skill-tag">CodeIgniter</span>
            <span class="skill-tag">ReactJS</span>
            <span class="skill-tag">JavaScript</span>
            <span class="skill-tag">MySQL</span>
            <span class="skill-tag">RESTful APIs</span>
            <span class="skill-tag">Docker</span>
            <span class="skill-tag">CI/CD</span>
            <span class="skill-tag">Git</span>
            <span class="skill-tag">jQuery</span>
        </div>
    </div>

    <!-- ============================================
         JOB EXPERIENCE TIMELINE
         ============================================ -->
    <div class="journey-section" id="career-journey">
        <!-- Stats bar -->
        <div class="job-stats">
            <div class="job-stat">
                <div class="job-stat-number">10+</div>
                <div class="job-stat-label">Years Building</div>
            </div>
            <div class="job-stat">
                <div class="job-stat-number">5</div>
                <div class="job-stat-label">Companies Leveled Up</div>
            </div>
            <div class="job-stat">
                <div class="job-stat-number">∞</div>
                <div class="job-stat-label">Bugs Squashed</div>
            </div>
            <div class="job-stat">
                <div class="job-stat-number">🚀</div>
                <div class="job-stat-label">Ships Launched</div>
            </div>
        </div>

        <div class="journey-header">
            <div class="journey-badge">🏆 Career Timeline</div>
            <h2>The <span>Journey</span> So Far</h2>
            <p>From CodeIgniter to Laravel, from intern to lead — every role, every line of code</p>
        </div>

        <div class="timeline">
            <!-- Job 1: The Makeover Guys (Current) -->
            <div class="timeline-item">
                <div class="timeline-dot">
                    <div class="timeline-dot-pulse"></div>
                    <span>⚡</span>
                </div>
                <div class="timeline-card">
                    <div class="timeline-card-top">
                        <div class="timeline-company">
                            <span class="company-icon">💅</span>
                            The Makeover Guys
                        </div>
                        <div class="timeline-period">May 2025 — Present</div>
                    </div>
                    <div class="timeline-role">Full Stack Developer</div>
                    <div class="timeline-desc">
                        Architecting scalable full-stack modules, building real-time messaging features, 
                        designing modern React frontends, integrating NetSuite & Atome APIs, 
                        and shipping features from idea to production. Also secretly the team's AI-powered 
                        coding sidekick 🤖.
                    </div>
                    <div class="timeline-fun-facts">
                        <span class="fun-fact">⚛️ React + REST APIs</span>
                        <span class="fun-fact">📦 NetSuite Integration</span>
                        <span class="fun-fact">🤖 AI-Assisted Coding</span>
                        <span class="fun-fact">🔧 System Performance</span>
                    </div>
                </div>
            </div>

            <!-- Job 2: Poplook -->
            <div class="timeline-item">
                <div class="timeline-dot">
                    <div class="timeline-dot-pulse"></div>
                    <span>👕</span>
                </div>
                <div class="timeline-card">
                    <div class="timeline-card-top">
                        <div class="timeline-company">
                            <span class="company-icon">👕</span>
                            Poplook Sdn. Bhd.
                        </div>
                        <div class="timeline-period">Jun 2019 — Mar 2025</div>
                    </div>
                    <div class="timeline-role">Senior Web Developer</div>
                    <div class="timeline-desc">
                        Built and maintained RESTful APIs with Laravel & CodeIgniter, integrated 
                        third-party payment gateways, developed internal dashboards with ReactJS, 
                        and kept production systems running like a well-oiled machine. Nearly 6 years 
                        of keeping the fashion e-commerce engine humming 🛒.
                    </div>
                    <div class="timeline-fun-facts">
                        <span class="fun-fact">💳 Payment Gateway APIs</span>
                        <span class="fun-fact">📊 Internal Dashboards</span>
                        <span class="fun-fact">🛠️ Production Monitoring</span>
                        <span class="fun-fact">🧹 Code Refactoring</span>
                    </div>
                </div>
            </div>

            <!-- Job 3: Tadika/Taska Management System (Freelance) -->
            <div class="timeline-item">
                <div class="timeline-dot">
                    <div class="timeline-dot-pulse"></div>
                    <span>🎒</span>
                </div>
                <div class="timeline-card">
                    <div class="timeline-card-top">
                        <div class="timeline-company">
                            <span class="company-icon">🎒</span>
                            Tadika/Taska Management System
                        </div>
                        <div class="timeline-period">May 2015 — Sep 2024</div>
                    </div>
                    <div class="timeline-role">Freelance Developer</div>
                    <div class="timeline-desc">
                        Built and maintained a management system for kindergartens and daycare centers 
                        using CodeIgniter + MySQL. Added features, squashed bugs, and kept the system 
                        running smoothly for nearly a decade. From attendance tracking to parent 
                        communications — code that helps shape young minds 📚.
                    </div>
                    <div class="timeline-fun-facts">
                        <span class="fun-fact">📋 Attendance Tracking</span>
                        <span class="fun-fact">🐛 Bug Squasher</span>
                        <span class="fun-fact">🗄️ CodeIgniter + MySQL</span>
                        <span class="fun-fact">📆 9-Year Project</span>
                    </div>
                </div>
            </div>

            <!-- Job 4: Inventory Booking System (Freelance) -->
            <div class="timeline-item">
                <div class="timeline-dot">
                    <div class="timeline-dot-pulse"></div>
                    <span>📦</span>
                </div>
                <div class="timeline-card">
                    <div class="timeline-card-top">
                        <div class="timeline-company">
                            <span class="company-icon">📦</span>
                            Inventory Booking System
                        </div>
                        <div class="timeline-period">May 2015 — Sep 2024</div>
                    </div>
                    <div class="timeline-role">Freelance Developer</div>
                    <div class="timeline-desc">
                        Developed inventory tracking modules to monitor bookings, availability, and status. 
                        Built workflows that gave users crystal-clear visibility into their inventory. 
                        More organized warehouses, happier clients ✅.
                    </div>
                    <div class="timeline-fun-facts">
                        <span class="fun-fact">📊 Inventory Tracking</span>
                        <span class="fun-fact">🔄 Workflow Design</span>
                        <span class="fun-fact">⚙️ Backend Logic</span>
                        <span class="fun-fact">✅ System Reliability</span>
                    </div>
                </div>
            </div>

            <!-- Job 5: Vialing Sdn Bhd -->
            <div class="timeline-item">
                <div class="timeline-dot">
                    <div class="timeline-dot-pulse"></div>
                    <span>👨‍💼</span>
                </div>
                <div class="timeline-card">
                    <div class="timeline-card-top">
                        <div class="timeline-company">
                            <span class="company-icon">👨‍💼</span>
                            Vialing Sdn Bhd
                        </div>
                        <div class="timeline-period">Mar 2013 — Sep 2019</div>
                    </div>
                    <div class="timeline-role">Technical Lead</div>
                    <div class="timeline-desc">
                        Led project delivery, mentored junior engineers, and built major platforms 
                        (CMS, Dashboard, Student Portal) using Laravel, CodeIgniter, and jQuery. 
                        Where the leadership journey began — managing teams, shipping products, 
                        and leveling up everyone around me 🏗️.
                    </div>
                    <div class="timeline-fun-facts">
                        <span class="fun-fact">👨‍🏫 Mentored Juniors</span>
                        <span class="fun-fact">🏗️ Built CMS & Portals</span>
                        <span class="fun-fact">📅 Project Delivery</span>
                        <span class="fun-fact">🚀 Performance Tuning</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/welcome.js') }}"></script>
</body>
</html>