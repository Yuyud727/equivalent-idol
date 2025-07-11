// ===============================================
// SCRIPTS.JS - EQUIVALENT IDOL WEBSITE
// Complete Unified JavaScript File
// ===============================================

// ===============================================
// GLOBAL VARIABLES & INITIALIZATION
// ===============================================
let autoSlideInterval = null;
let isAutoSliding = true;
let currentSlideIndex = 0;
let totalSlides = 5;

// ===============================================
// DOM CONTENT LOADED - MAIN INITIALIZATION
// ===============================================
document.addEventListener('DOMContentLoaded', function() {
    // Core Navigation & Layout
    initNavigation();
    initScrollAnimations();
    initSmoothScroll();
    initParallaxEffect();
    
    // Section-specific initializations
    initMemberCards();
    initSocialMediaLinks();
    initSimplifiedGallery();
    initActivitiesSection();
    
    // Additional utilities
    addLoadingAnimations();
    addScrollToTopButton();
    initNewsletter();
    
    // Initialize event handlers
    initEventDetailModal();
    initNewsRowHoverEffects();
});

// ===============================================
// NAVIGATION HEADER FUNCTIONS
// ===============================================
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

// ===============================================
// SMOOTH SCROLL FUNCTIONS
// ===============================================
function initSmoothScroll() {
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

// ===============================================
// HOME SECTION (HERO) FUNCTIONS
// ===============================================
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

    // ===============================================
    // ABOUT SECTION (MEMBER PROFILES) FUNCTIONS
    // ===============================================
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

    // ===============================================
    // SLIDE UP MODAL WITH CONSISTENT FLOATING HEARTS
    // ===============================================

    let memberDetailData = {};
    let isDataLoaded = false;
    let currentMemberColor = '#6b7280';
    let heartAnimationInterval = null;

    // Load member data from database
    async function loadMemberData() {
        if (isDataLoaded) return;
        
        try {
            const response = await fetch('/api/members');
            if (response.ok) {
                memberDetailData = await response.json();
                isDataLoaded = true;
                console.log('Member data loaded:', memberDetailData);
            } else {
                console.error('Failed to load member data');
                useFallbackData();
            }
        } catch (error) {
            console.error('Error loading member data:', error);
            useFallbackData();
        }
    }

    // Fallback data
    function useFallbackData() {
        memberDetailData = {
            1: { member_no: 1, name: 'Ami', photo: 'members/Ami.jpg', color: '#ef4444', birth_date: '2002-03-15', jiko: 'Konnichiwa! Watashi wa Ami desu! Equivalent no leader toshite, minna no kokoro wo hitotsu ni suru koto ga watashi no shimei da to omotte imasu.' },
            2: { member_no: 2, name: 'Alyaa', photo: 'members/Alyaa.jpg', color: '#ec4899', birth_date: '2003-07-22', jiko: 'Halo semua! Aku Alyaa dari Equivalent! Sebagai main dancer, aku selalu berusaha memberikan yang terbaik di setiap penampilan.' },
            3: { member_no: 3, name: 'Ame', photo: 'members/Ame.jpg', color: '#fbbf24', birth_date: '2002-11-08', jiko: 'Hello everyone! I am Ame, the visual of Equivalent. Music has always been my sanctuary, and I hope my voice can bring comfort and joy to everyone.' },
            4: { member_no: 4, name: 'Ina', photo: 'members/Ina.jpg', color: '#a855f7', birth_date: '2003-01-30', jiko: 'Yo yo yo! Ina in the house! Sebagai main rapper Equivalent, aku bawa flow dan lirik yang real.' },
            5: { member_no: 5, name: 'Cantikkun', photo: 'members/Cantikkun.jpg', color: '#3b82f6', birth_date: '2004-05-12', jiko: 'Hai hai~ Cantikkun disini! Sebagai maknae Equivalent, aku pengen tunjukin kalau yang muda juga bisa bersinar!' }
        };
        isDataLoaded = true;
    }

    // Helper functions
    function hexToRgb(hex) {
        const result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
        return result ? { r: parseInt(result[1], 16), g: parseInt(result[2], 16), b: parseInt(result[3], 16) } : null;
    }

    function darkenColor(hex, amount = 0.3) {
        const rgb = hexToRgb(hex);
        if (!rgb) return hex;
        return `rgb(${Math.round(rgb.r * (1 - amount))}, ${Math.round(rgb.g * (1 - amount))}, ${Math.round(rgb.b * (1 - amount))})`;
    }

    function lightenColor(hex, amount = 0.2) {
        const rgb = hexToRgb(hex);
        if (!rgb) return hex;
        return `rgb(${Math.min(255, Math.round(rgb.r * (1 + amount)))}, ${Math.min(255, Math.round(rgb.g * (1 + amount)))}, ${Math.min(255, Math.round(rgb.b * (1 + amount)))})`;
    }

    function createNameGradient(memberColor) {
        const rgb = hexToRgb(memberColor);
        if (!rgb) return memberColor;
        const lighter = lightenColor(memberColor, 0.3);
        const darker = darkenColor(memberColor, 0.3);
        return `linear-gradient(135deg, ${lighter} 0%, ${memberColor} 50%, ${darker} 100%)`;
    }

    // Create Consistent Floating Hearts Animation
    function startFloatingHearts(memberColor) {
        // Clear any existing animation
        stopFloatingHearts();
        
        const rgb = hexToRgb(memberColor);
        if (!rgb) return;
        
        // Create heart container if not exists
        let heartContainer = document.querySelector('.bg_heart');
        if (!heartContainer) {
            heartContainer = document.createElement('div');
            heartContainer.className = 'bg_heart';
            document.getElementById('memberDetailModal').appendChild(heartContainer);
        }

        heartAnimationInterval = setInterval(function() {
            const r_size = Math.floor(Math.random() * 35) + 15; // 15-50px size
            const r_left = Math.floor(Math.random() * 90) + 5; // 5-95% positioning
            const r_time = Math.floor(Math.random() * 3) + 4; // 4-7s duration
            
            // Create CONSISTENT color variations - more subtle
            const baseOpacity = 0.6;
            const opacityVariation = Math.random() * 0.3 + 0.4; // 0.4-0.7 opacity
            
            // Slight color variations (max ±15 instead of ±25)
            const colorVariation = 10;
            const r1 = Math.max(0, Math.min(255, rgb.r + (Math.random() - 0.5) * colorVariation));
            const g1 = Math.max(0, Math.min(255, rgb.g + (Math.random() - 0.5) * colorVariation));
            const b1 = Math.max(0, Math.min(255, rgb.b + (Math.random() - 0.5) * colorVariation));
            
            const heartColor = `rgba(${Math.round(r1)}, ${Math.round(g1)}, ${Math.round(b1)}, ${opacityVariation})`;
            
            const heart = document.createElement('div');
            heart.className = 'heart';
            heart.style.cssText = `
                width: ${r_size}px;
                height: ${r_size}px;
                left: ${r_left}%;
                background: ${heartColor};
                animation: love ${r_time}s ease-out forwards;
                z-index: 1;
            `;
            
            heartContainer.appendChild(heart);
            
            // Clean up hearts that finished animation
            setTimeout(() => {
                if (heart.parentNode) {
                    heart.remove();
                }
            }, r_time * 1000);
            
        }, 800); // Generate every 800ms for smoother effect
    }

    function stopFloatingHearts() {
        if (heartAnimationInterval) {
            clearInterval(heartAnimationInterval);
            heartAnimationInterval = null;
        }
        
        const heartContainer = document.querySelector('.bg_heart');
        if (heartContainer) {
            heartContainer.innerHTML = '';
        }
    }

    // Enhanced Open Member Detail dengan Slide Up Animation
    async function openMemberDetail(memberId) {
        console.log('Opening member detail for ID:', memberId);
        
        if (!isDataLoaded) await loadMemberData();

        let member = memberDetailData[memberId];
        
        try {
            const response = await fetch(`/api/members/${memberId}`);
            if (response.ok) {
                const freshData = await response.json();
                member = {
                    member_no: freshData.member_no, name: freshData.name, photo: freshData.photo, photo_url: freshData.photo_url,
                    color: freshData.color, birth_date: freshData.birth_date, formatted_birth_date: freshData.formatted_birth_date, jiko: freshData.jiko
                };
                memberDetailData[memberId] = member;
            }
        } catch (error) {
            console.error('Error fetching member detail:', error);
        }

        if (!member) {
            console.error('Member not found:', memberId);
            alert('Member data not found. Please try again.');
            return;
        }

        // Update current member color
        currentMemberColor = member.color;

        const modal = document.getElementById('memberDetailModal');
        const content = document.getElementById('memberDetailContent');
        const backgroundOverlay = modal.querySelector('.absolute.inset-0');

        if (!modal || !content) {
            console.error('Modal elements not found');
            return;
        }

        // Remove curtain elements if they exist
        const leftCurtain = document.getElementById('leftCurtain');
        const rightCurtain = document.getElementById('rightCurtain');
        if (leftCurtain) leftCurtain.style.display = 'none';
        if (rightCurtain) rightCurtain.style.display = 'none';

        // Enhanced background with soft gray-white blur
        if (backgroundOverlay) {
            const rgb = hexToRgb(member.color);
            if (rgb) {
                backgroundOverlay.style.background = `
                    radial-gradient(ellipse 600px 500px at 50% 50%, 
                        rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, 0.08) 0%,
                        rgba(248, 250, 252, 0.85) 30%,
                        rgba(241, 245, 249, 0.9) 60%,
                        rgba(226, 232, 240, 0.95) 100%
                    )
                `;
                backgroundOverlay.style.backdropFilter = 'blur(12px)';
                backgroundOverlay.style.webkitBackdropFilter = 'blur(12px)';
            }
        }

        // Show modal
        modal.classList.remove('opacity-0', 'invisible');
        modal.classList.add('opacity-100', 'visible');
        document.body.style.overflow = 'hidden';

        // Initial state: content positioned below screen
        content.style.transform = 'translateY(100vh) scale(0.9)';
        content.style.opacity = '0';

        fillMemberDataWithEnhancements(member);

        // Start floating hearts animation
        setTimeout(() => {
            startFloatingHearts(member.color);
        }, 300);

        // Slide up animation
        setTimeout(() => {
            content.style.transition = 'all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
            content.style.transform = 'translateY(0) scale(1)';
            content.style.opacity = '1';
        }, 100);

        // Enhanced member row click effect
        const memberRow = document.querySelector(`[data-member-id="${memberId}"]`);
        if (memberRow) {
            const rgb = hexToRgb(member.color);
            memberRow.style.transform = 'scale(0.95)';
            memberRow.style.boxShadow = `0 0 30px rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, 0.4)`;
            setTimeout(() => {
                memberRow.style.transform = 'scale(1)';
                memberRow.style.boxShadow = '';
            }, 300);
        }
    }

    // Enhanced Fill Member Data
    function fillMemberDataWithEnhancements(member) {
        try {
            const memberColor = member.color;
            const rgb = hexToRgb(memberColor);

            // Update photo
            const memberPhoto = document.getElementById('memberPhoto');
            if (memberPhoto) {
                memberPhoto.src = member.photo_url || `/storage/${member.photo}`;
                memberPhoto.alt = member.name;
            }

            // Enhanced member number badge
            const memberNumberBadge = document.getElementById('memberNumberBadge');
            if (memberNumberBadge) {
                const badgeSpan = memberNumberBadge.querySelector('span');
                if (badgeSpan) badgeSpan.textContent = member.member_no;
                
                memberNumberBadge.parentElement.style.top = '24px';
                memberNumberBadge.parentElement.style.right = '24px';
                memberNumberBadge.parentElement.style.left = 'auto';
                
                memberNumberBadge.style.background = `rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, 0.15)`;
                memberNumberBadge.style.border = `2px solid ${memberColor}`;
                memberNumberBadge.style.boxShadow = `0 0 20px rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, 0.3)`;
                memberNumberBadge.style.backdropFilter = 'blur(10px)';
            }

            // Enhanced gradient name
            const memberName = document.getElementById('memberName');
            if (memberName) {
                memberName.textContent = member.name;
                const gradient = createNameGradient(memberColor);
                memberName.style.background = gradient;
                memberName.style.webkitBackgroundClip = 'text';
                memberName.style.webkitTextFillColor = 'transparent';
                memberName.style.backgroundClip = 'text';
                
                memberName.style.textShadow = `
                    2px 2px 4px rgba(0, 0, 0, 0.1),
                    0 0 20px rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, 0.3),
                    0 0 40px rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, 0.1)
                `;
                memberName.style.animation = 'nameGlow 2s ease-in-out infinite alternate';
            }

            // Color display
            const memberColorBox = document.getElementById('memberColorBox');
            const memberColorText = document.getElementById('memberColorText');
            if (memberColorBox) {
                memberColorBox.style.backgroundColor = memberColor;
                memberColorBox.style.boxShadow = `0 0 15px rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, 0.4)`;
            }
            if (memberColorText) {
                memberColorText.textContent = memberColor;
                memberColorText.style.color = memberColor;
                memberColorText.style.fontWeight = 'bold';
            }

            // Birthday section
            const birthdaySection = document.querySelector('#memberBirthDate').parentElement;
            const birthdayTitle = birthdaySection.querySelector('h3');
            const birthdayIcon = birthdayTitle.querySelector('svg');
            
            if (birthdayTitle) {
                birthdayTitle.style.color = memberColor;
                birthdayTitle.style.fontWeight = 'bold';
            }
            if (birthdayIcon) {
                birthdayIcon.style.color = memberColor;
                birthdayIcon.style.filter = `drop-shadow(0 0 4px rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, 0.3))`;
            }
            
            const memberBirthDate = document.getElementById('memberBirthDate');
            if (memberBirthDate) {
                const formattedDate = member.formatted_birth_date || formatBirthDate(member.birth_date);
                memberBirthDate.textContent = formattedDate;
                memberBirthDate.style.color = memberColor;
                memberBirthDate.style.fontWeight = '600';
                memberBirthDate.style.fontSize = '1.125rem';
            }

            // Jiko section
            const jikoSection = document.querySelector('#memberJiko').parentElement.parentElement;
            const jikoTitle = jikoSection.querySelector('h3');
            const jikoIcon = jikoTitle.querySelector('svg');
            
            if (jikoTitle) {
                jikoTitle.style.color = memberColor;
                jikoTitle.style.fontWeight = 'bold';
            }
            if (jikoIcon) {
                jikoIcon.style.color = memberColor;
                jikoIcon.style.filter = `drop-shadow(0 0 4px rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, 0.3))`;
            }

            const memberJiko = document.getElementById('memberJiko');
            if (memberJiko) {
                memberJiko.textContent = member.jiko || 'No introduction available.';
                const jikoContainer = memberJiko.parentElement;
                if (jikoContainer) {
                    jikoContainer.style.background = `linear-gradient(135deg, 
                        rgba(255, 255, 255, 0.9) 0%, 
                        rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, 0.05) 50%,
                        rgba(255, 255, 255, 0.9) 100%)`;
                    jikoContainer.style.border = `2px solid rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, 0.2)`;
                    jikoContainer.style.boxShadow = `inset 0 0 20px rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, 0.05)`;
                    jikoContainer.style.backdropFilter = 'blur(5px)';
                }
            }

            // Enhanced close button
            const closeButton = document.querySelector('button[onclick="closeMemberDetail()"]');
            if (closeButton) {
                const gradient = `linear-gradient(135deg, ${memberColor} 0%, ${darkenColor(memberColor, 0.15)} 100%)`;
                closeButton.style.background = gradient;
                closeButton.style.boxShadow = `0 4px 15px rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, 0.3)`;
                closeButton.style.border = `1px solid rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, 0.5)`;
                
                closeButton.onmouseenter = function() {
                    this.style.transform = 'scale(1.05)';
                    this.style.boxShadow = `0 6px 25px rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, 0.5)`;
                    this.style.background = `linear-gradient(135deg, ${lightenColor(memberColor, 0.1)} 0%, ${memberColor} 100%)`;
                };
                
                closeButton.onmouseleave = function() {
                    this.style.transform = 'scale(1)';
                    this.style.boxShadow = `0 4px 15px rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, 0.3)`;
                    this.style.background = gradient;
                };
            }

            console.log('Member data filled with enhancements successfully:', member.name);
        } catch (error) {
            console.error('Error filling member data with enhancements:', error);
        }
    }

    // Enhanced Close dengan Slide Down Animation
    function closeMemberDetail() {
        const modal = document.getElementById('memberDetailModal');
        const content = document.getElementById('memberDetailContent');
        const backgroundOverlay = modal.querySelector('.absolute.inset-0');

        if (!modal || !content) {
            console.error('Modal elements not found for closing');
            return;
        }

        // Stop floating hearts animation
        stopFloatingHearts();

        // Slide down animation
        content.style.transition = 'all 0.5s cubic-bezier(0.55, 0.055, 0.675, 0.19)';
        content.style.transform = 'translateY(100vh) scale(0.9)';
        content.style.opacity = '0';

        // Hide modal after slide down
        setTimeout(() => {
            modal.classList.remove('opacity-100', 'visible');
            modal.classList.add('opacity-0', 'invisible');
            
            // Reset background overlay
            if (backgroundOverlay) {
                backgroundOverlay.style.background = '';
                backgroundOverlay.style.backdropFilter = '';
                backgroundOverlay.style.webkitBackdropFilter = '';
                backgroundOverlay.className = 'absolute inset-0 bg-black bg-opacity-80';
            }
            
            document.body.style.overflow = '';
            
            // Reset content for next open
            content.style.transition = '';
        }, 500);
    }

    // Enhanced Member Row Hover Effects
    function initMemberRowEffects() {
        const memberRows = document.querySelectorAll('.member-row');
        
        memberRows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px) scale(1.02)';
                const colorBox = this.querySelector('[style*="background-color"]');
                if (colorBox) {
                    const colorMatch = colorBox.style.backgroundColor.match(/rgb\((\d+),\s*(\d+),\s*(\d+)\)/);
                    if (colorMatch) {
                        const [, r, g, b] = colorMatch;
                        this.style.boxShadow = `0 8px 25px rgba(${r}, ${g}, ${b}, 0.3)`;
                        this.style.borderColor = `rgba(${r}, ${g}, ${b}, 0.5)`;
                    }
                }
            });

            row.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
                this.style.boxShadow = '';
                this.style.borderColor = '';
            });

            row.addEventListener('click', function(e) {
                const colorBox = this.querySelector('[style*="background-color"]');
                let rippleColor = 'rgba(255, 107, 157, 0.3)';
                
                if (colorBox) {
                    const colorMatch = colorBox.style.backgroundColor.match(/rgb\((\d+),\s*(\d+),\s*(\d+)\)/);
                    if (colorMatch) {
                        const [, r, g, b] = colorMatch;
                        rippleColor = `rgba(${r}, ${g}, ${b}, 0.2)`;
                    }
                }
                
                const ripple = document.createElement('div');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.cssText = `
                    position: absolute; width: ${size}px; height: ${size}px; left: ${x}px; top: ${y}px;
                    background: radial-gradient(circle, ${rippleColor} 0%, transparent 70%);
                    border-radius: 50%; transform: scale(0); animation: ripple 0.6s ease-out; pointer-events: none; z-index: 1;
                `;
                
                this.style.position = 'relative';
                this.style.overflow = 'hidden';
                this.appendChild(ripple);
                setTimeout(() => ripple.remove(), 600);
            });
        });
    }

    function formatBirthDate(dateString) {
        try {
            const date = new Date(dateString);
            return date.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
        } catch (error) {
            return dateString;
        }
    }

    // Enhanced Navigation
    async function navigateToMember(direction) {
        try {
            const currentMemberNo = parseInt(document.getElementById('memberNumberBadge').querySelector('span').textContent);
            let nextMemberNo = direction === 'prev' ? (currentMemberNo > 1 ? currentMemberNo - 1 : 5) : (currentMemberNo < 5 ? currentMemberNo + 1 : 1);
            
            let nextMember = memberDetailData[nextMemberNo];
            
            try {
                const response = await fetch(`/api/members/${nextMemberNo}`);
                if (response.ok) {
                    const freshData = await response.json();
                    nextMember = {
                        member_no: freshData.member_no, name: freshData.name, photo: freshData.photo, photo_url: freshData.photo_url,
                        color: freshData.color, birth_date: freshData.birth_date, formatted_birth_date: freshData.formatted_birth_date, jiko: freshData.jiko
                    };
                    memberDetailData[nextMemberNo] = nextMember;
                }
            } catch (error) {
                console.error('Error fetching next member:', error);
            }
            
            if (nextMember) {
                // Update current member color dan restart heart animation
                currentMemberColor = nextMember.color;
                stopFloatingHearts();
                setTimeout(() => {
                    startFloatingHearts(nextMember.color);
                }, 100);
                
                const content = document.getElementById('memberDetailContent');
                content.style.transform = 'translateX(' + (direction === 'prev' ? '-' : '') + '30px)';
                content.style.opacity = '0.6';
                
                setTimeout(() => {
                    fillMemberDataWithEnhancements(nextMember);
                    content.style.transform = 'translateX(0)';
                    content.style.opacity = '1';
                }, 200);
            }
        } catch (error) {
            console.error('Error navigating to member:', error);
        }
    }

    // Keyboard Navigation
    function initKeyboardNavigation() {
        document.addEventListener('keydown', function(e) {
            const modal = document.getElementById('memberDetailModal');
            const isModalOpen = modal && modal.classList.contains('visible');
            
            if (isModalOpen) {
                switch(e.key) {
                    case 'Escape': e.preventDefault(); closeMemberDetail(); break;
                    case 'ArrowLeft': e.preventDefault(); navigateToMember('prev'); break;
                    case 'ArrowRight': e.preventDefault(); navigateToMember('next'); break;
                }
            }
        });
    }

    // Click outside to close
    function initModalClickOutside() {
        const modal = document.getElementById('memberDetailModal');
        if (modal) {
            modal.addEventListener('click', function(e) {
                if (e.target === modal) closeMemberDetail();
            });
        }
    }

    // Initialize all functionality
    function initMemberDetail() {
        loadMemberData();
        initMemberRowEffects();
        initKeyboardNavigation();
        initModalClickOutside();
    }

    // Initialize when DOM is loaded
    document.addEventListener('DOMContentLoaded', function() {
        initMemberDetail();
        console.log('Slide Up Modal with Consistent Floating Hearts initialized! 💕✨');
    });

    // Global exports
    window.openMemberDetail = openMemberDetail;
    window.closeMemberDetail = closeMemberDetail;
    window.navigateToMember = navigateToMember;

    // Enhanced CSS dengan Slide Up Animation dan Consistent Hearts
    const style = document.createElement('style');
    style.textContent = `
        /* ===== BASIC ANIMATIONS ===== */
        @keyframes ripple { 
            to { transform: scale(4); opacity: 0; } 
        }
        
        @keyframes nameGlow {
            0% { filter: brightness(1) drop-shadow(0 0 3px rgba(255, 255, 255, 0.2)); }
            100% { filter: brightness(1.05) drop-shadow(0 0 8px rgba(255, 255, 255, 0.3)); }
        }
        
        @keyframes heartPulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.03); }
            100% { transform: scale(1); }
        }
        
        /* ===== CONSISTENT FLOATING HEARTS ANIMATION ===== */
        .bg_heart {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
            z-index: 2;
        }
        
        .heart {
            position: absolute;
            top: 110%;
            transform: rotate(-45deg);
            pointer-events: none;
            will-change: transform, opacity;
        }
        
        .heart:before {
            position: absolute;
            top: -50%;
            left: 0;
            display: block;
            content: "";
            width: 100%;
            height: 100%;
            background: inherit;
            border-radius: 100%;
        }
        
        .heart:after {
            position: absolute;
            top: 0;
            right: -50%;
            display: block;
            content: "";
            width: 100%;
            height: 100%;
            background: inherit;
            border-radius: 100%;
        }
        
        @keyframes love {
            0% { 
                top: 110%; 
                opacity: 0;
                transform: rotate(-45deg) scale(0.6);
            }
            15% {
                opacity: 1;
                transform: rotate(-45deg) scale(0.8);
            }
            85% {
                opacity: 1;
                transform: rotate(-45deg) scale(1);
            }
            100% { 
                top: -15%; 
                opacity: 0;
                transform: rotate(-45deg) scale(1.1);
            }
        }
        
        /* ===== SLIDE UP MODAL ANIMATIONS ===== */
        #memberDetailModal {
            transition: all 0.3s ease-in-out;
        }
        
        #memberDetailContent {
            will-change: transform, opacity;
        }
        
        /* ===== ENHANCED BLUR BACKGROUND ===== */
        #memberDetailModal .absolute.inset-0 {
            transition: all 0.4s ease-in-out;
        }
        
        /* ===== MEMBER ROW STYLES ===== */
        .member-row {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .member-row:hover {
            transform: translateY(-2px) scale(1.02) !important;
        }
        
        /* ===== MEMBER NAME GRADIENT ===== */
        #memberName {
            transition: all 0.3s ease-in-out;
            background-size: 200% 200%;
            animation: nameGlow 2.5s ease-in-out infinite alternate;
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
        }
        
        /* ===== MEMBER BADGE ===== */
        #memberNumberBadge {
            transition: all 0.3s ease-in-out;
            position: absolute !important;
            top: 24px !important;
            right: 24px !important;
            left: auto !important;
            z-index: 10;
            animation: heartPulse 4s ease-in-out infinite;
        }
        
        /* ===== CLOSE BUTTON ===== */
        button[onclick="closeMemberDetail()"] {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* ===== ENHANCED BLUR EFFECTS ===== */
        @supports (backdrop-filter: blur(10px)) {
            #memberNumberBadge, .jiko-container {
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
            }
        }
        
        /* ===== SMOOTH MODAL CONTAINER ===== */
        #memberDetailContent {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 
                0 25px 50px -12px rgba(0, 0, 0, 0.15),
                0 0 0 1px rgba(255, 255, 255, 0.2);
        }
        
        /* ===== RESPONSIVE DESIGN ===== */
        @media (max-width: 768px) {
            #memberNumberBadge {
                top: 16px !important;
                right: 16px !important;
                width: 48px !important;
                height: 48px !important;
            }
            
            .heart {
                max-width: 30px;
                max-height: 30px;
            }
            
            #memberDetailContent {
                margin: 20px;
                max-height: calc(100vh - 40px);
                overflow-y: auto;
            }
        }
        
        @media (max-width: 480px) {
            .heart {
                max-width: 25px;
                max-height: 25px;
            }
            
            #memberDetailContent {
                margin: 10px;
                max-height: calc(100vh - 20px);
            }
            
            .bg_heart {
                overflow: hidden;
            }
        }
        
        /* ===== PERFORMANCE OPTIMIZATIONS ===== */
        .heart, .bg_heart, #memberDetailContent {
            will-change: transform, opacity;
        }
        
        /* ===== SMOOTH TRANSITIONS ===== */
        * {
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* ===== ANTI-ALIASING ===== */
        .heart, #memberName, #memberNumberBadge {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        
        /* ===== HIDE CURTAIN ELEMENTS ===== */
        #leftCurtain, #rightCurtain {
            display: none !important;
        }
        
        /* ===== ENHANCED BACKGROUND BLUR ===== */
        #memberDetailModal.visible {
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }
        
        /* ===== JIKO CONTAINER ENHANCEMENT ===== */
        .jiko-container {
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border-radius: 16px;
        }
        
        /* ===== SUBTLE ANIMATIONS ===== */
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
        
        @keyframes fadeOutDown {
            from {
                opacity: 1;
                transform: translateY(0);
            }
            to {
                opacity: 0;
                transform: translateY(30px);
            }
        }
        
        /* ===== MEMBER SECTION ANIMATIONS ===== */
        .member-section {
            animation: fadeInUp 0.5s ease-out;
        }
        
        .member-section:nth-child(1) { animation-delay: 0.1s; }
        .member-section:nth-child(2) { animation-delay: 0.2s; }
        .member-section:nth-child(3) { animation-delay: 0.3s; }
        .member-section:nth-child(4) { animation-delay: 0.4s; }
        
        /* ===== HEART SHADOW ENHANCEMENT ===== */
        .heart {
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
        }
        
        /* ===== LOADING STATE ===== */
        .loading-hearts::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin: -10px 0 0 -10px;
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top-color: rgba(255, 255, 255, 0.8);
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    `;
    document.head.appendChild(style);


