<div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 py-6">

    <!-- ===================================================== -->
    <!-- SECTION HEADER -->
    <!-- ===================================================== -->

    <div class="text-center mb-8">

        <p class="text-sm uppercase tracking-[0.3em] text-gray-500 mb-2">
            Explore
        </p>

        <h2 class="text-3xl sm:text-4xl font-black text-gray-900">
            Shop by Category
        </h2>

        <p class="mt-2 text-gray-500 text-sm sm:text-base">
            Discover products from your favorite categories
        </p>

    </div>


    <!-- ===================================================== -->
    <!-- SLIDER AREA -->
    <!-- ===================================================== -->

    <div class="relative h-[430px] sm:h-[460px] flex items-center justify-center overflow-hidden"
        style="perspective: 1600px;">

        @forelse ($categories ?? collect() as $category)
            <!-- ================================================= -->
            <!-- CATEGORY CARD -->
            <!-- ================================================= -->

            <div
                class="category-card absolute
                       w-[230px] sm:w-[270px]
                       h-[330px] sm:h-[370px]
                       rounded-3xl overflow-hidden
                       bg-white
                       shadow-[0_25px_70px_rgba(0,0,0,0.18)]
                       border border-gray-200
                       transition-all duration-700
                       ease-[cubic-bezier(.22,.61,.36,1)]
                       select-none">

                <!-- ============================================= -->
                <!-- IMAGE -->
                <!-- ============================================= -->

                <a href="{{ route('categories.show', $category->slug) }}" class="block relative h-full">

                    <img src="{{ $category->image ? asset('storage/' . ltrim($category->image, '/')) : asset('frontend/image/amazon1.jpg') }}"
                        alt="{{ $category->name }}"
                        class="category-image w-full h-full object-cover
                               transition-transform duration-700">


                    <!-- ========================================= -->
                    <!-- IMAGE GRADIENT -->
                    <!-- ========================================= -->

                    <div
                        class="absolute inset-0
                               bg-gradient-to-t
                               from-black/90
                               via-black/20
                               to-transparent">
                    </div>


                    <!-- ========================================= -->
                    <!-- CATEGORY CONTENT -->
                    <!-- ========================================= -->

                    <div class="absolute bottom-0 left-0 right-0
                               p-5 sm:p-6 text-white">

                        <!-- Small Label -->

                        <span
                            class="inline-block mb-2
                                   px-3 py-1
                                   rounded-full
                                   bg-white/20
                                   backdrop-blur-md
                                   border border-white/20
                                   text-[11px]
                                   uppercase
                                   tracking-wider">
                            Category
                        </span>


                        <!-- Category Name -->

                        <h3
                            class="text-2xl sm:text-3xl
                                   font-black
                                   leading-tight
                                   truncate">
                            {{ $category->name }}
                        </h3>


                        <!-- Description -->

                        <p
                            class="mt-1
                                   text-sm
                                   text-gray-200">
                            Explore {{ $category->name }}
                        </p>


                        <!-- View Button -->

                        <div class="mt-4">

                            <span
                                class="inline-flex items-center gap-2
                                       text-sm font-semibold
                                       group">

                                View Category

                                <span
                                    class="text-lg
                                           transition-transform
                                           duration-300
                                           group-hover:translate-x-1">
                                    →
                                </span>

                            </span>

                        </div>

                    </div>

                </a>

            </div>

        @empty

            <!-- ================================================= -->
            <!-- EMPTY STATE -->
            <!-- ================================================= -->

            <div class="text-center">

                <div
                    class="w-16 h-16 mx-auto mb-4
                           rounded-full
                           bg-gray-100
                           flex items-center justify-center">
                    <span class="text-2xl">📦</span>
                </div>

                <p class="text-gray-500">
                    No categories available.
                </p>

            </div>
        @endforelse

    </div>


    <!-- ===================================================== -->
    <!-- PREVIOUS BUTTON -->
    <!-- ===================================================== -->

    <button id="categoryPrev" type="button" aria-label="Previous category"
        class="absolute left-2 sm:left-6 top-[55%]
               -translate-y-1/2
               w-11 h-11 sm:w-14 sm:h-14
               rounded-full
               bg-white
               text-gray-900
               shadow-xl
               border border-gray-200
               flex items-center justify-center
               text-xl sm:text-2xl
               transition-all duration-300
               hover:scale-110
               hover:bg-gray-900
               hover:text-white
               z-30">
        ←
    </button>


    <!-- ===================================================== -->
    <!-- NEXT BUTTON -->
    <!-- ===================================================== -->

    <button id="categoryNext" type="button" aria-label="Next category"
        class="absolute right-2 sm:right-6 top-[55%]
               -translate-y-1/2
               w-11 h-11 sm:w-14 sm:h-14
               rounded-full
               bg-white
               text-gray-900
               shadow-xl
               border border-gray-200
               flex items-center justify-center
               text-xl sm:text-2xl
               transition-all duration-300
               hover:scale-110
               hover:bg-gray-900
               hover:text-white
               z-30">
        →
    </button>


    <!-- ===================================================== -->
    <!-- DOT INDICATORS -->
    <!-- ===================================================== -->

    <div id="categoryDots" class="flex justify-center items-center gap-2 mt-6"></div>

