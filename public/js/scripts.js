// DOM Content Loaded
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all components
    initNavigation();
    initScrollAnimations();
    initSmoothScroll();
    initParallaxEffect();
    initMemberCards();
    initSocialMediaLinks();
    
    // Add loading animation to elements
    addLoadingAnimations();
});

// Navigation Functions
function initNavigation() {
    const hamburgerMenu = document.getElementById('hamburgerMenu');
    const menuOverlay = document.getElementById('menuOverlay');
    const navbar = document.getElementById('navbar');
    const navLinks = document.querySelectorAll('.nav-link');
    const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');
    let isMenuOpen = false;

    // Hamburger menu toggle
    if (hamburgerMenu && menuOverlay) {
        hamburgerMenu.addEventListener('click', toggleMobileMenu);
        
        // Close menu when clicking overlay
        menuOverlay.addEventListener('click', function(e) {
            if (e.target === menuOverlay) {
                closeMobileMenu();
            }
        });
    }

    // Mobile navigation links
    mobileNavLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href.startsWith('#')) {
                e.preventDefault();
                closeMobileMenu();
                setTimeout(() => {
                    scrollToSection(href);
                }, 300);
            }
        });
    });

    // Desktop navigation links
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href.startsWith('#')) {
                e.preventDefault();
                scrollToSection(href);
            }
        });
    });

    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset;
        
        if (scrollTop > 50) {
            navbar.classList.add('navbar-scrolled');
        } else {
            navbar.classList.remove('navbar-scrolled');
        }
        
        // Update active navigation
        updateActiveNavigation();
    });

    function toggleMobileMenu() {
        isMenuOpen = !isMenuOpen;
        hamburgerMenu.classList.toggle('hamburger-active');
        
        if (isMenuOpen) {
            menuOverlay.classList.remove('opacity-0', 'invisible');
            menuOverlay.classList.add('opacity-100', 'visible');
            document.body.style.overflow = 'hidden';
        } else {
            closeMobileMenu();
        }
    }

    function closeMobileMenu() {
        isMenuOpen = false;
        hamburgerMenu.classList.remove('hamburger-active');
        menuOverlay.classList.remove('opacity-100', 'visible');
        menuOverlay.classList.add('opacity-0', 'invisible');
        document.body.style.overflow = '';
    }

    function updateActiveNavigation() {
        const sections = document.querySelectorAll('section[id]');
        const scrollPos = window.scrollY + 100;

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            const sectionId = section.getAttribute('id');

            if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                // Remove active class from all nav links
                navLinks.forEach(link => link.classList.remove('active'));
                
                // Add active class to current section link
                const activeLink = document.querySelector(`.nav-link[href="#${sectionId}"]`);
                if (activeLink) {
                    activeLink.classList.add('active');
                }
            }
        });
    }
}

// Smooth Scroll Function
function initSmoothScroll() {
    // Add smooth scroll behavior
    document.documentElement.style.scrollBehavior = 'smooth';
}

function scrollToSection(target) {
    const targetElement = document.querySelector(target);
    if (targetElement) {
        const offsetTop = targetElement.offsetTop - 80; // Account for navbar height
        window.scrollTo({
            top: offsetTop,
            behavior: 'smooth'
        });
    }
}

// Scroll Animations
function initScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const element = entry.target;
                
                // Add animation classes
                if (element.classList.contains('loading')) {
                    element.classList.add('loaded');
                }
                
                if (element.classList.contains('fade-in-up')) {
                    element.classList.add('active');
                }
                
                // Stagger animation for member cards
                if (element.classList.contains('member-card')) {
                    const index = Array.from(element.parentNode.children).indexOf(element);
                    setTimeout(() => {
                        element.classList.add('animate-bounce-in');
                    }, index * 100);
                }
                
                // Stop observing once animated
                observer.unobserve(element);
            }
        });
    }, observerOptions);

    // Observe elements with animation classes
    const animatedElements = document.querySelectorAll('.loading, .fade-in-up, .member-card');
    animatedElements.forEach(el => observer.observe(el));
}

