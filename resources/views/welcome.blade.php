<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Hazree Website</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Figtree', sans-serif;
            background: #0f0f1a;
            min-height: 100vh;
            overflow-x: hidden;
            color: #ffffff;
        }

        /* Animated background grid */
        .bg-grid {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(102, 126, 234, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(102, 126, 234, 0.05) 1px, transparent 1px);
            background-size: 60px 60px;
            z-index: 0;
        }

        /* Floating gradient orbs */
        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            z-index: 0;
            animation: orbFloat 8s ease-in-out infinite;
        }
        .orb-1 {
            width: 400px;
            height: 400px;
            background: rgba(102, 126, 234, 0.15);
            top: -100px;
            left: -100px;
        }
        .orb-2 {
            width: 350px;
            height: 350px;
            background: rgba(118, 75, 162, 0.12);
            bottom: -80px;
            right: -80px;
            animation-delay: 3s;
        }
        .orb-3 {
            width: 250px;
            height: 250px;
            background: rgba(255, 107, 107, 0.08);
            top: 50%;
            left: 60%;
            animation-delay: 5s;
        }

        @keyframes orbFloat {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(30px, -30px) scale(1.05); }
            66% { transform: translate(-20px, 20px) scale(0.95); }
        }

        /* Main container */
        .hero {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            text-align: center;
        }

        /* Pulse circle behind logo */
        .logo-wrapper {
            position: relative;
            margin-bottom: 2rem;
        }
        .logo-pulse {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 2px solid rgba(102, 126, 234, 0.3);
            animation: pulseRing 2s ease-out infinite;
        }
        .logo-pulse:nth-child(2) {
            animation-delay: 1s;
        }
        @keyframes pulseRing {
            0% { width: 100px; height: 100px; opacity: 1; }
            100% { width: 160px; height: 160px; opacity: 0; }
        }

        .logo-circle {
            position: relative;
            width: 100px;
            height: 100px;
            margin: 0 auto;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.8rem;
            font-weight: 800;
            color: #fff;
            box-shadow: 0 0 40px rgba(102, 126, 234, 0.3);
            animation: logoGlow 3s ease-in-out infinite;
        }
        @keyframes logoGlow {
            0%, 100% { box-shadow: 0 0 40px rgba(102, 126, 234, 0.3); }
            50% { box-shadow: 0 0 60px rgba(102, 126, 234, 0.5); }
        }

        /* Main title */
        .hero h1 {
            font-size: 4.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #ffffff 0%, #a8b4ff 50%, #c084fc 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
            letter-spacing: -1px;
            line-height: 1.1;
        }

        /* Typing subtitle */
        .typing-wrapper {
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 0.5rem;
            min-height: 2rem;
        }
        .typing-wrapper .highlight {
            color: #a8b4ff;
            font-weight: 600;
        }
        .cursor {
            display: inline-block;
            width: 3px;
            height: 1.3rem;
            background: #a8b4ff;
            margin-left: 4px;
            animation: blink 1s step-end infinite;
            vertical-align: text-bottom;
        }
        @keyframes blink {
            50% { opacity: 0; }
        }

        /* Subtitle */
        .tagline {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.5);
            max-width: 600px;
            line-height: 1.7;
            margin-bottom: 2.5rem;
        }

        /* Buttons */
        .btn-group {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 4rem;
        }

        .btn {
            padding: 14px 36px;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.05);
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
        }
        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-3px);
            border-color: rgba(255, 255, 255, 0.3);
        }

        /* Resume highlights section */
        .highlights {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            max-width: 900px;
            width: 100%;
            margin-top: 1rem;
        }

        .highlight-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 16px;
            padding: 1.5rem 1rem;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            cursor: default;
        }
        .highlight-card:hover {
            background: rgba(255, 255, 255, 0.06);
            border-color: rgba(102, 126, 234, 0.3);
            transform: translateY(-5px);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }

        .highlight-number {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea, #c084fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1;
            margin-bottom: 0.3rem;
        }

        .highlight-label {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.6);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .highlight-icon {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        /* Skill tags */
        .skills-strip {
            display: flex;
            gap: 0.6rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 3rem;
            max-width: 700px;
        }
        .skill-tag {
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: rgba(255, 255, 255, 0.5);
            transition: all 0.3s ease;
        }
        .skill-tag:hover {
            background: rgba(102, 126, 234, 0.15);
            border-color: rgba(102, 126, 234, 0.3);
            color: rgba(255, 255, 255, 0.9);
        }

        /* Divider */
        .divider {
            width: 60px;
            height: 2px;
            background: linear-gradient(90deg, #667eea, transparent);
            margin: 1.5rem auto;
            border-radius: 2px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            .typing-wrapper {
                font-size: 1rem;
            }
            .tagline {
                font-size: 0.95rem;
                padding: 0 0.5rem;
            }
            .highlights {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }
            .highlight-card {
                padding: 1rem;
            }
            .highlight-number {
                font-size: 1.5rem;
            }
            .btn {
                padding: 12px 28px;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .highlights {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>
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

    <script>
        // Typing effect - cycles through roles
        const roles = [
            'building scalable systems with Laravel & React',
            'crafting intuitive user experiences',
            'optimizing backend performance',
            'integrating RESTful APIs & third-party services',
            'leading end-to-end feature delivery',
        ];

        const taglines = [
            '10+ years of experience building scalable web applications',
            'From architecture to deployment — full-stack expertise',
            'Passionate about clean code & great user experiences',
            'Laravel · React · MySQL — the full stack toolkit',
        ];

        let roleIndex = 0;
        let charIndex = 0;
        let isDeleting = false;
        const typingElement = document.getElementById('typing-text');
        const taglineElement = document.getElementById('dynamic-tagline');
        let taglineIndex = 0;

        function typeEffect() {
            const currentRole = roles[roleIndex];
            
            if (!isDeleting) {
                typingElement.textContent = currentRole.substring(0, charIndex + 1);
                charIndex++;
                if (charIndex === currentRole.length) {
                    isDeleting = true;
                    setTimeout(typeEffect, 2000);
                    return;
                }
                setTimeout(typeEffect, 40);
            } else {
                typingElement.textContent = currentRole.substring(0, charIndex - 1);
                charIndex--;
                if (charIndex === 0) {
                    isDeleting = false;
                    roleIndex = (roleIndex + 1) % roles.length;
                    // update tagline
                    taglineIndex = (taglineIndex + 1) % taglines.length;
                    taglineElement.textContent = taglines[taglineIndex];
                    setTimeout(typeEffect, 500);
                    return;
                }
                setTimeout(typeEffect, 20);
            }
        }

        // Start typing effect
        setTimeout(typeEffect, 1000);

        // Particle effect on mouse move (subtle)
        document.addEventListener('mousemove', (e) => {
            const orbs = document.querySelectorAll('.orb');
            const x = (e.clientX / window.innerWidth) * 20 - 10;
            const y = (e.clientY / window.innerHeight) * 20 - 10;
            orbs.forEach((orb, i) => {
                orb.style.transform = `translate(${x * (i + 1) * 0.2}px, ${y * (i + 1) * 0.2}px)`;
            });
        });
    </script>
</body>
</html>