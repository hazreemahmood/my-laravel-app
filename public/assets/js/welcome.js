/**
 * Welcome Page - Anime.js Powered Animations
 * Professional entrance sequence, scroll-triggered reveals, and interactive effects
 */
(function() {
    'use strict';

    // ========================================
    // 1. ORB CONTINUOUS MORPHING
    //    Orbs follow complex paths using Anime.js
    // ========================================
    function animateOrbs() {
        const orbs = document.querySelectorAll('[data-orb]');
        if (!orbs.length) return;

        const orbConfigs = [
            {
                // Orb 1: large figure-8 path
                translateX: [-100, 30, -60, 40, -100],
                translateY: [-100, -40, 20, -60, -100],
                scale: [1, 1.08, 0.95, 1.05, 1],
                duration: 14000,
            },
            {
                // Orb 2: gentle diagonal drift
                translateX: [0, -40, 20, -30, 0],
                translateY: [0, -30, -50, -20, 0],
                scale: [1, 0.95, 1.07, 1.02, 1],
                duration: 18000,
            },
            {
                // Orb 3: smaller wandering
                translateX: [0, 50, -30, 60, 0],
                translateY: [0, -30, 20, -20, 0],
                scale: [1, 1.05, 0.92, 1.03, 1],
                duration: 12000,
            },
        ];

        orbs.forEach(function(orb, i) {
            if (!orbConfigs[i]) return;
            function loop() {
                anime({
                    targets: orb,
                    translateX: orbConfigs[i].translateX,
                    translateY: orbConfigs[i].translateY,
                    scale: orbConfigs[i].scale,
                    duration: orbConfigs[i].duration,
                    easing: 'easeInOutSine',
                    loop: true,
                    direction: 'alternate',
                });
            }
            loop();
        });
    }

    // ========================================
    // 2. HERO LOAD SEQUENCE (2-3s)
    //    Choreographed entrance using timeline
    // ========================================
    function heroEntrance() {
        const logoCircle = document.querySelector('[data-logo-circle]');
        const titleEl = document.querySelector('[data-animate="title"]');
        const typingEl = document.querySelector('[data-animate="typing"]');
        const dividerEl = document.querySelector('[data-animate="divider"]');
        const taglineEl = document.querySelector('[data-animate="tagline"]');
        const buttonsEl = document.querySelector('[data-animate="buttons"]');
        const highlights = document.querySelectorAll('[data-highlight]');
        const skills = document.querySelectorAll('[data-skill]');
        const pulseRings = document.querySelectorAll('[data-logo-pulse]');

        // Set initial states
        // IMPORTANT: Only set opacity on elements we animate directly,
        // NOT on parent containers of animated children (opacity:0 parent = invisible children)
        if (logoCircle) {
            logoCircle.style.opacity = '0';
            logoCircle.style.transform = 'scale(0.2) rotate(-180deg)';
        }
        if (titleEl) {
            // DO NOT set opacity on h1 parent - we animate children spans inside it
            const titleText = titleEl.textContent;
            titleEl.innerHTML = '';
            for (var i = 0; i < titleText.length; i++) {
                var span = document.createElement('span');
                span.textContent = titleText[i] === ' ' ? '\u00A0' : titleText[i];
                span.style.display = 'inline-block';
                span.style.opacity = '0';
                span.style.transform = 'translateY(-60px)';
                titleEl.appendChild(span);
            }
        }
        if (typingEl) {
            typingEl.style.opacity = '0';
            typingEl.style.transform = 'translateY(10px)';
        }
        if (dividerEl) {
            dividerEl.style.opacity = '0';
            dividerEl.style.transform = 'scaleX(0)';
        }
        if (taglineEl) {
            taglineEl.style.opacity = '0';
            taglineEl.style.transform = 'translateY(15px)';
        }
        if (buttonsEl) {
            // Set initial state on individual buttons (not the parent group)
            var btns = buttonsEl.querySelectorAll('[data-btn]');
            btns.forEach(function(b) {
                b.style.opacity = '0';
                b.style.transform = 'translateY(30px)';
            });
        }
        highlights.forEach(function(h) {
            h.style.opacity = '0';
            h.style.transform = 'translateY(40px) scale(0.93)';
        });
        skills.forEach(function(s) {
            s.style.opacity = '0';
            s.style.transform = 'translateY(20px)';
        });

        // ---- Build timeline ----
        var tl = anime.timeline({
            easing: 'easeOutExpo',
        });

        // Step 1: Logo elastic bounce (0s - 0.8s)
        if (logoCircle) {
            tl.add({
                targets: logoCircle,
                opacity: [0, 1],
                scale: { value: 1, duration: 800, easing: 'easeOutElastic(1, 0.6)' },
                rotate: { value: 0, duration: 600, easing: 'easeOutCirc' },
                duration: 800,
            }, 0);
        }

        // Step 1b: Pulse rings start (0.3s) - handled outside timeline to avoid timeline blocking
        if (pulseRings.length) {
            pulseRings.forEach(function(ring, i) {
                anime({
                    targets: ring,
                    scale: [
                        { value: 0.8, duration: 1 },
                        { value: 1.6, duration: 1200, easing: 'easeOutCirc' },
                    ],
                    opacity: [
                        { value: 0.6, duration: 1 },
                        { value: 0, duration: 1200 },
                    ],
                    duration: 1400,
                    loop: true,
                    delay: i * 1000,
                });
            });
        }

        // Step 2: Title letters stagger in (0.6s)
        if (titleEl) {
            var titleLetters = titleEl.querySelectorAll('span');
            tl.add({
                targets: titleLetters,
                opacity: [0, 1],
                translateY: [-60, 0],
                duration: 700,
                delay: anime.stagger(50),
            }, 600);
        }

        // Step 3: Typing wrapper fades in (1.2s)
        if (typingEl) {
            tl.add({
                targets: typingEl,
                opacity: [0, 1],
                translateY: [10, 0],
                duration: 500,
            }, 1200);
        }

        // Step 4: Divider scales in (1.7s)
        if (dividerEl) {
            tl.add({
                targets: dividerEl,
                opacity: [0, 1],
                scaleX: [0, 1],
                duration: 500,
                easing: 'easeOutBack',
            }, 1700);
        }

        // Step 5: Tagline fades in (1.9s)
        if (taglineEl) {
            tl.add({
                targets: taglineEl,
                opacity: [0, 1],
                translateY: [15, 0],
                duration: 500,
            }, 1900);
        }

        // Step 6: Buttons slide up (2.2s)
        if (buttonsEl) {
            var btns = buttonsEl.querySelectorAll('[data-btn]');
            if (btns.length) {
                tl.add({
                    targets: btns,
                    opacity: [0, 1],
                    translateY: [30, 0],
                    duration: 600,
                    delay: anime.stagger(120),
                    easing: 'easeOutBack',
                }, 2200);
            } else {
                tl.add({
                    targets: buttonsEl,
                    opacity: [0, 1],
                    translateY: [30, 0],
                    duration: 600,
                }, 2200);
            }
        }

        // Step 7: Highlight cards stagger (2.6s)
        if (highlights.length) {
            tl.add({
                targets: highlights,
                opacity: [0, 1],
                translateY: [40, 0],
                scale: [0.93, 1],
                duration: 600,
                delay: anime.stagger(100),
                easing: 'easeOutExpo',
            }, 2600);
        }

        // Step 8: Skill tags wave in (3.0s)
        if (skills.length) {
            tl.add({
                targets: skills,
                opacity: [0, 1],
                translateY: [20, 0],
                duration: 400,
                delay: anime.stagger(40, { from: 'center' }),
                easing: 'easeOutQuad',
            }, 3000);
        }
    }

    // ========================================
    // 3. TYPING EFFECT (starts after entrance)
    // ========================================
    function initTyping() {
        var typingElement = document.getElementById('typing-text');
        var taglineElement = document.getElementById('dynamic-tagline');
        var cursor = document.querySelector('.cursor');

        if (!typingElement) return;

        // Blink cursor with Anime
        if (cursor) {
            anime({
                targets: cursor,
                opacity: [1, 0],
                duration: 800,
                loop: true,
                direction: 'alternate',
                easing: 'steps(1)',
            });
        }

        var roles = [
            'building scalable systems with Laravel & React',
            'crafting intuitive user experiences',
            'optimizing backend performance',
            'integrating RESTful APIs & third-party services',
            'leading end-to-end feature delivery',
        ];

        var taglines = [
            '10+ years of experience building scalable web applications',
            'From architecture to deployment — full-stack expertise',
            'Passionate about clean code & great user experiences',
            'Laravel · React · MySQL — the full stack toolkit',
        ];

        var roleIndex = 0;
        var charIndex = 0;
        var isDeleting = false;
        var taglineIndex = 0;

        // Start typing after hero entrance (~3.4s)
        var startDelay = 3400;

        function typeEffect() {
            var currentRole = roles[roleIndex];

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
                    if (taglineElement) {
                        // Animate tagline swap
                        anime({
                            targets: taglineElement,
                            opacity: [1, 0],
                            duration: 200,
                            complete: function() {
                                taglineIndex = (taglineIndex + 1) % taglines.length;
                                taglineElement.textContent = taglines[taglineIndex];
                                anime({
                                    targets: taglineElement,
                                    opacity: [0, 1],
                                    duration: 400,
                                });
                            }
                        });
                    }
                    setTimeout(typeEffect, 500);
                    return;
                }
                setTimeout(typeEffect, 20);
            }
        }

        setTimeout(typeEffect, startDelay);
    }

    // ========================================
    // 4. SCROLL-TRIGGERED ANIMATIONS
    //    IntersectionObserver + Anime.js
    // ========================================
    function initScrollAnimations() {
        // -- 4a. Job Stats count-up --
        var statObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    // First, animate the section itself visible
                    anime({
                        targets: entry.target,
                        opacity: [0, 1],
                        translateY: [30, 0],
                        duration: 600,
                        easing: 'easeOutExpo',
                    });
                    var stats = entry.target.querySelectorAll('[data-stat]');
                    stats.forEach(function(stat, i) {
                        var numberEl = stat.querySelector('[data-stat-target]');
                        if (!numberEl) return;
                        var targetVal = numberEl.getAttribute('data-stat-target');
                        numberEl.textContent = '0';

                        // If it's a numeric value, animate count-up
                        if (!isNaN(parseFloat(targetVal)) && targetVal.indexOf('+') === -1) {
                            anime({
                                targets: numberEl,
                                innerHTML: [0, parseInt(targetVal)],
                                duration: 1500,
                                delay: i * 200,
                                easing: 'easeOutQuad',
                                round: 1,
                                update: function(anim) {
                                    numberEl.textContent = Math.round(anim.animatables[0].target.innerHTML);
                                }
                            });
                        } else {
                            // For "10+" or "∞" or emoji, just fade it in
                            numberEl.textContent = targetVal;
                            anime({
                                targets: numberEl,
                                opacity: [0, 1],
                                scale: [1.5, 1],
                                duration: 600,
                                delay: i * 200,
                                easing: 'easeOutBack',
                            });
                        }
                    });
                    statObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.4 });

        var statsSection = document.querySelector('[data-scroll="stats"]');
        if (statsSection) {
            statObserver.observe(statsSection);
        }

        // -- 4b. Journey header fade-in --
        var journeyObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    anime({
                        targets: entry.target,
                        opacity: [0, 1],
                        translateY: [30, 0],
                        duration: 800,
                        easing: 'easeOutExpo',
                    });
                    journeyObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });

        var journeyHeader = document.querySelector('[data-scroll="journey-header"]');
        if (journeyHeader) journeyObserver.observe(journeyHeader);

        // -- 4c. Job cards stagger entrance --
        var cardsObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    // First fade in the container itself (CSS [data-scroll] sets opacity:0)
                    anime({
                        targets: entry.target,
                        opacity: [0, 1],
                        translateY: [30, 0],
                        duration: 500,
                        easing: 'easeOutExpo',
                    });
                    var cards = entry.target.querySelectorAll('[data-job-card]');
                    anime({
                        targets: cards,
                        opacity: [0, 1],
                        translateX: function(el, i) {
                            return i % 2 === 0 ? [-40, 0] : [40, 0];
                        },
                        duration: 700,
                        delay: anime.stagger(150),
                        easing: 'easeOutExpo',
                    });
                    cardsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        var jobCardsContainer = document.querySelector('[data-scroll="job-cards"]');
        if (jobCardsContainer) cardsObserver.observe(jobCardsContainer);

        // -- 4d. Anime.js expand/collapse for job cards (replaces CSS max-height) --
        setupCardExpandCollapse();
    }

    // ========================================
    // 5. JOB CARD EXPAND/COLLAPSE (Anime.js)
    // ========================================
    function setupCardExpandCollapse() {
        var jobCards = document.querySelectorAll('[data-job-card]');

        jobCards.forEach(function(card) {
            card.addEventListener('click', function(e) {
                // Don't toggle if clicking a tag badge
                if (e.target.closest('.job-tag')) return;

                var details = card.querySelector('[data-card-details]');
                if (!details) return;

                var isActive = card.classList.contains('active');

                // Close all other cards
                jobCards.forEach(function(otherCard) {
                    if (otherCard !== card && otherCard.classList.contains('active')) {
                        var otherDetails = otherCard.querySelector('[data-card-details]');
                        var otherInner = otherDetails ? otherDetails.querySelector('.job-card-details-inner') : null;
                        var otherHeight = otherInner ? otherInner.scrollHeight : 0;
                        otherCard.classList.remove('active');
                        if (otherDetails) {
                            anime({
                                targets: otherDetails,
                                height: [otherHeight, 0],
                                opacity: [1, 0],
                                duration: 350,
                                easing: 'easeInOutQuad',
                            });
                        }
                    }
                });

                if (isActive) {
                    // Close this card
                    var height = details.querySelector('.job-card-details-inner').scrollHeight;
                    card.classList.remove('active');
                    anime({
                        targets: details,
                        height: [height, 0],
                        opacity: [1, 0],
                        duration: 350,
                        easing: 'easeInOutQuad',
                    });
                } else {
                    // Open this card
                    card.classList.add('active');
                    details.style.height = '0';
                    details.style.opacity = '0';
                    var innerHeight = details.querySelector('.job-card-details-inner').scrollHeight;
                    anime({
                        targets: details,
                        height: [0, innerHeight],
                        opacity: [0, 1],
                        duration: 400,
                        easing: 'easeOutQuad',
                    });
                }
            });
        });
    }

    // ========================================
    // 6. BUTTON MAGNETIC EFFECT
    //    Buttons subtly follow cursor
    // ========================================
    function initMagneticButtons() {
        var btns = document.querySelectorAll('[data-btn]');
        btns.forEach(function(btn) {
            btn.addEventListener('mousemove', function(e) {
                var rect = btn.getBoundingClientRect();
                var x = e.clientX - rect.left - rect.width / 2;
                var y = e.clientY - rect.top - rect.height / 2;
                var strength = 8;
                anime({
                    targets: btn,
                    translateX: (x / rect.width) * strength,
                    translateY: (y / rect.height) * strength,
                    duration: 200,
                    easing: 'easeOutQuad',
                });
            });
            btn.addEventListener('mouseleave', function() {
                anime({
                    targets: btn,
                    translateX: 0,
                    translateY: 0,
                    duration: 400,
                    easing: 'easeOutElastic',
                });
            });
        });
    }

    // ========================================
    // 7. SKILL TAG RIPPLE ON HOVER
    // ========================================
    function initSkillRipple() {
        var skills = document.querySelectorAll('[data-skill]');
        skills.forEach(function(skill) {
            skill.addEventListener('mouseenter', function(e) {
                // Create ripple element
                var ripple = document.createElement('span');
                ripple.style.cssText = 'position:absolute;top:50%;left:50%;width:0;height:0;border-radius:50%;background:rgba(102,126,234,0.25);transform:translate(-50%,-50%);pointer-events:none;z-index:-1;';
                skill.style.position = 'relative';
                skill.style.overflow = 'hidden';
                skill.appendChild(ripple);
                anime({
                    targets: ripple,
                    width: [0, skill.offsetWidth * 1.5],
                    height: [0, skill.offsetWidth * 1.5],
                    opacity: [0.6, 0],
                    duration: 500,
                    easing: 'easeOutQuad',
                    complete: function() {
                        if (ripple.parentNode) ripple.parentNode.removeChild(ripple);
                    },
                });
            });
        });
    }

    // ========================================
    // 8. LOGO HOVER EFFECT (gentle pulse)
    // ========================================
    function initLogoHover() {
        var logo = document.querySelector('[data-logo-circle]');
        if (!logo) return;

        logo.addEventListener('mouseenter', function() {
            anime({
                targets: logo,
                scale: [1, 1.08],
                boxShadow: ['0 0 40px rgba(102,126,234,0.3)', '0 0 70px rgba(102,126,234,0.6)'],
                duration: 400,
                easing: 'easeOutQuad',
            });
        });
        logo.addEventListener('mouseleave', function() {
            anime({
                targets: logo,
                scale: [1.08, 1],
                boxShadow: ['0 0 70px rgba(102,126,234,0.6)', '0 0 40px rgba(102,126,234,0.3)'],
                duration: 600,
                easing: 'easeOutElastic',
            });
        });
    }

    // ========================================
    // 9. CURSOR GLOW TRAIL (Minimal)
    // ========================================
    function initMouseGlow() {
        var glow = document.createElement('div');
        glow.style.cssText = 'position:fixed;width:300px;height:300px;border-radius:50%;background:radial-gradient(circle,rgba(102,126,234,0.04) 0%,transparent 70%);pointer-events:none;z-index:9999;transform:translate(-50%,-50%);opacity:0;';
        document.body.appendChild(glow);

        var timeoutId = null;
        document.addEventListener('mousemove', function(e) {
            glow.style.left = e.clientX + 'px';
            glow.style.top = e.clientY + 'px';
            if (glow.style.opacity === '0') {
                anime({
                    targets: glow,
                    opacity: [0, 1],
                    duration: 500,
                    easing: 'easeOutQuad',
                });
            }
            clearTimeout(timeoutId);
            timeoutId = setTimeout(function() {
                anime({
                    targets: glow,
                    opacity: [1, 0],
                    duration: 1000,
                    easing: 'easeOutQuad',
                });
            }, 2000);
        });
    }

    // ========================================
    // INIT: Fire everything on DOM ready
    // ========================================
    document.addEventListener('DOMContentLoaded', function() {
        // Continuous background effects (start immediately)
        animateOrbs();

        // Hero load sequence
        heroEntrance();

        // Typing starts after entrance completes
        initTyping();

        // Scroll-triggered animations
        initScrollAnimations();

        // Interactive effects
        initMagneticButtons();
        initSkillRipple();
        initLogoHover();
        initMouseGlow();
    });

})();