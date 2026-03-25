<?php include "./components/htmlHeader.php" ?>

<body class="bg-gray-50 text-gray-900">
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
                        <div class="relative h-6 w-6 transform transition duration-300 ease-in-out" id="wrap">
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
    <main class="min-h-screen mt-32 flex flex-col items-center p-6">
        <header class="text-center mb-12">
            <h1 class="text-5xl font-bold text-blue-900">Features</h1>
            <p class="text-xl text-gray-600 w-2/3 pt-5 m-auto">Discover the powerful tools and capabilities that make AviationNav the ultimate resource for aviation navigation planning.</p>
        </header>

        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 w-full max-w-6xl">
         

            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-200">
                <div class="text-4xl text-center mb-4">
                    <img src="images/route-planning.png" alt="Custom Route Planning" class="w-12 h-12 mx-auto"
                        onerror="this.style.display='none';this.nextSibling.style.display='block'">
                    <i class="fas fa-compass" style="display:none"></i>
                </div>
                <h3 class="text-xl font-semibold text-blue-950 text-center">Custom Route Planning</h3>
                <p class="text-gray-600 text-sm mt-2">Create and save custom routes using any combination of waypoints, airports, and navigational aids.</p>
                <div class="bg-blue-50 p-4 rounded-lg mt-4">
                    <p class="text-blue-900 font-medium text-xs"><strong>Benefit:</strong> Visualize planned routes before flight for better preparation and situational awareness.</p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-200">
                <div class="text-4xl text-center mb-4">
                    <img src="images/distance-calc.png" alt="Distance and Bearing Calculations" class="w-12 h-12 mx-auto"
                        onerror="this.style.display='none';this.nextSibling.style.display='block'">
                    <i class="fas fa-ruler" style="display:none"></i>
                </div>
                <h3 class="text-xl font-semibold text-blue-950 text-center">Distance and Bearing Calculations</h3>
                <p class="text-gray-600 text-sm mt-2">Automatically calculate distances, bearings, and estimated flight times between any points on your route.</p>
                <div class="bg-blue-50 p-4 rounded-lg mt-4">
                    <p class="text-blue-900 font-medium text-xs"><strong>Benefit:</strong> Make precise flight plans with accurate time and fuel requirement estimates.</p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-200">
                <div class="text-4xl text-center mb-4">
                    <img src="images/weather-overlays.png" alt="Real-time Weather Overlays" class="w-12 h-12 mx-auto"
                        onerror="this.style.display='none';this.nextSibling.style.display='block'">
                    <i class="fas fa-cloud-showers-heavy" style="display:none"></i>
                </div>
                <h3 class="text-xl font-semibold text-blue-950 text-center">Real-time Weather Overlays</h3>
                <p class="text-gray-600 text-sm mt-2">View current weather patterns, including METAR and TAF data, directly on the map with customizable overlays.</p>
                <div class="bg-blue-50 p-4 rounded-lg mt-4">
                    <p class="text-blue-900 font-medium text-xs"><strong>Benefit:</strong> Stay informed about changing weather conditions that may affect your route.</p>
                </div>
            </div>

            
        </section>

        <section class="bg-blue-50 p-8 rounded-lg text-center mt-12 w-full max-w-4xl">
            <h2 class="text-3xl font-semibold text-blue-900">Coming Soon</h2>
            <p class="text-gray-700 my-4 text-sl">We're constantly improving AviationNav with new features. Here's what's on our roadmap:</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white p-3 rounded-lg shadow">
                    <h3 class="font-medium text-blue-900">Mobile App</h3>
                    <p class="text-sm text-gray-600">Access all features on iOS and Android</p>
                </div>
                <div class="bg-white p-3 rounded-lg shadow">
                    <h3 class="font-medium text-blue-900">Offline Mode</h3>
                    <p class="text-sm text-gray-600">Download maps for use without internet</p>
                </div>
                <div class="bg-white p-3 rounded-lg shadow">
                    <h3 class="font-medium text-blue-900">Flight Simulator Integration</h3>
                    <p class="text-sm text-gray-600">Connect directly with popular flight simulators</p>
                </div>
            </div>
        </section>

        <section class="text-center my-12">
            <h2 class="text-3xl font-semibold text-blue-900">Ready to Explore?</h2>
            <p class="text-gray-600 mb-6">Experience all these features and more by trying our interactive map.</p>
            <?php if ($isLoggedIn): ?>
                <a href="./feats/customWaypoints.php" class="bg-blue-600 text-white px-6 py-3 rounded-md text-l font-medium hover:bg-blue-700 transition-colors" target="_blank">Launch Interactive Map</a>
            <?php else: ?>
                <a href="./Auth.php" class="bg-blue-700 text-white px-6 py-3 rounded-md text-l font-medium hover:bg-blue-600 transition-colors" target="_blank">Launch Interactive Map</a>
            <?php endif; ?>
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