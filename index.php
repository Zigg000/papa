<?php
/**
 * Memorial Landing Page
 * In Loving Memory of Cresencio Malforte Longos
 * May 20, 1965 – March 18, 2026
 */

$name = "Cresencio Malforte Longos Jr.";
$birth_date = "May 20, 1965";
$death_date = "March 18, 2026";
$age = 60;

$quotes = [
    
    
    "Hindi matutumbasan ang pagmamahal namin sayo."
    
   
    
];

$random_quote = $quotes[array_rand($quotes)];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our love, Papa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500&family=Great+Vibes&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Lora:ital,wght@0,400;0,500;0,600;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/landing.css">
</head>
<body>



    <!-- Preloader -->
    <div id="preloader">
        <div class="preloader-inner">
            <div class="preloader-cross">✝</div>
            <div class="preloader-text">Hanggang sa muli Papa. Mahal ka namin...</div>
            <div class="preloader-bar">
                <div class="preloader-bar-fill"></div>
            </div>
        </div>
    </div>

    <!-- Audio Controller -->
    <audio id="bgMusic" loop preload="auto">
        <source src="media/music/oceans.mp3" type="audio/mpeg">
    </audio>

    <!-- Music Toggle -->
    <button id="musicToggle" class="music-toggle" title="Toggle Music" aria-label="Toggle background music">
        <span class="music-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M9 18V5l12-2v13" class="note-line"/>
                <circle cx="6" cy="18" r="3" class="note-circle"/>
                <circle cx="18" cy="16" r="3" class="note-circle"/>
            </svg>
        </span>
        <span class="music-bars">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </span>
    </button>

    <!-- Next Button (Top Right) -->
    <a href="gallery.php" id="nextBtn" class="next-button" title="View Gallery" aria-label="Go to gallery">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="9 18 15 12 9 6"></polyline>
        </svg>
    </a>

    <!-- Background Video -->
    <div class="bg-video-container">
        <video id="bgVideo" autoplay muted loop playsinline>
            <source src="media/bg-video.mp4" type="video/mp4">
        </video>
        <div class="bg-overlay"></div>
        <div class="bg-overlay-gradient"></div>
    </div>

    <!-- Particles Canvas -->
    <canvas id="particlesCanvas"></canvas>

    <!-- Floating Elements -->
    <div class="floating-elements">
        <div class="dove dove-1">🕊️</div>
        <div class="dove dove-2">🕊️</div>
        <div class="dove dove-3">🕊️</div>
        <div class="floating-light light-1"></div>
        <div class="floating-light light-2"></div>
        <div class="floating-light light-3"></div>
        <div class="floating-light light-4"></div>
        <div class="floating-light light-5"></div>
    </div>

    <!-- Main Content -->
    <main class="memorial-content">
        <!-- Cross Symbol -->
        <div class="cross-symbol animate-element" data-delay="0.5">
            <span>✝</span>
        </div>

        <!-- Title -->
        <h2 class="memorial-title animate-element" data-delay="0.8">In Loving Memory of</h2>

        <!-- Portrait -->
        <div class="portrait-container animate-element" data-delay="1.0">
            <div class="portrait-glow"></div>
            <div class="portrait-frame">
                <img src="media/papa.png" alt="<?php echo $name; ?>" id="portrait" onerror="this.src='data:image/svg+xml,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 300 380&quot;><rect fill=&quot;%23667788&quot; width=&quot;300&quot; height=&quot;380&quot;/><text x=&quot;150&quot; y=&quot;190&quot; text-anchor=&quot;middle&quot; fill=&quot;white&quot; font-size=&quot;20&quot; font-family=&quot;serif&quot;>Portrait</text></svg>'">
            </div>
            <div class="portrait-ornament top-left"></div>
            <div class="portrait-ornament top-right"></div>
            <div class="portrait-ornament bottom-left"></div>
            <div class="portrait-ornament bottom-right"></div>
        </div>

        <!-- Name -->
        <h1 class="deceased-name animate-element" data-delay="1.4">
            <?php echo $name; ?>
        </h1>

        <!-- Dates -->
        <div class="life-dates animate-element" data-delay="1.8">
            <span class="date-birth"><?php echo $birth_date; ?></span>
            <span class="date-separator">
                <svg width="40" height="20" viewBox="0 0 40 20">
                    <line x1="0" y1="10" x2="15" y2="10" stroke="currentColor" stroke-width="1"/>
                    <circle cx="20" cy="10" r="3" fill="currentColor"/>
                    <line x1="25" y1="10" x2="40" y2="10" stroke="currentColor" stroke-width="1"/>
                </svg>
            </span>
            <span class="date-death"><?php echo $death_date; ?></span>
        </div>

        <!-- Divider -->
        <div class="ornamental-divider animate-element" data-delay="2.0">
            <svg width="200" height="30" viewBox="0 0 200 30">
                <path d="M0,15 Q50,0 100,15 Q150,30 200,15" fill="none" stroke="rgba(255,255,255,0.4)" stroke-width="1"/>
                <path d="M0,15 Q50,30 100,15 Q150,0 200,15" fill="none" stroke="rgba(255,255,255,0.4)" stroke-width="1"/>
                <circle cx="100" cy="15" r="4" fill="rgba(255,255,255,0.6)"/>
            </svg>
        </div>

        <!-- Quote -->
        <blockquote class="memorial-quote animate-element" data-delay="2.3">
            <span class="quote-mark">"</span>
            <?php echo $random_quote; ?>
            <span class="quote-mark">"</span>
        </blockquote>

        <!-- Rest in Peace -->
        <div class="rest-in-peace animate-element" data-delay="2.6">
            <p>Mahal na mahal ka namin!</p>
            <div class="rip-underline"></div>
        </div>

        <!-- Scroll Indicator -->
        <div class="scroll-indicator animate-element" data-delay="2.9">
            <div class="scroll-mouse">
                <div class="scroll-wheel"></div>
            </div>
        </div>
    </main>

    <!-- Second Section - Extended Memorial -->
    <section class="memorial-section-two">
        <div class="section-overlay"></div>
        <div class="section-content">
            <div class="tribute-text">
                <h2 class="section-title scroll-animate">A Life Well Lived</h2>
                <div class="tribute-divider scroll-animate">
                    <span></span><span>❧</span><span></span>
                </div>
                <p class="tribute-paragraph scroll-animate">
                    <?php echo $name; ?> graced this world for <?php echo $age; ?> beautiful years, 
                    touching the hearts of everyone fortunate enough to know him. 
                    His warmth, kindness, and unwavering love created ripples of goodness 
                    that will continue to flow through the lives he touched.
                </p>
                <p class="tribute-paragraph scroll-animate">
                    A devoted soul whose laughter could light up the darkest room, 
                    whose embrace could heal the deepest wound, and whose wisdom 
                    guided all who sought his counsel. He was not just a man — 
                    he was a beacon of hope, a pillar of strength, and a testament 
                    to the power of unconditional love.
                </p>
                <div class="tribute-quote scroll-animate">
                    <p>"Di aq makapaniwala sa sinapit mo binigla mo😭 aq,kami ng mga anak mo sakit dami mong hiningi sorry sakin yon na pala ang huli .naging masaya tayo simula noon bagong taon nakasama ka namin dati dimo yon ginagawa . kala ko tuloy tuloy na masasaya natin pamilya dahil sabi mo babawi ka lalo sa dalawang mong apo😭😭😭pero bakit mo kami iniwan.😭😭😭"</p>
                    <cite>— Sylvia Longos</cite>
                </div>
                <p class="tribute-paragraph scroll-animate">
                    Though he has left this earthly home, his spirit lives on in every 
                    sunset he admired, every song he loved, and every heart he warmed. 
                    We carry his legacy forward, honoring his memory with the same 
                    grace and dignity with which he lived his life.
                </p>
            </div>

            <div class="candle-container scroll-animate">
                <div class="candle">
                    <div class="flame">
                        <div class="flame-inner"></div>
                    </div>
                    <div class="candle-body"></div>
                    <div class="candle-glow"></div>
                </div>
                <p class="candle-text">A candle burns in memory<br>of a light the world has lost</p>
            </div>

            <div class="farewell-message scroll-animate">
                <h3>Forever In Our Hearts</h3>
                <p>Until we meet again, may God hold you in the palm of His hand.</p>
                <div class="farewell-cross">✝</div>
            </div>
        </div>
    </section>

    <!-- Click to Enter Overlay (for autoplay policy) -->
    <div id="enterOverlay" class="enter-overlay">
        <div class="enter-content">
            <div class="enter-cross">✝</div>
            <h2>In Loving Memory</h2>
            <h1><?php echo $name; ?></h1>
            <p><?php echo $birth_date; ?> — <?php echo $death_date; ?></p>
            <button id="enterBtn" class="enter-button">
                <span>Our Papa's Memories</span>
                <div class="btn-glow"></div>
            </button>
            
        </div>
    </div>

    <script src="js/particles.js"></script>
    <script src="js/landing.js"></script>
</body>
</html>