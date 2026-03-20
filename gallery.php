<?php
/**
 * Memorial Gallery Page
 * Media Gallery with Videos and Images
 */

$name = "Cresencio Malforte Longos Jr.";
$birth_date = "May 20, 1965";      // ← ADD THIS LINE
$death_date = "March 18, 2026";     // ← ADD THIS LINE
$age = 60;                          // ← ADD THIS LINE

// Pre-list videos (1-15)
$videos = [];
for ($i = 1; $i <= 30; $i++) {
    $videos[] = [
        'src' => "media/videos/video{$i}.mp4",
        'thumb' => "media/videos/thumb{$i}.jpg",
        'type' => 'video'
    ];
}

// Pre-list images (1-100)
$images = [];
for ($i = 1; $i <= 150; $i++) {
    $images[] = [
        'src' => "media/images/img{$i}.jpg",
        'type' => 'image'
    ];
}

// Combine and shuffle for random order
$allMedia = array_merge($videos, $images);
shuffle($allMedia);

// Quotes for gallery
$galleryQuotes = [
    "Ingay lolo! Ingay! -Niane",
    "Junior, gising na mamalengke tayo -Sylvia",
    "Pa, hatid mo ko. Pa, sunduin mo ko lapit na ko -Isay",
    "Pahiram nga tools mo pa -Christian",
    "Pa, picture kayo ni mama, dikit kayo -Anne",
    "Saan si papa? Lasing na naman yun pag-uwi -Daniel",
    
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery — In Memory of <?php echo $name; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500&family=Great+Vibes&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Lora:ital,wght@0,400;0,500;0,600;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/gallery.css">
</head>
<body>

    <!-- Audio -->
    <audio id="bgMusic" loop preload="auto">
        <source src="media/music/gallery-music.mp3" type="audio/mpeg">
    </audio>

    <!-- Top Navigation Bar -->
    <nav class="gallery-nav">
        <a href="index.php" class="nav-back" title="Back to Memorial" aria-label="Back to memorial page">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
        </a>

        <h1 class="nav-title">Cherished Memories</h1>

        <div class="nav-controls">
            <!-- View Toggle -->
            <button id="viewToggle" class="nav-btn" title="Toggle View" aria-label="Toggle gallery view">
                <svg id="gridIcon" viewBox="0 0 24 24" fill="currentColor" width="20" height="20">
                    <rect x="3" y="3" width="7" height="7" rx="1"/>
                    <rect x="14" y="3" width="7" height="7" rx="1"/>
                    <rect x="3" y="14" width="7" height="7" rx="1"/>
                    <rect x="14" y="14" width="7" height="7" rx="1"/>
                </svg>
                <svg id="slideIcon" viewBox="0 0 24 24" fill="currentColor" width="20" height="20" style="display:none;">
                    <rect x="2" y="6" width="20" height="12" rx="2"/>
                </svg>
            </button>

            <!-- Filter Toggle -->
            <button id="filterToggle" class="nav-btn" title="Filter Media" aria-label="Filter media type">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20">
                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/>
                </svg>
            </button>

            <!-- Music Toggle -->
            <button id="musicToggle" class="nav-btn music-toggle" title="Toggle Music" aria-label="Toggle background music">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20">
                    <path d="M9 18V5l12-2v13"/>
                    <circle cx="6" cy="18" r="3"/>
                    <circle cx="18" cy="16" r="3"/>
                </svg>
                <span class="music-bars">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </span>
            </button>
        </div>
    </nav>

    <!-- Filter Dropdown -->
    <div id="filterDropdown" class="filter-dropdown">
        <button class="filter-option active" data-filter="all">All Media</button>
        <button class="filter-option" data-filter="image">Photos Only</button>
        <button class="filter-option" data-filter="video">Videos Only</button>
    </div>

    <!-- Gallery Header -->
    <header class="gallery-header">
        <div class="header-particles" id="headerParticles"></div>
        <div class="header-content">
            <div class="header-cross">✝</div>
            <h2>In Loving Memory of</h2>
            <h1><?php echo $name; ?></h1>
            <p class="header-quote">"<?php echo $galleryQuotes[array_rand($galleryQuotes)]; ?>"</p>
            <div class="header-divider">
                <span></span><span>✦</span><span></span>
            </div>
        </div>
    </header>

    <!-- Gallery Container -->
    <main class="gallery-main">
        <!-- Quote Interlude (shown between media sections) -->
        <?php
        $quoteIndex = 0;
        $mediaCount = 0;
        ?>

        <div id="galleryGrid" class="gallery-grid">
            <?php foreach ($allMedia as $index => $media): ?>
                <?php
                $mediaCount++;
                // Insert quote every 12 items
                if ($mediaCount > 1 && ($mediaCount - 1) % 12 === 0 && $quoteIndex < count($galleryQuotes)):
                ?>
                <div class="gallery-quote-card scroll-animate" data-type="quote">
                    <div class="quote-inner">
                        <span class="q-mark">"</span>
                        <p><?php echo $galleryQuotes[$quoteIndex]; ?></p>
                        <span class="q-mark">"</span>
                    </div>
                </div>
                <?php $quoteIndex++; endif; ?>

                <div class="gallery-item scroll-animate" 
                     data-type="<?php echo $media['type']; ?>" 
                     data-index="<?php echo $index; ?>"
                     data-src="<?php echo $media['src']; ?>">

                    <?php if ($media['type'] === 'video'): ?>
                        <div class="media-wrapper video-wrapper">
                            <video preload="metadata" muted>
                                <source src="<?php echo $media['src']; ?>" type="video/mp4">
                            </video>
                            <div class="play-overlay">
                                <div class="play-button">
                                    <svg viewBox="0 0 24 24" fill="white">
                                        <polygon points="5 3 19 12 5 21 5 3"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="media-badge">
                                <svg viewBox="0 0 24 24" fill="currentColor" width="14" height="14">
                                    <polygon points="5 3 19 12 5 21 5 3"/>
                                </svg>
                                Video
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="media-wrapper image-wrapper">
                            <img loading="lazy" 
                                 src="<?php echo $media['src']; ?>" 
                                 alt="Memory <?php echo ($index + 1); ?>"
                                 onerror="this.src='data:image/svg+xml,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 400 300&quot;><rect fill=&quot;%23334455&quot; width=&quot;400&quot; height=&quot;300&quot;/><text x=&quot;200&quot; y=&quot;150&quot; text-anchor=&quot;middle&quot; fill=&quot;%23667&quot; font-size=&quot;16&quot; font-family=&quot;serif&quot;>Memory <?php echo ($index + 1); ?></text></svg>'">
                            <div class="image-overlay">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24">
                                    <circle cx="11" cy="11" r="8"/>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                                    <line x1="11" y1="8" x2="11" y2="14"/>
                                    <line x1="8" y1="11" x2="14" y2="11"/>
                                </svg>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="lightbox">
        <div class="lightbox-overlay"></div>
        <div class="lightbox-content">
            <button class="lightbox-close" aria-label="Close lightbox">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18"/>
                    <line x1="6" y1="6" x2="18" y2="18"/>
                </svg>
            </button>
            <button class="lightbox-prev" aria-label="Previous">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="15 18 9 12 15 6"/>
                </svg>
            </button>
            <button class="lightbox-next" aria-label="Next">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="9 18 15 12 9 6"/>
                </svg>
            </button>
            <div class="lightbox-media" id="lightboxMedia"></div>
            <div class="lightbox-counter" id="lightboxCounter"></div>
        </div>
    </div>

    <!-- Slideshow Modal -->
    <div id="slideshow" class="slideshow">
        <div class="slideshow-overlay"></div>
        <div class="slideshow-content">
            <button class="slideshow-close" aria-label="Close slideshow">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18"/>
                    <line x1="6" y1="6" x2="18" y2="18"/>
                </svg>
            </button>
            <div class="slideshow-media" id="slideshowMedia"></div>
            <div class="slideshow-progress">
                <div class="slideshow-progress-bar" id="slideshowProgress"></div>
            </div>
            <div class="slideshow-controls">
                <button id="slideshowPrev" aria-label="Previous">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="15 18 9 12 15 6"/>
                    </svg>
                </button>
                <button id="slideshowPlayPause" aria-label="Play/Pause">
                    <svg class="play-icon" viewBox="0 0 24 24" fill="currentColor">
                        <polygon points="5 3 19 12 5 21 5 3"/>
                    </svg>
                    <svg class="pause-icon" viewBox="0 0 24 24" fill="currentColor" style="display:none;">
                        <rect x="6" y="4" width="4" height="16"/>
                        <rect x="14" y="4" width="4" height="16"/>
                    </svg>
                </button>
                <button id="slideshowNext" aria-label="Next">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Ending Section -->
    <footer class="gallery-footer">
        <div class="footer-bg"></div>
        <div class="footer-content">
            <div class="footer-doves">
                <span class="footer-dove">🕊️</span>
                <span class="footer-dove">🕊️</span>
            </div>
            <div class="footer-cross">✝</div>
            <h2>Forever In Our Hearts</h2>
            <h3><?php echo $name; ?></h3>
            <p class="footer-dates"><?php echo $birth_date; ?> — <?php echo $death_date; ?></p>
            <div class="footer-divider">
                <span></span><span>✦</span><span></span>
            </div>
            <p class="footer-message">
                Your journey on earth has ended, but your spirit soars eternally.<br>
                You were our light, our strength, our everything.<br>
                Until we meet again in God's heavenly kingdom.
            </p>
            <div class="footer-final-quote">
                <p>"Precious in the sight of the Lord is the death of his faithful servants."</p>
                <cite>— Psalm 116:15</cite>
            </div>
            <div class="footer-candles">
                <div class="mini-candle">
                    <div class="mini-flame"></div>
                    <div class="mini-body"></div>
                </div>
                <div class="mini-candle">
                    <div class="mini-flame"></div>
                    <div class="mini-body"></div>
                </div>
                <div class="mini-candle">
                    <div class="mini-flame"></div>
                    <div class="mini-body"></div>
                </div>
            </div>
            <p class="footer-rest">Rest in Eternal Peace</p>
            <p class="footer-love">With all our love, now and forever.</p>
        </div>
    </footer>

    <!-- Media Data for JS -->
    <script>
        window.mediaData = <?php echo json_encode($allMedia); ?>;
    </script>
    <script src="js/gallery.js"></script>
</body>
</html>