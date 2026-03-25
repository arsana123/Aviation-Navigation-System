<?php include "./components/htmlHeader.php" ?>

<body>
    <header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-gray-100/30 backdrop-blur-md py-2">
        <div class="container mx-auto px-4 py-3 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <a href="index.php" class="flex items-center space-x-2 transition-opacity hover:opacity-80">
                    <img width="30px" src="./Assets/plane.png" alt="AviationNav Logo">
                    <span class="font-display text-lg font-semibold text-navy-950">AviationNav</span>
                </a>

                <?php include "./components/navbar.php" ?>

                <div class="flex items-center space-x-4">
                    <?php if ($isLoggedIn): ?>
                        <div class="relative">
                            <button id="profile-button" class="flex items-center space-x-1 focus:outline-none">
                                <div class="w-8 h-8 rounded-full overflow-hidden border-2 border-sky-200">
                                    <img src="./Assets/default-profile.png" alt="Profile" class="w-full h-full object-cover"
                                        onerror="this.src='https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png'">
                                </div>
                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            
                            <div id="profile-popup" class="hidden absolute right-0 top-10 z-50 w-64 bg-white rounded-lg shadow-lg overflow-hidden transition-all duration-300">
                                <div class="p-4 flex flex-col items-center border-b border-gray-200">
                                    <div class="w-20 h-20 rounded-full overflow-hidden mb-3">
                                        <img src="./Assets/default-profile.png" alt="Profile" class="w-full h-full object-cover"
                                            onerror="this.src='https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png'">
                                    </div>
                                    <div class="text-center">
                                        <h3 class="font-medium text-gray-900"><?php echo htmlspecialchars($_SESSION['user_name']); ?></h3>
                                        <p class="text-sm text-gray-500"><?php echo htmlspecialchars($_SESSION['user_email']); ?></p>
                                    </div>
                                </div>
                                <div class="p-3">
                                    <a href="./Auth.php?logout=1" class="flex items-center justify-center w-full px-4 py-2 bg-red-100 text-red-700 rounded-md hover:bg-red-200 transition-colors text-sm font-medium">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                        </svg>
                                        Logout
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="./Auth.php" class="hidden md:inline-flex button-primary px-3 py-2 bg-sky-600 text-white rounded-md hover:bg-sky-700 transition-colors text-sm font-semibold">Get Started</a>
                    <?php endif; ?>

                    <button type="button" class="md:hidden  p-2 text-gray-600 hover:text-sky-600 focus:outline-none" aria-label="Toggle menu" onclick="toggleMenu()">
                        <span class="sr-only">Open main menu</span>
                        <div class="relative h-6 w-6 " id="wrap">
                            <span class="hamburger-line absolute block h-0.5 w-8 bg-current transform transition duration-300 ease-in-out top-1"></span>
                            <span class="hamburger-line absolute block h-0.5 w-8 bg-current transform transition duration-300 ease-in-out top-3"></span>
                            <span class="hamburger-line absolute block h-0.5 w-8 bg-current transform transition duration-300 ease-in-out top-5"></span>
                        </div>
                    </button>
                </div>
            </div>

            <div id="mobile-menu" class="md:hidden overflow-hidden transition-all duration-300 ease-in-out max-h-0 opacity-0">
                <div class="py-2 space-y-1 bg-white rounded-lg shadow-lg">
                    <a href="./index.php" class="block px-4 py-3 text-base font-medium hover:bg-sky-50 transition-colors text-gray-700">Home</a>
                    <a href="./about.php" class="block px-4 py-3 text-base font-medium hover:bg-sky-50 transition-colors text-gray-700">About</a>
                    <a href="./Features.php" class="block px-4 py-3 text-base font-medium hover:bg-sky-50 transition-colors text-gray-700">Features</a>
                    <a href="./how-to-use.php" class="block px-4 py-3 text-base font-medium hover:bg-sky-50 transition-colors text-gray-700">How to Use</a>
                    <a href="./data-sources.php" class="block px-4 py-3 text-base font-medium hover:bg-sky-50 transition-colors text-gray-700">Data Sources</a>
                    <a href="./case-studies.php" class="block px-4 py-3 text-base font-medium hover:bg-sky-50 transition-colors text-gray-700">Case Studies</a>
                    <a href="./contact.php" class="block px-4 py-3 text-base font-medium hover:bg-sky-50 transition-colors text-gray-700">Contact</a>
                    
                    <a href="./Auth.php" class="block px-4 py-3 text-base font-medium text-white bg-sky-600 hover:bg-sky-700 transition-colors">Get Started</a>
                </div>
            </div>
        </div>
    </header>
   
    <section class="min-h-[60vh] pt-32 pb-20 relative overflow-hidden">
       
        <div class="absolute inset-0 -z-10 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-sky-50 via-white to-white"></div>

        <div class="absolute top-20 left-20 w-[400px] h-[400px] bg-sky-100/50 rounded-full blur-3xl opacity-60"></div>
        <div class="absolute -bottom-10 right-20 w-[300px] h-[300px] bg-sky-100/50 rounded-full blur-3xl opacity-60"></div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="inline-flex items-center rounded-full px-3 py-1 mb-6 bg-sky-100 text-sky-800 text-sm font-medium transition-all duration-700 ease-out opacity-100">
                    <svg class="mr-1 h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-5M12 20h5v-5m-5 5H7v-5m0 5H2v-5m20-5v5m0-5h-5m-5 0v5m0-5H7m-5 0v5m0-5h5m5 0V7m0 5h5m-5 0H7m5 0V2" />
                    </svg>
                    <span>Our Mission & Team</span>
                </div>

                <h1 class="text-4xl md:text-5xl lg:text-6xl font-display font-bold leading-tight mb-6 text-balance transition-all duration-700 delay-100 ease-out opacity-100">
                    About <span class="text-gradient text-blue-700">AviationNav</span>
                </h1>

                <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto transition-all duration-700 delay-200 ease-out opacity-100">
                    We're dedicated to enhancing aviation navigation for safer, more efficient flights through
                    cutting-edge technology and innovative mapping solutions.
                </p>
            </div>
        </div>
    </section>
    <section class="py-20 bg-white" id="mission-section">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="order-2 lg:order-1">
                    <div class="animate-on-scroll">
                        <h2 class="text-3xl md:text-4xl font-display font-bold text-navy-950 mb-6">
                            Our Mission
                        </h2>

                        <p class="text-lg text-gray-600 mb-6">
                            At AviationNav, we're on a mission to revolutionize how pilots and aviation professionals
                            navigate the skies. We believe that precision, reliability, and intuitive design are
                            essential for enhancing flight safety and efficiency.
                        </p>

                        <p class="text-lg text-gray-600 mb-8">
                            Our platform combines cutting-edge mapping technology with real-time data to provide
                            a comprehensive navigation solution that meets the unique needs of modern aviation.
                        </p>

                        <div class="space-y-6">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 rounded-lg bg-sky-100 flex items-center justify-center">
                                        <svg class="h-6 w-6 text-sky-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-xl font-semibold mb-2 text-navy-950">Safety First</h3>
                                    <p class="text-gray-600">
                                        Every feature we develop is designed with safety as the top priority,
                                        ensuring pilots have the tools they need to make informed decisions.
                                    </p>
                                </div>
                            </div>

                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 rounded-lg bg-sky-100 flex items-center justify-center">
                                        <svg class="h-6 w-6 text-sky-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="12" cy="12" r="10" />
                                            <path d="M12 8v4l2 2" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-xl font-semibold mb-2 text-navy-950">Precision Mapping</h3>
                                    <p class="text-gray-600">
                                        We're committed to providing the most accurate and detailed mapping
                                        data available, continuously updating our systems to reflect the
                                        ever-changing aviation landscape.
                                    </p>
                                </div>
                            </div>

                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 rounded-lg bg-sky-100 flex items-center justify-center">
                                        <svg class="h-6 w-6 text-sky-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-xl font-semibold mb-2 text-navy-950">Innovation</h3>
                                    <p class="text-gray-600">
                                        We continuously push the boundaries of what's possible in aviation
                                        navigation, integrating new technologies and approaches to solve
                                        the industry's most pressing challenges.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="order-1 lg:order-2">
                    <div class="relative animate-on-scroll">
                        <div class="aspect-[4/3] rounded-2xl overflow-hidden shadow-elevation">
                            <img
                                src="https://images.unsplash.com/photo-1436491865332-7a61a109cc05?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80"
                                alt="Aerial view from aircraft"
                                class="w-full h-full object-cover" />
                        </div>

                        <div class="absolute -bottom-6 -right-6 px-6 py-4 bg-white rounded-lg shadow-elevation max-w-xs">
                            <h4 class="font-semibold text-navy-950 mb-2">Our Impact</h4>
                            <p class="text-gray-600 text-sm">
                                Since our founding, AviationNav has helped over 10,000 pilots plan safer,
                                more efficient routes across six continents.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </main>

    <?php
    include './components/footer.php';
    ?>
    <script>
        function toggleMenu() {
            const menu = document.getElementById('mobile-menu');
            const lines = document.querySelectorAll('.hamburger-line');
          

            if (menu.classList.contains('max-h-0')) {
                menu.classList.remove('max-h-0', 'opacity-0');
                menu.classList.add('max-h-screen', 'opacity-100');

                lines[0].classList.add('rotate-45', 'top-5');
                lines[1].classList.add('opacity-0');
                lines[2].classList.add('-rotate-45', 'top-5)');
                wrap.classList.add('-top-2')
            } else {
                menu.classList.remove('max-h-screen', 'opacity-100');
                menu.classList.add('max-h-0', 'opacity-0');
                lines[0].classList.remove('rotate-45', 'top-3');
                lines[1].classList.remove('opacity-0');
                lines[2].classList.remove('-rotate-45', 'top-3');
                wrap.classList.remove('-top-5')
            }
        }
    </script>
</body>

</html>