// ===============================================
// MUSIC SECTION FUNCTIONS
// ===============================================
// Music Section Animation Controller
class MusicSectionController {
    constructor() {
        this.musicCards = [];
        this.isInitialized = false;
        this.init();
    }

    init() {
        if (this.isInitialized) return;
        
        this.setupMusicCards();
        this.setupScrollAnimations();
        this.setupHoverEffects();
        this.setupMusicNotes();
        this.isInitialized = true;
    }

    setupMusicCards() {
        const cards = document.querySelectorAll('.music-player-card');
        cards.forEach((card, index) => {
            // Add data attributes for tracking
            card.setAttribute('data-music-index', index);
            
            // Create glow effect element
            const glowEffect = document.createElement('div');
            glowEffect.className = 'music-glow-effect';
            card.appendChild(glowEffect);

            // Store card reference
            this.musicCards.push({
                element: card,
                glow: glowEffect,
                isPlaying: false,
                iframe: card.querySelector('iframe')
            });
        });
    }

    setupScrollAnimations() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('music-loading');
                    // Add staggered animation delay
                    const index = Array.from(entry.target.parentNode.children).indexOf(entry.target);
                    entry.target.style.animationDelay = `${index * 0.2}s`;
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        // Observe music cards
        this.musicCards.forEach(card => {
            observer.observe(card.element);
        });
    }

    setupHoverEffects() {
        this.musicCards.forEach((card, index) => {
            const { element, glow, iframe } = card;

            // Mouse enter effect
            element.addEventListener('mouseenter', () => {
                this.activateCardGlow(index);
                this.createFloatingNotes(element);
                this.addRainbowPulse(element);
            });

            // Mouse leave effect
            element.addEventListener('mouseleave', () => {
                this.deactivateCardGlow(index);
                this.removeFloatingNotes(element);
                this.removeRainbowPulse(element);
            });

            // iframe hover effect
            if (iframe) {
                iframe.addEventListener('mouseenter', () => {
                    this.enhanceIframeGlow(element);
                });

                iframe.addEventListener('mouseleave', () => {
                    this.normalizeIframeGlow(element);
                });
            }
        });
    }

    activateCardGlow(index) {
        if (this.musicCards[index]) {
            const { element, glow } = this.musicCards[index];
            glow.style.opacity = '1';
            element.classList.add('rainbow-pulse');
            
            // Add dynamic glow colors
            setTimeout(() => {
                glow.style.background = `linear-gradient(45deg, 
                    rgba(255, 107, 157, 0.4), 
                    rgba(196, 69, 105, 0.4), 
                    rgba(72, 52, 212, 0.4), 
                    rgba(29, 185, 84, 0.4))`;
            }, 100);
        }
    }

    deactivateCardGlow(index) {
        if (this.musicCards[index]) {
            const { element, glow } = this.musicCards[index];
            glow.style.opacity = '0';
            element.classList.remove('rainbow-pulse');
            
            // Reset glow background
            setTimeout(() => {
                glow.style.background = `linear-gradient(45deg, #ff6b9d, #c44569, #4834d4, #1db954)`;
            }, 300);
        }
    }

    enhanceIframeGlow(cardElement) {
        const iframe = cardElement.querySelector('iframe');
        if (iframe) {
            iframe.style.filter = 'brightness(1.1) saturate(1.2)';
            iframe.style.transform = 'scale(1.02)';
            
            // Add extra glow effect
            const extraGlow = document.createElement('div');
            extraGlow.className = 'iframe-extra-glow';
            extraGlow.style.cssText = `
                position: absolute;
                top: -5px;
                left: -5px;
                right: -5px;
                bottom: -5px;
                background: linear-gradient(45deg, rgba(29, 185, 84, 0.3), rgba(255, 107, 157, 0.3));
                border-radius: 17px;
                z-index: 1;
                opacity: 0;
                transition: opacity 0.3s ease;
            `;
            
            cardElement.appendChild(extraGlow);
            setTimeout(() => extraGlow.style.opacity = '1', 50);
        }
    }

    normalizeIframeGlow(cardElement) {
        const iframe = cardElement.querySelector('iframe');
        if (iframe) {
            iframe.style.filter = 'brightness(0.95)';
            iframe.style.transform = 'scale(1)';
            
            // Remove extra glow
            const extraGlow = cardElement.querySelector('.iframe-extra-glow');
            if (extraGlow) {
                extraGlow.style.opacity = '0';
                setTimeout(() => {
                    if (extraGlow.parentNode) {
                        extraGlow.parentNode.removeChild(extraGlow);
                    }
                }, 300);
            }
        }
    }

    createFloatingNotes(cardElement) {
        const notes = ['♪', '♫', '♬', '♩', '♭', '♮', '♯'];
        const noteCount = 3;

        for (let i = 0; i < noteCount; i++) {
            const note = document.createElement('div');
            note.className = 'music-note floating-note';
            note.textContent = notes[Math.floor(Math.random() * notes.length)];
            
            // Random positioning
            const randomX = Math.random() * 80 + 10; // 10-90%
            const randomY = Math.random() * 80 + 10; // 10-90%
            
            note.style.cssText = `
                position: absolute;
                left: ${randomX}%;
                top: ${randomY}%;
                font-size: ${16 + Math.random() * 8}px;
                color: rgba(255, 107, 157, 0.6);
                z-index: 10;
                pointer-events: none;
                animation: float-note 2s ease-in-out infinite;
                animation-delay: ${i * 0.5}s;
            `;
            
            cardElement.appendChild(note);
        }
    }

    removeFloatingNotes(cardElement) {
        const notes = cardElement.querySelectorAll('.floating-note');
        notes.forEach(note => {
            note.style.opacity = '0';
            note.style.transform = 'translateY(-30px)';
            setTimeout(() => {
                if (note.parentNode) {
                    note.parentNode.removeChild(note);
                }
            }, 300);
        });
    }

    addRainbowPulse(element) {
        element.classList.add('rainbow-pulse');
    }

    removeRainbowPulse(element) {
        element.classList.remove('rainbow-pulse');
    }

    setupMusicNotes() {
        // Add background floating notes
        const musicSection = document.getElementById('music');
        if (musicSection) {
            this.createBackgroundNotes(musicSection);
        }
    }

    createBackgroundNotes(container) {
        const notes = ['♪', '♫', '♬'];
        const noteCount = 6;

        for (let i = 0; i < noteCount; i++) {
            const note = document.createElement('div');
            note.className = 'music-note background-note';
            note.textContent = notes[Math.floor(Math.random() * notes.length)];
            
            note.style.cssText = `
                position: absolute;
                left: ${Math.random() * 100}%;
                top: ${Math.random() * 100}%;
                font-size: ${20 + Math.random() * 10}px;
                color: rgba(255, 107, 157, 0.1);
                z-index: 1;
                pointer-events: none;
                animation: float-note ${3 + Math.random() * 2}s ease-in-out infinite;
                animation-delay: ${Math.random() * 3}s;
            `;
            
            container.appendChild(note);
        }
    }

    // Method to simulate music play/pause states
    toggleMusicState(index, isPlaying) {
        if (this.musicCards[index]) {
            const { element } = this.musicCards[index];
            this.musicCards[index].isPlaying = isPlaying;
            
            if (isPlaying) {
                element.classList.add('music-player-playing');
                element.classList.remove('music-player-paused');
            } else {
                element.classList.add('music-player-paused');
                element.classList.remove('music-player-playing');
            }
        }
    }

    // Cleanup method
    destroy() {
        this.musicCards.forEach(card => {
            card.element.removeEventListener('mouseenter', () => {});
            card.element.removeEventListener('mouseleave', () => {});
        });
        this.musicCards = [];
        this.isInitialized = false;
    }
}

