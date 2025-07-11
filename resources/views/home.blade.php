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

<!-- About/Profile Section - Updated with working member data -->
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

            <!-- Members Table -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden mb-16 loading">
                <!-- Table Header -->
                <div class="bg-gradient-to-r from-idol-pink to-idol-purple p-6">
                    <h3 class="text-2xl font-bold text-white text-center">Our Members</h3>
                </div>
                
                <!-- Table Content -->
                <div class="p-6">
                    <div class="grid grid-cols-1 gap-4">
                        
                        @forelse($members as $member)
                        <!-- Member Row -->
                        <div class="member-row flex items-center p-4 rounded-2xl border-2 border-gray-100 hover:border-idol-pink hover:shadow-lg transition-all duration-300 cursor-pointer"
                            onclick="openMemberDetail({{ $member->member_no }})"
                            data-member-id="{{ $member->member_no }}">
                            
                            <!-- Member Number -->
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-r from-idol-pink to-idol-purple rounded-full flex items-center justify-center mr-4">
                                <span class="text-white font-bold text-lg">{{ $member->member_no }}</span>
                            </div>
                            
                            <!-- Member Photo -->
                            <div class="flex-shrink-0 w-16 h-16 rounded-full overflow-hidden mr-4 border-4 border-white shadow-lg">
                                @if($member->photo && file_exists(storage_path('app/public/' . $member->photo)))
                                    <img src="{{ asset('storage/' . $member->photo) }}" 
                                        alt="{{ $member->name }}" 
                                        class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-gray-400 to-gray-600 flex items-center justify-center text-white font-bold text-xl">
                                        {{ substr($member->name, 0, 1) }}
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Member Name -->
                            <div class="flex-1">
                                <h4 class="text-xl font-bold text-gray-800">{{ $member->name }}</h4>
                                <div class="flex items-center mt-1">
                                    <div class="w-4 h-4 rounded-full mr-2" style="background-color: {{ $member->color }}"></div>
                                    <span class="text-sm text-gray-500">Click to see details</span>
                                </div>
                            </div>
                            
                            <!-- Arrow Icon -->
                            <div class="flex-shrink-0">
                                <svg class="w-6 h-6 text-gray-400 transform transition-transform duration-300 group-hover:translate-x-1" 
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-8">
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                                <strong class="font-bold">No members data available!</strong>
                                <span class="block sm:inline">Please run: php artisan db:seed --class=DetailMemberSeeder</span>
                            </div>
                            <div class="text-sm text-gray-500">
                                <p>Troubleshooting steps:</p>
                                <ol class="list-decimal list-inside mt-2">
                                    <li>Run the seeder command above</li>
                                    <li>Check if DetailMember model exists</li>
                                    <li>Verify database connection</li>
                                    <li>Check storage/logs/laravel.log for errors</li>
                                </ol>
                            </div>
                        </div>
                        @endforelse
                        
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
                            <div class="text-3xl font-bold mb-2">{{ $members->count() }}</div>
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

    <!-- Member Detail Modal dengan Animasi Curtain -->
    <div id="memberDetailModal" class="fixed inset-0 z-50 opacity-0 invisible transition-all duration-500">
        <!-- Background Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-80" onclick="closeMemberDetail()"></div>
        
        <!-- Curtain Animation Container -->
        <div class="relative w-full h-full flex items-center justify-center">
            <!-- Left Curtain -->
            <div id="leftCurtain" class="absolute top-0 left-0 w-1/2 h-full bg-gradient-to-r from-idol-pink to-idol-purple transform transition-transform duration-700 ease-in-out translate-x-0"></div>
            
            <!-- Right Curtain -->
            <div id="rightCurtain" class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-idol-purple to-idol-pink transform transition-transform duration-700 ease-in-out translate-x-0"></div>
            
            <!-- Modal Content -->
            <div id="memberDetailContent" class="relative z-10 bg-white rounded-3xl shadow-2xl m-4 max-w-4xl w-full opacity-0 scale-95 transform transition-all duration-500">
                <div class="flex flex-col md:flex-row overflow-hidden rounded-3xl">
                    <!-- Member Photo Section -->
                    <div class="md:w-1/2 relative">
                        <div class="aspect-square md:aspect-auto md:h-full relative overflow-hidden">
                            <img id="memberPhoto" src="" alt="" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                            
                            <!-- Member Number Badge -->
                            <div class="absolute top-6 left-6">
                                <div id="memberNumberBadge" class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center">
                                    <span class="text-white text-2xl font-bold">1</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Member Info Section -->
                    <div class="md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
                        <!-- Name and Color -->
                        <div class="mb-8">
                            <h2 id="memberName" class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Member Name</h2>
                            <div class="flex items-center mb-4">
                                <span class="text-gray-600 mr-3">Member Color:</span>
                                <div id="memberColorBox" class="w-8 h-8 rounded-full border-4 border-white shadow-lg"></div>
                                <span id="memberColorText" class="ml-3 text-gray-700 font-semibold">#color</span>
                            </div>
                        </div>
                        
                        <!-- Birth Date -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-idol-pink" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                </svg>
                                Birthday
                            </h3>
                            <p id="memberBirthDate" class="text-gray-600 text-lg">January 1, 2000</p>
                        </div>
                        
                        <!-- Jiko (Self Introduction) -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-idol-pink" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                </svg>
                                Self Introduction
                            </h3>
                            <div class="bg-gray-50 p-4 rounded-xl">
                                <p id="memberJiko" class="text-gray-700 leading-relaxed italic">Member introduction text will appear here...</p>
                            </div>
                        </div>
                        
                        <!-- Close Button -->
                        <div class="text-center">
                            <button onclick="closeMemberDetail()" 
                                    class="bg-gradient-to-r from-idol-pink to-idol-purple text-white px-8 py-3 rounded-full font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300 flex items-center mx-auto">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Schedule Section (Previously News/Live) -->
    <section id="schedule" class="section-padding bg-white section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-12 loading">
                <div class="inline-block">
                    <div class="flex items-center justify-center mb-4">
                        <div class="h-1 w-20 bg-gradient-to-r from-idol-pink to-idol-purple rounded-full"></div>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4" style="font-style: italic;">
                        Schedule
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
                    <div class="col-span-12 md:col-span-1">
                        <div class="bg-white rounded-2xl border-2 border-gray-800 px-4 py-3 text-center">
                            <span class="font-semibold text-gray-800 text-sm md:text-base" style="font-style: italic;">NO</span>
                        </div>
                    </div>
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
                    <div class="col-span-12 md:col-span-3">
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

                <!-- Table Rows - Sample Data -->
                <div class="space-y-4">
                    <!-- Row 1 - Instagram Link Available -->
                    <div class="grid grid-cols-12 gap-4 items-center py-4 border-b-2 border-gray-800 news-row loading schedule-row" 
                        style="animation-delay: 0.1s">
                        
                        <!-- Row Number -->
                        <div class="col-span-12 md:col-span-1">
                            <div class="text-center">
                                <span class="text-gray-800 font-bold text-lg" style="font-style: italic;">1</span>
                            </div>
                        </div>
                        
                        <!-- Date Column -->
                        <div class="col-span-12 md:col-span-2">
                            <div class="text-center md:text-left">
                                <span class="text-gray-800 font-medium text-sm md:text-base" style="font-style: italic;">
                                    15 Jul 2025
                                </span>
                            </div>
                        </div>

                        <!-- Event Name Column -->
                        <div class="col-span-12 md:col-span-4">
                            <div class="text-center md:text-left">
                                <span class="text-gray-800 font-medium text-sm md:text-base" style="font-style: italic;">
                                    Fan Meeting Osaka
                                </span>
                            </div>
                        </div>

                        <!-- Location Column -->
                        <div class="col-span-12 md:col-span-3">
                            <div class="text-center md:text-left">
                                <span class="text-gray-800 font-medium text-sm md:text-base" style="font-style: italic;">
                                    Osaka Hall
                                </span>
                            </div>
                        </div>

                        <!-- Detail Button Column -->
                        <div class="col-span-12 md:col-span-2">
                            <div class="text-center">
                                <a href="https://instagram.com/p/fan-meeting-osaka" target="_blank" 
                                   class="bg-white text-gray-800 rounded-2xl border-2 border-gray-800 px-4 py-2 text-sm font-semibold hover:bg-idol-pink hover:text-white hover:border-idol-pink transition-all duration-300 schedule-detail-btn" 
                                   style="font-style: italic;">
                                    <i class="fab fa-instagram mr-1"></i>IG
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Row 3 - Live Stream -->
                    <div class="grid grid-cols-12 gap-4 items-center py-4 border-b-2 border-gray-800 news-row loading schedule-row" 
                        style="animation-delay: 0.3s">
                        
                        <!-- Row Number -->
                        <div class="col-span-12 md:col-span-1">
                            <div class="text-center">
                                <span class="text-gray-800 font-bold text-lg" style="font-style: italic;">3</span>
                            </div>
                        </div>
                        
                        <!-- Date Column -->
                        <div class="col-span-12 md:col-span-2">
                            <div class="text-center md:text-left">
                                <span class="text-gray-800 font-medium text-sm md:text-base" style="font-style: italic;">
                                    25 Jul 2025
                                </span>
                            </div>
                        </div>

                        <!-- Event Name Column -->
                        <div class="col-span-12 md:col-span-4">
                            <div class="text-center md:text-left">
                                <span class="text-gray-800 font-medium text-sm md:text-base" style="font-style: italic;">
                                    Live Streaming Special
                                </span>
                            </div>
                        </div>

                        <!-- Location Column -->
                        <div class="col-span-12 md:col-span-3">
                            <div class="text-center md:text-left">
                                <span class="text-gray-800 font-medium text-sm md:text-base" style="font-style: italic;">
                                    Online Platform
                                </span>
                            </div>
                        </div>

                        <!-- Detail Button Column -->
                        <div class="col-span-12 md:col-span-2">
                            <div class="text-center">
                                <a href="https://youtube.com/live/special-stream" target="_blank" 
                                   class="bg-red-500 text-white rounded-2xl border-2 border-red-500 px-4 py-2 text-sm font-semibold hover:bg-red-600 hover:border-red-600 transition-all duration-300 schedule-detail-btn live-btn" 
                                   style="font-style: italic;">
                                    <i class="fas fa-play mr-1"></i>LIVE
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Row 4 - TBA Status -->
                    <div class="grid grid-cols-12 gap-4 items-center py-4 border-b-2 border-gray-800 news-row loading schedule-row" 
                        style="animation-delay: 0.4s">
                        
                        <!-- Row Number -->
                        <div class="col-span-12 md:col-span-1">
                            <div class="text-center">
                                <span class="text-gray-800 font-bold text-lg" style="font-style: italic;">4</span>
                            </div>
                        </div>
                        
                        <!-- Date Column -->
                        <div class="col-span-12 md:col-span-2">
                            <div class="text-center md:text-left">
                                <span class="text-gray-800 font-medium text-sm md:text-base" style="font-style: italic;">
                                    02 Aug 2025
                                </span>
                            </div>
                        </div>

                        <!-- Event Name Column -->
                        <div class="col-span-12 md:col-span-4">
                            <div class="text-center md:text-left">
                                <span class="text-gray-800 font-medium text-sm md:text-base" style="font-style: italic;">
                                    Music Festival Collaboration
                                </span>
                            </div>
                        </div>

                        <!-- Location Column -->
                        <div class="col-span-12 md:col-span-3">
                            <div class="text-center md:text-left">
                                <span class="text-gray-800 font-medium text-sm md:text-base" style="font-style: italic;">
                                    Shibuya Sky
                                </span>
                            </div>
                        </div>

                        <!-- Detail Button Column -->
                        <div class="col-span-12 md:col-span-2">
                            <div class="text-center">
                                <button class="bg-gray-200 text-gray-600 rounded-2xl border-2 border-gray-400 px-4 py-2 text-sm font-semibold cursor-not-allowed" 
                                        style="font-style: italic;" disabled>
                                    TBA
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Row 5 - Another Instagram Link -->
                    <div class="grid grid-cols-12 gap-4 items-center py-4 border-b-2 border-gray-800 news-row loading schedule-row" 
                        style="animation-delay: 0.5s">
                        
                        <!-- Row Number -->
                        <div class="col-span-12 md:col-span-1">
                            <div class="text-center">
                                <span class="text-gray-800 font-bold text-lg" style="font-style: italic;">5</span>
                            </div>
                        </div>
                        
                        <!-- Date Column -->
                        <div class="col-span-12 md:col-span-2">
                            <div class="text-center md:text-left">
                                <span class="text-gray-800 font-medium text-sm md:text-base" style="font-style: italic;">
                                    10 Aug 2025
                                </span>
                            </div>
                        </div>

                        <!-- Event Name Column -->
                        <div class="col-span-12 md:col-span-4">
                            <div class="text-center md:text-left">
                                <span class="text-gray-800 font-medium text-sm md:text-base" style="font-style: italic;">
                                    Recording Session Behind Scenes
                                </span>
                            </div>
                        </div>

                        <!-- Location Column -->
                        <div class="col-span-12 md:col-span-3">
                            <div class="text-center md:text-left">
                                <span class="text-gray-800 font-medium text-sm md:text-base" style="font-style: italic;">
                                    Studio A
                                </span>
                            </div>
                        </div>

                        <!-- Detail Button Column -->
                        <div class="col-span-12 md:col-span-2">
                            <div class="text-center">
                                <a href="https://instagram.com/p/recording-session" target="_blank" 
                                   class="bg-white text-gray-800 rounded-2xl border-2 border-gray-800 px-4 py-2 text-sm font-semibold hover:bg-idol-pink hover:text-white hover:border-idol-pink transition-all duration-300 schedule-detail-btn" 
                                   style="font-style: italic;">
                                    <i class="fab fa-instagram mr-1"></i>IG
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Simplified Gallery Section -->
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

            <!-- Simplified Gallery Container -->
            <div class="bg-white rounded-3xl p-6 md:p-8 shadow-xl loading">
                
                <!-- Main Image Display -->
                <div class="relative mb-8" id="mainGallery">
                    <div class="aspect-w-16 aspect-h-9 md:aspect-h-6 rounded-2xl overflow-hidden bg-gray-200 relative">
                        
                        <!-- Main Image Container -->
                        <div class="gallery-main-container relative w-full h-full" style="height: 400px;">
                            <!-- Slide 1 -->
                            <div class="gallery-slide active-slide absolute inset-0 transition-all duration-700 ease-in-out" 
                                data-slide="0">
                                <img src="{{ asset('storage/gallery/Dokumentasi_1.jpg') }}" 
                                    alt="Gallery Image 1" 
                                    class="w-full h-full object-cover">
                            </div>
                            
                            <!-- Slide 2 -->
                            <div class="gallery-slide absolute inset-0 transition-all duration-700 ease-in-out translate-x-full" 
                                data-slide="1">
                                <img src="{{ asset('storage/gallery/Dokumentasi_2.jpg') }}" 
                                    alt="Gallery Image 2" 
                                    class="w-full h-full object-cover">
                            </div>
                            
                            <!-- Slide 3 -->
                            <div class="gallery-slide absolute inset-0 transition-all duration-700 ease-in-out translate-x-full" 
                                data-slide="2">
                                <img src="{{ asset('storage/gallery/Dokumentasi_3.jpg') }}" 
                                    alt="Gallery Image 3" 
                                    class="w-full h-full object-cover">
                            </div>
                            
                            <!-- Slide 4 -->
                            <div class="gallery-slide absolute inset-0 transition-all duration-700 ease-in-out translate-x-full" 
                                data-slide="3">
                                <img src="{{ asset('storage/gallery/Dokumentasi_4.jpg') }}" 
                                    alt="Gallery Image 4" 
                                    class="w-full h-full object-cover">
                            </div>
                            
                            <!-- Slide 5 -->
                            <div class="gallery-slide absolute inset-0 transition-all duration-700 ease-in-out translate-x-full" 
                                data-slide="4">
                                <img src="{{ asset('storage/gallery/Dokumentasi_5.jpg') }}" 
                                    alt="Gallery Image 5" 
                                    class="w-full h-full object-cover">
                            </div>
                        </div>

                        <!-- Slide Counter -->
                        <div class="absolute top-4 right-4 bg-black/50 text-white px-3 py-1 rounded-full text-sm z-10">
                            <span id="currentSlideNumber">1</span> / <span id="totalSlides">5</span>
                        </div>
                    </div>
                </div>

                <!-- Thumbnail Navigation with Active Border -->
                <div class="gallery-thumbnails-container">
                    <div class="flex justify-center space-x-4 pb-4" id="thumbnailContainer">
                        
                        <!-- Thumbnail 1 -->
                        <button class="gallery-thumbnail active-thumbnail relative" 
                                data-slide="0"
                                onclick="goToSlide(0)">
                            <div class="thumbnail-wrapper">
                                <img src="{{ asset('storage/gallery/Dokumentasi_1.jpg') }}" 
                                    alt="Thumbnail 1" 
                                    class="w-20 h-16 md:w-24 md:h-20 rounded-lg object-cover">
                            </div>
                            <div class="text-center mt-2">
                                <span class="text-xs text-gray-600 font-medium">1</span>
                            </div>
                        </button>
                        
                        <!-- Thumbnail 2 -->
                        <button class="gallery-thumbnail relative" 
                                data-slide="1"
                                onclick="goToSlide(1)">
                            <div class="thumbnail-wrapper">
                                <img src="{{ asset('storage/gallery/Dokumentasi_2.jpg') }}" 
                                    alt="Thumbnail 2" 
                                    class="w-20 h-16 md:w-24 md:h-20 rounded-lg object-cover">
                            </div>
                            <div class="text-center mt-2">
                                <span class="text-xs text-gray-600 font-medium">2</span>
                            </div>
                        </button>
                        
                        <!-- Thumbnail 3 -->
                        <button class="gallery-thumbnail relative" 
                                data-slide="2"
                                onclick="goToSlide(2)">
                            <div class="thumbnail-wrapper">
                                <img src="{{ asset('storage/gallery/Dokumentasi_3.jpg') }}" 
                                    alt="Thumbnail 3" 
                                    class="w-20 h-16 md:w-24 md:h-20 rounded-lg object-cover">
                            </div>
                            <div class="text-center mt-2">
                                <span class="text-xs text-gray-600 font-medium">3</span>
                            </div>
                        </button>
                        
                        <!-- Thumbnail 4 -->
                        <button class="gallery-thumbnail relative" 
                                data-slide="3"
                                onclick="goToSlide(3)">
                            <div class="thumbnail-wrapper">
                                <img src="{{ asset('storage/gallery/Dokumentasi_4.jpg') }}" 
                                    alt="Thumbnail 4" 
                                    class="w-20 h-16 md:w-24 md:h-20 rounded-lg object-cover">
                            </div>
                            <div class="text-center mt-2">
                                <span class="text-xs text-gray-600 font-medium">4</span>
                            </div>
                        </button>
                        
                        <!-- Thumbnail 5 -->
                        <button class="gallery-thumbnail relative" 
                                data-slide="4"
                                onclick="goToSlide(4)">
                            <div class="thumbnail-wrapper">
                                <img src="{{ asset('storage/gallery/Dokumentasi_5.jpg') }}" 
                                    alt="Thumbnail 5" 
                                    class="w-20 h-16 md:w-24 md:h-20 rounded-lg object-cover">
                            </div>
                            <div class="text-center mt-2">
                                <span class="text-xs text-gray-600 font-medium">5</span>
                            </div>
                        </button>
                        
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

    <!-- Enhanced Music Section -->
    <section id="music" class="section-padding bg-white section music-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-12 loading">
                <div class="inline-block">
                    <div class="flex items-center justify-center mb-4">
                        <div class="h-1 w-20 bg-gradient-to-r from-idol-pink to-idol-purple rounded-full"></div>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4" style="font-style: italic;">
                        Music
                    </h2>
                    <div class="flex items-center justify-center">
                        <div class="h-1 w-20 bg-gradient-to-r from-idol-pink to-idol-purple rounded-full"></div>
                    </div>
                </div>
            </div>

            <!-- Music Players Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
                
                <!-- First Artist/Album -->
                <div class="music-player-card loading" style="animation-delay: 0.2s">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-idol-pink to-idol-purple rounded-full flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.42 1.56-.299.421-1.02.599-1.559.3z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">Artist Profile</h3>
                                <p class="text-sm text-gray-600">Main Collection</p>
                            </div>
                        </div>
                        
                        <div class="relative">
                            <iframe 
                                class="spotify-iframe"
                                style="border-radius:12px" 
                                src="https://open.spotify.com/embed/artist/5GErAftzK6cVKZyCq8pkBR?utm_source=generator" 
                                width="100%" 
                                height="152" 
                                frameBorder="0" 
                                allowfullscreen="" 
                                allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" 
                                loading="lazy">
                            </iframe>
                        </div>
                    </div>
                </div>

                <!-- Second Artist/Album -->
                <div class="music-player-card loading" style="animation-delay: 0.4s">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-idol-purple to-idol-blue rounded-full flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.42 1.56-.299.421-1.02.599-1.559.3z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">Extended Collection</h3>
                                <p class="text-sm text-gray-600">Additional Tracks</p>
                            </div>
                        </div>
                        
                        <div class="relative">
                            <iframe 
                                class="spotify-iframe"
                                style="border-radius:12px" 
                                src="https://open.spotify.com/embed/artist/2G6EbITdXN7h5bUYpUTIyZ?utm_source=generator&theme=0" 
                                width="100%" 
                                height="152" 
                                frameBorder="0" 
                                allowfullscreen="" 
                                allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" 
                                loading="lazy">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- NEXT EVENT Section -->
    <section id="next-event" class="section-padding bg-gradient-to-br from-gray-50 to-blue-50 section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-12 loading">
                <div class="inline-block">
                    <div class="flex items-center justify-center mb-4">
                        <div class="h-1 w-20 bg-gradient-to-r from-idol-pink to-idol-purple rounded-full"></div>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4" style="font-style: italic;">
                        Next Event
                    </h2>
                    <div class="flex items-center justify-center">
                        <div class="h-1 w-20 bg-gradient-to-r from-idol-pink to-idol-purple rounded-full"></div>
                    </div>
                </div>
            </div>

            <!-- Next Event Cards Container -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($upcomingEvents ?? [] as $index => $event)
                <!-- Event Card -->
                <div class="event-card loading group" style="animation-delay: {{ $index * 0.2 }}s">
                    <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 hover:scale-105">
                        <!-- Event Image -->
                        <div class="relative h-48 bg-gradient-to-br from-idol-pink to-idol-purple overflow-hidden">
                            <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                            <div class="absolute top-4 left-4">
                                <div class="bg-white bg-opacity-90 backdrop-blur-sm rounded-full px-3 py-1">
                                    <span class="text-sm font-bold text-gray-800">{{ $event->formatted_date ?? 'TBA' }}</span>
                                </div>
                            </div>
                            <div class="absolute bottom-4 right-4">
                                @if($event->is_featured ?? false)
                                <div class="bg-yellow-400 rounded-full p-2">
                                    <svg class="w-4 h-4 text-yellow-800" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </div>
                                @endif
                            </div>
                            <!-- Event Icon -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-16 h-16 bg-white bg-opacity-20 backdrop-blur-sm rounded-full flex items-center justify-center">
                                    <span class="text-2xl">📅</span>
                                </div>
                            </div>
                        </div>

                        <!-- Event Content -->
                        <div class="p-6">
                            <!-- Event Title -->
                            <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-idol-pink transition-colors duration-300">
                                {{ $event->event_name ?? 'Upcoming Event' }}
                            </h3>
                            
                            <!-- Event Description -->
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                {{ $event->description ?? 'Details will be announced soon. Stay tuned for more information!' }}
                            </p>
                            
                            <!-- Event Details -->
                            <div class="space-y-2 mb-4">
                                <div class="flex items-center text-sm text-gray-500">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    </svg>
                                    {{ $event->location ?? 'Location TBA' }}
                                </div>
                                @if($event->event_date ?? false)
                                <div class="flex items-center text-sm text-gray-500">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    {{ $event->event_date->format('H:i') }}
                                </div>
                                @endif
                            </div>

                            <!-- Action Button -->
                            <div class="flex justify-between items-center">
                                @if($event->main_action_url ?? false)
                                <a href="{{ $event->main_action_url }}" 
                                target="_blank"
                                class="bg-gradient-to-r from-idol-pink to-idol-purple text-white px-4 py-2 rounded-xl font-semibold text-sm hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                                    {{ $event->main_action_text ?? 'Learn More' }}
                                </a>
                                @else
                                <button class="bg-gray-200 text-gray-500 px-4 py-2 rounded-xl font-semibold text-sm cursor-not-allowed">
                                    TBA
                                </button>
                                @endif
                                
                                <div class="text-xs text-gray-400">
                                    {{ $event->time_until_event ?? '' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <!-- No Events -->
                <div class="col-span-full text-center py-12">
                    <div class="bg-white rounded-3xl p-12 shadow-lg">
                        <div class="text-gray-400 text-6xl mb-4">📅</div>
                        <h3 class="text-xl font-semibold text-gray-600 mb-2">No Upcoming Events</h3>
                        <p class="text-gray-500">Stay tuned for exciting events coming soon!</p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- OTSUKARE POST Section -->
    <section id="otsukare-post" class="section-padding bg-white section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-12 loading">
                <div class="inline-block">
                    <div class="flex items-center justify-center mb-4">
                        <div class="h-1 w-20 bg-gradient-to-r from-idol-pink to-idol-purple rounded-full"></div>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4" style="font-style: italic;">
                        Otsukare Post
                    </h2>
                    <div class="flex items-center justify-center">
                        <div class="h-1 w-20 bg-gradient-to-r from-idol-pink to-idol-purple rounded-full"></div>
                    </div>
                </div>
            </div>

            <!-- Otsukare Posts Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($activities ?? [] as $index => $post)
                <!-- Post Card -->
                <div class="post-card loading group" style="animation-delay: {{ $index * 0.15 }}s">
                    <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-1 hover:scale-102 border border-gray-100">
                        <!-- Post Image -->
                        <div class="relative h-52 overflow-hidden">
                            @if($post->thumbnail ?? false)
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" 
                                alt="{{ $post->title ?? 'Otsukare Post' }}" 
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                            <div class="w-full h-full bg-gradient-to-br from-purple-400 to-pink-400 flex items-center justify-center">
                                <span class="text-4xl text-white">📸</span>
                            </div>
                            @endif
                            
                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300"></div>
                            
                            <!-- Date Badge -->
                            <div class="absolute top-4 left-4">
                                <div class="bg-white bg-opacity-90 backdrop-blur-sm rounded-xl px-3 py-1">
                                    <span class="text-xs font-bold text-gray-800">
                                        {{ $post->activity_date ? $post->activity_date->format('M d, Y') : 'Recent' }}
                                    </span>
                                </div>
                            </div>

                            <!-- View Count -->
                            @if($post->view_count ?? false)
                            <div class="absolute top-4 right-4">
                                <div class="bg-black bg-opacity-50 backdrop-blur-sm rounded-full px-2 py-1">
                                    <span class="text-xs text-white">👁 {{ number_format($post->view_count) }}</span>
                                </div>
                            </div>
                            @endif
                        </div>

                        <!-- Post Content -->
                        <div class="p-6">
                            <!-- Post Title -->
                            <h3 class="text-lg font-bold text-gray-800 mb-3 group-hover:text-idol-pink transition-colors duration-300 line-clamp-2">
                                {{ $post->title ?? 'Otsukare Post' }}
                            </h3>
                            
                            <!-- Post Description -->
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                {{ $post->description ?? 'Thank you for your hard work! Check out our latest activities and behind-the-scenes moments.' }}
                            </p>
                            
                            <!-- Post Meta -->
                            <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                                @if($post->category ?? false)
                                <span class="bg-gray-100 px-2 py-1 rounded-full">{{ $post->category }}</span>
                                @endif
                                
                                @if($post->member_names ?? false)
                                <span>{{ $post->member_names }}</span>
                                @endif
                            </div>

                            <!-- Action Button -->
                            <div class="flex justify-between items-center">
                                <button class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-4 py-2 rounded-xl font-semibold text-sm hover:shadow-lg transform hover:scale-105 transition-all duration-300"
                                        onclick="viewOtsukarePost({{ $post->id ?? 0 }})">
                                    View Post
                                </button>
                                
                                @if($post->documentations_count ?? 0)
                                <div class="text-xs text-gray-400 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    {{ $post->documentations_count }} photos
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <!-- No Posts -->
                <div class="col-span-full text-center py-12">
                    <div class="bg-gray-50 rounded-3xl p-12">
                        <div class="text-gray-400 text-6xl mb-4">📝</div>
                        <h3 class="text-xl font-semibold text-gray-600 mb-2">No Otsukare Posts</h3>
                        <p class="text-gray-500">Check back soon for updates and activities!</p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- DOCUMENTATION Section -->
    <section id="documentation" class="section-padding bg-gradient-to-br from-purple-50 to-pink-50 section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-12 loading">
                <div class="inline-block">
                    <div class="flex items-center justify-center mb-4">
                        <div class="h-1 w-20 bg-gradient-to-r from-idol-pink to-idol-purple rounded-full"></div>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4" style="font-style: italic;">
                        Documentation
                    </h2>
                    <div class="flex items-center justify-center">
                        <div class="h-1 w-20 bg-gradient-to-r from-idol-pink to-idol-purple rounded-full"></div>
                    </div>
                </div>
            </div>

            <!-- Documentation Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @php
                    $documentationEvents = [
                        ['name' => 'Recording Session', 'photos' => ['doc1.jpg', 'doc2.jpg', 'doc3.jpg']],
                        ['name' => 'Music Video Shoot', 'photos' => ['doc4.jpg', 'doc5.jpg', 'doc6.jpg']],
                        ['name' => 'Live Performance', 'photos' => ['doc7.jpg', 'doc8.jpg', 'doc9.jpg']],
                        ['name' => 'Behind The Scenes', 'photos' => ['doc10.jpg', 'doc11.jpg', 'doc12.jpg']],
                    ]
                @endphp

                @foreach($documentationEvents as $index => $event)
                <!-- Documentation Card -->
                <div class="documentation-card loading" style="animation-delay: {{ $index * 0.1 }}s">
                    <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-500 transform hover:-translate-y-1">
                        <!-- Event Name Header -->
                        <div class="bg-gradient-to-r from-idol-pink to-idol-purple p-4 text-center">
                            <h3 class="text-white font-bold text-lg">{{ $event['name'] }}</h3>
                        </div>
                        
                        <!-- Photos List -->
                        <div class="p-4 space-y-3">
                            @foreach($event['photos'] as $photoIndex => $photo)
                            <div class="photo-item group cursor-pointer" onclick="openDocumentationPhoto('{{ $photo }}', '{{ $event['name'] }}')">
                                <div class="flex items-center p-3 bg-gray-50 rounded-xl hover:bg-gradient-to-r hover:from-purple-100 hover:to-pink-100 transition-all duration-300 group-hover:shadow-md">
                                    <!-- Photo Thumbnail -->
                                    <div class="w-12 h-12 bg-gradient-to-br from-gray-300 to-gray-400 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    
                                    <!-- Photo Info -->
                                    <div class="flex-1">
                                        <div class="font-semibold text-gray-800 text-sm group-hover:text-idol-pink transition-colors duration-300">
                                            Photo {{ $photoIndex + 1 }}
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            {{ $event['name'] }} Documentation
                                        </div>
                                    </div>
                                    
                                    <!-- View Icon -->
                                    <div class="w-6 h-6 text-gray-400 group-hover:text-idol-pink transition-colors duration-300">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                            <!-- View All Button -->
                            <div class="pt-2">
                                <button class="w-full bg-gradient-to-r from-purple-500 to-pink-500 text-white py-2 rounded-xl font-semibold text-sm hover:shadow-lg transform hover:scale-105 transition-all duration-300"
                                        onclick="viewAllDocumentation('{{ $event['name'] }}')">
                                    View All ({{ count($event['photos']) }})
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Documentation Modal -->
    <div id="documentationModal" class="fixed inset-0 z-50 bg-black bg-opacity-80 opacity-0 invisible transition-all duration-300">
        <div class="flex items-center justify-center h-full p-4">
            <div class="relative max-w-4xl w-full">
                <!-- Close Button -->
                <button onclick="closeDocumentationModal()" 
                        class="absolute top-4 right-4 z-10 bg-white bg-opacity-20 text-white rounded-full p-2 hover:bg-opacity-30 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                
                <!-- Modal Content -->
                <div id="modalContent" class="bg-white rounded-2xl overflow-hidden">
                    <!-- Content will be loaded here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Include Activities Section -->
    @include('sections.activities')

    <!-- Include Footer -->
    @include('footer')

    <!-- Scripts -->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>