// Parallax Effect
function initParallaxEffect() {
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const parallaxElements = document.querySelectorAll('.parallax-bg, .hero-bg');
        
        parallaxElements.forEach(element => {
            const speed = 0.5;
            element.style.transform = `translateY(${scrolled * speed}px)`;
        });
    });
}

// Member Cards Functions
function initMemberCards() {
    const memberCards = document.querySelectorAll('.member-card');
    
    memberCards.forEach((card, index) => {
        // Add stagger delay
        card.style.setProperty('--i', index);
        
        // Add click event
        card.addEventListener('click', function() {
            const memberName = this.getAttribute('data-member');
            if (memberName) {
                openMemberDetail(memberName);
            }
        });
        
        // Add hover sound effect (optional)
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = '';
        });
    });
}

function openMemberDetail(memberName) {
    // Member data
    const memberData = {
        ami: { 
            name: 'Ami', 
            color: 'bg-gradient-red', 
            role: 'Leader & Main Vocalist',
            description: 'Passionate leader with powerful vocals'
        },
        alyaa: { 
            name: 'Alyaa', 
            color: 'bg-gradient-pink', 
            role: 'Main Dancer & Vocalist',
            description: 'Energetic dancer with graceful movements'
        },
        ame: { 
            name: 'Ame', 
            color: 'bg-gradient-yellow', 
            role: 'Visual & Lead Vocalist',
            description: 'Charming visual with sweet voice'
        },
        ina: { 
            name: 'Ina', 
            color: 'bg-gradient-purple', 
            role: 'Main Rapper & Vocalist',
            description: 'Skilled rapper with versatile talents'
        },
        cantikkun: { 
            name: 'Cantikkun', 
            color: 'bg-gradient-blue', 
            role: 'Maknae & Lead Dancer',
            description: 'Youngest member with dynamic dance skills'
        }
    };

    const member = memberData[memberName];
    if (member) {
        // For now, show an alert. You can implement a modal later
        showMemberModal(member);
    }
}

function showMemberModal(member) {
    // Create modal HTML
    const modalHTML = `
        <div id="memberModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75 opacity-0 invisible transition-all duration-300">
            <div class="bg-white rounded-3xl p-8 m-4 max-w-md w-full transform scale-95 transition-all duration-300">
                <div class="text-center">
                    <div class="w-24 h-24 ${member.color} rounded-full mx-auto mb-4 flex items-center justify-center">
                        <span class="text-white text-2xl font-bold">${member.name.charAt(0)}</span>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">${member.name}</h2>
                    <p class="text-lg text-gray-600 mb-4">${member.role}</p>
                    <p class="text-gray-500 mb-6">${member.description}</p>
                    <button onclick="closeMemberModal()" class="bg-idol-gradient text-white px-6 py-3 rounded-lg font-semibold hover:opacity-90 transition-opacity">
                        Close
                    </button>
                </div>
            </div>
        </div>
    `;
    
    // Add modal to body
    document.body.insertAdjacentHTML('beforeend', modalHTML);
    
    // Show modal with animation
    setTimeout(() => {
        const modal = document.getElementById('memberModal');
        const modalContent = modal.querySelector('div');
        modal.classList.remove('opacity-0', 'invisible');
        modal.classList.add('opacity-100', 'visible');
        modalContent.classList.remove('scale-95');
        modalContent.classList.add('scale-100');
    }, 10);
}

function closeMemberModal() {
    const modal = document.getElementById('memberModal');
    if (modal) {
        const modalContent = modal.querySelector('div');
        modal.classList.remove('opacity-100', 'visible');
        modal.classList.add('opacity-0', 'invisible');
        modalContent.classList.remove('scale-100');
        modalContent.classList.add('scale-95');
        
        setTimeout(() => {
            modal.remove();
        }, 300);
    }
}