// Initialize Music Section when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Initialize music section controller
    const musicController = new MusicSectionController();
    
    // Make it globally accessible for debugging
    window.musicController = musicController;
});

// Additional utility functions for music section
function enhanceMusicSection() {
    // Add smooth scroll to music section
    const musicNavLink = document.querySelector('a[href="#music"]');
    if (musicNavLink) {
        musicNavLink.addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('music').scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        });
    }
}

// ===============================================
// ACTIVITIES SECTION (OTSUKARE) FUNCTIONS
// ===============================================
// Sample activity data (in real app, this would come from database)
const activitiesData = {
    1: {
        id: 1,
        title: "Dance Rehearsal Session",
        category: "rehearsal",
        date: "2025-07-10T14:00:00",
        location: "Studio A",
        members: ["ami", "alyaa", "cantikkun"],
        description: "Intensive dance practice for our upcoming summer concert. Working on new choreography and perfecting our synchronization.",
        thumbnail: "rehearsal-1.jpg",
        documentation: [
            { image: "rehearsal-1-1.jpg", caption: "Warming up before practice" },
            { image: "rehearsal-1-2.jpg", caption: "Learning new moves" },
            { image: "rehearsal-1-3.jpg", caption: "Group formation practice" },
            { image: "rehearsal-1-4.jpg", caption: "Break time selfie!" }
        ]
    },
    2: {
        id: 2,
        title: "Live Stage Performance",
        category: "performance",
        date: "2025-07-09T19:30:00",
        location: "Music Hall Tokyo",
        members: ["ami", "alyaa", "ame", "ina", "cantikkun"],
        description: "Amazing live performance in front of 2000 fans! The energy was incredible and we're so grateful for all the support.",
        thumbnail: "performance-1.jpg",
        documentation: [
            { image: "performance-1-1.jpg", caption: "Getting ready backstage" },
            { image: "performance-1-2.jpg", caption: "On stage moment" },
            { image: "performance-1-3.jpg", caption: "Crowd interaction" },
            { image: "performance-1-4.jpg", caption: "Post-show celebration" }
        ]
    },
    3: {
        id: 3,
        title: "Magazine Photoshoot",
        category: "photoshoot",
        date: "2025-07-07T10:00:00",
        location: "Photo Studio B",
        members: ["ame", "ina"],
        description: "Special photoshoot for the upcoming magazine feature. Trying out different concepts and styles for the summer edition.",
        thumbnail: "photoshoot-1.jpg",
        documentation: [
            { image: "photoshoot-1-1.jpg", caption: "Makeup preparation" },
            { image: "photoshoot-1-2.jpg", caption: "Concept discussion" },
            { image: "photoshoot-1-3.jpg", caption: "Behind the camera" },
            { image: "photoshoot-1-4.jpg", caption: "Final shots review" }
        ]
    }
    // Add more data as needed...
};

