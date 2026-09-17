<div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 py-4">

    <!-- SECTION HEADER -->
    <div class="text-center mb-4">
        <h2 class="text-2xl sm:text-3xl font-black text-gray-900 tracking-tight">
            Shop by Category
        </h2>
        <p class="text-sm text-gray-500 mt-1">Browse our curated collections</p>
    </div>

    <!-- SLIDER AREA -->
    <div id="categorySliderArea"
        class="relative h-[430px] sm:h-[460px] flex items-center justify-center overflow-hidden outline-none"
        style="perspective: 1600px;" tabindex="0" role="region" aria-roledescription="carousel"
        aria-label="Product categories">
        @forelse ($categories ?? collect() as $category)
            <div class="category-card absolute
                       w-[230px] sm:w-[270px]
                       h-[330px] sm:h-[370px]
                       select-none
                       [will-change:transform,opacity]
                       transition-[transform,opacity,filter]
                       duration-500
                       ease-[cubic-bezier(.25,.8,.35,1)]"
                role="group" aria-roledescription="slide" aria-label="{{ $category->name }}">
                <div
                    class="category-card-inner group
                           relative w-full h-full
                           rounded-3xl overflow-hidden
                           bg-gray-100
                           shadow-[0_20px_50px_-12px_rgba(0,0,0,0.25)]
                           ring-1 ring-gray-200/70
                           transition-transform duration-300 ease-out
                           hover:scale-[1.035]
                           focus-within:scale-[1.035]">
                    <a href="{{ route('categories.show', $category->slug) }}"
                        class="block relative w-full h-full rounded-3xl
                               focus:outline-none focus-visible:ring-4 focus-visible:ring-gray-900/40">
                        <img src="{{ $category->image ? asset('storage/' . ltrim($category->image, '/')) : asset('frontend/image/amazon1.jpg') }}"
                            alt="{{ $category->name }}" loading="lazy" decoding="async"
                            class="category-image w-full h-full object-cover
                                   transition-transform duration-700 ease-out
                                   group-hover:scale-105">

                        <div
                            class="absolute inset-0
                                   bg-gradient-to-t
                                   from-black/85 via-black/25 to-black/0
                                   pointer-events-none">
                        </div>

                        <div class="absolute bottom-0 left-0 right-0 p-5 sm:p-6 text-white">
                            <h3 class="text-2xl sm:text-3xl font-black leading-tight truncate drop-shadow-sm">
                                {{ $category->name }}
                            </h3>

                            <p class="mt-1 text-sm text-gray-200/90">
                                Explore {{ $category->name }}
                            </p>

                            <div class="mt-4">
                                <span
                                    class="group/btn inline-flex items-center gap-2
                                           text-sm font-semibold
                                           bg-white/10 backdrop-blur-sm
                                           px-3 py-1.5 rounded-full
                                           border border-white/20
                                           transition-colors duration-300
                                           hover:bg-white/20">
                                    View Category
                                    <span
                                        class="text-lg transition-transform duration-300 group-hover/btn:translate-x-1">
                                        →
                                    </span>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @empty
            <div class="text-center">
                <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-gray-100 flex items-center justify-center">
                    <span class="text-2xl">📦</span>
                </div>
                <p class="text-gray-500">No categories available.</p>
            </div>
        @endforelse
    </div>

    <!-- PREV -->
    <button id="categoryPrev" type="button" aria-label="Previous category"
        class="absolute left-2 sm:left-6 top-[55%] -translate-y-1/2
               w-11 h-11 sm:w-14 sm:h-14 rounded-full
               bg-white/90 backdrop-blur text-gray-900
               shadow-xl border border-gray-200
               flex items-center justify-center text-xl sm:text-2xl
               transition-all duration-200 ease-out
               hover:scale-110 hover:bg-gray-900 hover:text-white
               active:scale-95
               focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-gray-900/30
               z-30">←</button>

    <!-- NEXT -->
    <button id="categoryNext" type="button" aria-label="Next category"
        class="absolute right-2 sm:right-6 top-[55%] -translate-y-1/2
               w-11 h-11 sm:w-14 sm:h-14 rounded-full
               bg-white/90 backdrop-blur text-gray-900
               shadow-xl border border-gray-200
               flex items-center justify-center text-xl sm:text-2xl
               transition-all duration-200 ease-out
               hover:scale-110 hover:bg-gray-900 hover:text-white
               active:scale-95
               focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-gray-900/30
               z-30">→</button>

    <!-- DOTS -->
    <div id="categoryDots" class="flex justify-center items-center gap-2 mt-6"></div>

    <!-- Screen-reader live announcement -->
    <div id="categoryLiveRegion" class="sr-only" aria-live="polite"></div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        const cards = document.querySelectorAll(".category-card");
        const prevButton = document.getElementById("categoryPrev");
        const nextButton = document.getElementById("categoryNext");
        const dotsContainer = document.getElementById("categoryDots");
        const sliderArea = document.getElementById("categorySliderArea");
        const liveRegion = document.getElementById("categoryLiveRegion");
        const totalCards = cards.length;

        let current = 0;
        let autoPlay = null;

        const prefersReducedMotion = window.matchMedia(
            "(prefers-reduced-motion: reduce)"
        ).matches;

        if (totalCards === 0) {
            prevButton.style.display = "none";
            nextButton.style.display = "none";
            return;
        }

        // Build dots
        cards.forEach((card, index) => {
            const dot = document.createElement("button");
            dot.type = "button";
            dot.className =
                "category-dot w-2 h-2 rounded-full bg-gray-300 transition-all duration-300 " +
                "focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-gray-900/40";
            dot.setAttribute("aria-label", "Go to category " + (index + 1));
            dot.addEventListener("click", () => {
                current = index;
                updateSlider();
                restartAutoPlay();
            });
            dotsContainer.appendChild(dot);
        });

        const dots = document.querySelectorAll(".category-dot");

        // Layout config per relative position
        const layout = {
            0: {
                x: 0,
                z: 180,
                ry: 0,
                scale: 1,
                opacity: 1,
                zIndex: 20,
                brightness: 1
            },
            1: {
                x: 245,
                z: 20,
                ry: -32,
                scale: .84,
                opacity: .85,
                zIndex: 10,
                brightness: .85
            },
            [-1]: {
                x: -245,
                z: 20,
                ry: 32,
                scale: .84,
                opacity: .85,
                zIndex: 10,
                brightness: .85
            },
            2: {
                x: 430,
                z: -180,
                ry: -55,
                scale: .65,
                opacity: .35,
                zIndex: 5,
                brightness: .65
            },
            [-2]: {
                x: -430,
                z: -180,
                ry: 55,
                scale: .65,
                opacity: .35,
                zIndex: 5,
                brightness: .65
            },
        };

        function getPosition(index) {
            let position = index - current;
            const half = Math.floor(totalCards / 2);
            if (position > half) position -= totalCards;
            if (position < -half) position += totalCards;
            return position;
        }

        function updateSlider() {
            cards.forEach((card, index) => {
                const position = getPosition(index);
                const cfg = layout[position];

                if (cfg) {
                    card.style.transform =
                        `translateX(${cfg.x}px) translateZ(${cfg.z}px) rotateY(${cfg.ry}deg) scale(${cfg.scale})`;
                    card.style.opacity = cfg.opacity;
                    card.style.zIndex = cfg.zIndex;
                    card.style.filter = `brightness(${cfg.brightness})`;
                    card.setAttribute("aria-hidden", position === 0 ? "false" : "true");
                } else {
                    card.style.transform = "translateX(0px) translateZ(-500px) scale(.4)";
                    card.style.opacity = "0";
                    card.style.zIndex = "0";
                    card.setAttribute("aria-hidden", "true");
                }
            });

            dots.forEach((dot, index) => {
                const active = index === current;
                dot.classList.toggle("w-2", !active);
                dot.classList.toggle("bg-gray-300", !active);
                dot.classList.toggle("w-7", active);
                dot.classList.toggle("bg-gray-900", active);
                dot.setAttribute("aria-current", active ? "true" : "false");
            });

            const activeCard = cards[current];
            const name = activeCard?.getAttribute("aria-label") || "";
            if (liveRegion) liveRegion.textContent = name ? `Showing ${name}` : "";
        }

        function goNext() {
            current = (current + 1) % totalCards;
            updateSlider();
        }

        function goPrev() {
            current = (current - 1 + totalCards) % totalCards;
            updateSlider();
        }

        nextButton.addEventListener("click", () => {
            goNext();
            restartAutoPlay();
        });
        prevButton.addEventListener("click", () => {
            goPrev();
            restartAutoPlay();
        });

        sliderArea.addEventListener("keydown", (event) => {
            if (event.key === "ArrowRight") {
                goNext();
                restartAutoPlay();
            }
            if (event.key === "ArrowLeft") {
                goPrev();
                restartAutoPlay();
            }
        });

        // Swipe
        let touchStartX = 0;
        sliderArea.addEventListener("touchstart", (e) => {
            touchStartX = e.changedTouches[0].screenX;
            pauseAutoPlay();
        }, {
            passive: true
        });

        sliderArea.addEventListener("touchend", (e) => {
            const distance = e.changedTouches[0].screenX - touchStartX;
            if (Math.abs(distance) >= 50) {
                distance < 0 ? goNext() : goPrev();
            }
            restartAutoPlay();
        }, {
            passive: true
        });

        // Autoplay controls
        function startAutoPlay() {
            if (prefersReducedMotion || totalCards <= 1) return;
            autoPlay = setInterval(goNext, 5000);
        }

        function pauseAutoPlay() {
            clearInterval(autoPlay);
        }

        function restartAutoPlay() {
            pauseAutoPlay();
            startAutoPlay();
        }

        sliderArea.addEventListener("mouseenter", pauseAutoPlay);
        sliderArea.addEventListener("mouseleave", startAutoPlay);
        sliderArea.addEventListener("focusin", pauseAutoPlay);
        sliderArea.addEventListener("focusout", startAutoPlay);

        document.addEventListener("visibilitychange", () => {
            document.hidden ? pauseAutoPlay() : startAutoPlay();
        });

        // Init
        updateSlider();
        startAutoPlay();

        if (totalCards <= 1) {
            prevButton.style.display = "none";
            nextButton.style.display = "none";
            dotsContainer.style.display = "none";
        }
    });
</script>
