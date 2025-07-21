<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUSY RIDE - Premium Ride Sharing</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #0a0a0a;
            color: #ffffff;
            overflow-x: hidden;
            line-height: 1.6;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Navigation */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(10, 10, 10, 0.9);
            backdrop-filter: blur(20px);
            z-index: 1000;
            padding: 20px 0;
            transition: all 0.3s ease;
        }

        nav.scrolled {
            background: rgba(10, 10, 10, 0.95);
            padding: 15px 0;
        }

        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 32px;
            font-weight: 900;
            background: linear-gradient(135deg, #ff6b6b, #4ecdc4, #45b7d1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -1px;
        }

        .nav-links {
            display: flex;
            gap: 40px;
            list-style: none;
        }

        .nav-links a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #ff6b6b, #4ecdc4);
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .cta-button {
            background: linear-gradient(135deg, #ff6b6b, #ff8e8e);
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(255, 107, 107, 0.3);
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(255, 107, 107, 0.5);
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            background: radial-gradient(circle at 20% 50%, rgba(255, 107, 107, 0.1) 0%, transparent 50%), 
                        radial-gradient(circle at 80% 20%, rgba(78, 205, 196, 0.1) 0%, transparent 50%), 
                        radial-gradient(circle at 40% 80%, rgba(69, 183, 209, 0.1) 0%, transparent 50%);
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="%23ffffff" stroke-width="0.5" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            animation: gridMove 20s linear infinite;
        }

        @keyframes gridMove {
            0% { transform: translate(0, 0); }
            100% { transform: translate(10px, 10px); }
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .hero-text h1 {
            font-size: clamp(3rem, 6vw, 7rem);
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 30px;
            background: linear-gradient(135deg, #ffffff, #a0a0a0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: slideInLeft 1s ease-out;
        }

        .hero-text .highlight {
            background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-text p {
            font-size: 1.4rem;
            color: #b0b0b0;
            margin-bottom: 40px;
            animation: slideInLeft 1s ease-out 0.2s both;
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
            animation: slideInLeft 1s ease-out 0.4s both;
        }

        .btn-primary {
            background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
            color: white;
            padding: 18px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 15px 40px rgba(255, 107, 107, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 50px rgba(255, 107, 107, 0.5);
        }

        .btn-secondary {
            background: transparent;
            color: white;
            padding: 18px 40px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .btn-secondary:hover {
            border-color: #4ecdc4;
            background: rgba(78, 205, 196, 0.1);
            transform: translateY(-3px);
        }

        .hero-visual {
            position: relative;
            animation: slideInRight 1s ease-out;
        }

        .phone-mockup {
            width: 300px;
            height: 600px;
            background: linear-gradient(135deg, #1a1a1a, #2a2a2a);
            border-radius: 40px;
            margin: 0 auto;
            padding: 20px;
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.5);
            position: relative;
            overflow: hidden;
        }

        .phone-mockup::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.1), rgba(78, 205, 196, 0.1));
            border-radius: 40px;
        }

        .phone-screen {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
            border-radius: 30px;
            position: relative;
            overflow: hidden;
        }

        .app-interface {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
        }

        .app-interface .app-logo {
            font-size: 2rem;
            font-weight: 900;
            margin-bottom: 20px;
        }

        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .floating-car {
            position: absolute;
            width: 60px;
            height: 40px;
            background: linear-gradient(135deg, #ff6b6b, #ff8e8e);
            border-radius: 10px;
            animation: float 6s ease-in-out infinite;
        }

        .floating-car:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-car:nth-child(2) {
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .floating-car:nth-child(3) {
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        /* Features Section */
        .features {
            padding: 120px 0;
            background: linear-gradient(135deg, #0a0a0a, #151515);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 40px;
            margin-top: 80px;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 40px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, #ff6b6b, transparent);
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            border-color: rgba(255, 107, 107, 0.3);
            box-shadow: 0 20px 60px rgba(255, 107, 107, 0.1);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
            font-size: 2rem;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: #ffffff;
        }

        .feature-card p {
            color: #b0b0b0;
            line-height: 1.6;
        }

        /* Stats Section */
        .stats {
            padding: 80px 0;
            background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            text-align: center;
        }

        .stat-item h3 {
            font-size: 3rem;
            font-weight: 900;
            color: white;
            margin-bottom: 10px;
        }

        .stat-item p {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.9);
        }

        /* CTA Section */
        .cta-section {
            padding: 120px 0;
            text-align: center;
            background: radial-gradient(circle at center, rgba(255, 107, 107, 0.1) 0%, transparent 70%);
        }

        .cta-section h2 {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 900;
            margin-bottom: 30px;
            background: linear-gradient(135deg, #ffffff, #a0a0a0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .cta-section p {
            font-size: 1.3rem;
            color: #b0b0b0;
            margin-bottom: 50px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .app-stores {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
        }

        .app-store-btn {
            display: flex;
            align-items: center;
            gap: 15px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 15px 25px;
            text-decoration: none;
            color: white;
            transition: all 0.3s ease;
        }

        .app-store-btn:hover {
            transform: translateY(-3px);
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 107, 107, 0.5);
        }

        .app-store-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        /* Footer */
        footer {
            background: #0a0a0a;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 60px 0 30px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-section h4 {
            color: #ffffff;
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 10px;
        }

        .footer-section ul li a {
            color: #b0b0b0;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section ul li a:hover {
            color: #ff6b6b;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #b0b0b0;
        }

        /* Animations */
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-content {
                grid-template-columns: 1fr;
                gap: 40px;
                text-align: center;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn-primary, .btn-secondary {
                width: 100%;
                max-width: 300px;
            }

            .nav-links {
                display: none;
            }

            .phone-mockup {
                width: 250px;
                height: 500px;
            }

            .app-stores {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <nav id="navbar">
        <div class="container">
            <div class="nav-content">
                <div class="logo">BUSY RIDE</div>
                <ul class="nav-links">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#pricing">Pricing</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <a href="login.php" class="cta-button">get start</a>
            </div>
        </div>
    </nav>

    <section class="hero" id="home">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>The Future of <span class="highlight">Urban Mobility</span></h1>
                    <p>Experience seamless, premium ride-sharing with BUSY RIDE. Connect instantly with verified drivers, enjoy transparent pricing, and travel in style.</p>
                    <div class="hero-buttons">
                        <a href="driver create account.php" class="btn-primary">Book Your Ride</a>
                        <a href="#" class="btn-secondary">Become a Driver</a>
                    </div>
                </div>
                <div class="hero-visual">
                    <div class="phone-mockup">
                        <div class="phone-screen">
                            <div class="app-interface">
                                <div class="app-logo">BUSY RIDE</div>
                                <p>Your ride is 2 minutes away</p>
                            </div>
                        </div>
                    </div>
                    <div class="floating-elements">
                        <div class="floating-car"></div>
                        <div class="floating-car"></div>
                        <div class="floating-car"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="features" id="features">
        <div class="container">
            <div style="text-align: center; margin-bottom: 60px;">
                <h2 style="font-size: clamp(2.5rem, 5vw, 4rem); font-weight: 900; margin-bottom: 20px; background: linear-gradient(135deg, #ffffff, #a0a0a0); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Why Choose BUSY RIDE?</h2>
                <p style="font-size: 1.3rem; color: #b0b0b0;">Experience the next generation of ride-sharing technology</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🚗</div>
                    <h3>Instant Booking</h3>
                    <p>Book your ride in seconds with our AI-powered matching system. No waiting, no hassle.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">💎</div>
                    <h3>Premium Experience</h3>
                    <p>Luxury vehicles, professional drivers, and premium amenities for every journey.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🔒</div>
                    <h3>Safe & Secure</h3>
                    <p>Advanced safety features, background-checked drivers, and 24/7 support.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">💰</div>
                    <h3>Transparent Pricing</h3>
                    <p>No surge pricing, no hidden fees. Just honest, upfront pricing you can trust.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🌍</div>
                    <h3>Eco-Friendly</h3>
                    <p>Carbon-neutral rides with our fleet of electric and hybrid vehicles.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">⚡</div>
                    <h3>Lightning Fast</h3>
                    <p>Average pickup time of 3 minutes with our optimized routing system.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <h3>2M+</h3>
                    <p>Happy Customers</p>
                </div>
                <div class="stat-item">
                    <h3>50K+</h3>
                    <p>Verified Drivers</p>
                </div>
                <div class="stat-item">
                    <h3>100+</h3>
                    <p>Cities Covered</p>
                </div>
                <div class="stat-item">
                    <h3>99.9%</h3>
                    <p>Uptime</p>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container">
            <h2>Ready to Transform Your Commute?</h2>
            <p>Join millions of satisfied customers who've made the switch to BUSY RIDE. Download our app and experience the future of transportation today.</p>
            <div class="hero-buttons">
                <a href="#" class="btn-primary">Start Your Journey</a>
            </div>
            <div class="app-stores">
                <a href="#" class="app-store-btn">
                    <div class="app-store-icon">📱</div>
                    <div>
                        <div style="font-size: 0.9rem; color: #b0b0b0;">Download on the</div>
                        <div style="font-weight: 600;">App Store</div>
                    </div>
                </a>
                <a href="#" class="app-store-btn">
                    <div class="app-store-icon">🤖</div>
                    <div>
                        <div style="font-size: 0.9rem; color: #b0b0b0;">Get it on</div>
                        <div style="font-weight: 600;">Google Play</div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>BUSY RIDE</h4>
                    <p style="color: #b0b0b0;">The future of urban mobility, today.</p>
                </div>
                <div class="footer-section">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Support</h4>
                    <ul>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Safety</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Privacy</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Drivers</h4>
                    <ul>
                        <li><a href="#">Drive with Us</a></li>
                        <li><a href="#">Driver Requirements</a></li>
                        <li><a href="#">Earnings</a></li>
                        <li><a href="#">Resources</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 BUSY RIDE. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'fadeInUp 0.8s ease-out forwards';
                }
            });
        }, observerOptions);

        // Observe feature cards
        document.querySelectorAll('.feature-card').forEach(card => {
            observer.observe(card);
        });

        // Counter animation for stats
        const animateCounters = () => {
            const counters = document.querySelectorAll('.stat-item h3');
            counters.forEach(counter => {
                const target = parseInt(counter.textContent.replace(/[^0-9]/g, ''));
                const duration = 2000;
                const increment = target / (duration / 16);
                let current = 0;
                
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    
                    const suffix = counter.textContent.replace(/[0-9]/g, '');
                    if (target >= 1000000) {
                        counter.textContent = (current / 1000000).toFixed(1) + 'M' + suffix.replace(/[0-9.M]/g, '');
                    } else if (target >= 1000) {
                        counter.textContent = (current / 1000).toFixed(0) + 'K' + suffix.replace(/[0-9K]/g, '');
                    } else {
                        counter.textContent = current.toFixed(1) + suffix.replace(/[0-9.]/g, '');
                    }
                }, 16);
            });
        };

        // Trigger counter animation when stats section is visible
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    statsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        const statsSection = document.querySelector('.stats');
        if (statsSection) {
            statsObserver.observe(statsSection);
        }

        // Add parallax effect to hero background
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const hero = document.querySelector('.hero');
            if (hero) {
                hero.style.transform = `translateY(${scrolled * 0.5}px)`;
            }
        });

        // Add floating animation to cars
        const floatingCars = document.querySelectorAll('.floating-car');
        floatingCars.forEach((car, index) => {
            car.style.animationDelay = `${index * 2}s`;
        });
    </script>
</body>
</html>