let currentFilter = 'all';
let visibleActivities = 10;

// Initialize Activities Section
function initActivitiesSection() {
    // Check if activities section exists
    if (!document.getElementById('activities')) return;
    
    setupActivityFilters();
    loadActivityCards();
    setupInfiniteScroll();
    initActivityDetailModal();
}

// Filter Functions
function filterActivities(category) {
    currentFilter = category;
    
    // Update filter buttons
    document.querySelectorAll('.activity-filter-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    document.querySelector(`[data-filter="${category}"]`).classList.add('active');
    
    // Filter cards
    const cards = document.querySelectorAll('.activity-card');
    cards.forEach(card => {
        const cardCategory = card.getAttribute('data-category');
        
        if (category === 'all' || cardCategory === category) {
            card.classList.remove('hide');
            card.classList.add('show');
            card.style.display = 'block';
        } else {
            card.classList.remove('show');
            card.classList.add('hide');
            setTimeout(() => {
                card.style.display = 'none';
            }, 300);
        }
    });
}

// Setup Activity Filters
function setupActivityFilters() {
    const filterButtons = document.querySelectorAll('.activity-filter-btn');
    filterButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            filterActivities(filter);
        });
    });
}

// Load Activity Cards
function loadActivityCards() {
    const grid = document.getElementById('activitiesGrid');
    if (!grid) return;
    
    const cards = grid.querySelectorAll('.activity-card');
    
    cards.forEach((card, index) => {
        // Add loading animation with stagger
        setTimeout(() => {
            card.classList.add('loading');
        }, index * 100);
        
        // Add click event
        card.addEventListener('click', function() {
            const activityId = this.getAttribute('data-activity-id');
            openActivityDetail(activityId);
        });
    });
}

