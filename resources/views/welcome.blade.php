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
                <div class="timeline-card" data-job="makeover-guys">
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
                    <div class="timeline-expand-icon">▼</div>
                    <div class="timeline-details">
                        <div class="details-grid">
                            <div class="detail-item">
                                <span class="detail-label">🎯 Key Achievements</span>
                                <ul class="detail-list">
                                    <li>Designed scalable full-stack modules using CodeIgniter, MySQL, JavaScript & jQuery</li>
                                    <li>Developed internal messaging and notification flows for seamless UX</li>
                                    <li>Led features end-to-end from requirement analysis to production monitoring</li>
                                    <li>Built responsive React UI components with REST API integrations</li>
                                </ul>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">🛠️ Tech Highlights</span>
                                <ul class="detail-list">
                                    <li>Integrated NetSuite and Atome third-party services</li>
                                    <li>Optimized backend services and MySQL queries</li>
                                    <li>Enhanced system reliability through refactoring and performance tuning</li>
                                    <li>Leveraged AI tools to accelerate development and automate tasks</li>
                                </ul>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">👥 Collaboration</span>
                                <ul class="detail-list">
                                    <li>Worked cross-functionally with Product, UX, and engineering teams</li>
                                    <li>Participated in code reviews and CI/CD workflows</li>
                                    <li>Troubleshot production issues with minimal downtime</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Job 2: Poplook -->
            <div class="timeline-item">
                <div class="timeline-dot">
                    <div class="timeline-dot-pulse"></div>
                    <span>👕</span>
                </div>
                <div class="timeline-card" data-job="poplook">
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
                    <div class="timeline-expand-icon">▼</div>
                    <div class="timeline-details">
                        <div class="details-grid">
                            <div class="detail-item">
                                <span class="detail-label">🎯 Key Achievements</span>
                                <ul class="detail-list">
                                    <li>Built and maintained RESTful APIs using CodeIgniter and Laravel</li>
                                    <li>Integrated third-party payment gateways for seamless transactions</li>
                                    <li>Developed an internal dashboard using JavaScript, jQuery, and ReactJS</li>
                                </ul>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">🛠️ System Reliability</span>
                                <ul class="detail-list">
                                    <li>Maintained production system stability through continuous monitoring</li>
                                    <li>Performed code improvements, bug fixes, and refactoring</li>
                                    <li>Optimized MySQL-backed services for better performance</li>
                                </ul>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">👥 Collaboration</span>
                                <ul class="detail-list">
                                    <li>Worked closely with product, design, and operations teams</li>
                                    <li>Delivered features aligned with business needs</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Job 3: Tadika/Taska Management System (Freelance) -->
            <div class="timeline-item">
                <div class="timeline-dot">
                    <div class="timeline-dot-pulse"></div>
                    <span>🎒</span>
                </div>
                <div class="timeline-card" data-job="tadika">
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
                    <div class="timeline-expand-icon">▼</div>
                    <div class="timeline-details">
                        <div class="details-grid">
                            <div class="detail-item">
                                <span class="detail-label">🎯 Key Achievements</span>
                                <ul class="detail-list">
                                    <li>Enhanced system modules with new features using CodeIgniter, MySQL, HTML, Bootstrap & PHP</li>
                                    <li>Built features for attendance tracking and parent communications</li>
                                    <li>Resolved application bugs and performance issues</li>
                                </ul>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">🛠️ Maintenance</span>
                                <ul class="detail-list">
                                    <li>Provided long-term updates and improvements throughout system lifecycle</li>
                                    <li>Managed source code using Bitbucket for version tracking</li>
                                    <li>Sustained the system for nearly a decade (2015-2024)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Job 4: Inventory Booking System (Freelance) -->
            <div class="timeline-item">
                <div class="timeline-dot">
                    <div class="timeline-dot-pulse"></div>
                    <span>📦</span>
                </div>
                <div class="timeline-card" data-job="inventory">
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
                    <div class="timeline-expand-icon">▼</div>
                    <div class="timeline-details">
                        <div class="details-grid">
                            <div class="detail-item">
                                <span class="detail-label">🎯 Key Achievements</span>
                                <ul class="detail-list">
                                    <li>Built inventory tracking modules using CodeIgniter and MySQL</li>
                                    <li>Tracked inventory bookings, availability, and status</li>
                                    <li>Designed workflows for better inventory usage visibility</li>
                                </ul>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">🛠️ System Stability</span>
                                <ul class="detail-list">
                                    <li>Supported backend development and bug fixing</li>
                                    <li>Performed enhancements and maintenance for daily stability</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Job 5: Vialing Sdn Bhd -->
            <div class="timeline-item">
                <div class="timeline-dot">
                    <div class="timeline-dot-pulse"></div>
                    <span>👨‍💼</span>
                </div>
                <div class="timeline-card" data-job="vialing">
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
                    <div class="timeline-expand-icon">▼</div>
                    <div class="timeline-details">
                        <div class="details-grid">
                            <div class="detail-item">
                                <span class="detail-label">🎯 Key Achievements</span>
                                <ul class="detail-list">
                                    <li>Led project delivery and tracked progress for timely feature releases</li>
                                    <li>Built and maintained CMS, Dashboard V1/V2, Online Application V2 & Student Portal</li>
                                    <li>Used Laravel, CodeIgniter, MySQL, jQuery, JavaScript, and Bootstrap</li>
                                </ul>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">👨‍🏫 Leadership</span>
                                <ul class="detail-list">
                                    <li>Mentored junior engineers to improve code quality and team capability</li>
                                    <li>Managed and tracked project progress for on-time delivery</li>
                                </ul>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">🛠️ System Optimization</span>
                                <ul class="detail-list">
                                    <li>Maintained production systems for long-term stability</li>
                                    <li>Optimized backend processes and workflows</li>
                                    <li>Improved overall system efficiency</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/welcome.js') }}"></script>
</body>
</html>