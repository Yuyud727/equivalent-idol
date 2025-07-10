<!-- Activities Section (Otsukare) -->
<section id="activities" class="section-padding bg-gray-50 section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12 loading">
            <div class="inline-block">
                <div class="flex items-center justify-center mb-4">
                    <div class="h-1 w-20 bg-gradient-to-r from-idol-pink to-idol-purple rounded-full"></div>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4" style="font-style: italic;">
                    Activities
                </h2>
                <div class="flex items-center justify-center">
                    <div class="h-1 w-20 bg-gradient-to-r from-idol-pink to-idol-purple rounded-full"></div>
                </div>
            </div>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto mt-6">
                Daily activities and behind-the-scenes moments from Equivalent
            </p>
        </div>

        <!-- Filter Tabs -->
        <div class="flex justify-center mb-8">
            <div class="bg-white rounded-2xl p-2 shadow-lg">
                <div class="flex flex-wrap justify-center space-x-2">
                    <button onclick="filterActivities('all')" 
                            class="activity-filter-btn active px-4 md:px-6 py-3 rounded-xl font-semibold text-xs md:text-sm transition-all duration-300" 
                            data-filter="all">
                        All
                    </button>
                    <button onclick="filterActivities('rehearsal')" 
                            class="activity-filter-btn px-4 md:px-6 py-3 rounded-xl font-semibold text-xs md:text-sm transition-all duration-300" 
                            data-filter="rehearsal">
                        Rehearsal
                    </button>
                    <button onclick="filterActivities('performance')" 
                            class="activity-filter-btn px-4 md:px-6 py-3 rounded-xl font-semibold text-xs md:text-sm transition-all duration-300" 
                            data-filter="performance">
                        Performance
                    </button>
                    <button onclick="filterActivities('photoshoot')" 
                            class="activity-filter-btn px-4 md:px-6 py-3 rounded-xl font-semibold text-xs md:text-sm transition-all duration-300" 
                            data-filter="photoshoot">
                        Photoshoot
                    </button>
                    <button onclick="filterActivities('recording')" 
                            class="activity-filter-btn px-4 md:px-6 py-3 rounded-xl font-semibold text-xs md:text-sm transition-all duration-300" 
                            data-filter="recording">
                        Recording
                    </button>
                </div>
            </div>
        </div>

        <!-- Activities Grid (Instagram-style) -->
        <div class="activities-grid grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 mb-12" id="activitiesGrid">
            
            <!-- Activity Card 1 - Rehearsal -->
            <div class="activity-card loading" 
                 data-category="rehearsal" 
                 data-activity-id="1"
                 onclick="openActivityDetail(1)"
                 style="animation-delay: 0.1s">
                <div class="relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer">
                    <div class="aspect-square overflow-hidden">
                        <img src="{{ asset('storage/activities/rehearsal-1.jpg') }}" 
                             alt="Rehearsal Session" 
                             class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-3 md:p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-white text-xs md:text-sm font-semibold">Dance Rehearsal</h3>
                                <p class="text-white/80 text-xs">2 hours ago</p>
                            </div>
                            <div class="flex items-center space-x-1">
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white rounded-full"></div>
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white/60 rounded-full"></div>
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white/60 rounded-full"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Category Badge -->
                    <div class="absolute top-2 md:top-3 left-2 md:left-3">
                        <span class="bg-ami-red text-white text-xs px-2 py-1 rounded-full font-semibold">Rehearsal</span>
                    </div>
                </div>
            </div>

            <!-- Activity Card 2 - Performance -->
            <div class="activity-card loading" 
                 data-category="performance" 
                 data-activity-id="2"
                 onclick="openActivityDetail(2)"
                 style="animation-delay: 0.2s">
                <div class="relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer">
                    <div class="aspect-square overflow-hidden">
                        <img src="{{ asset('storage/activities/performance-1.jpg') }}" 
                             alt="Live Performance" 
                             class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-3 md:p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-white text-xs md:text-sm font-semibold">Live Stage</h3>
                                <p class="text-white/80 text-xs">1 day ago</p>
                            </div>
                            <div class="flex items-center space-x-1">
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white rounded-full"></div>
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white rounded-full"></div>
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white/60 rounded-full"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Category Badge -->
                    <div class="absolute top-2 md:top-3 left-2 md:left-3">
                        <span class="bg-alyaa-pink text-white text-xs px-2 py-1 rounded-full font-semibold">Performance</span>
                    </div>
                </div>
            </div>

            <!-- Activity Card 3 - Photoshoot -->
            <div class="activity-card loading" 
                 data-category="photoshoot" 
                 data-activity-id="3"
                 onclick="openActivityDetail(3)"
                 style="animation-delay: 0.3s">
                <div class="relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer">
                    <div class="aspect-square overflow-hidden">
                        <img src="{{ asset('storage/activities/photoshoot-1.jpg') }}" 
                             alt="Photoshoot Session" 
                             class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-3 md:p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-white text-xs md:text-sm font-semibold">Magazine Shoot</h3>
                                <p class="text-white/80 text-xs">3 days ago</p>
                            </div>
                            <div class="flex items-center space-x-1">
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white rounded-full"></div>
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white rounded-full"></div>
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white rounded-full"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Category Badge -->
                    <div class="absolute top-2 md:top-3 left-2 md:left-3">
                        <span class="bg-ame-yellow text-white text-xs px-2 py-1 rounded-full font-semibold">Photoshoot</span>
                    </div>
                </div>
            </div>

            <!-- Activity Card 4 - Recording -->
            <div class="activity-card loading" 
                 data-category="recording" 
                 data-activity-id="4"
                 onclick="openActivityDetail(4)"
                 style="animation-delay: 0.4s">
                <div class="relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer">
                    <div class="aspect-square overflow-hidden">
                        <img src="{{ asset('storage/activities/recording-1.jpg') }}" 
                             alt="Recording Session" 
                             class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-3 md:p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-white text-xs md:text-sm font-semibold">Studio Recording</h3>
                                <p class="text-white/80 text-xs">5 days ago</p>
                            </div>
                            <div class="flex items-center space-x-1">
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white rounded-full"></div>
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white/60 rounded-full"></div>
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white/60 rounded-full"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Category Badge -->
                    <div class="absolute top-2 md:top-3 left-2 md:left-3">
                        <span class="bg-ina-purple text-white text-xs px-2 py-1 rounded-full font-semibold">Recording</span>
                    </div>
                </div>
            </div>

            <!-- Activity Card 5 - Rehearsal -->
            <div class="activity-card loading" 
                 data-category="rehearsal" 
                 data-activity-id="5"
                 onclick="openActivityDetail(5)"
                 style="animation-delay: 0.5s">
                <div class="relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer">
                    <div class="aspect-square overflow-hidden">
                        <img src="{{ asset('storage/activities/rehearsal-2.jpg') }}" 
                             alt="Vocal Practice" 
                             class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-3 md:p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-white text-xs md:text-sm font-semibold">Vocal Practice</h3>
                                <p class="text-white/80 text-xs">1 week ago</p>
                            </div>
                            <div class="flex items-center space-x-1">
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white rounded-full"></div>
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white rounded-full"></div>
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white/60 rounded-full"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Category Badge -->
                    <div class="absolute top-2 md:top-3 left-2 md:left-3">
                        <span class="bg-cantikkun-blue text-white text-xs px-2 py-1 rounded-full font-semibold">Rehearsal</span>
                    </div>
                </div>
            </div>

            <!-- Activity Card 6 - Performance -->
            <div class="activity-card loading" 
                 data-category="performance" 
                 data-activity-id="6"
                 onclick="openActivityDetail(6)"
                 style="animation-delay: 0.6s">
                <div class="relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer">
                    <div class="aspect-square overflow-hidden">
                        <img src="{{ asset('storage/activities/performance-2.jpg') }}" 
                             alt="Concert Backstage" 
                             class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-3 md:p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-white text-xs md:text-sm font-semibold">Before Show</h3>
                                <p class="text-white/80 text-xs">1 week ago</p>
                            </div>
                            <div class="flex items-center space-x-1">
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white rounded-full"></div>
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white/60 rounded-full"></div>
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white/60 rounded-full"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Category Badge -->
                    <div class="absolute top-2 md:top-3 left-2 md:left-3">
                        <span class="bg-alyaa-pink text-white text-xs px-2 py-1 rounded-full font-semibold">Performance</span>
                    </div>
                </div>
            </div>

            <!-- Activity Card 7 - Photoshoot -->
            <div class="activity-card loading" 
                 data-category="photoshoot" 
                 data-activity-id="7"
                 onclick="openActivityDetail(7)"
                 style="animation-delay: 0.7s">
                <div class="relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer">
                    <div class="aspect-square overflow-hidden">
                        <img src="{{ asset('storage/activities/photoshoot-2.jpg') }}" 
                             alt="Album Cover Shoot" 
                             class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-3 md:p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-white text-xs md:text-sm font-semibold">Album Cover</h3>
                                <p class="text-white/80 text-xs">2 weeks ago</p>
                            </div>
                            <div class="flex items-center space-x-1">
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white rounded-full"></div>
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white rounded-full"></div>
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white rounded-full"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Category Badge -->
                    <div class="absolute top-2 md:top-3 left-2 md:left-3">
                        <span class="bg-ame-yellow text-white text-xs px-2 py-1 rounded-full font-semibold">Photoshoot</span>
                    </div>
                </div>
            </div>

            <!-- Activity Card 8 - Recording -->
            <div class="activity-card loading" 
                 data-category="recording" 
                 data-activity-id="8"
                 onclick="openActivityDetail(8)"
                 style="animation-delay: 0.8s">
                <div class="relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer">
                    <div class="aspect-square overflow-hidden">
                        <img src="{{ asset('storage/activities/recording-2.jpg') }}" 
                             alt="Music Video Recording" 
                             class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-3 md:p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-white text-xs md:text-sm font-semibold">MV Recording</h3>
                                <p class="text-white/80 text-xs">2 weeks ago</p>
                            </div>
                            <div class="flex items-center space-x-1">
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white rounded-full"></div>
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white rounded-full"></div>
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white/60 rounded-full"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Category Badge -->
                    <div class="absolute top-2 md:top-3 left-2 md:left-3">
                        <span class="bg-ina-purple text-white text-xs px-2 py-1 rounded-full font-semibold">Recording</span>
                    </div>
                </div>
            </div>

            <!-- Activity Card 9 - Rehearsal -->
            <div class="activity-card loading" 
                 data-category="rehearsal" 
                 data-activity-id="9"
                 onclick="openActivityDetail(9)"
                 style="animation-delay: 0.9s">
                <div class="relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer">
                    <div class="aspect-square overflow-hidden">
                        <img src="{{ asset('storage/activities/rehearsal-3.jpg') }}" 
                             alt="Choreography Practice" 
                             class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-3 md:p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-white text-xs md:text-sm font-semibold">Choreography</h3>
                                <p class="text-white/80 text-xs">3 weeks ago</p>
                            </div>
                            <div class="flex items-center space-x-1">
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white rounded-full"></div>
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white/60 rounded-full"></div>
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white/60 rounded-full"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Category Badge -->
                    <div class="absolute top-2 md:top-3 left-2 md:left-3">
                        <span class="bg-cantikkun-blue text-white text-xs px-2 py-1 rounded-full font-semibold">Rehearsal</span>
                    </div>
                </div>
            </div>

            <!-- Activity Card 10 - Performance -->
            <div class="activity-card loading" 
                 data-category="performance" 
                 data-activity-id="10"
                 onclick="openActivityDetail(10)"
                 style="animation-delay: 1.0s">
                <div class="relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer">
                    <div class="aspect-square overflow-hidden">
                        <img src="{{ asset('storage/activities/performance-3.jpg') }}" 
                             alt="Fan Meeting Event" 
                             class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-3 md:p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-white text-xs md:text-sm font-semibold">Fan Meeting</h3>
                                <p class="text-white/80 text-xs">3 weeks ago</p>
                            </div>
                            <div class="flex items-center space-x-1">
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white rounded-full"></div>
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white rounded-full"></div>
                                <div class="w-1.5 h-1.5 md:w-2 md:h-2 bg-white rounded-full"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Category Badge -->
                    <div class="absolute top-2 md:top-3 left-2 md:left-3">
                        <span class="bg-alyaa-pink text-white text-xs px-2 py-1 rounded-full font-semibold">Performance</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Load More Button -->
        <div class="text-center">
            <button onclick="loadMoreActivities()" 
                    class="bg-idol-gradient text-white px-8 py-4 rounded-2xl font-semibold hover:opacity-90 transition-opacity" 
                    id="loadMoreBtn">
                Load More Activities
            </button>
        </div>
    </div>
</section>

<!-- Activity Detail Modal -->
<div id="activityDetailModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-90 opacity-0 invisible transition-all duration-300">
    <div class="bg-white rounded-3xl m-4 max-w-4xl w-full max-h-96 overflow-y-auto transform scale-95 transition-all duration-300" id="activityModalContainer">
        <div id="activityDetailContent" class="p-6 md:p-8">
            <!-- Content will be filled by JavaScript -->
        </div>
        <div class="text-center pb-6 md:pb-8">
            <button onclick="closeActivityDetail()" 
                    class="bg-idol-gradient text-white px-6 py-3 rounded-lg font-semibold hover:opacity-90 transition-opacity">
                Close
            </button>
        </div>
    </div>
</div>