</div>



<!-- ========================================================= -->
<!-- JAVASCRIPT -->
<!-- ========================================================= -->

<script>
    document.addEventListener("DOMContentLoaded", function() {

        const cards = document.querySelectorAll(".category-card");

        const prevButton = document.getElementById("categoryPrev");

        const nextButton = document.getElementById("categoryNext");

        const dotsContainer = document.getElementById("categoryDots");

        const totalCards = cards.length;

        let current = 0;


        // =========================================================
        // STOP IF THERE ARE NO CARDS
        // =========================================================

        if (totalCards === 0) {

            prevButton.style.display = "none";
            nextButton.style.display = "none";

            return;

        }


        // =========================================================
        // CREATE DOTS
        // =========================================================

        cards.forEach((card, index) => {

            const dot = document.createElement("button");

            dot.type = "button";

            dot.className =
                "category-dot w-2 h-2 rounded-full bg-gray-300 " +
                "transition-all duration-300";

            dot.setAttribute(
                "aria-label",
                "Go to category " + (index + 1)
            );

            dot.addEventListener("click", function() {

                current = index;

                updateSlider();

            });

            dotsContainer.appendChild(dot);

        });


        const dots = document.querySelectorAll(".category-dot");


        // =========================================================
        // CALCULATE CIRCULAR POSITION
        // =========================================================

        function getPosition(index) {

            let position = index - current;

            const half = Math.floor(totalCards / 2);

            if (position > half) {

                position -= totalCards;

            }

            if (position < -half) {

                position += totalCards;

            }

            return position;

        }


        // =========================================================
        // UPDATE SLIDER
        // =========================================================

        function updateSlider() {

            cards.forEach((card, index) => {

                const position = getPosition(index);


                // =================================================
                // CENTER
                // =================================================

                if (position === 0) {

                    card.style.transform =
                        "translateX(0px) " +
                        "translateZ(180px) " +
                        "rotateY(0deg) " +
                        "scale(1)";

                    card.style.opacity = "1";

                    card.style.zIndex = "20";

                    card.style.filter = "brightness(1)";

                }


                // =================================================
                // RIGHT
                // =================================================
                else if (position === 1) {

                    card.style.transform =
                        "translateX(245px) " +
                        "translateZ(20px) " +
                        "rotateY(-32deg) " +
                        "scale(.84)";

                    card.style.opacity = ".85";

                    card.style.zIndex = "10";

                    card.style.filter = "brightness(.85)";

                }


                // =================================================
                // LEFT
                // =================================================
                else if (position === -1) {

                    card.style.transform =
                        "translateX(-245px) " +
                        "translateZ(20px) " +
                        "rotateY(32deg) " +
                        "scale(.84)";

                    card.style.opacity = ".85";

                    card.style.zIndex = "10";

                    card.style.filter = "brightness(.85)";

                }


                // =================================================
                // FAR RIGHT
                // =================================================
                else if (position === 2) {

                    card.style.transform =
                        "translateX(430px) " +
                        "translateZ(-180px) " +
                        "rotateY(-55deg) " +
                        "scale(.65)";

                    card.style.opacity = ".35";

                    card.style.zIndex = "5";

                    card.style.filter = "brightness(.65)";

                }


                // =================================================
                // FAR LEFT
                // =================================================
                else if (position === -2) {

                    card.style.transform =
                        "translateX(-430px) " +
                        "translateZ(-180px) " +
                        "rotateY(55deg) " +
                        "scale(.65)";

                    card.style.opacity = ".35";

                    card.style.zIndex = "5";

                    card.style.filter = "brightness(.65)";

                }


                // =================================================
                // HIDE VERY FAR CARDS
                // =================================================
                else {

                    card.style.transform =
                        "translateX(0px) " +
                        "translateZ(-500px) " +
                        "scale(.4)";

                    card.style.opacity = "0";

                    card.style.zIndex = "0";

                }

            });


            // =====================================================
            // UPDATE DOTS
            // =====================================================

            dots.forEach((dot, index) => {

                if (index === current) {

                    dot.classList.remove("w-2", "bg-gray-300");

                    dot.classList.add(
                        "w-7",
                        "bg-gray-900"
                    );

                } else {

                    dot.classList.remove(
                        "w-7",
                        "bg-gray-900"
                    );

                    dot.classList.add(
                        "w-2",
                        "bg-gray-300"
                    );

                }

            });

        }


        // =========================================================
        // NEXT
        // =========================================================

        nextButton.addEventListener("click", function() {

            current++;

            if (current >= totalCards) {

                current = 0;

            }

            updateSlider();

        });


        // =========================================================
        // PREVIOUS
        // =========================================================

        prevButton.addEventListener("click", function() {

            current--;

            if (current < 0) {

                current = totalCards - 1;

            }

            updateSlider();

        });


        // =========================================================
        // KEYBOARD CONTROL
        // =========================================================

        document.addEventListener("keydown", function(event) {

            if (event.key === "ArrowRight") {

                nextButton.click();

            }

            if (event.key === "ArrowLeft") {

                prevButton.click();

            }

        });


        // =========================================================
        // TOUCH / SWIPE
        // =========================================================

        let touchStartX = 0;

        let touchEndX = 0;


        const slider = document.getElementById("categoryNext")
            .parentElement;


        slider.addEventListener("touchstart", function(event) {

            touchStartX = event.changedTouches[0].screenX;

        });


        slider.addEventListener("touchend", function(event) {

            touchEndX = event.changedTouches[0].screenX;

            handleSwipe();

        });


        function handleSwipe() {

            const distance = touchEndX - touchStartX;


            if (Math.abs(distance) < 50) {

                return;

            }


            if (distance < 0) {

                nextButton.click();

            } else {

                prevButton.click();

            }

        }


        // =========================================================
        // AUTO PLAY
        // =========================================================

        let autoPlay = setInterval(function() {

            current++;

            if (current >= totalCards) {

                current = 0;

            }

            updateSlider();

        }, 5000);


        // =========================================================
        // PAUSE WHEN MOUSE IS OVER SLIDER
        // =========================================================

        const sliderArea =
            document.querySelector(".category-card")?.parentElement;


        if (sliderArea) {

            sliderArea.addEventListener("mouseenter", function() {

                clearInterval(autoPlay);

            });


            sliderArea.addEventListener("mouseleave", function() {

                autoPlay = setInterval(function() {

                    current++;

                    if (current >= totalCards) {

                        current = 0;

                    }

                    updateSlider();

                }, 5000);

            });

        }


        // =========================================================
        // INITIALIZE
        // =========================================================

        updateSlider();


        // =========================================================
        // DISABLE CONTROLS IF ONLY ONE CATEGORY
        // =========================================================

        if (totalCards <= 1) {

            prevButton.style.display = "none";

            nextButton.style.display = "none";

            dotsContainer.style.display = "none";

        }

    });
</script>