// Social Media Links
function initSocialMediaLinks() {
    const socialIcons = document.querySelectorAll('.social-icon');
    
    // Social media URLs (you can customize these)
    const socialLinks = {
        youtube: 'https://youtube.com/@equivalent',
        tiktok: 'https://tiktok.com/@equivalent',
        facebook: 'https://facebook.com/equivalent',
        instagram: 'https://instagram.com/equivalent',
        whatsapp: 'https://wa.me/6281234567890',
        spotify: 'https://open.spotify.com/artist/equivalent'
    };
    
    socialIcons.forEach(icon => {
        icon.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Determine social media platform from SVG content or data attribute
            const href = this.getAttribute('href');
            if (href && href !== '#') {
                window.open(href, '_blank');
            }
            
            // Add click animation
            this.style.transform = 'translateY(-5px) scale(1.1)';
            setTimeout(() => {
                this.style.transform = '';
            }, 200);
        });
        
        // Add hover effects
        icon.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px) scale(1.1)';
        });
        
        icon.addEventListener('mouseleave', function() {
            this.style.transform = '';
        });
    });
}

// Loading Animations
function addLoadingAnimations() {
    const elements = document.querySelectorAll('.animate-fade-in, .animate-slide-up, .animate-bounce-in');
    
    elements.forEach((element, index) => {
        element.style.animationDelay = `${index * 0.1}s`;
    });
}

// Utility Functions
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Newsletter Subscription
function initNewsletter() {
    const newsletterForm = document.querySelector('form[name="newsletter"]');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            
            if (email) {
                // Here you would typically send to your backend
                alert('Thank you for subscribing! We\'ll keep you updated.');
                this.reset();
            }
        });
    }
}

// Scroll to Top Function
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Add scroll to top button
function addScrollToTopButton() {
    const scrollButton = document.createElement('button');
    scrollButton.innerHTML = '↑';
    scrollButton.className = 'fixed bottom-6 right-6 bg-idol-gradient text-white w-12 h-12 rounded-full shadow-lg opacity-0 invisible transition-all duration-300 hover:scale-110 z-40';
    scrollButton.onclick = scrollToTop;
    
    document.body.appendChild(scrollButton);
    
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            scrollButton.classList.remove('opacity-0', 'invisible');
            scrollButton.classList.add('opacity-100', 'visible');
        } else {
            scrollButton.classList.remove('opacity-100', 'visible');
            scrollButton.classList.add('opacity-0', 'invisible');
        }
    });
}

// Initialize scroll to top button when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    addScrollToTopButton();
    initNewsletter();
});