// Open Activity Detail Modal
function openActivityDetail(activityId) {
    const activity = activitiesData[activityId];
    
    if (!activity) {
        // Fallback for activities not in sample data
        showBasicActivityDetail(activityId);
        return;
    }
    
    const modalContent = document.getElementById('activityDetailContent');
    const memberTags = activity.members.map(member => 
        `<span class="member-tag ${member}">${member.charAt(0).toUpperCase() + member.slice(1)}</span>`
    ).join('');
    
    const documentationGrid = activity.documentation.map(doc => 
        `<div class="activity-doc-item" onclick="openImageViewer('${doc.image}')">
            <img src="{{ asset('storage/activities/${doc.image}') }}" 
                 alt="${doc.caption}" 
                 class="w-full h-full object-cover">
        </div>`
    ).join('');
    
    modalContent.innerHTML = `
        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">${activity.title}</h2>
            <div class="flex items-center justify-center space-x-4 text-gray-600 mb-4">
                <span><i class="fas fa-calendar mr-2"></i>${formatDate(activity.date)}</span>
                <span><i class="fas fa-map-marker-alt mr-2"></i>${activity.location}</span>
            </div>
            <div class="flex items-center justify-center mb-4">
                ${memberTags}
            </div>
        </div>
        
        <div class="mb-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-3">Description</h3>
            <p class="text-gray-600 leading-relaxed">${activity.description}</p>
        </div>
        
        <div>
            <h3 class="text-xl font-semibold text-gray-800 mb-3">Documentation</h3>
            <div class="activity-docs-grid">
                ${documentationGrid}
            </div>
        </div>
    `;
    
    showActivityModal();
}

