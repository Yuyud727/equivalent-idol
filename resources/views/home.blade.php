<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equivalent - Equality for Unity</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'idol-pink': '#ff6b9d',
                        'idol-purple': '#c44569',
                        'idol-blue': '#4834d4',
                        'ami-red': '#ef4444',
                        'alyaa-pink': '#ec4899',
                        'ame-yellow': '#fbbf24',
                        'ina-purple': '#a855f7',
                        'cantikkun-blue': '#3b82f6'
                    },
                    fontFamily: {
                        'idol': ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="font-idol overflow-x-hidden">
    
    <!-- Include Header -->
    @include('header')

    <!-- Home Section -->
    <section id="home" class="relative min-h-screen flex items-center justify-center section">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 hero-bg" 
             style="background-image: url('{{ asset('images/backgrounds/hero-bg.png') }}');">
            <div class="absolute inset-0 bg-gradient-to-br from-idol-pink/30 to-idol-purple/30"></div>
            <div class="absolute inset-0 bg-black bg-opacity-20"></div>
        </div>

        <!-- Content Container -->
        <div class="relative z-10 text-center px-4 max-w-6xl mx-auto">
            <!-- Logo Circle -->
            <div class="mb-8 animate-fade-in">
                <div class="w-32 h-32 mx-auto bg-white bg-opacity-20 rounded-full flex items-center justify-center glass-effect animate-float p-4">
                    <div class="w-full h-full bg-white rounded-full flex items-center justify-center animate-pulse-glow p-2">
                        <img src="{{ asset('images/logos/equivalent-logo.png') }}" 
                             alt="Equivalent Logo" 
                             class="w-full h-full object-contain">
                    </div>
                </div>
            </div>

            <!-- Main Title -->
            <h1 class="hero-title text-6xl md:text-8xl font-bold text-white mb-4 animate-fade-in text-shadow" style="animation-delay: 0.3s">
                Equivalent
            </h1>

            <!-- Slogan -->
            <p class="hero-subtitle text-xl md:text-2xl text-white mb-12 animate-fade-in" style="animation-delay: 0.6s">
                EQUALITY FOR UNITY
            </p>

            <!-- Social Media Icons -->
            <div class="flex justify-center space-x-6 mb-12 animate-fade-in" style="animation-delay: 0.9s">
                <!-- YouTube -->
                <a href="https://youtube.com/@equivalent" target="_blank" class="social-icon w-14 h-14 bg-white bg-opacity-20 rounded-full flex items-center justify-center glass-effect hover:bg-red-600 hover:bg-opacity-80">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                    </svg>
                </a>

                <!-- TikTok -->
                <a href="https://tiktok.com/@equivalent" target="_blank" class="social-icon w-14 h-14 bg-white bg-opacity-20 rounded-full flex items-center justify-center glass-effect hover:bg-black hover:bg-opacity-80">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
                    </svg>
                </a>

                <!-- Facebook -->
                <a href="https://facebook.com/equivalent" target="_blank" class="social-icon w-14 h-14 bg-white bg-opacity-20 rounded-full flex items-center justify-center glass-effect hover:bg-blue-600 hover:bg-opacity-80">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                </a>

                <!-- Instagram -->
                <a href="https://instagram.com/equivalent" target="_blank" class="social-icon w-14 h-14 bg-white bg-opacity-20 rounded-full flex items-center justify-center glass-effect hover:bg-gradient-to-r hover:from-purple-500 hover:to-pink-500">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 6.62 5.367 11.987 11.988 11.987 6.62 0 11.987-5.367 11.987-11.987C24.014 5.367 18.637.001 12.017.001zM8.449 16.988c-1.297 0-2.448-.49-3.347-1.388-.9-.9-1.388-2.052-1.388-3.348 0-1.297.49-2.449 1.388-3.347.9-.9 2.052-1.388 3.347-1.388 1.297 0 2.449.49 3.348 1.388.9.9 1.388 2.052 1.388 3.347 0 1.297-.49 2.449-1.388 3.348-.9.9-2.052 1.388-3.348 1.388zm7.718-6.209H14.8v-1.26c0-.104-.085-.188-.188-.188h-1.298c-.104 0-.188.085-.188.188v1.26h-1.367c-.104 0-.188.085-.188.188v1.298c0 .104.085.188.188.188h1.367v1.367c0 .104.085.188.188.188h1.298c.104 0 .188-.085.188-.188v-1.367h1.367c.104 0 .188-.085.188-.188v-1.298c0-.104-.085-.188-.188-.188z"/>
                    </svg>
                </a>

                <!-- WhatsApp -->
                <a href="https://wa.me/6281234567890" target="_blank" class="social-icon w-14 h-14 bg-white bg-opacity-20 rounded-full flex items-center justify-center glass-effect hover:bg-green-500 hover:bg-opacity-80">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.89 3.488"/>
                    </svg>
                </a>

                <!-- Spotify -->
                <a href="https://open.spotify.com/artist/equivalent" target="_blank" class="social-icon w-14 h-14 bg-white bg-opacity-20 rounded-full flex items-center justify-center glass-effect hover:bg-green-500 hover:bg-opacity-80">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.42 1.56-.299.421-1.02.599-1.559.3z"/>
                    </svg>
                </a>
            </div>

            <!-- Scroll Indicator -->
            <div class="scroll-indicator animate-bounce-soft">
                <svg class="w-6 h-6 text-white mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </div>
        </div>
    </section>

    <!-- About/Profile Section -->
    <section id="about" class="section-padding bg-gray-50 section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Page Header -->
            <div class="text-center mb-16 loading">
                <h2 class="text-5xl md:text-6xl font-bold text-gray-800 mb-4 title-underline">
                    About Equivalent
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Meet the talented members who bring equality and unity through their performances
                </p>
            </div>

            <!-- Members Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-8 mb-16">
                
                <!-- Ami -->
                <div class="member-card loading" 
                     style="--i: 0" 
                     data-member="ami"
                     onclick="openMemberDetail('ami')">
                    <div class="bg-gradient-red rounded-3xl p-6 shadow-xl card-hover">
                        <div class="aspect-square rounded-2xl overflow-hidden mb-4 bg-white/20">
                            <img src="{{ asset('images/members/Ami.jpg') }}" 
                                 alt="Ami" 
                                 class="member-image w-full h-full object-cover">
                        </div>
                        <h3 class="member-name text-white text-center">Ami</h3>
                        <p class="text-white/80 text-center text-sm mt-2">Leader & Main Vocalist</p>
                    </div>
                </div>

                <!-- Alyaa -->
                <div class="member-card loading" 
                     style="--i: 1" 
                     data-member="alyaa"
                     onclick="openMemberDetail('alyaa')">
                    <div class="bg-gradient-pink rounded-3xl p-6 shadow-xl card-hover">
                        <div class="aspect-square rounded-2xl overflow-hidden mb-4 bg-white/20">
                            <img src="{{ asset('images/members/Alyaa.jpg') }}" 
                                 alt="Alyaa" 
                                 class="member-image w-full h-full object-cover">
                        </div>
                        <h3 class="member-name text-white text-center">Alyaa</h3>
                        <p class="text-white/80 text-center text-sm mt-2">Main Dancer & Vocalist</p>
                    </div>
                </div>

                <!-- Ame -->
                <div class="member-card loading" 
                     style="--i: 2" 
                     data-member="ame"
                     onclick="openMemberDetail('ame')">
                    <div class="bg-gradient-yellow rounded-3xl p-6 shadow-xl card-hover">
                        <div class="aspect-square rounded-2xl overflow-hidden mb-4 bg-white/20">
                            <img src="{{ asset('images/members/Ame.jpg') }}" 
                                 alt="Ame" 
                                 class="member-image w-full h-full object-cover">
                        </div>
                        <h3 class="member-name text-white text-center">Ame</h3>
                        <p class="text-white/80 text-center text-sm mt-2">Visual & Lead Vocalist</p>
                    </div>
                </div>

                <!-- Ina -->
                <div class="member-card loading" 
                     style="--i: 3" 
                     data-member="ina"
                     onclick="openMemberDetail('ina')">
                    <div class="bg-gradient-purple rounded-3xl p-6 shadow-xl card-hover">
                        <div class="aspect-square rounded-2xl overflow-hidden mb-4 bg-white/20">
                            <img src="{{ asset('images/members/Ina.jpg') }}" 
                                 alt="Ina" 
                                 class="member-image w-full h-full object-cover">
                        </div>
                        <h3 class="member-name text-white text-center">Ina</h3>
                        <p class="text-white/80 text-center text-sm mt-2">Main Rapper & Vocalist</p>
                    </div>
                </div>

                <!-- Cantikkun -->
                <div class="member-card loading" 
                     style="--i: 4" 
                     data-member="cantikkun"
                     onclick="openMemberDetail('cantikkun')">
                    <div class="bg-gradient-blue rounded-3xl p-6 shadow-xl card-hover">
                        <div class="aspect-square rounded-2xl overflow-hidden mb-4 bg-white/20">
                            <img src="{{ asset('images/members/Cantikkun.jpg') }}" 
                                 alt="Cantikkun" 
                                 class="member-image w-full h-full object-cover">
                        </div>
                        <h3 class="member-name text-white text-center">Cantikkun</h3>
                        <p class="text-white/80 text-center text-sm mt-2">Maknae & Lead Dancer</p>
                    </div>
                </div>

            </div>

            <!-- Group Introduction -->
            <div class="bg-white rounded-3xl p-8 shadow-xl loading card-hover" style="animation-delay: 0.5s">
                <div class="max-w-4xl mx-auto text-center">
                    <h3 class="text-3xl font-bold text-gray-800 mb-6">Our Story</h3>
                    <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                        Equivalent is a vibrant idol group that stands for equality and unity. Our five talented members bring together diverse backgrounds, skills, and personalities to create something truly special. Each member contributes their unique strengths while working together as one harmonious unit.
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-gradient-to-br from-idol-pink to-idol-purple p-6 rounded-2xl text-white">
                            <div class="text-3xl font-bold mb-2">2025</div>
                            <div class="text-sm">Debut Year</div>
                        </div>
                        <div class="bg-gradient-to-br from-idol-purple to-idol-blue p-6 rounded-2xl text-white">
                            <div class="text-3xl font-bold mb-2">5</div>
                            <div class="text-sm">Members</div>
                        </div>
                        <div class="bg-gradient-to-br from-idol-blue to-idol-pink p-6 rounded-2xl text-white">
                            <div class="text-3xl font-bold mb-2">∞</div>
                            <div class="text-sm">Possibilities</div>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 p-6 rounded-2xl">
                        <h4 class="text-xl font-semibold text-gray-800 mb-3">Our Mission</h4>
                        <p class="text-gray-600">
                            To inspire and unite people through music, dance, and performance while promoting equality and diversity in all forms of artistic expression.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    
        <!-- Latest News Section -->
        <section id="news" class="section-padding bg-white section">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="text-center mb-12 loading">
                    <div class="inline-block">
                        <div class="flex items-center justify-center mb-4">
                            <div class="h-1 w-20 bg-gradient-to-r from-idol-pink to-idol-purple rounded-full"></div>
                        </div>
                        <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4" style="font-style: italic;">
                            Live & News
                        </h2>
                        <div class="flex items-center justify-center">
                            <div class="h-1 w-20 bg-gradient-to-r from-idol-pink to-idol-purple rounded-full"></div>
                        </div>
                    </div>
                </div>

                <!-- Events Table -->
                <div class="bg-gray-50 rounded-3xl p-6 md:p-8 shadow-xl loading">
                    <!-- Table Header -->
                    <div class="grid grid-cols-12 gap-4 mb-6">
                        <div class="col-span-12 md:col-span-2">
                            <div class="bg-white rounded-2xl border-2 border-gray-800 px-4 py-3 text-center">
                                <span class="font-semibold text-gray-800 text-sm md:text-base" style="font-style: italic;">JADWAL</span>
                            </div>
                        </div>
                        <div class="col-span-12 md:col-span-4">
                            <div class="bg-white rounded-2xl border-2 border-gray-800 px-4 py-3 text-center">
                                <span class="font-semibold text-gray-800 text-sm md:text-base" style="font-style: italic;">EVENT</span>
                            </div>
                        </div>
                        <div class="col-span-12 md:col-span-4">
                            <div class="bg-white rounded-2xl border-2 border-gray-800 px-4 py-3 text-center">
                                <span class="font-semibold text-gray-800 text-sm md:text-base" style="font-style: italic;">LOKASI</span>
                            </div>
                        </div>
                        <div class="col-span-12 md:col-span-2">
                            <div class="bg-white rounded-2xl border-2 border-gray-800 px-4 py-3 text-center">
                                <span class="font-semibold text-gray-800 text-sm md:text-base" style="font-style: italic;">DETAIL</span>
                            </div>
                        </div>
                    </div>

                    <!-- Table Rows -->
                    <div class="space-y-4">
                        @forelse($events as $index => $event)
                        <div class="grid grid-cols-12 gap-4 items-center py-4 border-b-2 border-gray-800 news-row loading" 
                            style="animation-delay: {{ $index * 0.1 }}s">
                            
                            <!-- Date Column -->
                            <div class="col-span-12 md:col-span-2">
                                <div class="text-center md:text-left">
                                    <span class="text-gray-800 font-medium text-sm md:text-base" style="font-style: italic;">
                                        {{ $event->formatted_date }}
                                    </span>
                                </div>
                            </div>

                            <!-- Event Name Column -->
                            <div class="col-span-12 md:col-span-4">
                                <div class="text-center md:text-left">
                                    <span class="text-gray-800 font-medium text-sm md:text-base" style="font-style: italic;">
                                        {{ $event->event_name }}
                                    </span>
                                </div>
                            </div>

                            <!-- Location Column -->
                            <div class="col-span-12 md:col-span-4">
                                <div class="text-center md:text-left">
                                    <span class="text-gray-800 font-medium text-sm md:text-base" style="font-style: italic;">
                                        {{ $event->location }}
                                    </span>
                                </div>
                            </div>

                            <!-- Detail Button Column -->
                            <div class="col-span-12 md:col-span-2">
                                <div class="text-center">
                                    @if($event->status === 'tba')
                                        <button class="bg-gray-200 text-gray-600 rounded-2xl border-2 border-gray-400 px-4 py-2 text-sm font-semibold cursor-not-allowed" 
                                                style="font-style: italic;" disabled>
                                            TBA
                                        </button>
                                    @else
                                        <button onclick="showEventDetail({{ $event->id }})" 
                                                class="bg-white text-gray-800 rounded-2xl border-2 border-gray-800 px-4 py-2 text-sm font-semibold hover:bg-idol-pink hover:text-white hover:border-idol-pink transition-all duration-300 event-detail-btn" 
                                                style="font-style: italic;"
                                                data-event-id="{{ $event->id }}">
                                            {{ $event->status_text }}
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-12">
                            <p class="text-gray-500 text-lg" style="font-style: italic;">Belum ada event yang tersedia</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>

    <!-- Event Detail Modal -->
    <div id="eventDetailModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75 opacity-0 invisible transition-all duration-300">
        <div class="bg-white rounded-3xl p-8 m-4 max-w-2xl w-full transform scale-95 transition-all duration-300 max-h-96 overflow-y-auto">
            <div id="eventDetailContent">
                <!-- Content akan diisi oleh JavaScript -->
            </div>
            <div class="text-center mt-6">
                <button onclick="closeEventDetail()" 
                        class="bg-idol-gradient text-white px-6 py-3 rounded-lg font-semibold hover:opacity-90 transition-opacity">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- Gallery/Dokumentasi Section -->
    <section id="gallery" class="section-padding bg-gray-50 section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-12 loading">
                <div class="inline-block">
                    <div class="flex items-center justify-center mb-4">
                        <div class="h-1 w-20 bg-gradient-to-r from-idol-pink to-idol-purple rounded-full"></div>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4" style="font-style: italic;">
                        Gallery
                    </h2>
                    <div class="flex items-center justify-center">
                        <div class="h-1 w-20 bg-gradient-to-r from-idol-pink to-idol-purple rounded-full"></div>
                    </div>
                </div>
            </div>

            <!-- Main Gallery Container -->
            <div class="bg-white rounded-3xl p-6 md:p-8 shadow-xl loading">
                
                <!-- Main Image Carousel -->
                <div class="relative mb-8" id="mainCarousel">
                    <div class="aspect-w-16 aspect-h-9 md:aspect-h-6 rounded-2xl overflow-hidden bg-gray-200 relative">
                        
                        <!-- Main Image Container -->
                        <div class="gallery-main-container relative w-full h-full" style="height: 400px;">
                            @forelse($galleries as $index => $gallery)
                            <div class="gallery-slide absolute inset-0 opacity-0 transition-all duration-500 {{ $index === 0 ? 'opacity-100' : '' }}" 
                                data-slide="{{ $index }}">
                                <img src="{{ $gallery->image_url }}" 
                                    alt="{{ $gallery->title }}" 
                                    class="w-full h-full object-cover">
                                
                                <!-- Image Overlay Info -->
                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-6 text-white">
                                    <h3 class="text-xl md:text-2xl font-bold mb-2">{{ $gallery->title }}</h3>
                                    <p class="text-sm md:text-base text-gray-200 mb-2">{{ $gallery->description }}</p>
                                    <div class="flex items-center text-xs md:text-sm text-gray-300">
                                        <span class="bg-idol-pink px-2 py-1 rounded-full text-white mr-3">{{ $gallery->category_label }}</span>
                                        @if($gallery->formatted_taken_date)
                                        <span>{{ $gallery->formatted_taken_date }}</span>
                                        @endif
                                        @if($gallery->photographer)
                                        <span class="ml-3">📸 {{ $gallery->photographer }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="flex items-center justify-center h-full bg-gray-100">
                                <p class="text-gray-500 text-lg">No gallery images available</p>
                            </div>
                            @endforelse
                        </div>

                        <!-- Navigation Arrows -->
                        @if(count($galleries) > 1)
                        <button class="gallery-nav gallery-prev absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 rounded-full p-3 shadow-lg transition-all duration-300 hover:scale-110 z-10"
                                onclick="changeSlide('prev')">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </button>
                        
                        <button class="gallery-nav gallery-next absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 rounded-full p-3 shadow-lg transition-all duration-300 hover:scale-110 z-10"
                                onclick="changeSlide('next')">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                        @endif

                        <!-- Slide Counter -->
                        @if(count($galleries) > 1)
                        <div class="absolute top-4 right-4 bg-black/50 text-white px-3 py-1 rounded-full text-sm z-10">
                            <span id="currentSlide">1</span> / <span id="totalSlides">{{ count($galleries) }}</span>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Thumbnail Navigation -->
                @if(count($galleries) > 1)
                <div class="gallery-thumbnails-container">
                    <div class="flex space-x-3 overflow-x-auto pb-4 scrollbar-hide" id="thumbnailContainer">
                        @foreach($galleries as $index => $gallery)
                        <button class="gallery-thumbnail flex-shrink-0 {{ $index === 0 ? 'active' : '' }}" 
                                data-slide="{{ $index }}"
                                onclick="goToSlide({{ $index }})">
                            <div class="w-20 h-16 md:w-24 md:h-20 rounded-lg overflow-hidden border-2 transition-all duration-300">
                                <img src="{{ $gallery->thumbnail_url }}" 
                                    alt="{{ $gallery->title }}" 
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="text-center mt-2">
                                <span class="text-xs text-gray-600 font-medium">{{ $index + 1 }}</span>
                            </div>
                        </button>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Gallery Info & Actions -->
                <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                    
                    <!-- Gallery Stats -->
                    <div class="bg-gray-50 rounded-2xl p-6">
                        <h4 class="font-semibold text-gray-800 mb-4">Gallery Stats</h4>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Total Photos:</span>
                                <span class="font-semibold">{{ count($galleries) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Categories:</span>
                                <span class="font-semibold">{{ $galleries->pluck('category')->unique()->count() }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Latest Update:</span>
                                <span class="font-semibold">{{ $galleries->max('created_at')?->format('M Y') ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Current Image Info -->
                    <div class="bg-gray-50 rounded-2xl p-6" id="currentImageInfo">
                        @if(count($galleries) > 0)
                        <h4 class="font-semibold text-gray-800 mb-4">Current Image</h4>
                        <div class="space-y-2" id="imageInfoContent">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Category:</span>
                                <span class="font-semibold">{{ $galleries->first()->category_label ?? 'N/A' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Date:</span>
                                <span class="font-semibold">{{ $galleries->first()->formatted_taken_date ?? 'N/A' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Photographer:</span>
                                <span class="font-semibold text-xs">{{ $galleries->first()->photographer ?? 'N/A' }}</span>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Actions -->
                    <div class="bg-gray-50 rounded-2xl p-6">
                        <h4 class="font-semibold text-gray-800 mb-4">Actions</h4>
                        <div class="space-y-3">
                            <button onclick="toggleAutoplay()" 
                                    class="w-full bg-idol-gradient text-white px-4 py-2 rounded-lg font-semibold hover:opacity-90 transition-opacity" 
                                    id="autoplayBtn">
                                ▶️ Start Slideshow
                            </button>
                            <button onclick="toggleFullscreen()" 
                                    class="w-full bg-gray-800 text-white px-4 py-2 rounded-lg font-semibold hover:bg-gray-700 transition-colors">
                                🔍 Fullscreen View
                            </button>
                            <button onclick="downloadImage()" 
                                    class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-500 transition-colors">
                                📥 Download Image
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Fullscreen Modal -->
    <div id="fullscreenModal" class="fixed inset-0 z-50 bg-black bg-opacity-95 opacity-0 invisible transition-all duration-300">
        <div class="flex items-center justify-center h-full p-4">
            <div class="relative max-w-full max-h-full">
                <img id="fullscreenImage" src="" alt="" class="max-w-full max-h-full object-contain">
                
                <!-- Close Button -->
                <button onclick="closeFullscreen()" 
                        class="absolute top-4 right-4 bg-white/20 text-white rounded-full p-2 hover:bg-white/30 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                
                <!-- Navigation in Fullscreen -->
                <button onclick="changeSlide('prev')" 
                        class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/20 text-white rounded-full p-3 hover:bg-white/30 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                
                <button onclick="changeSlide('next')" 
                        class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/20 text-white rounded-full p-3 hover:bg-white/30 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Music Section Placeholder -->
    <section id="music" class="section-padding bg-white section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center loading">
                <h2 class="text-4xl font-bold text-gray-800 mb-4 title-underline">Music</h2>
                <p class="text-gray-600 mb-12">Listen to our latest tracks</p>
                <div class="bg-gray-100 rounded-lg p-12">
                    <p class="text-gray-500 text-lg">Music section coming soon...</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Schedule Section Placeholder -->
    <section id="schedule" class="section-padding bg-gray-50 section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center loading">
                <h2 class="text-4xl font-bold text-gray-800 mb-4 title-underline">Schedule</h2>
                <p class="text-gray-600 mb-12">Upcoming events and performances</p>
                <div class="bg-white rounded-lg p-12 shadow-lg">
                    <p class="text-gray-500 text-lg">Schedule section coming soon...</p>
                </div>
            </div>
        </div>
    </section>




    <!-- Include Footer -->
    @include('footer')

    <!-- Scripts -->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>