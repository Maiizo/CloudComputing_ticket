<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TWICE 5TH WORLD TOUR ‘READY TO BE’ | Official Concert Ticketing</title>
    <meta name="description" content="Official ticket sales and VIP Soundcheck packages for TWICE 5TH WORLD TOUR 'READY TO BE'. Book your official seats now!">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Syne:wght@700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Canvas Confetti for Celebration -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.2/dist/confetti.browser.min.js"></script>

    <!-- Tailwind CSS with Custom Config -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        twice: {
                            apricot: '#FCC89B',
                            apricotLight: '#FFE3CC',
                            magenta: '#FF5FA2',
                            magentaDark: '#D42D75',
                            neon: '#FF007F',
                            dark: '#0B0B14',
                            surface: '#131322',
                            card: '#1B1A30',
                            border: 'rgba(255, 95, 162, 0.25)',
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        display: ['Syne', '"Plus Jakarta Sans"', 'sans-serif']
                    },
                    animation: {
                        'pulse-glow': 'pulseGlow 3s ease-in-out infinite',
                        'float': 'floating 4s ease-in-out infinite',
                        'gradient-x': 'gradientX 8s ease infinite',
                    },
                    keyframes: {
                        pulseGlow: {
                            '0%, 100%': { filter: 'drop-shadow(0 0 15px rgba(255, 95, 162, 0.6))' },
                            '50%': { filter: 'drop-shadow(0 0 30px rgba(252, 200, 155, 0.8))' },
                        },
                        floating: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                        gradientX: {
                            '0%, 100%': { 'background-size': '200% 200%', 'background-position': 'left center' },
                            '50%': { 'background-size': '200% 200%', 'background-position': 'right center' },
                        }
                    }
                }
            }
        }
    </script>

    <style>
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #0B0B14;
        }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #FF5FA2, #FCC89B);
            border-radius: 9999px;
        }

        .twice-gradient-text {
            background: linear-gradient(135deg, #FCC89B 0%, #FF5FA2 50%, #FF9EAA 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .twice-gradient-bg {
            background: linear-gradient(135deg, #FF5FA2 0%, #FCC89B 100%);
        }

        .glass-panel {
            background: rgba(22, 21, 38, 0.72);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .glass-panel-glow {
            background: rgba(27, 26, 48, 0.75);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 95, 162, 0.3);
            box-shadow: 0 10px 40px -10px rgba(255, 95, 162, 0.2);
        }

        .ticket-perforated {
            position: relative;
            background-color: #17152B;
            background-image: radial-gradient(#262243 1px, transparent 1px);
            background-size: 16px 16px;
        }

        .ticket-cutout-left, .ticket-cutout-right {
            position: absolute;
            top: 68%;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: #0B0B14;
            transform: translateY(-50%);
            z-index: 20;
        }
        .ticket-cutout-left { left: -12px; }
        .ticket-cutout-right { right: -12px; }

        .seat-section {
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
        }
        .seat-section:hover {
            filter: brightness(1.25);
            stroke-width: 3px;
        }
        .seat-section.active {
            stroke: #FFFFFF !important;
            stroke-width: 3.5px;
            filter: drop-shadow(0 0 10px currentColor);
        }

        /* Neon light shimmer */
        .stage-glow {
            box-shadow: 0 0 60px 10px rgba(255, 95, 162, 0.35);
        }
    </style>
</head>
<body class="bg-twice-dark text-slate-100 font-sans selection:bg-twice-magenta selection:text-white antialiased min-h-screen overflow-x-hidden">

    <!-- Top Flash Announcement Bar -->
    <aside aria-label="Announcement" class="bg-gradient-to-r from-twice-magentaDark via-twice-magenta to-twice-apricot text-white py-2 px-4 text-xs md:text-sm font-semibold tracking-wide">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-2 truncate">
                <span class="bg-black/30 backdrop-blur-sm px-2.5 py-0.5 rounded-full text-[11px] uppercase tracking-wider font-bold">VIP Live</span>
                <span class="truncate">🌟 ONCE 4th Gen Official Presale active! VIP Soundcheck is at <strong>8% remaining</strong>.</span>
            </div>
            <div class="hidden sm:flex items-center space-x-4 text-xs font-bold">
                <span class="flex items-center"><i class="fa-solid fa-bolt text-yellow-300 mr-1.5 animate-bounce"></i> Real-Time Seat Lock Enabled</span>
                <span class="text-white/40">|</span>
                <button type="button" onclick="scrollToSection('booking')" class="underline hover:text-black transition">Direct Buy &rarr;</button>
            </div>
        </div>
    </aside>

    <!-- Navigation Header -->
    <header class="sticky top-0 z-50 glass-panel border-b border-white/10 backdrop-blur-xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <!-- Brand Logo -->
            <a href="#" class="flex items-center space-x-3 group">
                <div class="w-11 h-11 rounded-2xl twice-gradient-bg flex items-center justify-center shadow-lg shadow-twice-magenta/30 group-hover:scale-105 transition transform">
                    <i class="fa-solid fa-candy-cane text-white text-xl transform -rotate-12"></i>
                </div>
                <div>
                    <div class="flex items-center space-x-1.5">
                        <span class="font-display font-extrabold text-2xl tracking-tighter text-white">TWICE</span>
                        <span class="text-[10px] uppercase font-bold tracking-widest px-1.5 py-0.5 rounded bg-twice-magenta/30 text-twice-apricot border border-twice-magenta/50">LIVE</span>
                    </div>
                    <p class="text-[10px] tracking-widest uppercase text-slate-400 font-semibold">Ready To Be World Tour</p>
                </div>
            </a>

            <!-- Navigation Links -->
            <nav class="hidden md:flex items-center space-x-8 text-sm font-medium text-slate-300">
                <button type="button" onclick="scrollToSection('tour')" class="hover:text-twice-magenta transition flex items-center space-x-1.5">
                    <span>Tour Dates</span>
                </button>
                <button type="button" onclick="scrollToSection('stage-map')" class="hover:text-twice-magenta transition flex items-center space-x-1.5">
                    <span>Stage &amp; Seat Map</span>
                </button>
                <button type="button" onclick="scrollToSection('booking')" class="hover:text-twice-magenta transition flex items-center space-x-1.5">
                    <span>VIP &amp; Tiers</span>
                </button>
                <button type="button" onclick="scrollToSection('perks')" class="hover:text-twice-magenta transition flex items-center space-x-1.5">
                    <span>Candybong Perks</span>
                </button>
                <button type="button" onclick="scrollToSection('faq')" class="hover:text-twice-magenta transition flex items-center space-x-1.5">
                    <span>Concert Guide</span>
                </button>
            </nav>

            <!-- Actions & Currency & Wallet -->
            <div class="flex items-center space-x-3">
                <!-- Currency Selector -->
                <div class="relative inline-block text-xs">
                    <label for="currencySelect" class="sr-only">Select Currency</label>
                    <select id="currencySelect" onchange="updateCurrency(this.value)" class="bg-twice-surface border border-white/20 text-slate-200 rounded-xl px-3 py-2 pr-7 text-xs font-semibold focus:outline-none focus:border-twice-magenta cursor-pointer hover:bg-white/10 transition appearance-none">
                        <option value="USD">USD ($)</option>
                        <option value="IDR" selected>IDR (Rp)</option>
                        <option value="KRW">KRW (₩)</option>
                        <option value="SGD">SGD (S$)</option>
                        <option value="JPY">JPY (¥)</option>
                    </select>
                    <i class="fa-solid fa-chevron-down absolute right-2.5 top-1/2 -translate-y-1/2 text-[10px] text-slate-400 pointer-events-none"></i>
                </div>

                <!-- My Tickets / Pass Button -->
                <button type="button" onclick="openTicketModal()" id="myTicketsBtn" class="hidden sm:inline-flex items-center space-x-2 px-3.5 py-2 rounded-xl bg-white/5 border border-white/15 hover:bg-white/10 text-xs font-semibold text-slate-200 transition">
                    <i class="fa-solid fa-ticket text-twice-magenta"></i>
                    <span>My Ticket</span>
                    <span id="ticketBadge" class="hidden w-2 h-2 rounded-full bg-emerald-400"></span>
                </button>

                <!-- Buy CTA -->
                <button type="button" onclick="scrollToSection('booking')" class="px-5 py-2.5 rounded-xl twice-gradient-bg text-white font-bold text-xs uppercase tracking-wider shadow-lg shadow-twice-magenta/25 hover:shadow-twice-magenta/40 hover:scale-[1.02] active:scale-[0.98] transition transform flex items-center space-x-2">
                    <i class="fa-solid fa-sparkles"></i>
                    <span>Get Tickets</span>
                </button>
            </div>
        </div>
    </header>

    <!-- HERO SECTION: Stage Atmosphere & Countdown -->
    <section class="relative pt-12 pb-24 lg:pt-20 lg:pb-32 overflow-hidden">
        <!-- Ambient Glowing Stage Background Lights -->
        <div class="absolute -top-40 left-1/2 -translate-x-1/2 w-[700px] sm:w-[1000px] h-[550px] bg-gradient-to-b from-twice-magenta/30 via-twice-apricot/20 to-transparent blur-3xl pointer-events-none rounded-full opacity-70"></div>
        <div class="absolute top-1/3 -left-40 w-96 h-96 bg-twice-magenta/20 blur-[130px] rounded-full pointer-events-none"></div>
        <div class="absolute top-1/3 -right-40 w-96 h-96 bg-twice-apricot/25 blur-[130px] rounded-full pointer-events-none"></div>

        <!-- Stage Spotlights CSS lines -->
        <div class="absolute inset-0 pointer-events-none opacity-30 bg-[radial-gradient(#ffffff15_1px,transparent_1px)] [background-size:24px_24px]"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <!-- Tour Header Pills -->
                <div class="inline-flex items-center space-x-3 bg-white/5 border border-white/15 px-4 py-2 rounded-full mb-6 backdrop-blur-md">
                    <span class="w-2.5 h-2.5 rounded-full bg-twice-magenta animate-ping"></span>
                    <span class="text-xs sm:text-sm font-semibold tracking-wider uppercase text-slate-300">
                        JYP ENTERTAINMENT OFFICIAL WORLD TOUR
                    </span>
                    <span class="text-white/30">•</span>
                    <span class="text-xs sm:text-sm font-bold text-twice-apricot">STADIUM ENCORE</span>
                </div>

                <!-- Giant Title -->
                <h1 class="font-display font-extrabold text-4xl sm:text-6xl md:text-7xl lg:text-8xl tracking-tight leading-none mb-6">
                    TWICE 5<sup class="text-2xl sm:text-4xl text-twice-magenta">TH</sup> WORLD TOUR
                    <span class="block twice-gradient-text text-5xl sm:text-7xl md:text-8xl lg:text-9xl mt-2 tracking-normal drop-shadow-[0_10px_35px_rgba(255,95,162,0.45)]">
                        ‘READY TO BE’
                    </span>
                </h1>

                <p class="text-slate-300 text-base sm:text-xl font-normal max-w-2xl mx-auto mb-8 leading-relaxed">
                    Experience NAYEON, JEONGYEON, MOMO, SANA, JIHYO, MINA, DAHYUN, CHAEYOUNG, and TZUYU live in an unforgettable 3.5-hour stadium extravaganza!
                </p>

                <!-- Event Details Grid Badge -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 max-w-3xl mx-auto mb-10 text-left">
                    <div class="glass-panel p-3.5 rounded-2xl border border-white/10 flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-xl bg-twice-magenta/20 text-twice-magenta flex items-center justify-center text-lg">
                            <i class="fa-regular fa-calendar-star"></i>
                        </div>
                        <div>
                            <p class="text-[11px] uppercase tracking-wider text-slate-400 font-semibold">Concert Date</p>
                            <p class="text-xs sm:text-sm font-bold text-white">DEC 23, 2026</p>
                        </div>
                    </div>

                    <div class="glass-panel p-3.5 rounded-2xl border border-white/10 flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-xl bg-twice-apricot/20 text-twice-apricot flex items-center justify-center text-lg">
                            <i class="fa-regular fa-clock"></i>
                        </div>
                        <div>
                            <p class="text-[11px] uppercase tracking-wider text-slate-400 font-semibold">Showtime</p>
                            <p class="text-xs sm:text-sm font-bold text-white">19:00 WIB (Gate 14:00)</p>
                        </div>
                    </div>

                    <div class="glass-panel p-3.5 rounded-2xl border border-white/10 flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-xl bg-purple-500/20 text-purple-400 flex items-center justify-center text-lg">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div class="truncate">
                            <p class="text-[11px] uppercase tracking-wider text-slate-400 font-semibold">Stadium Venue</p>
                            <p class="text-xs sm:text-sm font-bold text-white truncate" title="Jakarta International Stadium">JIS, Jakarta</p>
                        </div>
                    </div>

                    <div class="glass-panel p-3.5 rounded-2xl border border-white/10 flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-lg">
                            <i class="fa-solid fa-shield-check"></i>
                        </div>
                        <div>
                            <p class="text-[11px] uppercase tracking-wider text-slate-400 font-semibold">Ticketing</p>
                            <p class="text-xs sm:text-sm font-bold text-white">100% Guaranteed</p>
                        </div>
                    </div>
                </div>

                <!-- Live Countdown Timer -->
                <div class="mb-10 inline-block bg-twice-surface/80 border border-twice-magenta/40 px-6 py-4 rounded-3xl shadow-xl backdrop-blur-xl">
                    <p class="text-xs uppercase font-bold tracking-widest text-slate-400 mb-3 flex items-center justify-center space-x-2">
                        <i class="fa-solid fa-hourglass-half text-twice-apricot animate-spin" style="animation-duration: 4s;"></i>
                        <span>COUNTDOWN TO SHOWTIME</span>
                    </p>
                    <div class="flex items-center space-x-3 sm:space-x-6 text-center" id="countdown">
                        <div>
                            <span id="days" class="font-display font-extrabold text-2xl sm:text-4xl text-white">54</span>
                            <span class="block text-[10px] uppercase font-bold tracking-wider text-slate-400">Days</span>
                        </div>
                        <span class="text-xl sm:text-2xl text-twice-magenta font-black">:</span>
                        <div>
                            <span id="hours" class="font-display font-extrabold text-2xl sm:text-4xl text-white">08</span>
                            <span class="block text-[10px] uppercase font-bold tracking-wider text-slate-400">Hours</span>
                        </div>
                        <span class="text-xl sm:text-2xl text-twice-magenta font-black">:</span>
                        <div>
                            <span id="minutes" class="font-display font-extrabold text-2xl sm:text-4xl text-white">42</span>
                            <span class="block text-[10px] uppercase font-bold tracking-wider text-slate-400">Mins</span>
                        </div>
                        <span class="text-xl sm:text-2xl text-twice-magenta font-black">:</span>
                        <div>
                            <span id="seconds" class="font-display font-extrabold text-2xl sm:text-4xl text-twice-apricot">19</span>
                            <span class="block text-[10px] uppercase font-bold tracking-wider text-slate-400">Secs</span>
                        </div>
                    </div>
                </div>

                <!-- CTAs -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <button type="button" onclick="scrollToSection('booking')" class="w-full sm:w-auto px-8 py-4 rounded-2xl twice-gradient-bg text-white font-bold text-base uppercase tracking-wider shadow-xl shadow-twice-magenta/35 hover:shadow-twice-magenta/60 hover:scale-105 active:scale-95 transition transform flex items-center justify-center space-x-3">
                        <i class="fa-solid fa-ticket-simple text-lg"></i>
                        <span>Select Tickets &amp; Book Now</span>
                    </button>
                    <button type="button" onclick="scrollToSection('stage-map')" class="w-full sm:w-auto px-7 py-4 rounded-2xl bg-white/5 border border-white/20 text-white font-bold text-base hover:bg-white/10 hover:border-white/40 transition flex items-center justify-center space-x-2">
                        <i class="fa-solid fa-map-location-dot text-twice-apricot"></i>
                        <span>Explore Stadium Layout</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: INTERACTIVE STAGE & SEATING MAP -->
    <section id="stage-map" class="py-16 bg-twice-dark/90 border-t border-b border-white/5 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <span class="text-xs uppercase tracking-widest text-twice-magenta font-bold">Interactive Seat Selector</span>
                <h2 class="font-display font-extrabold text-3xl sm:text-5xl text-white mt-1">Stadium Seating Layout</h2>
                <p class="text-slate-400 text-sm sm:text-base mt-2">Click on any section on the map to instantly choose your ticket tier and view availability.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <!-- SVG Stage Map Visualizer -->
                <div class="lg:col-span-8 bg-twice-surface/90 border border-white/10 rounded-3xl p-6 sm:p-8 shadow-2xl relative overflow-hidden">
                    <div class="flex items-center justify-between mb-4 pb-3 border-b border-white/10">
                        <div class="flex items-center space-x-2">
                            <span class="w-3 h-3 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span class="text-xs font-semibold text-slate-300">Live Stage &amp; Extended T-Runway Map</span>
                        </div>
                        <span class="text-xs text-slate-400 bg-white/5 px-2.5 py-1 rounded-lg">Zoom: Fit Screen</span>
                    </div>

                    <!-- Vector SVG Map of Stadium -->
                    <div class="w-full max-w-xl mx-auto flex justify-center py-4">
                        <svg viewBox="0 0 600 520" class="w-full h-auto max-h-[460px] select-none" xmlns="http://www.w3.org/2000/svg">
                            <!-- Definitions: Gradients & Shadows -->
                            <defs>
                                <linearGradient id="mainStageGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#FF5FA2" />
                                    <stop offset="100%" stop-color="#9C27B0" />
                                </linearGradient>
                                <linearGradient id="runwayGrad" x1="0%" y1="0%" x2="0%" y2="100%">
                                    <stop offset="0%" stop-color="#FF5FA2" />
                                    <stop offset="100%" stop-color="#FCC89B" />
                                </linearGradient>
                                <filter id="glowEffect" x="-20%" y="-20%" width="140%" height="140%">
                                    <feGaussianBlur stdDeviation="5" result="blur" />
                                    <feComposite in="SourceGraphic" in2="blur" operator="over" />
                                </filter>
                            </defs>

                            <!-- Stadium Outer Rim (Cat 4) -->
                            <path d="M 60 170 C 60 40, 540 40, 540 170 L 530 460 C 530 500, 70 500, 70 460 Z"
                                  fill="#1A2639" stroke="#334E68" stroke-width="2" />

                            <!-- Cat 4 Upper Bleachers -->
                            <path id="map-cat4" class="seat-section" onclick="selectTierFromMap('cat4')"
                                  d="M 80 180 C 80 70, 520 70, 520 180 L 510 440 C 510 475, 90 475, 90 440 Z"
                                  fill="#243B53" stroke="#486581" stroke-width="2">
                                <title>CAT 4 - General Bleachers</title>
                            </path>

                            <!-- Cat 3 Upper Bowl -->
                            <path id="map-cat3" class="seat-section" onclick="selectTierFromMap('cat3')"
                                  d="M 115 190 C 115 105, 485 105, 485 190 L 475 410 C 475 440, 125 440, 125 410 Z"
                                  fill="#4C2889" stroke="#7952B3" stroke-width="2">
                                <title>CAT 3 - Upper Tier Reserved</title>
                            </path>

                            <!-- Cat 2 Lower Bowl -->
                            <path id="map-cat2" class="seat-section" onclick="selectTierFromMap('cat2')"
                                  d="M 155 200 C 155 140, 445 140, 445 200 L 435 375 C 435 400, 165 400, 165 375 Z"
                                  fill="#B45309" stroke="#F59E0B" stroke-width="2">
                                <title>CAT 2 - Lower Tier Center</title>
                            </path>

                            <!-- Cat 1 Ground Floor Reserved -->
                            <path id="map-cat1" class="seat-section" onclick="selectTierFromMap('cat1')"
                                  d="M 195 210 C 195 170, 405 170, 405 210 L 395 345 C 395 365, 205 365, 205 345 Z"
                                  fill="#9F1239" stroke="#F43F5E" stroke-width="2">
                                <title>CAT 1 - Ground Floor Ready Zone</title>
                            </path>

                            <!-- VIP Soundcheck PIT A (Left) -->
                            <polygon id="map-vip-a" class="seat-section" onclick="selectTierFromMap('vip')"
                                     points="210,135 275,135 275,225 210,225"
                                     fill="#FF007F" stroke="#FF5FA2" stroke-width="2">
                                <title>VIP Soundcheck - PIT A</title>
                            </polygon>
                            <text x="242" y="185" fill="#FFFFFF" font-size="11" font-weight="bold" text-anchor="middle" pointer-events="none">VIP-A</text>

                            <!-- VIP Soundcheck PIT B (Right) -->
                            <polygon id="map-vip-b" class="seat-section" onclick="selectTierFromMap('vip')"
                                     points="325,135 390,135 390,225 325,225"
                                     fill="#FF007F" stroke="#FF5FA2" stroke-width="2">
                                <title>VIP Soundcheck - PIT B</title>
                            </polygon>
                            <text x="358" y="185" fill="#FFFFFF" font-size="11" font-weight="bold" text-anchor="middle" pointer-events="none">VIP-B</text>

                            <!-- STAGE COMPLEX -->
                            <!-- Extended Thrust Runway (T-Stage) -->
                            <rect x="282" y="100" width="36" height="135" fill="url(#runwayGrad)" rx="3" stroke="#FFFFFF" stroke-width="1.5" />
                            <!-- Center B-Stage Diamond -->
                            <polygon points="300,215 322,235 300,255 278,235" fill="#FCC89B" stroke="#FFFFFF" stroke-width="2" filter="url(#glowEffect)" />
                            <text x="300" y="239" fill="#000000" font-size="9" font-weight="800" text-anchor="middle" pointer-events="none">B-STAGE</text>

                            <!-- MAIN STAGE -->
                            <rect x="180" y="55" width="240" height="50" rx="10" fill="url(#mainStageGrad)" stroke="#FFFFFF" stroke-width="2" filter="url(#glowEffect)" />
                            <text x="300" y="85" fill="#FFFFFF" font-size="16" font-family="'Syne', sans-serif" font-weight="800" text-anchor="middle" letter-spacing="2" pointer-events="none">
                                MAIN STAGE
                            </text>

                            <!-- Stage LED screens indicator -->
                            <rect x="195" y="47" width="210" height="5" rx="2" fill="#FFFFFF" opacity="0.9" />

                            <!-- Audio Towers / FOH Mixer Console -->
                            <rect x="270" y="300" width="60" height="25" rx="4" fill="#0B0B14" stroke="#64748B" stroke-width="1.5" />
                            <text x="300" y="316" fill="#94A3B8" font-size="9" font-weight="700" text-anchor="middle">FOH AUDIO</text>

                            <!-- Section Labels on Map -->
                            <text x="300" y="285" fill="#FDA4AF" font-size="11" font-weight="700" text-anchor="middle" pointer-events="none">CAT 1 FLOOR</text>
                            <text x="300" y="370" fill="#FDE68A" font-size="11" font-weight="700" text-anchor="middle" pointer-events="none">CAT 2 LOWER</text>
                            <text x="300" y="425" fill="#DDD6FE" font-size="11" font-weight="700" text-anchor="middle" pointer-events="none">CAT 3 UPPER</text>
                            <text x="300" y="468" fill="#BAE6FD" font-size="11" font-weight="700" text-anchor="middle" pointer-events="none">CAT 4 BLEACHERS</text>
                        </svg>
                    </div>

                    <!-- Map Legend -->
                    <div class="grid grid-cols-2 sm:grid-cols-5 gap-2 pt-4 border-t border-white/10 text-xs">
                        <div class="flex items-center space-x-2">
                            <span class="w-3.5 h-3.5 rounded bg-[#FF007F] inline-block shadow"></span>
                            <span class="text-slate-300 font-medium">VIP Soundcheck</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-3.5 h-3.5 rounded bg-[#9F1239] inline-block shadow"></span>
                            <span class="text-slate-300 font-medium">CAT 1 Ground</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-3.5 h-3.5 rounded bg-[#B45309] inline-block shadow"></span>
                            <span class="text-slate-300 font-medium">CAT 2 Lower</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-3.5 h-3.5 rounded bg-[#4C2889] inline-block shadow"></span>
                            <span class="text-slate-300 font-medium">CAT 3 Upper</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="w-3.5 h-3.5 rounded bg-[#243B53] inline-block shadow"></span>
                            <span class="text-slate-300 font-medium">CAT 4 General</span>
                        </div>
                    </div>
                </div>

                <!-- Stage Insights & Live Advice -->
                <div class="lg:col-span-4 space-y-4">
                    <div class="glass-panel-glow p-6 rounded-3xl">
                        <div class="flex items-center justify-between mb-3">
                            <span class="px-2.5 py-1 rounded-full bg-twice-magenta/20 text-twice-magenta text-xs font-bold uppercase tracking-wider">
                                Recommended
                            </span>
                            <span class="text-xs text-emerald-400 font-semibold"><i class="fa-solid fa-circle-check"></i> Highest Rated</span>
                        </div>
                        <h3 class="font-display font-bold text-xl text-white">VIP Soundcheck Experience</h3>
                        <p class="text-slate-300 text-xs sm:text-sm mt-1 leading-relaxed">
                            Stand right against the extended B-Stage runway. Watch TWICE rehearse exclusive acoustic tracks 3 hours before doors open!
                        </p>
                        <div class="mt-4 pt-4 border-t border-white/10 flex items-center justify-between">
                            <div>
                                <span class="text-xs text-slate-400">Starting from</span>
                                <p class="text-xl font-extrabold text-twice-apricot" id="spotlightPrice">Rp 4.200.000</p>
                            </div>
                            <button type="button" onclick="selectTier('vip'); scrollToSection('booking');" class="px-4 py-2 rounded-xl twice-gradient-bg text-white font-bold text-xs uppercase tracking-wider hover:opacity-90 transition">
                                Choose VIP &rarr;
                            </button>
                        </div>
                    </div>

                    <div class="glass-panel p-5 rounded-3xl border border-white/10 space-y-3">
                        <h4 class="font-bold text-sm text-white flex items-center space-x-2">
                            <i class="fa-solid fa-circle-info text-twice-apricot"></i>
                            <span>Stadium View Guidelines</span>
                        </h4>
                        <ul class="text-xs text-slate-300 space-y-2">
                            <li class="flex items-start space-x-2">
                                <i class="fa-solid fa-check text-twice-magenta mt-0.5"></i>
                                <span><strong>VIP &amp; CAT 1</strong> include physical commemorative souvenir wristbands &amp; fast-track entry.</span>
                            </li>
                            <li class="flex items-start space-x-2">
                                <i class="fa-solid fa-check text-twice-magenta mt-0.5"></i>
                                <span><strong>CAT 2 &amp; 3</strong> are tiered amphitheater rows with zero obstruction to the stage lasers &amp; LED screens.</span>
                            </li>
                            <li class="flex items-start space-x-2">
                                <i class="fa-solid fa-check text-twice-magenta mt-0.5"></i>
                                <span>All tiers enjoy full <strong>Candybong Infinity Bluetooth Sync</strong> throughout the 3.5-hour concert.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: TICKET SELECTION & LIVE CHECKOUT FORM -->
    <section id="booking" class="py-20 relative">
        <!-- Background light elements -->
        <div class="absolute top-1/4 right-0 w-80 h-80 bg-twice-magenta/15 blur-[120px] rounded-full pointer-events-none"></div>
        <div class="absolute bottom-10 left-10 w-80 h-80 bg-twice-apricot/15 blur-[120px] rounded-full pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-14">
                <span class="inline-block px-3 py-1 rounded-full bg-twice-magenta/20 text-twice-magenta font-bold text-xs uppercase tracking-wider mb-2">
                    Step 1 of 2: Select Your Experience
                </span>
                <h2 class="font-display font-extrabold text-3xl sm:text-5xl text-white">Choose Your Ticket Tier</h2>
                <p class="text-slate-400 text-sm sm:text-base mt-2">
                    Select your preferred tier below. Maximum 4 tickets per registered ONCE member ID.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- LEFT COLUMN: TICKET TIERS LIST -->
                <div class="lg:col-span-7 space-y-4">
                    <!-- TIER 1: VIP SOUNDCHECK -->
                    <div id="card-vip" onclick="selectTier('vip')" class="tier-card p-5 sm:p-6 rounded-3xl glass-panel border-2 border-transparent hover:border-twice-magenta/60 cursor-pointer transition-all relative overflow-hidden group">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                            <div class="space-y-1">
                                <div class="flex items-center space-x-2.5">
                                    <span class="w-3.5 h-3.5 rounded-full bg-[#FF007F] inline-block shadow-lg shadow-pink-500/50"></span>
                                    <h3 class="font-display font-bold text-lg sm:text-xl text-white group-hover:text-twice-magenta transition">
                                        VIP Soundcheck Package
                                    </h3>
                                    <span class="px-2 py-0.5 rounded-full bg-red-500/20 text-red-400 font-bold text-[10px] uppercase tracking-wide border border-red-500/30">
                                        Only 8 Left
                                    </span>
                                </div>
                                <p class="text-xs text-slate-300">Front Pit A/B • Soundcheck Party • VIP Laminate &amp; Lanyard • Priority Merchandise Access</p>
                            </div>
                            <div class="text-left sm:text-right shrink-0">
                                <span class="text-xs text-slate-400 block">Price per ticket</span>
                                <span class="font-display font-extrabold text-xl sm:text-2xl text-twice-apricot" data-tier-price="vip">
                                    Rp 4.200.000
                                </span>
                            </div>
                        </div>

                        <!-- Included Perks Pills -->
                        <div class="mt-4 pt-3 border-t border-white/10 flex flex-wrap gap-2 text-[11px] font-semibold text-slate-300">
                            <span class="bg-white/5 px-2.5 py-1 rounded-lg border border-white/10"><i class="fa-solid fa-microphone-lines text-twice-magenta mr-1"></i> Soundcheck Access</span>
                            <span class="bg-white/5 px-2.5 py-1 rounded-lg border border-white/10"><i class="fa-solid fa-id-badge text-twice-apricot mr-1"></i> Custom VIP Laminate</span>
                            <span class="bg-white/5 px-2.5 py-1 rounded-lg border border-white/10"><i class="fa-solid fa-person-walking-dashed-line-arrow-right text-emerald-400 mr-1"></i> Priority Fast-Track</span>
                        </div>
                    </div>

                    <!-- TIER 2: CAT 1 (GROUND FLOOR RESERVED) -->
                    <div id="card-cat1" onclick="selectTier('cat1')" class="tier-card p-5 sm:p-6 rounded-3xl glass-panel border-2 border-transparent hover:border-twice-magenta/60 cursor-pointer transition-all relative overflow-hidden group">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                            <div class="space-y-1">
                                <div class="flex items-center space-x-2.5">
                                    <span class="w-3.5 h-3.5 rounded-full bg-[#9F1239] inline-block shadow"></span>
                                    <h3 class="font-display font-bold text-lg sm:text-xl text-white group-hover:text-twice-magenta transition">
                                        CAT 1 - Ground Floor Ready Zone
                                    </h3>
                                    <span class="px-2 py-0.5 rounded-full bg-emerald-500/20 text-emerald-400 font-bold text-[10px] uppercase tracking-wide border border-emerald-500/30">
                                        Available
                                    </span>
                                </div>
                                <p class="text-xs text-slate-300">Numbered Arena Seating • Direct view to Main &amp; Extended B-Stage Runway</p>
                            </div>
                            <div class="text-left sm:text-right shrink-0">
                                <span class="text-xs text-slate-400 block">Price per ticket</span>
                                <span class="font-display font-extrabold text-xl sm:text-2xl text-white" data-tier-price="cat1">
                                    Rp 2.850.000
                                </span>
                            </div>
                        </div>

                        <div class="mt-4 pt-3 border-t border-white/10 flex flex-wrap gap-2 text-[11px] font-semibold text-slate-300">
                            <span class="bg-white/5 px-2.5 py-1 rounded-lg border border-white/10"><i class="fa-solid fa-chair text-twice-magenta mr-1"></i> Reserved Numbered Seat</span>
                            <span class="bg-white/5 px-2.5 py-1 rounded-lg border border-white/10"><i class="fa-solid fa-wristband text-twice-apricot mr-1"></i> Tour Wristband</span>
                        </div>
                    </div>

                    <!-- TIER 3: CAT 2 (LOWER TIER CENTER) -->
                    <div id="card-cat2" onclick="selectTier('cat2')" class="tier-card p-5 sm:p-6 rounded-3xl glass-panel border-2 border-transparent hover:border-twice-magenta/60 cursor-pointer transition-all relative overflow-hidden group">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                            <div class="space-y-1">
                                <div class="flex items-center space-x-2.5">
                                    <span class="w-3.5 h-3.5 rounded-full bg-[#B45309] inline-block shadow"></span>
                                    <h3 class="font-display font-bold text-lg sm:text-xl text-white group-hover:text-twice-magenta transition">
                                        CAT 2 - Lower Tier (Feel Special Zone)
                                    </h3>
                                    <span class="px-2 py-0.5 rounded-full bg-emerald-500/20 text-emerald-400 font-bold text-[10px] uppercase tracking-wide border border-emerald-500/30">
                                        Available
                                    </span>
                                </div>
                                <p class="text-xs text-slate-300">Lower Bowl Elevated Center • Optimal acoustics &amp; panoramic stage visuals</p>
                            </div>
                            <div class="text-left sm:text-right shrink-0">
                                <span class="text-xs text-slate-400 block">Price per ticket</span>
                                <span class="font-display font-extrabold text-xl sm:text-2xl text-white" data-tier-price="cat2">
                                    Rp 2.250.000
                                </span>
                            </div>
                        </div>

                        <div class="mt-4 pt-3 border-t border-white/10 flex flex-wrap gap-2 text-[11px] font-semibold text-slate-300">
                            <span class="bg-white/5 px-2.5 py-1 rounded-lg border border-white/10"><i class="fa-solid fa-eye text-twice-apricot mr-1"></i> Unobstructed Elevation</span>
                            <span class="bg-white/5 px-2.5 py-1 rounded-lg border border-white/10"><i class="fa-solid fa-music text-twice-magenta mr-1"></i> Balanced Audio Field</span>
                        </div>
                    </div>

                    <!-- TIER 4: CAT 3 (UPPER BOWL) -->
                    <div id="card-cat3" onclick="selectTier('cat3')" class="tier-card p-5 sm:p-6 rounded-3xl glass-panel border-2 border-transparent hover:border-twice-magenta/60 cursor-pointer transition-all relative overflow-hidden group">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                            <div class="space-y-1">
                                <div class="flex items-center space-x-2.5">
                                    <span class="w-3.5 h-3.5 rounded-full bg-[#4C2889] inline-block shadow"></span>
                                    <h3 class="font-display font-bold text-lg sm:text-xl text-white group-hover:text-twice-magenta transition">
                                        CAT 3 - Upper Tier (The Feels Zone)
                                    </h3>
                                    <span class="px-2 py-0.5 rounded-full bg-yellow-500/20 text-yellow-400 font-bold text-[10px] uppercase tracking-wide border border-yellow-500/30">
                                        Selling Fast
                                    </span>
                                </div>
                                <p class="text-xs text-slate-300">Upper Tier Seating • Full stadium ocean lightstick visual perspective</p>
                            </div>
                            <div class="text-left sm:text-right shrink-0">
                                <span class="text-xs text-slate-400 block">Price per ticket</span>
                                <span class="font-display font-extrabold text-xl sm:text-2xl text-white" data-tier-price="cat3">
                                    Rp 1.550.000
                                </span>
                            </div>
                        </div>

                        <div class="mt-4 pt-3 border-t border-white/10 flex flex-wrap gap-2 text-[11px] font-semibold text-slate-300">
                            <span class="bg-white/5 px-2.5 py-1 rounded-lg border border-white/10"><i class="fa-solid fa-wand-magic-sparkles text-purple-400 mr-1"></i> Lightstick Ocean View</span>
                        </div>
                    </div>

                    <!-- TIER 5: CAT 4 (GENERAL BLEACHERS) -->
                    <div id="card-cat4" onclick="selectTier('cat4')" class="tier-card p-5 sm:p-6 rounded-3xl glass-panel border-2 border-transparent hover:border-twice-magenta/60 cursor-pointer transition-all relative overflow-hidden group">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                            <div class="space-y-1">
                                <div class="flex items-center space-x-2.5">
                                    <span class="w-3.5 h-3.5 rounded-full bg-[#243B53] inline-block shadow"></span>
                                    <h3 class="font-display font-bold text-lg sm:text-xl text-white group-hover:text-twice-magenta transition">
                                        CAT 4 - General Bleachers
                                    </h3>
                                    <span class="px-2 py-0.5 rounded-full bg-emerald-500/20 text-emerald-400 font-bold text-[10px] uppercase tracking-wide border border-emerald-500/30">
                                        Available
                                    </span>
                                </div>
                                <p class="text-xs text-slate-300">Budget-friendly stadium seating • Giant relay screens on left and right</p>
                            </div>
                            <div class="text-left sm:text-right shrink-0">
                                <span class="text-xs text-slate-400 block">Price per ticket</span>
                                <span class="font-display font-extrabold text-xl sm:text-2xl text-white" data-tier-price="cat4">
                                    Rp 950.000
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN: ORDER SUMMARY & ATTENDEE FORM -->
                <div class="lg:col-span-5">
                    <div class="glass-panel-glow p-6 sm:p-8 rounded-3xl sticky top-28 space-y-6">
                        <!-- Top Order Status & Holding Countdown -->
                        <div class="flex items-center justify-between pb-4 border-b border-white/10">
                            <div>
                                <span class="text-xs uppercase tracking-wider text-slate-400 font-semibold">Seat Reservation</span>
                                <h3 class="font-display font-bold text-lg text-white" id="selectedTierTitle">VIP Soundcheck Package</h3>
                            </div>
                            <div class="text-right">
                                <span class="text-[10px] uppercase font-bold text-twice-magenta tracking-widest block">HOLD TIME</span>
                                <span id="holdTimer" class="font-mono text-sm font-bold text-yellow-300">09:59</span>
                            </div>
                        </div>

                        <!-- Ticket Quantity Controller -->
                        <div>
                            <label class="block text-xs uppercase tracking-wider font-bold text-slate-300 mb-2">
                                Number of Tickets (Max 4)
                            </label>
                            <div class="flex items-center space-x-3 bg-twice-dark/80 p-2 rounded-2xl border border-white/10">
                                <button type="button" onclick="adjustQty(-1)" class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 text-white font-extrabold flex items-center justify-center transition active:scale-90">
                                    <i class="fa-solid fa-minus text-xs"></i>
                                </button>
                                <span id="ticketQtyDisplay" class="flex-1 text-center font-display font-extrabold text-xl text-white">1</span>
                                <button type="button" onclick="adjustQty(1)" class="w-10 h-10 rounded-xl bg-twice-magenta hover:bg-twice-magentaDark text-white font-extrabold flex items-center justify-center transition active:scale-90">
                                    <i class="fa-solid fa-plus text-xs"></i>
                                </button>
                            </div>
                            <p class="text-[11px] text-slate-400 mt-1.5 flex items-center">
                                <i class="fa-solid fa-circle-check text-emerald-400 mr-1.5"></i> Adjacent seats will be allocated automatically.
                            </p>
                        </div>

                        <!-- Attendee Booking Form -->
                        <form id="checkoutForm" onsubmit="handleCheckout(event)" class="space-y-4">
                            <!-- ONCE Membership ID (Optional / Presale) -->
                            <div>
                                <div class="flex justify-between items-center mb-1">
                                    <label for="onceId" class="text-xs uppercase tracking-wider font-bold text-slate-300">
                                        ONCE Fanclub ID <span class="text-twice-magenta">*</span>
                                    </label>
                                    <button type="button" onclick="autofillOnceId()" class="text-[10px] text-twice-apricot underline hover:text-white transition">Demo Autofill</button>
                                </div>
                                <div class="relative">
                                    <input type="text" id="onceId" required placeholder="e.g. ONCE-984210" class="w-full bg-twice-dark/80 border border-white/20 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-twice-magenta transition">
                                    <i class="fa-solid fa-heart absolute right-3.5 top-1/2 -translate-y-1/2 text-twice-magenta text-xs"></i>
                                </div>
                            </div>

                            <!-- Full Name -->
                            <div>
                                <label for="fullName" class="block text-xs uppercase tracking-wider font-bold text-slate-300 mb-1">
                                    Full Name (as on ID / Passport) <span class="text-twice-magenta">*</span>
                                </label>
                                <input type="text" id="fullName" required placeholder="Kim Dahyun" value="Alexander Pratama" class="w-full bg-twice-dark/80 border border-white/20 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-twice-magenta transition">
                            </div>

                            <!-- Email Address -->
                            <div>
                                <label for="emailAddr" class="block text-xs uppercase tracking-wider font-bold text-slate-300 mb-1">
                                    Email Address (For E-Ticket) <span class="text-twice-magenta">*</span>
                                </label>
                                <input type="email" id="emailAddr" required placeholder="alexander@example.com" value="alexander.once@gmail.com" class="w-full bg-twice-dark/80 border border-white/20 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-twice-magenta transition">
                            </div>

                            <!-- Phone Number -->
                            <div>
                                <label for="phoneNum" class="block text-xs uppercase tracking-wider font-bold text-slate-300 mb-1">
                                    WhatsApp / Mobile Number <span class="text-twice-magenta">*</span>
                                </label>
                                <input type="tel" id="phoneNum" required placeholder="+62 812 3456 7890" value="+62 812 9876 5432" class="w-full bg-twice-dark/80 border border-white/20 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-twice-magenta transition">
                            </div>

                            <!-- Payment Method Picker -->
                            <div>
                                <label class="block text-xs uppercase tracking-wider font-bold text-slate-300 mb-2">
                                    Payment Method
                                </label>
                                <div class="grid grid-cols-3 gap-2">
                                    <label class="cursor-pointer border border-twice-magenta/40 bg-twice-magenta/10 rounded-xl p-2.5 text-center flex flex-col items-center justify-center text-xs font-semibold text-white hover:bg-twice-magenta/20 transition">
                                        <input type="radio" name="paymentMethod" value="Credit Card" checked class="sr-only">
                                        <i class="fa-regular fa-credit-card text-base text-twice-apricot mb-1"></i>
                                        <span>Credit Card</span>
                                    </label>
                                    <label class="cursor-pointer border border-white/10 bg-white/5 rounded-xl p-2.5 text-center flex flex-col items-center justify-center text-xs font-semibold text-slate-300 hover:bg-white/10 transition">
                                        <input type="radio" name="paymentMethod" value="Virtual Account" class="sr-only">
                                        <i class="fa-solid fa-building-columns text-base text-slate-400 mb-1"></i>
                                        <span>VA / Bank</span>
                                    </label>
                                    <label class="cursor-pointer border border-white/10 bg-white/5 rounded-xl p-2.5 text-center flex flex-col items-center justify-center text-xs font-semibold text-slate-300 hover:bg-white/10 transition">
                                        <input type="radio" name="paymentMethod" value="E-Wallet" class="sr-only">
                                        <i class="fa-solid fa-wallet text-base text-slate-400 mb-1"></i>
                                        <span>QRIS / Wallet</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Price Breakdown Subtotal -->
                            <div class="pt-4 border-t border-white/10 space-y-2 text-xs">
                                <div class="flex justify-between text-slate-400">
                                    <span>Tickets Subtotal (<span id="summaryQty">1</span>x)</span>
                                    <span id="summarySubtotal" class="text-slate-200 font-semibold">Rp 4.200.000</span>
                                </div>
                                <div class="flex justify-between text-slate-400">
                                    <span>Booking &amp; Handling Fee (3%)</span>
                                    <span id="summaryFee" class="text-slate-200 font-semibold">Rp 126.000</span>
                                </div>
                                <div class="flex justify-between text-slate-400">
                                    <span>Local Government Tax (10%)</span>
                                    <span id="summaryTax" class="text-slate-200 font-semibold">Rp 420.000</span>
                                </div>
                                <div class="pt-3 border-t border-white/10 flex justify-between items-baseline">
                                    <span class="text-sm font-bold text-white">Grand Total</span>
                                    <span id="summaryTotal" class="font-display font-extrabold text-2xl text-twice-magenta">Rp 4.746.000</span>
                                </div>
                            </div>

                            <!-- Submit Checkout Button -->
                            <button type="submit" id="submitBtn" class="w-full py-4 rounded-2xl twice-gradient-bg text-white font-extrabold text-sm uppercase tracking-wider shadow-lg shadow-twice-magenta/40 hover:shadow-twice-magenta/70 hover:scale-[1.01] active:scale-[0.99] transition transform flex items-center justify-center space-x-2">
                                <i class="fa-solid fa-lock text-xs"></i>
                                <span>Confirm &amp; Generate E-Ticket</span>
                            </button>
                        </form>

                        <div class="flex items-center justify-center space-x-4 text-[11px] text-slate-400 pt-2 border-t border-white/5">
                            <span class="flex items-center"><i class="fa-solid fa-shield-halved text-emerald-400 mr-1"></i> 256-Bit SSL Encrypted</span>
                            <span>•</span>
                            <span>Official JYP Licensing</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: TOUR SCHEDULE AROUND THE WORLD -->
    <section id="tour" class="py-20 bg-twice-surface/40 border-t border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14">
                <span class="text-xs uppercase tracking-widest text-twice-apricot font-bold">Global Stadium Itinerary</span>
                <h2 class="font-display font-extrabold text-3xl sm:text-5xl text-white mt-1">TWICE World Tour Dates</h2>
                <p class="text-slate-400 text-sm sm:text-base mt-2">
                    Check out all international stops of the historic ‘READY TO BE’ world tour.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                <!-- Tour Card 1: Jakarta (Active) -->
                <div class="glass-panel-glow p-6 rounded-3xl border-2 border-twice-magenta relative">
                    <span class="absolute top-4 right-4 px-2.5 py-0.5 rounded-full bg-twice-magenta text-white font-bold text-[10px] uppercase tracking-wide">
                        Selected Stop
                    </span>
                    <div class="text-twice-apricot font-display font-bold text-2xl mb-1">JAKARTA</div>
                    <p class="text-white font-semibold text-sm">Jakarta International Stadium (JIS)</p>
                    <p class="text-slate-400 text-xs mt-1">Saturday, Dec 23, 2026 • 19:00 WIB</p>
                    <div class="mt-4 pt-4 border-t border-white/10 flex items-center justify-between">
                        <span class="text-xs font-bold text-emerald-400"><i class="fa-solid fa-circle-dot animate-ping mr-1"></i> Presale Active</span>
                        <button type="button" onclick="scrollToSection('booking')" class="text-xs font-bold text-white underline hover:text-twice-magenta">Book Seats &rarr;</button>
                    </div>
                </div>

                <!-- Tour Card 2: Tokyo -->
                <div class="glass-panel p-6 rounded-3xl opacity-80 hover:opacity-100 transition">
                    <span class="float-right px-2.5 py-0.5 rounded-full bg-slate-700 text-slate-300 font-bold text-[10px] uppercase tracking-wide">
                        Sold Out
                    </span>
                    <div class="text-white font-display font-bold text-2xl mb-1">TOKYO</div>
                    <p class="text-slate-300 font-semibold text-sm">Ajinomoto Stadium / Tokyo Dome</p>
                    <p class="text-slate-400 text-xs mt-1">Jan 12-13, 2027 • 18:00 JST</p>
                    <div class="mt-4 pt-4 border-t border-white/10 flex items-center justify-between text-xs text-slate-400">
                        <span>Capacity: 55,000</span>
                        <span class="text-red-400 font-semibold">Join Waitlist</span>
                    </div>
                </div>

                <!-- Tour Card 3: Los Angeles -->
                <div class="glass-panel p-6 rounded-3xl opacity-80 hover:opacity-100 transition">
                    <span class="float-right px-2.5 py-0.5 rounded-full bg-yellow-500/20 text-yellow-400 font-bold text-[10px] uppercase tracking-wide">
                        Few Seats
                    </span>
                    <div class="text-white font-display font-bold text-2xl mb-1">LOS ANGELES</div>
                    <p class="text-slate-300 font-semibold text-sm">SoFi Stadium</p>
                    <p class="text-slate-400 text-xs mt-1">Feb 02, 2027 • 19:30 PST</p>
                    <div class="mt-4 pt-4 border-t border-white/10 flex items-center justify-between text-xs text-slate-400">
                        <span>Capacity: 70,000</span>
                        <span class="text-twice-magenta font-semibold">Resale Available</span>
                    </div>
                </div>

                <!-- Tour Card 4: Singapore -->
                <div class="glass-panel p-6 rounded-3xl opacity-80 hover:opacity-100 transition">
                    <span class="float-right px-2.5 py-0.5 rounded-full bg-slate-700 text-slate-300 font-bold text-[10px] uppercase tracking-wide">
                        Sold Out
                    </span>
                    <div class="text-white font-display font-bold text-2xl mb-1">SINGAPORE</div>
                    <p class="text-slate-300 font-semibold text-sm">Singapore National Stadium</p>
                    <p class="text-slate-400 text-xs mt-1">Feb 18, 2027 • 19:00 SGT</p>
                    <div class="mt-4 pt-4 border-t border-white/10 flex items-center justify-between text-xs text-slate-400">
                        <span>Capacity: 50,000</span>
                        <span class="text-red-400 font-semibold">Join Waitlist</span>
                    </div>
                </div>

                <!-- Tour Card 5: Seoul -->
                <div class="glass-panel p-6 rounded-3xl opacity-80 hover:opacity-100 transition">
                    <span class="float-right px-2.5 py-0.5 rounded-full bg-slate-700 text-slate-300 font-bold text-[10px] uppercase tracking-wide">
                        Sold Out
                    </span>
                    <div class="text-white font-display font-bold text-2xl mb-1">SEOUL</div>
                    <p class="text-slate-300 font-semibold text-sm">KSPO Dome / Olympic Stadium</p>
                    <p class="text-slate-400 text-xs mt-1">Mar 06-07, 2027 • 18:00 KST</p>
                    <div class="mt-4 pt-4 border-t border-white/10 flex items-center justify-between text-xs text-slate-400">
                        <span>Capacity: 45,000</span>
                        <span class="text-red-400 font-semibold">Join Waitlist</span>
                    </div>
                </div>

                <!-- Tour Card 6: London -->
                <div class="glass-panel p-6 rounded-3xl opacity-80 hover:opacity-100 transition">
                    <span class="float-right px-2.5 py-0.5 rounded-full bg-yellow-500/20 text-yellow-400 font-bold text-[10px] uppercase tracking-wide">
                        Selling Fast
                    </span>
                    <div class="text-white font-display font-bold text-2xl mb-1">LONDON</div>
                    <p class="text-slate-300 font-semibold text-sm">The O2 Arena</p>
                    <p class="text-slate-400 text-xs mt-1">Mar 24, 2027 • 19:30 GMT</p>
                    <div class="mt-4 pt-4 border-t border-white/10 flex items-center justify-between text-xs text-slate-400">
                        <span>Capacity: 20,000</span>
                        <span class="text-twice-magenta font-semibold">Limited Tiers</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: CANDYBONG LIGHTSTICK & CONCERT PERKS -->
    <section id="perks" class="py-20 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                <div class="lg:col-span-6 space-y-6">
                    <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-twice-apricot/20 text-twice-apricot text-xs font-bold uppercase tracking-wider">
                        <i class="fa-solid fa-wand-magic-sparkles"></i>
                        <span>Sync Your Lightstick</span>
                    </div>
                    <h2 class="font-display font-extrabold text-3xl sm:text-5xl text-white leading-tight">
                        Experience the Magic of Candybong Infinity
                    </h2>
                    <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                        Every seat at TWICE 5TH WORLD TOUR connects via stadium-grade Bluetooth mesh technology. Your Candybong will pulse, shift hues, and create breathtaking synchronized visual waves along with 65,000 ONCEs.
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                        <div class="glass-panel p-4 rounded-2xl">
                            <i class="fa-solid fa-bluetooth text-2xl text-twice-magenta mb-2"></i>
                            <h4 class="font-bold text-white text-sm">Automatic In-Venue Pairing</h4>
                            <p class="text-xs text-slate-400 mt-1">Sync your seat row and number directly through the official TWICE app at the gates.</p>
                        </div>
                        <div class="glass-panel p-4 rounded-2xl">
                            <i class="fa-solid fa-shirt text-2xl text-twice-apricot mb-2"></i>
                            <h4 class="font-bold text-white text-sm">Official Merch Express Booth</h4>
                            <p class="text-xs text-slate-400 mt-1">Exclusive tour t-shirts, varsity jackets, photocards, and Candybong batteries.</p>
                        </div>
                    </div>
                </div>

                <!-- Fan Experience Showcase Card -->
                <div class="lg:col-span-6">
                    <div class="ticket-perforated p-8 rounded-3xl border border-twice-magenta/40 relative shadow-2xl">
                        <div class="flex items-center justify-between mb-6">
                            <span class="text-xs font-display font-bold uppercase tracking-widest text-twice-apricot">ONCE Fan Experience Guide</span>
                            <span class="text-xs bg-white/10 px-3 py-1 rounded-full text-white font-mono">EST. 2015 - ∞</span>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-start space-x-4">
                                <div class="w-8 h-8 rounded-full bg-twice-magenta/20 text-twice-magenta flex items-center justify-center shrink-0 font-bold text-xs">
                                    01
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-white">Soundcheck Assembly</h4>
                                    <p class="text-xs text-slate-300">VIP Ticket holders must present their digital E-Ticket &amp; valid ID at Gate VIP-1 by 13:30 WIB.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div class="w-8 h-8 rounded-full bg-twice-apricot/20 text-twice-apricot flex items-center justify-center shrink-0 font-bold text-xs">
                                    02
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-white">Fan Project &amp; Slogan Distribution</h4>
                                    <p class="text-xs text-slate-300">Commemorative fan slogans will be provided on every designated seat before the encore segment.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div class="w-8 h-8 rounded-full bg-purple-500/20 text-purple-400 flex items-center justify-center shrink-0 font-bold text-xs">
                                    03
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-white">Clear Bag Stadium Policy</h4>
                                    <p class="text-xs text-slate-300">Bags larger than A4 size or non-transparent backpacks are not permitted inside the stadium bowl.</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 pt-6 border-t border-white/10 flex items-center justify-between text-xs">
                            <span class="text-slate-400">Questions about fan projects?</span>
                            <a href="#faq" class="text-twice-magenta font-bold hover:underline">Read Full FAQ &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: CONCERT GUIDE & FAQ -->
    <section id="faq" class="py-20 bg-twice-surface/60 border-t border-white/5">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-xs uppercase tracking-widest text-twice-magenta font-bold">Important Notice</span>
                <h2 class="font-display font-extrabold text-3xl sm:text-4xl text-white mt-1">Frequently Asked Questions</h2>
                <p class="text-slate-400 text-sm mt-2">Everything you need to know before joining TWICE at the stadium.</p>
            </div>

            <div class="space-y-4">
                <details class="glass-panel p-5 rounded-2xl group border border-white/10 [&_summary::-webkit-details-marker]:hidden" open>
                    <summary class="flex items-center justify-between cursor-pointer font-bold text-sm sm:text-base text-white">
                        <span>How do I receive and redeem my official E-Ticket?</span>
                        <i class="fa-solid fa-chevron-down text-xs text-slate-400 group-open:rotate-180 transition"></i>
                    </summary>
                    <p class="text-xs sm:text-sm text-slate-300 mt-3 leading-relaxed border-t border-white/10 pt-3">
                        Immediately after booking, your official digital E-Ticket with cryptographic barcode and QR pass is generated on this page and delivered to your registered email address. You can print it or display it on your phone screen at the electronic turnstile gates.
                    </p>
                </details>

                <details class="glass-panel p-5 rounded-2xl group border border-white/10 [&_summary::-webkit-details-marker]:hidden">
                    <summary class="flex items-center justify-between cursor-pointer font-bold text-sm sm:text-base text-white">
                        <span>What is included with the VIP Soundcheck Package?</span>
                        <i class="fa-solid fa-chevron-down text-xs text-slate-400 group-open:rotate-180 transition"></i>
                    </summary>
                    <p class="text-xs sm:text-sm text-slate-300 mt-3 leading-relaxed border-t border-white/10 pt-3">
                        The VIP Soundcheck Package includes admission to the exclusive pre-show artist rehearsal/soundcheck, dedicated priority gate entry, a custom commemorative tour laminate with neck lanyard, an exclusive VIP merchandise gift item, and access to designated VIP concessions.
                    </p>
                </details>

                <details class="glass-panel p-5 rounded-2xl group border border-white/10 [&_summary::-webkit-details-marker]:hidden">
                    <summary class="flex items-center justify-between cursor-pointer font-bold text-sm sm:text-base text-white">
                        <span>What is the ticket limit per buyer?</span>
                        <i class="fa-solid fa-chevron-down text-xs text-slate-400 group-open:rotate-180 transition"></i>
                    </summary>
                    <p class="text-xs sm:text-sm text-slate-300 mt-3 leading-relaxed border-t border-white/10 pt-3">
                        To prevent scalping and ensure all genuine ONCEs get seats, there is a strict limit of <strong>4 tickets per ONCE Fanclub membership / transaction</strong>. Orders exceeding this limit are subject to cancellation.
                    </p>
                </details>

                <details class="glass-panel p-5 rounded-2xl group border border-white/10 [&_summary::-webkit-details-marker]:hidden">
                    <summary class="flex items-center justify-between cursor-pointer font-bold text-sm sm:text-base text-white">
                        <span>Are cameras or DSLR recording equipment permitted?</span>
                        <i class="fa-solid fa-chevron-down text-xs text-slate-400 group-open:rotate-180 transition"></i>
                    </summary>
                    <p class="text-xs sm:text-sm text-slate-300 mt-3 leading-relaxed border-t border-white/10 pt-3">
                        Professional DSLR cameras, telephoto lenses, selfie sticks, tripods, and iPads are strictly prohibited. Standard smartphones and official Candybong lightsticks are fully welcome!
                    </p>
                </details>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-twice-dark border-t border-white/10 py-12 text-slate-400 text-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6 pb-8 border-b border-white/10">
                <div class="flex items-center space-x-3">
                    <div class="w-9 h-9 rounded-xl twice-gradient-bg flex items-center justify-center text-white font-bold">
                        <i class="fa-solid fa-candy-cane transform -rotate-12"></i>
                    </div>
                    <div>
                        <span class="font-display font-extrabold text-lg text-white">TWICE READY TO BE</span>
                        <p class="text-[11px] text-slate-500">Official Concert Ticketing Platform</p>
                    </div>
                </div>

                <div class="flex items-center space-x-6 text-slate-400 text-base">
                    <a href="https://twitter.com/JYPETWICE" target="_blank" rel="noopener" class="hover:text-twice-magenta transition" title="TWICE X / Twitter"><i class="fa-brands fa-x-twitter"></i></a>
                    <a href="https://instagram.com/twicetagram" target="_blank" rel="noopener" class="hover:text-twice-magenta transition" title="TWICE Instagram"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://youtube.com/@TWICE" target="_blank" rel="noopener" class="hover:text-twice-magenta transition" title="TWICE YouTube"><i class="fa-brands fa-youtube"></i></a>
                    <a href="https://tiktok.com/@twice_tiktok_official" target="_blank" rel="noopener" class="hover:text-twice-magenta transition" title="TWICE TikTok"><i class="fa-brands fa-tiktok"></i></a>
                </div>
            </div>

            <div class="pt-8 flex flex-col md:flex-row items-center justify-between gap-4 text-[11px] text-slate-500">
                <p>&copy; 2026 JYP Entertainment &amp; Live Nation Entertainment. All Rights Reserved.</p>
                <div class="flex space-x-6">
                    <a href="#" class="hover:text-slate-300">Privacy Policy</a>
                    <a href="#" class="hover:text-slate-300">Terms of Ticketing</a>
                    <a href="#" class="hover:text-slate-300">Fanclub Guidelines</a>
                    <a href="#" class="hover:text-slate-300">Contact Support</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- REALISTIC POPUP MODAL: OFFICIAL TWICE CONCERT E-TICKET -->
    <div id="ticketModal" class="fixed inset-0 z-50 hidden bg-black/80 backdrop-blur-md flex items-center justify-center p-4 overflow-y-auto">
        <div class="relative w-full max-w-lg my-8 animate-float">
            <!-- Close Button -->
            <button type="button" onclick="closeTicketModal()" class="absolute -top-3 -right-3 z-30 w-10 h-10 rounded-full bg-twice-surface border border-white/20 text-white flex items-center justify-center hover:bg-twice-magenta transition shadow-xl">
                <i class="fa-solid fa-xmark text-sm"></i>
            </button>

            <!-- Holographic Pass Container -->
            <div class="ticket-perforated rounded-3xl border-2 border-twice-magenta shadow-[0_0_60px_rgba(255,95,162,0.4)] overflow-hidden">
                <!-- Perforations on sides -->
                <div class="ticket-cutout-left"></div>
                <div class="ticket-cutout-right"></div>

                <!-- Top Gradient Banner -->
                <div class="twice-gradient-bg p-6 text-white text-center relative overflow-hidden">
                    <div class="absolute -right-10 -bottom-10 opacity-20 text-8xl font-black select-none pointer-events-none">
                        🍭
                    </div>
                    <div class="inline-block px-3 py-0.5 rounded-full bg-black/25 text-[11px] uppercase tracking-widest font-bold mb-2">
                        ★ OFFICIAL DIGITAL ADMISSION PASS ★
                    </div>
                    <h3 class="font-display font-extrabold text-2xl sm:text-3xl tracking-tight">TWICE 5TH WORLD TOUR</h3>
                    <p class="font-display font-bold text-lg tracking-widest text-twice-apricotLight mt-0.5">‘READY TO BE’ STADIUM ENCORE</p>
                </div>

                <!-- Ticket Details Body -->
                <div class="p-6 sm:p-8 space-y-6">
                    <!-- Venue & Date Header -->
                    <div class="flex items-center justify-between pb-4 border-b border-white/10 text-xs">
                        <div>
                            <span class="text-slate-400 block uppercase font-bold text-[10px]">VENUE</span>
                            <span class="font-bold text-white text-sm">JAKARTA INT'L STADIUM (JIS)</span>
                        </div>
                        <div class="text-right">
                            <span class="text-slate-400 block uppercase font-bold text-[10px]">DATE &amp; TIME</span>
                            <span class="font-bold text-twice-apricot text-sm">DEC 23, 2026 • 19:00 WIB</span>
                        </div>
                    </div>

                    <!-- Attendee & Tier Details Grid -->
                    <div class="grid grid-cols-2 gap-4 text-xs">
                        <div>
                            <span class="text-slate-400 block uppercase text-[10px] font-bold">ATTENDEE NAME</span>
                            <span id="ticketAttendeeName" class="font-bold text-white text-sm truncate block">Alexander Pratama</span>
                        </div>
                        <div>
                            <span class="text-slate-400 block uppercase text-[10px] font-bold">FANCLUB REF</span>
                            <span id="ticketOnceId" class="font-mono font-bold text-twice-magenta text-sm block">ONCE-984210</span>
                        </div>
                        <div>
                            <span class="text-slate-400 block uppercase text-[10px] font-bold">TICKET TIER</span>
                            <span id="ticketTierName" class="font-bold text-white text-sm block">VIP Soundcheck</span>
                        </div>
                        <div>
                            <span class="text-slate-400 block uppercase text-[10px] font-bold">TICKETS QTY</span>
                            <span id="ticketQuantity" class="font-bold text-white text-sm block">1 Person(s)</span>
                        </div>
                    </div>

                    <!-- Seat Allotment Box -->
                    <div class="bg-twice-dark/90 p-4 rounded-2xl border border-white/10 grid grid-cols-3 gap-2 text-center">
                        <div>
                            <span class="text-[10px] uppercase font-bold text-slate-400 block">GATE</span>
                            <span id="ticketGate" class="font-display font-extrabold text-base text-twice-apricot">GATE VIP-1</span>
                        </div>
                        <div class="border-x border-white/10">
                            <span class="text-[10px] uppercase font-bold text-slate-400 block">SECTION</span>
                            <span id="ticketSection" class="font-display font-extrabold text-base text-white">PIT A</span>
                        </div>
                        <div>
                            <span class="text-[10px] uppercase font-bold text-slate-400 block">SEAT(S)</span>
                            <span id="ticketSeats" class="font-display font-extrabold text-base text-twice-magenta">ROW C: 14</span>
                        </div>
                    </div>

                    <!-- Perforation Line Divider -->
                    <div class="border-b-2 border-dashed border-white/20 -mx-8 my-6"></div>

                    <!-- Barcode and Live QR Code Display -->
                    <div class="text-center space-y-3">
                        <div class="flex justify-center items-center">
                            <!-- High Quality SVG QR Code Simulation -->
                            <div class="bg-white p-3 rounded-2xl shadow-xl inline-block">
                                <svg class="w-32 h-32" viewBox="0 0 100 100" fill="black">
                                    <!-- QR Pattern Mockup -->
                                    <path d="M0,0 h30 v30 h-30 z M5,5 h20 v20 h-20 z M10,10 h10 v10 h-10 z" />
                                    <path d="M70,0 h30 v30 h-30 z M75,5 h20 v20 h-20 z M80,10 h10 v10 h-10 z" />
                                    <path d="M0,70 h30 v30 h-30 z M5,75 h20 v20 h-20 z M10,80 h10 v10 h-10 z" />
                                    <rect x="35" y="5" width="5" height="15" />
                                    <rect x="45" y="10" width="10" height="5" />
                                    <rect x="35" y="25" width="25" height="5" />
                                    <rect x="5" y="35" width="15" height="5" />
                                    <rect x="25" y="35" width="10" height="10" />
                                    <rect x="40" y="35" width="20" height="10" />
                                    <rect x="65" y="35" width="30" height="5" />
                                    <rect x="5" y="50" width="25" height="5" />
                                    <rect x="35" y="50" width="30" height="10" />
                                    <rect x="70" y="50" width="10" height="20" />
                                    <rect x="85" y="45" width="10" height="10" />
                                    <rect x="35" y="65" width="15" height="15" />
                                    <rect x="55" y="65" width="10" height="10" />
                                    <rect x="70" y="75" width="25" height="5" />
                                    <rect x="55" y="80" width="10" height="15" />
                                    <rect x="40" y="85" width="10" height="10" />
                                    <rect x="80" y="85" width="15" height="10" />
                                </svg>
                            </div>
                        </div>

                        <!-- Barcode Simulation lines -->
                        <div class="w-full flex justify-center items-center space-x-1 h-8 opacity-80 pt-1">
                            <span class="w-1 h-8 bg-white inline-block"></span>
                            <span class="w-0.5 h-8 bg-white inline-block"></span>
                            <span class="w-2 h-8 bg-white inline-block"></span>
                            <span class="w-1 h-8 bg-white inline-block"></span>
                            <span class="w-0.5 h-8 bg-white inline-block"></span>
                            <span class="w-1.5 h-8 bg-white inline-block"></span>
                            <span class="w-0.5 h-8 bg-white inline-block"></span>
                            <span class="w-2 h-8 bg-white inline-block"></span>
                            <span class="w-1 h-8 bg-white inline-block"></span>
                            <span class="w-0.5 h-8 bg-white inline-block"></span>
                            <span class="w-1.5 h-8 bg-white inline-block"></span>
                            <span class="w-0.5 h-8 bg-white inline-block"></span>
                            <span class="w-2 h-8 bg-white inline-block"></span>
                            <span class="w-1 h-8 bg-white inline-block"></span>
                            <span class="w-0.5 h-8 bg-white inline-block"></span>
                            <span class="w-2 h-8 bg-white inline-block"></span>
                        </div>
                        <p id="ticketBarcodeCode" class="font-mono text-xs text-slate-400 tracking-widest font-semibold">
                            *TWICE-JIS-2026-9842*
                        </p>
                    </div>

                    <!-- Action buttons -->
                    <div class="grid grid-cols-2 gap-3 pt-2">
                        <button type="button" onclick="downloadTicketSim()" class="py-3 px-4 rounded-xl bg-white/10 hover:bg-white/20 text-white font-bold text-xs uppercase tracking-wider transition flex items-center justify-center space-x-2">
                            <i class="fa-solid fa-download"></i>
                            <span>Download PDF</span>
                        </button>
                        <button type="button" onclick="walletSim()" class="py-3 px-4 rounded-xl twice-gradient-bg text-white font-bold text-xs uppercase tracking-wider shadow-lg shadow-twice-magenta/30 hover:scale-[1.02] transition flex items-center justify-center space-x-2">
                            <i class="fa-brands fa-apple text-sm"></i>
                            <span>Add to Wallet</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT: PRICING, CURRENCIES, SEAT MAP INTERACTIVITY, CHECKOUT & TICKET PASS -->
    <script>
        // Pricing definitions in base IDR
        const TIER_DATA = {
            vip: {
                name: 'VIP Soundcheck Package',
                basePriceIDR: 4200000,
                gate: 'GATE VIP-1',
                section: 'PIT A (Front Stage)',
                cardId: 'card-vip',
                mapIds: ['map-vip-a', 'map-vip-b']
            },
            cat1: {
                name: 'CAT 1 - Ground Floor Ready Zone',
                basePriceIDR: 2850000,
                gate: 'GATE 2 (Floor South)',
                section: 'SECTOR 102 (Center Floor)',
                cardId: 'card-cat1',
                mapIds: ['map-cat1']
            },
            cat2: {
                name: 'CAT 2 - Lower Tier (Feel Special)',
                basePriceIDR: 2250000,
                gate: 'GATE 4 (Lower West)',
                section: 'SECTOR 208 (Lower Elevated)',
                cardId: 'card-cat2',
                mapIds: ['map-cat2']
            },
            cat3: {
                name: 'CAT 3 - Upper Tier (The Feels)',
                basePriceIDR: 1550000,
                gate: 'GATE 6 (Upper East)',
                section: 'SECTOR 314 (Upper Bowl)',
                cardId: 'card-cat3',
                mapIds: ['map-cat3']
            },
            cat4: {
                name: 'CAT 4 - General Bleachers',
                basePriceIDR: 950000,
                gate: 'GATE 8 (General North)',
                section: 'SECTOR 420 (Skyline Bleachers)',
                cardId: 'card-cat4',
                mapIds: ['map-cat4']
            }
        };

        // Currency Exchange Rates
        const CURRENCIES = {
            IDR: { symbol: 'Rp ', rate: 1, decimals: 0, thousandsSep: '.' },
            USD: { symbol: '$', rate: 1 / 15500, decimals: 0, thousandsSep: ',' },
            KRW: { symbol: '₩', rate: 1 / 11.5, decimals: 0, thousandsSep: ',' },
            SGD: { symbol: 'S$', rate: 1 / 11700, decimals: 0, thousandsSep: ',' },
            JPY: { symbol: '¥', rate: 1 / 102, decimals: 0, thousandsSep: ',' }
        };

        let currentCurrency = 'IDR';
        let selectedTierKey = 'vip';
        let ticketQty = 1;
        let activeTicketOrder = null;

        // Format currency helper
        function formatPrice(idrAmount, currencyKey = currentCurrency) {
            const curr = CURRENCIES[currencyKey] || CURRENCIES.IDR;
            const converted = Math.round(idrAmount * curr.rate);
            const formattedNum = converted.toString().replace(/\B(?=(\d{3})+(?!\d))/g, curr.thousandsSep);
            return curr.symbol + formattedNum;
        }

        // Smooth scroll helper
        function scrollToSection(id) {
            const el = document.getElementById(id);
            if (el) {
                el.scrollIntoView({ behavior: 'smooth' });
            }
        }

        // Update all tier prices across page when currency changes
        function updateCurrency(newCurr) {
            currentCurrency = newCurr;
            // Update tier cards
            for (const key in TIER_DATA) {
                const els = document.querySelectorAll(`[data-tier-price="${key}"]`);
                els.forEach(el => {
                    el.textContent = formatPrice(TIER_DATA[key].basePriceIDR);
                });
            }
            // Update spotlight price
            const spotlightEl = document.getElementById('spotlightPrice');
            if (spotlightEl) spotlightEl.textContent = formatPrice(TIER_DATA.vip.basePriceIDR);

            updateOrderSummary();
        }

        // Select a tier programmatically or on card click
        function selectTier(key) {
            if (!TIER_DATA[key]) return;
            selectedTierKey = key;

            // Update card highlights
            document.querySelectorAll('.tier-card').forEach(c => {
                c.classList.remove('glass-panel-glow', 'border-twice-magenta');
                c.classList.add('border-transparent');
            });
            const activeCard = document.getElementById(TIER_DATA[key].cardId);
            if (activeCard) {
                activeCard.classList.remove('border-transparent');
                activeCard.classList.add('glass-panel-glow', 'border-twice-magenta');
            }

            // Update SVG map highlights
            document.querySelectorAll('.seat-section').forEach(s => s.classList.remove('active'));
            TIER_DATA[key].mapIds.forEach(id => {
                const mapEl = document.getElementById(id);
                if (mapEl) mapEl.classList.add('active');
            });

            // Update Form title
            const titleEl = document.getElementById('selectedTierTitle');
            if (titleEl) titleEl.textContent = TIER_DATA[key].name;

            updateOrderSummary();
        }

        // Triggered when user clicks SVG stage map
        function selectTierFromMap(key) {
            selectTier(key);
            scrollToSection('booking');
        }

        // Adjust quantity
        function adjustQty(delta) {
            const newQty = ticketQty + delta;
            if (newQty >= 1 && newQty <= 4) {
                ticketQty = newQty;
                document.getElementById('ticketQtyDisplay').textContent = ticketQty;
                updateOrderSummary();
            }
        }

        // Recalculate and update the order summary sidebar
        function updateOrderSummary() {
            const tier = TIER_DATA[selectedTierKey];
            const subtotal = tier.basePriceIDR * ticketQty;
            const fee = Math.round(subtotal * 0.03);
            const tax = Math.round(subtotal * 0.10);
            const grandTotal = subtotal + fee + tax;

            document.getElementById('summaryQty').textContent = ticketQty;
            document.getElementById('summarySubtotal').textContent = formatPrice(subtotal);
            document.getElementById('summaryFee').textContent = formatPrice(fee);
            document.getElementById('summaryTax').textContent = formatPrice(tax);
            document.getElementById('summaryTotal').textContent = formatPrice(grandTotal);
        }

        // Demo autofill ONCE membership ID
        function autofillOnceId() {
            const randomSuffix = Math.floor(100000 + Math.random() * 900000);
            document.getElementById('onceId').value = 'ONCE-' + randomSuffix;
        }

        // Handle Checkout Form Submission with Real Backend Registration & Email Sending
        async function handleCheckout(e) {
            e.preventDefault();

            const fullName = document.getElementById('fullName').value.trim();
            const email = document.getElementById('emailAddr').value.trim();
            const onceId = document.getElementById('onceId').value.trim();
            const phone = document.getElementById('phoneNum').value.trim();
            const paymentMethod = document.querySelector('input[name="paymentMethod"]:checked')?.value || 'Credit Card';

            if (!fullName || !email || !onceId || !phone) {
                alert('Please complete all required fields.');
                return;
            }

            const submitBtn = document.getElementById('submitBtn');
            const originalBtnHtml = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
            submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin mr-2"></i> Registering & Sending Email...';

            try {
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

                const response = await fetch('{{ route('ticket.register') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        name: fullName,
                        email: email,
                        phone: phone,
                        once_id: onceId,
                        ticket_tier: selectedTierKey,
                        quantity: ticketQty,
                        payment_method: paymentMethod,
                        currency: currentCurrency
                    })
                });

                const data = await response.json();

                if (!response.ok || !data.success) {
                    const errorMsg = data.message || (data.errors ? Object.values(data.errors).flat().join('\n') : 'Registration failed');
                    alert('Error: ' + errorMsg);
                    return;
                }

                const ticket = data.ticket;

                // Store active order from server response
                activeTicketOrder = {
                    tier: TIER_DATA[ticket.ticket_tier] || TIER_DATA[selectedTierKey],
                    fullName: ticket.name,
                    email: ticket.email,
                    onceId: ticket.once_id,
                    phone: ticket.phone,
                    qty: ticket.quantity,
                    seats: ticket.seats,
                    refNumber: ticket.booking_reference,
                    paymentMethod: ticket.payment_method,
                    bookingDate: new Date().toLocaleDateString()
                };

                // Trigger celebration confetti
                triggerConfetti();

                // Populate Modal with real registered ticket data from server
                document.getElementById('ticketAttendeeName').textContent = ticket.name;
                document.getElementById('ticketOnceId').textContent = ticket.once_id;
                document.getElementById('ticketTierName').textContent = ticket.tier_label;
                document.getElementById('ticketQuantity').textContent = `${ticket.quantity} Ticket(s)`;
                document.getElementById('ticketGate').textContent = ticket.gate;
                document.getElementById('ticketSection').textContent = ticket.section;
                document.getElementById('ticketSeats').textContent = ticket.seats;
                document.getElementById('ticketBarcodeCode').textContent = `*${ticket.booking_reference}*`;

                // Enable "My Ticket" navbar button
                const myTicketsBtn = document.getElementById('myTicketsBtn');
                const badge = document.getElementById('ticketBadge');
                if (myTicketsBtn) myTicketsBtn.classList.remove('hidden');
                if (badge) badge.classList.remove('hidden');

                // Open Modal
                openTicketModal();

                // Alert notification
                setTimeout(() => {
                    if (data.email_sent === false) {
                        alert('⚠️ Registration saved, but email could not be delivered:\n' + (data.email_error || 'Check mail credentials in .env'));
                    } else {
                        alert('💌 ' + data.message);
                    }
                }, 400);

            } catch (err) {
                console.error(err);
                alert('Connection error occurred while processing registration: ' + err.message);
            } finally {
                submitBtn.disabled = false;
                submitBtn.classList.remove('opacity-75', 'cursor-not-allowed');
                submitBtn.innerHTML = originalBtnHtml;
            }
        }

        // Open Ticket Modal
        function openTicketModal() {
            if (!activeTicketOrder) {
                // If user clicks without having checked out yet, autofill demo ticket
                activeTicketOrder = {
                    tier: TIER_DATA.vip,
                    fullName: 'Alexander Pratama',
                    email: 'alexander.once@gmail.com',
                    onceId: 'ONCE-847291',
                    qty: 1,
                    seats: 'ROW C: 14',
                    refNumber: 'TWICE-JIS-2026-8472'
                };
                document.getElementById('ticketAttendeeName').textContent = activeTicketOrder.fullName;
                document.getElementById('ticketOnceId').textContent = activeTicketOrder.onceId;
                document.getElementById('ticketTierName').textContent = activeTicketOrder.tier.name;
                document.getElementById('ticketQuantity').textContent = '1 Ticket(s)';
                document.getElementById('ticketGate').textContent = activeTicketOrder.tier.gate;
                document.getElementById('ticketSection').textContent = activeTicketOrder.tier.section;
                document.getElementById('ticketSeats').textContent = activeTicketOrder.seats;
                document.getElementById('ticketBarcodeCode').textContent = `*${activeTicketOrder.refNumber}*`;
            }
            document.getElementById('ticketModal').classList.remove('hidden');
        }

        // Close Ticket Modal
        function closeTicketModal() {
            document.getElementById('ticketModal').classList.add('hidden');
        }

        // Trigger confetti celebration
        function triggerConfetti() {
            if (typeof confetti === 'function') {
                confetti({
                    particleCount: 120,
                    spread: 80,
                    origin: { y: 0.6 },
                    colors: ['#FF5FA2', '#FCC89B', '#ffffff', '#FF007F']
                });
                setTimeout(() => {
                    confetti({
                        particleCount: 70,
                        angle: 60,
                        spread: 55,
                        origin: { x: 0 },
                        colors: ['#FF5FA2', '#FCC89B']
                    });
                    confetti({
                        particleCount: 70,
                        angle: 120,
                        spread: 55,
                        origin: { x: 1 },
                        colors: ['#FF5FA2', '#FCC89B']
                    });
                }, 250);
            }
        }

        // Ticket action simulations
        function downloadTicketSim() {
            alert('🎉 E-Ticket PDF download initiated!\n\nBooking Ref: ' + (activeTicketOrder ? activeTicketOrder.refNumber : 'TWICE-2026') + '\nA copy has also been sent to ' + (activeTicketOrder ? activeTicketOrder.email : 'your email') + '.');
        }

        function walletSim() {
            alert('📱 Apple / Google Wallet pass created!\nScan the pass at the stadium entrance turnstile on show day.');
        }

        // Hold countdown timer (10 mins)
        let holdSeconds = 600;
        setInterval(() => {
            if (holdSeconds > 0) {
                holdSeconds--;
                const mins = String(Math.floor(holdSeconds / 60)).padStart(2, '0');
                const secs = String(holdSeconds % 60).padStart(2, '0');
                const holdEl = document.getElementById('holdTimer');
                if (holdEl) holdEl.textContent = `${mins}:${secs}`;
            }
        }, 1000);

        // Concert Showtime Countdown Timer
        const targetConcertDate = new Date('2026-12-23T19:00:00+07:00').getTime();
        function updateConcertCountdown() {
            const now = new Date().getTime();
            const difference = targetConcertDate - now;

            if (difference > 0) {
                const days = Math.floor(difference / (1000 * 60 * 60 * 24));
                const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((difference % (1000 * 60)) / 1000);

                const dEl = document.getElementById('days');
                const hEl = document.getElementById('hours');
                const mEl = document.getElementById('minutes');
                const sEl = document.getElementById('seconds');

                if (dEl) dEl.textContent = String(days).padStart(2, '0');
                if (hEl) hEl.textContent = String(hours).padStart(2, '0');
                if (mEl) mEl.textContent = String(minutes).padStart(2, '0');
                if (sEl) sEl.textContent = String(seconds).padStart(2, '0');
            }
        }
        setInterval(updateConcertCountdown, 1000);
        updateConcertCountdown();

        // Initialize default tier
        document.addEventListener('DOMContentLoaded', () => {
            selectTier('vip');
            updateOrderSummary();
        });
    </script>
</body>
</html>