// Show Basic Activity Detail (fallback)
function showBasicActivityDetail(activityId) {
    const card = document.querySelector(`[data-activity-id="${activityId}"]`);
    if (!card) return;
    
    const title = card.querySelector('h3').textContent;
    const category = card.getAttribute('data-category');
    
    const modalContent = document.getElementById('activityDetailContent');
    modalContent.innerHTML = `
        <div class="text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">${title}</h2>
            <div class="mb-4">
                <span class="member-tag ${category}">${category.charAt(0).toUpperCase() + category.slice(1)}</span>
            </div>
            <p class="text-gray-600 mb-6">
                This is a ${category} activity from Equivalent. More details and documentation will be available soon!
            </p>
            <div class="bg-gray-100 rounded-2xl p-8">
                <p class="text-gray-500">Documentation photos loading...</p>
            </div>
        </div>
    `;
    
    showActivityModal();
}

// Show Activity Modal
function showActivityModal() {
    const modal = document.getElementById('activityDetailModal');
    const container = document.getElementById('activityModalContainer');
    
    if (!modal || !container) return;
    
    modal.classList.remove('opacity-0', 'invisible');
    modal.classList.add('opacity-100', 'visible');
    container.classList.remove('scale-95');
    container.classList.add('scale-100');
    
    // Prevent body scroll
    document.body.style.overflow = 'hidden';
}

// Close Activity Detail
function closeActivityDetail() {
    const modal = document.getElementById('activityDetailModal');
    const container = document.getElementById('activityModalContainer');
    
    if (!modal || !container) return;
    
    modal.classList.remove('opacity-100', 'visible');
    modal.classList.add('opacity-0', 'invisible');
    container.classList.remove('scale-100');
    container.classList.add('scale-95');
    
    // Restore body scroll
    document.body.style.overflow = '';
}

// Load More Activities
function loadMoreActivities() {
    const grid = document.getElementById('activitiesGrid');
    const loadMoreBtn = document.getElementById('loadMoreBtn');
    
    if (!grid || !loadMoreBtn) return;
    
    // Show loading state
    loadMoreBtn.textContent = 'Loading...';
    loadMoreBtn.disabled = true;
    
    // Simulate loading delay
    setTimeout(() => {
        // Add more activity cards (in real app, fetch from server)
        const newCards = createMoreActivityCards();
        grid.appendChild(newCards);
        
        // Reset button
        loadMoreBtn.textContent = 'Load More Activities';
        loadMoreBtn.disabled = false;
        
        // Check if all loaded
        visibleActivities += 10;
        if (visibleActivities >= 50) { // Assuming max 50 activities
            loadMoreBtn.style.display = 'none';
        }
    }, 1500);
}

// Create More Activity Cards (for demo)
function createMoreActivityCards() {
    const fragment = document.createDocumentFragment();
    const categories = ['rehearsal', 'performance', 'photoshoot', 'recording'];
    const colors = ['ami-red', 'alyaa-pink', 'ame-yellow', 'ina-purple', 'cantikkun-blue'];
    
    for (let i = 0; i < 5; i++) {
        const category = categories[Math.floor(Math.random() * categories.length)];
        const color = colors[Math.floor(Math.random() * colors.length)];
        
        const card = document.createElement('div');
        card.className = 'activity-card loading';
        card.setAttribute('data-category', category);
        card.setAttribute('data-activity-id', visibleActivities + i + 1);
        card.onclick = () => openActivityDetail(visibleActivities + i + 1);
        
        card.innerHTML = `
            <div class="relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer">
                <div class="aspect-square overflow-hidden">
                    <img src="{{ asset('storage/activities/placeholder.jpg') }}" 
                         alt="Activity ${visibleActivities + i + 1}" 
                         class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-white text-sm font-semibold">New ${category}</h3>
                            <p class="text-white/80 text-xs">${Math.floor(Math.random() * 30) + 1} days ago</p>
                        </div>
                        <div class="flex items-center space-x-1">
                            <div class="w-2 h-2 bg-white rounded-full"></div>
                            <div class="w-2 h-2 bg-white/60 rounded-full"></div>
                            <div class="w-2 h-2 bg-white/60 rounded-full"></div>
                        </div>
                    </div>
                </div>
                <div class="absolute top-3 left-3">
                    <span class="bg-${color} text-white text-xs px-2 py-1 rounded-full font-semibold">${category.charAt(0).toUpperCase() + category.slice(1)}</span>
                </div>
            </div>
        `;
        
        fragment.appendChild(card);
    }
    
    return fragment;
}

// Setup Infinite Scroll (optional)
function setupInfiniteScroll() {
    let isLoading = false;
    
    window.addEventListener('scroll', () => {
        if (isLoading) return;
        
        const scrollHeight = document.documentElement.scrollHeight;
        const scrollTop = document.documentElement.scrollTop;
        const clientHeight = document.documentElement.clientHeight;
        
        if (scrollTop + clientHeight >= scrollHeight - 1000) {
            const loadMoreBtn = document.getElementById('loadMoreBtn');
            if (loadMoreBtn && loadMoreBtn.style.display !== 'none') {
                isLoading = true;
                loadMoreActivities();
                setTimeout(() => {
                    isLoading = false;
                }, 2000);
            }
        }
    });
}

// Initialize Activity Detail Modal
function initActivityDetailModal() {
    // Close activity modal when clicking outside
    const activityModal = document.getElementById('activityDetailModal');
    if (activityModal) {
        activityModal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeActivityDetail();
            }
        });
    }
}

// Utility Functions for Activities
function formatDate(dateString) {
    const date = new Date(dateString);
    const options = { 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    };
    return date.toLocaleDateString('id-ID', options);
}

function openImageViewer(imagePath) {
    // Simple image viewer (can be enhanced with lightbox library)
    const viewer = document.createElement('div');
    viewer.className = 'fixed inset-0 z-50 bg-black bg-opacity-90 flex items-center justify-center';
    viewer.onclick = () => viewer.remove();
    
    viewer.innerHTML = `
        <div class="relative max-w-4xl max-h-full p-4">
            <img src="{{ asset('storage/activities/${imagePath}') }}" 
                 alt="Activity Image" 
                 class="max-w-full max-h-full object-contain">
            <button onclick="this.parentElement.parentElement.remove()" 
                    class="absolute top-4 right-4 text-white text-2xl bg-black bg-opacity-50 rounded-full w-10 h-10 flex items-center justify-center">
                ×
            </button>
        </div>
    `;
    
    document.body.appendChild(viewer);
    document.body.style.overflow = 'hidden';
    
    viewer.addEventListener('click', (e) => {
        if (e.target === viewer) {
            viewer.remove();
            document.body.style.overflow = '';
        }
    });
}

// ===============================================
// SHARED UTILITIES & ANIMATIONS
// ===============================================
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

