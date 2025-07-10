<!-- Navigation Header - Updated Structure -->
<nav class="fixed top-0 left-0 right-0 z-50 p-4 bg-white/80 backdrop-blur-md shadow-lg transition-all duration-300" id="navbar">
    <div class="flex justify-between items-center max-w-7xl mx-auto">
        <!-- Logo -->
        <div class="flex items-center">
            <a href="{{ url('/') }}" class="flex items-center animate-slide-up">
                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-lg p-1 animate-pulse-glow">
                    <img src="{{ asset('images/logos/equivalent-logo.png') }}" 
                         alt="Equivalent Logo" 
                         class="w-full h-full object-contain">
                </div>
                <span class="ml-3 text-gray-800 font-semibold text-xl">Equivalent</span>
            </a>
        </div>
        
        <!-- Desktop Navigation - Updated with new structure -->
        <div class="hidden md:flex space-x-8">
            <a href="#home" class="nav-link text-gray-600 hover:text-idol-pink transition-colors">Home</a>
            <a href="#about" class="nav-link text-gray-600 hover:text-idol-pink transition-colors">About</a>
            <a href="#schedule" class="nav-link text-gray-600 hover:text-idol-pink transition-colors">Schedule</a>
            <a href="#gallery" class="nav-link text-gray-600 hover:text-idol-pink transition-colors">Gallery</a>
            <a href="#music" class="nav-link text-gray-600 hover:text-idol-pink transition-colors">Music</a>
            <a href="#activities" class="nav-link text-gray-600 hover:text-idol-pink transition-colors">Activities</a>
        </div>
        
        <!-- Hamburger Menu -->
        <div class="hamburger-menu cursor-pointer p-2 md:hidden" id="hamburgerMenu">
            <div class="hamburger-line w-6 h-0.5 bg-gray-800 mb-1"></div>
            <div class="hamburger-line w-6 h-0.5 bg-gray-800 mb-1"></div>
            <div class="hamburger-line w-6 h-0.5 bg-gray-800"></div>
        </div>
    </div>
</nav>

<!-- Mobile Menu Overlay - Updated Structure -->
<div class="menu-overlay fixed inset-0 bg-black bg-opacity-90 z-40 opacity-0 invisible" id="menuOverlay">
    <div class="flex items-center justify-center h-full">
        <div class="text-center">
            <div class="space-y-8">
                <!-- Main Navigation -->
                <div class="border-b border-gray-600 pb-6">
                    <h3 class="text-gray-400 text-sm uppercase tracking-wide mb-4">Navigation</h3>
                    <div class="space-y-4">
                        <div class="menu-item">
                            <a href="#home" class="mobile-nav-link text-white text-2xl font-semibold hover:text-idol-pink">Home</a>
                        </div>
                        <div class="menu-item">
                            <a href="#about" class="mobile-nav-link text-white text-2xl font-semibold hover:text-idol-pink">About</a>
                        </div>
                        <div class="menu-item">
                            <a href="#schedule" class="mobile-nav-link text-white text-2xl font-semibold hover:text-idol-pink">Schedule</a>
                        </div>
                        <div class="menu-item">
                            <a href="#gallery" class="mobile-nav-link text-white text-2xl font-semibold hover:text-idol-pink">Gallery</a>
                        </div>
                        <div class="menu-item">
                            <a href="#music" class="mobile-nav-link text-white text-2xl font-semibold hover:text-idol-pink">Music</a>
                        </div>
                        <div class="menu-item">
                            <a href="#activities" class="mobile-nav-link text-white text-2xl font-semibold hover:text-idol-pink">Activities</a>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div class="pt-6">
                    <h3 class="text-gray-400 text-sm uppercase tracking-wide mb-4">Quick Links</h3>
                    <div class="space-y-4">
                        <div class="menu-item">
                            <a href="https://instagram.com/equivalent" target="_blank" class="text-white text-lg hover:text-idol-pink">Instagram</a>
                        </div>
                        <div class="menu-item">
                            <a href="https://youtube.com/@equivalent" target="_blank" class="text-white text-lg hover:text-idol-pink">YouTube</a>
                        </div>
                        <div class="menu-item">
                            <a href="https://open.spotify.com/artist/equivalent" target="_blank" class="text-white text-lg hover:text-idol-pink">Spotify</a>
                        </div>
                        <div class="menu-item">
                            <a href="https://tiktok.com/@equivalent" target="_blank" class="text-white text-lg hover:text-idol-pink">TikTok</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>