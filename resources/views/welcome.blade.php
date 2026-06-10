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

    <!-- Scripts -->
    <script src="{{ asset('assets/js/welcome.js') }}"></script>
</body>
</html>