// Loading Animations
function addLoadingAnimations() {
    const elements = document.querySelectorAll('.animate-fade-in, .animate-slide-up, .animate-bounce-in');
    
    elements.forEach((element, index) => {
        element.style.animationDelay = `${index * 0.1}s`;
    });
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

// ===============================================
// UTILITY FUNCTIONS
// ===============================================
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

// ===============================================
// PERFORMANCE OPTIMIZATIONS
// ===============================================
// Handle window resize for responsive animations
window.addEventListener('resize', debounce(function() {
    if (window.musicController) {
        // Adjust animations for mobile
        const isMobile = window.innerWidth < 768;
        const musicCards = document.querySelectorAll('.music-player-card');
        
        musicCards.forEach(card => {
            if (isMobile) {
                card.style.transform = 'none';
            }
        });
    }
}, 250));

// Performance optimization - pause animations when page is not visible
document.addEventListener('visibilitychange', function() {
    const musicSection = document.getElementById('music');
    if (musicSection) {
        if (document.hidden) {
            musicSection.style.animationPlayState = 'paused';
            // Pause gallery auto-slide
            pauseAutoSlide();
        } else {
            musicSection.style.animationPlayState = 'running';
            // Resume gallery auto-slide
            resumeAutoSlide();
        }
    }
});

// Cleanup on page unload
window.addEventListener('beforeunload', function() {
    if (autoSlideInterval) {
        clearInterval(autoSlideInterval);
    }
});

// ===============================================
// GLOBAL FUNCTION EXPORTS
// ===============================================
// Export functions for global access
window.openMemberDetail = openMemberDetail;
window.closeMemberModal = closeMemberModal;
window.scrollToSection = scrollToSection;
window.showEventDetail = showEventDetail;
window.closeEventDetail = closeEventDetail;
window.goToSlide = goToSlide;
window.nextSlide = nextSlide;
window.prevSlide = prevSlide;
window.pauseAutoSlide = pauseAutoSlide;
window.resumeAutoSlide = resumeAutoSlide;
window.filterActivities = filterActivities;
window.openActivityDetail = openActivityDetail;
window.closeActivityDetail = closeActivityDetail;
window.loadMoreActivities = loadMoreActivities;
window.openImageViewer = openImageViewer;

/* ===============================================
   OTSUKARE SECTIONS JAVASCRIPT
   =============================================== */

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    initializeOtsukareSections();
});

// Main initialization function
function initializeOtsukareSections() {
    console.log('🎉 Initializing Otsukare Sections...');
    
    // Initialize each section
    initializeNextEvent();
    initializeOtsukarePost();
    initializeDocumentation();
    
    // Setup intersection observers for animations
    setupAnimationObservers();
    
    // Setup magnetic button effects
    setupMagneticButtons();
    
    // Setup parallax effects
    setupParallaxEffects();
}

// ===============================================
// NEXT EVENT SECTION
// ===============================================

function initializeNextEvent() {
    console.log('📅 Initializing Next Event section...');
    
    // Add hover effects to event cards
    const eventCards = document.querySelectorAll('.event-card');
    eventCards.forEach((card, index) => {
        setupEventCardEffects(card, index);
    });
    
    // Setup countdown timers for events
    setupEventCountdowns();
}