// Export functions for global access
window.openMemberDetail = openMemberDetail;
window.closeMemberModal = closeMemberModal;
window.scrollToSection = scrollToSection;



    //  Event detail functions 
    function showEventDetail(eventId) {
        // Ambil data event dari DOM atau AJAX request
        // Untuk sekarang kita akan menggunakan data yang sudah di-embed di halaman
        fetch(`/api/events/${eventId}`)
            .then(response => response.json())
            .then(event => {
                const modalContent = document.getElementById('eventDetailContent');
                modalContent.innerHTML = `
                    <div class="text-center">
                        <h3 class="text-3xl font-bold text-gray-800 mb-4" style="font-style: italic;">
                            ${event.event_name}
                        </h3>
                        <div class="space-y-4 text-left">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-idol-pink mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700">${event.formatted_date}</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-idol-pink mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700">${event.location}</span>
                            </div>
                            ${event.description ? `
                            <div class="mt-4">
                                <h4 class="font-semibold text-gray-800 mb-2">Deskripsi:</h4>
                                <p class="text-gray-600">${event.description}</p>
                            </div>
                            ` : ''}
                            ${event.ticket_url ? `
                            <div class="mt-6 text-center">
                                <a href="${event.ticket_url}" target="_blank" 
                                class="inline-block bg-idol-gradient text-white px-6 py-3 rounded-lg font-semibold hover:opacity-90 transition-opacity">
                                    Beli Tiket
                                </a>
                            </div>
                            ` : ''}
                        </div>
                    </div>
                `;
                
                // Show modal
                showEventModal();
            })
            .catch(error => {
                console.error('Error fetching event details:', error);
                // Fallback: show basic info
                showBasicEventDetail(eventId);
            });
    }

    function showBasicEventDetail(eventId) {
        // Fallback function jika AJAX gagal
        const button = document.querySelector(`[data-event-id="${eventId}"]`);
        const row = button.closest('.news-row');
        const date = row.querySelector('.col-span-2 span').textContent;
        const eventName = row.querySelector('.col-span-4 span').textContent;
        const location = row.querySelectorAll('.col-span-4 span')[1].textContent;
        
        const modalContent = document.getElementById('eventDetailContent');
        modalContent.innerHTML = `
            <div class="text-center">
                <h3 class="text-3xl font-bold text-gray-800 mb-4" style="font-style: italic;">
                    ${eventName}
                </h3>
                <div class="space-y-4 text-left">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-idol-pink mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">${date}</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-idol-pink mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-700">${location}</span>
                    </div>
                    <div class="mt-4">
                        <p class="text-gray-600">Detail event akan segera diumumkan. Pantau terus update dari kami!</p>
                    </div>
                </div>
            </div>
        `;
        
        showEventModal();
    }

    function showEventModal() {
        const modal = document.getElementById('eventDetailModal');
        const modalContainer = modal.querySelector('div');
        modal.classList.remove('opacity-0', 'invisible');
        modal.classList.add('opacity-100', 'visible');
        modalContainer.classList.remove('scale-95');
        modalContainer.classList.add('scale-100');
        
        // Prevent body scroll
        document.body.style.overflow = 'hidden';
    }

    function closeEventDetail() {
        const modal = document.getElementById('eventDetailModal');
        const modalContainer = modal.querySelector('div');
        
        modal.classList.remove('opacity-100', 'visible');
        modal.classList.add('opacity-0', 'invisible');
        modalContainer.classList.remove('scale-100');
        modalContainer.classList.add('scale-95');
        
        // Restore body scroll
        document.body.style.overflow = '';
    }

    // Initialize event detail modal
    document.addEventListener('DOMContentLoaded', function() {
        // Close modal when clicking outside
        const eventModal = document.getElementById('eventDetailModal');
        if (eventModal) {
            eventModal.addEventListener('click', function(e) {
                if (e.target === this) {
                    closeEventDetail();
                }
            });
        }
        
        // Add hover effects to news rows
        const newsRows = document.querySelectorAll('.news-row');
        newsRows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.backgroundColor = 'rgba(255, 107, 157, 0.05)';
                this.style.borderRadius = '1rem';
                this.style.padding = '1rem';
                this.style.margin = '-0.5rem';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.backgroundColor = '';
                this.style.borderRadius = '';
                this.style.padding = '1rem 0';
                this.style.margin = '';
            });
        });
    });

    // Export functions for global access
    window.showEventDetail = showEventDetail;
    window.closeEventDetail = closeEventDetail;


    // Gallery Functionality - Add these functions to your scripts.js

let currentSlideIndex = 0;
let totalSlides = 0;
let autoplayInterval = null;
let isAutoplayActive = false;
let galleryData = [];

// Initialize Gallery
function initGallery() {
    const slides = document.querySelectorAll('.gallery-slide');
    totalSlides = slides.length;
    
    if (totalSlides === 0) return;
    
    // Update total slides counter
    const totalSlidesElement = document.getElementById('totalSlides');
    if (totalSlidesElement) {
        totalSlidesElement.textContent = totalSlides;
    }
    
    // Store gallery data for later use
    galleryData = Array.from(slides).map((slide, index) => {
        const img = slide.querySelector('img');
        const title = slide.querySelector('h3')?.textContent || '';
        const description = slide.querySelector('p')?.textContent || '';
        
        return {
            index,
            src: img?.src || '',
            alt: img?.alt || '',
            title,
            description
        };
    });
    
    // Initialize keyboard navigation
    document.addEventListener('keydown', handleKeyNavigation);
    
    // Initialize touch/swipe navigation
    initTouchNavigation();
    
    // Update current image info
    updateImageInfo(0);
    
    console.log('Gallery initialized with', totalSlides, 'slides');
}