function setupEventCardEffects(card, index) {
    // Staggered animation delay
    card.style.animationDelay = `${index * 0.2}s`;
    
    // Mouse move tracking for 3D effect
    card.addEventListener('mousemove', function(e) {
        const rect = card.getBoundingClientRect();
        const centerX = rect.left + rect.width / 2;
        const centerY = rect.top + rect.height / 2;
        
        const deltaX = (e.clientX - centerX) / (rect.width / 2);
        const deltaY = (e.clientY - centerY) / (rect.height / 2);
        
        const rotateX = deltaY * 5; // Max 5 degrees
        const rotateY = deltaX * -5; // Max 5 degrees
        
        card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-8px) scale(1.02)`;
    });
    
    // Reset transform on mouse leave
    card.addEventListener('mouseleave', function() {
        card.style.transform = '';
    });
    
    // Click animation
    card.addEventListener('click', function(e) {
        if (!e.target.closest('button') && !e.target.closest('a')) {
            createClickRipple(e, card);
        }
    });
}

function setupEventCountdowns() {
    const countdownElements = document.querySelectorAll('.event-card [data-countdown]');
    
    countdownElements.forEach(element => {
        const eventDate = new Date(element.dataset.countdown);
        updateCountdown(element, eventDate);
        
        // Update every minute
        setInterval(() => {
            updateCountdown(element, eventDate);
        }, 60000);
    });
}

function updateCountdown(element, eventDate) {
    const now = new Date();
    const diff = eventDate - now;
    
    if (diff <= 0) {
        element.textContent = 'Event started!';
        element.classList.add('text-red-500', 'font-bold');
        return;
    }
    
    const days = Math.floor(diff / (1000 * 60 * 60 * 24));
    const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
    
    if (days > 0) {
        element.textContent = `${days}d ${hours}h`;
    } else if (hours > 0) {
        element.textContent = `${hours}h ${minutes}m`;
    } else {
        element.textContent = `${minutes}m`;
    }
}

// ===============================================
// OTSUKARE POST SECTION
// ===============================================

function initializeOtsukarePost() {
    console.log('📝 Initializing Otsukare Post section...');
    
    // Add hover effects to post cards
    const postCards = document.querySelectorAll('.post-card');
    postCards.forEach((card, index) => {
        setupPostCardEffects(card, index);
    });
    
    // Setup image lazy loading
    setupImageLazyLoading();
}

function setupPostCardEffects(card, index) {
    // Staggered animation delay
    card.style.animationDelay = `${index * 0.15}s`;
    
    // Parallax image effect
    const image = card.querySelector('img');
    if (image) {
        card.addEventListener('mousemove', function(e) {
            const rect = card.getBoundingClientRect();
            const centerX = rect.left + rect.width / 2;
            const centerY = rect.top + rect.height / 2;
            
            const deltaX = (e.clientX - centerX) / rect.width;
            const deltaY = (e.clientY - centerY) / rect.height;
            
            const moveX = deltaX * 10;
            const moveY = deltaY * 10;
            
            image.style.transform = `translate(${moveX}px, ${moveY}px) scale(1.1)`;
        });
        
        card.addEventListener('mouseleave', function() {
            image.style.transform = 'scale(1.1)';
        });
    }
    
    // Floating animation
    card.addEventListener('mouseenter', function() {
        card.style.animation = 'float 3s ease-in-out infinite';
    });
    
    card.addEventListener('mouseleave', function() {
        card.style.animation = '';
    });
}

function setupImageLazyLoading() {
    const images = document.querySelectorAll('.post-card img');
    
    const imageObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.classList.add('loaded');
                imageObserver.unobserve(img);
            }
        });
    });
    
    images.forEach(img => imageObserver.observe(img));
}

function viewOtsukarePost(postId) {
    console.log(`👁 Viewing Otsukare Post: ${postId}`);
    
    // Add click animation
    const button = event.target;
    button.style.transform = 'scale(0.95)';
    setTimeout(() => {
        button.style.transform = '';
    }, 150);
    
    // Show loading notification
    showNotification('📖 Loading post...', 'info', 2000);
    
    // Simulate API call or redirect
    setTimeout(() => {
        // Replace with actual implementation
        showNotification('✨ Post loaded successfully!', 'success', 3000);
        
        // Example: window.location.href = `/activities/${postId}`;
    }, 1000);
}

// ===============================================
// DOCUMENTATION SECTION
// ===============================================

function initializeDocumentation() {
    console.log('📸 Initializing Documentation section...');
    
    // Add hover effects to documentation cards
    const docCards = document.querySelectorAll('.documentation-card');
    docCards.forEach((card, index) => {
        setupDocumentationCardEffects(card, index);
    });
    
    // Setup photo item interactions
    setupPhotoItemEffects();
}

function setupDocumentationCardEffects(card, index) {
    // Staggered animation delay
    card.style.animationDelay = `${index * 0.1}s`;
    
    // Card tilt effect
    card.addEventListener('mousemove', function(e) {
        const rect = card.getBoundingClientRect();
        const centerX = rect.left + rect.width / 2;
        const centerY = rect.top + rect.height / 2;
        
        const deltaX = (e.clientX - centerX) / (rect.width / 2);
        const deltaY = (e.clientY - centerY) / (rect.height / 2);
        
        const rotateX = deltaY * 3;
        const rotateY = deltaX * -3;
        
        card.style.transform = `perspective(800px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-5px)`;
    });
    
    card.addEventListener('mouseleave', function() {
        card.style.transform = '';
    });
}

function setupPhotoItemEffects() {
    const photoItems = document.querySelectorAll('.photo-item');
    
    photoItems.forEach(item => {
        // Hover sound effect (optional)
        item.addEventListener('mouseenter', function() {
            // Add subtle scale animation
            const thumbnail = item.querySelector('.w-12.h-12');
            if (thumbnail) {
                thumbnail.style.transform = 'scale(1.1) rotate(5deg)';
            }
        });
        
        item.addEventListener('mouseleave', function() {
            const thumbnail = item.querySelector('.w-12.h-12');
            if (thumbnail) {
                thumbnail.style.transform = '';
            }
        });
        
        // Click effect
        item.addEventListener('click', function() {
            createClickRipple(event, item);
        });
    });
}

function openDocumentationPhoto(photo, eventName) {
    console.log(`📷 Opening photo: ${photo} from ${eventName}`);
    
    const modal = document.getElementById('documentationModal');
    const modalContent = document.getElementById('modalContent');
    
    // Create photo modal content
    modalContent.innerHTML = `
        <div class="p-6">
            <div class="text-center mb-4">
                <h3 class="text-2xl font-bold text-gray-800">${eventName}</h3>
                <p class="text-gray-600">Documentation Photo</p>
            </div>
            
            <div class="bg-gray-100 rounded-xl h-96 flex items-center justify-center mb-4">
                <div class="text-center">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <p class="text-gray-500">Photo: ${photo}</p>
                    <p class="text-sm text-gray-400">Image would be displayed here</p>
                </div>
            </div>
            
            <div class="flex justify-center space-x-4">
                <button onclick="downloadPhoto('${photo}')" 
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                    Download
                </button>
                <button onclick="sharePhoto('${photo}')" 
                        class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-colors">
                    Share
                </button>
            </div>
        </div>
    `;
    
    // Show modal
    modal.classList.add('show');
    modal.style.opacity = '1';
    modal.style.visibility = 'visible';
    
    // Add escape key listener
    document.addEventListener('keydown', handleModalEscape);
}

function viewAllDocumentation(eventName) {
    console.log(`📁 Viewing all documentation for: ${eventName}`);
    
    // Add click animation
    const button = event.target;
    button.style.transform = 'scale(0.95)';
    setTimeout(() => {
        button.style.transform = '';
    }, 150);
    
    showNotification(`📂 Loading all ${eventName} photos...`, 'info', 2000);
    
    // Simulate loading
    setTimeout(() => {
        openDocumentationGallery(eventName);
    }, 1000);
}

function openDocumentationGallery(eventName) {
    const modal = document.getElementById('documentationModal');
    const modalContent = document.getElementById('modalContent');
    
    // Create gallery modal content
    modalContent.innerHTML = `
        <div class="p-6">
            <div class="text-center mb-6">
                <h3 class="text-2xl font-bold text-gray-800">${eventName}</h3>
                <p class="text-gray-600">Complete Documentation Gallery</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                ${[1,2,3,4,5,6].map(i => `
                    <div class="bg-gray-100 rounded-lg aspect-square flex items-center justify-center hover:bg-gray-200 transition-colors cursor-pointer"
                         onclick="openSinglePhoto('${eventName}_${i}.jpg')">
                        <div class="text-center">
                            <svg class="w-8 h-8 text-gray-400 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <p class="text-xs text-gray-500">Photo ${i}</p>
                        </div>
                    </div>
                `).join('')}
            </div>
            
            <div class="text-center mt-6">
                <button onclick="downloadAllPhotos('${eventName}')" 
                        class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                    Download All Photos
                </button>
            </div>
        </div>
    `;
    
    // Show modal
    modal.classList.add('show');
    modal.style.opacity = '1';
    modal.style.visibility = 'visible';
}

function closeDocumentationModal() {
    const modal = document.getElementById('documentationModal');
    modal.classList.remove('show');
    modal.style.opacity = '0';
    modal.style.visibility = 'hidden';
    
    // Remove escape key listener
    document.removeEventListener('keydown', handleModalEscape);
}

function handleModalEscape(e) {
    if (e.key === 'Escape') {
        closeDocumentationModal();
    }
}

function downloadPhoto(photo) {
    console.log(`⬇️ Downloading photo: ${photo}`);
    showNotification(`📥 Downloading ${photo}...`, 'success', 2000);
    
    // Simulate download
    // In real implementation: window.open(`/download/photo/${photo}`, '_blank');
}

function sharePhoto(photo) {
    console.log(`🔗 Sharing photo: ${photo}`);
    showNotification(`🔗 Share link copied to clipboard!`, 'success', 2000);
    
    // Simulate sharing
    // In real implementation: navigator.share() or copy to clipboard
}

function downloadAllPhotos(eventName) {
    console.log(`📦 Downloading all photos from: ${eventName}`);
    showNotification(`📦 Preparing download for ${eventName} photos...`, 'info', 3000);
    
    // Simulate bulk download
    setTimeout(() => {
        showNotification(`✅ Download started! Check your downloads folder.`, 'success', 3000);
    }, 2000);
}

// ===============================================
// UTILITY FUNCTIONS
// ===============================================

function setupAnimationObservers() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('loaded');
                entry.target.classList.remove('loading');
            }
        });
    }, observerOptions);
    
    // Observe all animated elements
    document.querySelectorAll('.loading').forEach(el => {
        observer.observe(el);
    });
}

function setupMagneticButtons() {
    const buttons = document.querySelectorAll('.event-card button, .post-card button, .documentation-card button');
    
    buttons.forEach(button => {
        button.addEventListener('mousemove', function(e) {
            const rect = button.getBoundingClientRect();
            const centerX = rect.left + rect.width / 2;
            const centerY = rect.top + rect.height / 2;
            
            const deltaX = (e.clientX - centerX) * 0.1;
            const deltaY = (e.clientY - centerY) * 0.1;
            
            button.style.transform = `translate(${deltaX}px, ${deltaY}px)`;
        });
        
        button.addEventListener('mouseleave', function() {
            button.style.transform = '';
        });
    });
}

function setupParallaxEffects() {
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const rate = scrolled * -0.5;
        
        // Apply parallax to section backgrounds
        const sections = document.querySelectorAll('#next-event, #otsukare-post, #documentation');
        sections.forEach(section => {
            if (isInViewport(section)) {
                section.style.transform = `translateY(${rate * 0.1}px)`;
            }
        });
    });
}

function createClickRipple(e, element) {
    const ripple = document.createElement('div');
    const rect = element.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);
    const x = e.clientX - rect.left - size / 2;
    const y = e.clientY - rect.top - size / 2;
    
    ripple.style.cssText = `
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 107, 157, 0.3);
        transform: scale(0);
        animation: ripple 0.6s linear;
        left: ${x}px;
        top: ${y}px;
        width: ${size}px;
        height: ${size}px;
        pointer-events: none;
        z-index: 1000;
    `;
    
    element.style.position = 'relative';
    element.appendChild(ripple);
    
    setTimeout(() => {
        ripple.remove();
    }, 600);
}

function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

function showNotification(message, type = 'info', duration = 3000) {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300 ${getNotificationClass(type)}`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    // Slide in
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);
    
    // Remove after duration
    setTimeout(() => {
        notification.style.transform = 'translateX(full)';
        setTimeout(() => {
            if (document.body.contains(notification)) {
                document.body.removeChild(notification);
            }
        }, 300);
    }, duration);
}

function getNotificationClass(type) {
    switch (type) {
        case 'success':
            return 'bg-green-500 text-white';
        case 'error':
            return 'bg-red-500 text-white';
        case 'warning':
            return 'bg-yellow-500 text-white';
        default:
            return 'bg-blue-500 text-white';
    }
}

// Add CSS animations dynamically
const style = document.createElement('style');
style.textContent = `
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
    
    @keyframes float {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-10px);
        }
    }
`;
document.head.appendChild(style);

// Performance optimization
let ticking = false;

function requestTick() {
    if (!ticking) {
        requestAnimationFrame(updateAnimations);
        ticking = true;
    }
}

function updateAnimations() {
    // Update any continuous animations here
    ticking = false;
}

// Throttle scroll events
window.addEventListener('scroll', requestTick);