// Change Slide Function
function changeSlide(direction) {
    if (totalSlides <= 1) return;
    
    const currentSlide = document.querySelector('.gallery-slide[data-slide="' + currentSlideIndex + '"]');
    const currentThumbnail = document.querySelector('.gallery-thumbnail[data-slide="' + currentSlideIndex + '"]');
    
    // Remove active states
    if (currentSlide) currentSlide.classList.remove('opacity-100');
    if (currentThumbnail) currentThumbnail.classList.remove('active');
    
    // Calculate new index
    if (direction === 'next') {
        currentSlideIndex = (currentSlideIndex + 1) % totalSlides;
    } else if (direction === 'prev') {
        currentSlideIndex = (currentSlideIndex - 1 + totalSlides) % totalSlides;
    }
    
    // Show new slide
    const newSlide = document.querySelector('.gallery-slide[data-slide="' + currentSlideIndex + '"]');
    const newThumbnail = document.querySelector('.gallery-thumbnail[data-slide="' + currentSlideIndex + '"]');
    
    if (newSlide) {
        setTimeout(() => {
            newSlide.classList.add('opacity-100');
        }, 50);
    }
    
    if (newThumbnail) {
        newThumbnail.classList.add('active');
        scrollThumbnailIntoView(newThumbnail);
    }
    
    // Update counter
    updateSlideCounter();
    
    // Update image info
    updateImageInfo(currentSlideIndex);
    
    // Update fullscreen if open
    updateFullscreenImage();
}

// Go to specific slide
function goToSlide(index) {
    if (index < 0 || index >= totalSlides || index === currentSlideIndex) return;
    
    const currentSlide = document.querySelector('.gallery-slide[data-slide="' + currentSlideIndex + '"]');
    const currentThumbnail = document.querySelector('.gallery-thumbnail[data-slide="' + currentSlideIndex + '"]');
    
    // Remove active states
    if (currentSlide) currentSlide.classList.remove('opacity-100');
    if (currentThumbnail) currentThumbnail.classList.remove('active');
    
    // Set new index
    currentSlideIndex = index;
    
    // Show new slide
    const newSlide = document.querySelector('.gallery-slide[data-slide="' + currentSlideIndex + '"]');
    const newThumbnail = document.querySelector('.gallery-thumbnail[data-slide="' + currentSlideIndex + '"]');
    
    if (newSlide) {
        setTimeout(() => {
            newSlide.classList.add('opacity-100');
        }, 50);
    }
    
    if (newThumbnail) {
        newThumbnail.classList.add('active');
        scrollThumbnailIntoView(newThumbnail);
    }
    
    // Update counter and info
    updateSlideCounter();
    updateImageInfo(currentSlideIndex);
    updateFullscreenImage();
}

// Update slide counter
function updateSlideCounter() {
    const currentSlideElement = document.getElementById('currentSlide');
    if (currentSlideElement) {
        currentSlideElement.textContent = currentSlideIndex + 1;
    }
}

// Update image info panel
function updateImageInfo(index) {
    const imageInfoContent = document.getElementById('imageInfoContent');
    if (!imageInfoContent || !galleryData[index]) return;
    
    const currentImage = galleryData[index];
    
    // You can expand this with more data from your gallery model
    imageInfoContent.innerHTML = `
        <div class="flex justify-between">
            <span class="text-gray-600">Image:</span>
            <span class="font-semibold">${index + 1} of ${totalSlides}</span>
        </div>
        <div class="flex justify-between">
            <span class="text-gray-600">Title:</span>
            <span class="font-semibold text-xs">${currentImage.title}</span>
        </div>
        <div class="flex justify-between">
            <span class="text-gray-600">Status:</span>
            <span class="font-semibold">Active</span>
        </div>
    `;
}

// Scroll thumbnail into view
function scrollThumbnailIntoView(thumbnail) {
    const container = document.getElementById('thumbnailContainer');
    if (!container || !thumbnail) return;
    
    const containerRect = container.getBoundingClientRect();
    const thumbnailRect = thumbnail.getBoundingClientRect();
    
    if (thumbnailRect.left < containerRect.left) {
        container.scrollLeft -= (containerRect.left - thumbnailRect.left + 10);
    } else if (thumbnailRect.right > containerRect.right) {
        container.scrollLeft += (thumbnailRect.right - containerRect.right + 10);
    }
}

// Autoplay functionality
function toggleAutoplay() {
    const btn = document.getElementById('autoplayBtn');
    
    if (isAutoplayActive) {
        clearInterval(autoplayInterval);
        isAutoplayActive = false;
        if (btn) btn.innerHTML = '▶️ Start Slideshow';
    } else {
        autoplayInterval = setInterval(() => {
            changeSlide('next');
        }, 3000); // Change slide every 3 seconds
        isAutoplayActive = true;
        if (btn) btn.innerHTML = '⏸️ Stop Slideshow';
    }
}

// Fullscreen functionality
function toggleFullscreen() {
    const modal = document.getElementById('fullscreenModal');
    const fullscreenImage = document.getElementById('fullscreenImage');
    
    if (!modal || !fullscreenImage) return;
    
    const currentImage = galleryData[currentSlideIndex];
    if (!currentImage) return;
    
    fullscreenImage.src = currentImage.src;
    fullscreenImage.alt = currentImage.alt;
    
    modal.classList.remove('opacity-0', 'invisible');
    modal.classList.add('opacity-100', 'visible');
    
    // Prevent body scroll
    document.body.style.overflow = 'hidden';
}

function closeFullscreen() {
    const modal = document.getElementById('fullscreenModal');
    if (!modal) return;
    
    modal.classList.remove('opacity-100', 'visible');
    modal.classList.add('opacity-0', 'invisible');
    
    // Restore body scroll
    document.body.style.overflow = '';
}

function updateFullscreenImage() {
    const fullscreenImage = document.getElementById('fullscreenImage');
    const modal = document.getElementById('fullscreenModal');
    
    if (fullscreenImage && modal && modal.classList.contains('visible')) {
        const currentImage = galleryData[currentSlideIndex];
        if (currentImage) {
            fullscreenImage.src = currentImage.src;
            fullscreenImage.alt = currentImage.alt;
        }
    }
}

// Download current image
function downloadImage() {
    const currentImage = galleryData[currentSlideIndex];
    if (!currentImage) return;
    
    const link = document.createElement('a');
    link.href = currentImage.src;
    link.download = `equivalent-gallery-${currentSlideIndex + 1}.jpg`;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

// Keyboard navigation
function handleKeyNavigation(event) {
    // Only handle keys when gallery is in focus or fullscreen is open
    const modal = document.getElementById('fullscreenModal');
    const isFullscreenOpen = modal && modal.classList.contains('visible');
    
    if (!isFullscreenOpen && !event.target.closest('#gallery')) return;
    
    switch (event.key) {
        case 'ArrowLeft':
            event.preventDefault();
            changeSlide('prev');
            break;
        case 'ArrowRight':
            event.preventDefault();
            changeSlide('next');
            break;
        case 'Escape':
            if (isFullscreenOpen) {
                event.preventDefault();
                closeFullscreen();
            }
            break;
        case ' ':
            event.preventDefault();
            toggleAutoplay();
            break;
        case 'f':
        case 'F':
            if (!isFullscreenOpen) {
                event.preventDefault();
                toggleFullscreen();
            }
            break;
    }
}

// Touch/Swipe navigation
function initTouchNavigation() {
    const gallery = document.getElementById('mainCarousel');
    if (!gallery) return;
    
    let startX = 0;
    let startY = 0;
    let endX = 0;
    let endY = 0;
    
    gallery.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
        startY = e.touches[0].clientY;
    });
    
    gallery.addEventListener('touchend', (e) => {
        endX = e.changedTouches[0].clientX;
        endY = e.changedTouches[0].clientY;
        
        const diffX = startX - endX;
        const diffY = startY - endY;
        
        // Check if horizontal swipe is longer than vertical
        if (Math.abs(diffX) > Math.abs(diffY)) {
            // Minimum swipe distance
            if (Math.abs(diffX) > 50) {
                if (diffX > 0) {
                    changeSlide('next'); // Swipe left = next
                } else {
                    changeSlide('prev'); // Swipe right = prev
                }
            }
        }
    });
}

// Initialize gallery when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Initialize gallery after a short delay to ensure all elements are rendered
    setTimeout(initGallery, 100);
});

// Export functions for global access
window.changeSlide = changeSlide;
window.goToSlide = goToSlide;
window.toggleAutoplay = toggleAutoplay;
window.toggleFullscreen = toggleFullscreen;
window.closeFullscreen = closeFullscreen;
window.downloadImage = downloadImage;