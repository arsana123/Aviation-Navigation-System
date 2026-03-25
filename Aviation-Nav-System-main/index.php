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
    <section class="min-h-screen pt-32 pb-20 overflow-hidden relative">
        <div class="absolute inset-0 -z-10 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-sky-50 via-white to-white"></div>

        <div class="absolute top-20 -right-20 w-[500px] h-[500px] bg-sky-100/50 rounded-full blur-3xl opacity-60"></div>
        <div class="absolute -bottom-40 -left-20 w-[400px] h-[400px] bg-sky-100/50 rounded-full blur-3xl opacity-50"></div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="opacity-100 translate-y-0 transition-all duration-1000 ease-out">
                    <div class="inline-flex items-center rounded-full px-3 py-1 mb-6 bg-sky-100 text-sky-800 text-sm font-medium">
                        <span class="mr-1"><img width=20px src="./Assets/plane.png" alt=""></span>
                        <span>Aviation Navigation Reimagined</span>
                    </div>

                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6 tracking-tight text-balance">
                        Navigate the Skies <br class="hidden md:block">
                        <span class="bg-gradient-to-r from-sky-500 to-blue-600 bg-clip-text text-transparent">With Precision</span>
                    </h1>

                    <p class="text-lg md:text-xl text-gray-600 mb-8 max-w-lg">
                        Plan and visualize aviation routes with our interactive Google Earth tool.
                        Enhance your flight planning with detailed 3D mapping and real-time data.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <?php if ($isLoggedIn): ?>
                            <a href="./feats/explore.php" class="py-3 px-8 bg-gray-100 text-gray-800 rounded-lg hover:bg-gray-200 transition-colors" target="_blank">
                                Explore Map
                            </a>
                        <?php else: ?>
                            <a href="Auth.php" class="py-3 px-8 bg-sky-600 text-white rounded-lg hover:bg-sky-700 transition-colors">
                                Get Started
                            </a>
                        <?php endif; ?>
                    </div>

                    <div class="mt-12 flex items-center space-x-6">
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full bg-sky-100 flex items-center justify-center">
                                <span class="text-2xl"><img width="30px" src="./Assets/global.png" alt=""></span>
                            </div>
                            <div class="ml-3">
                                <p class="font-semibold">Global Coverage</p>
                                <p class="text-sm text-gray-500">Worldwide mapping</p>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full bg-sky-100 flex items-center justify-center">
                                <span class="text-2xl"><img width="30px" src="./Assets/navigation.png" alt=""></span>
                            </div>
                            <div class="ml-3">
                                <p class="font-semibold">Precise Planning</p>
                                <p class="text-sm text-gray-500">Accurate routes</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="opacity-100 translate-y-0 relative transition-all duration-1000 delay-300 ease-out">
                    <div class="relative aspect-[4/3] bg-gradient-to-br from-sky-100 to-white rounded-2xl shadow-lg overflow-hidden">
                        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1508614589041-895b88991e3e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80')] bg-cover bg-center"></div>
                        <div class="absolute inset-0 bg-white/10 backdrop-blur-sm"></div>

                        <div class="absolute top-4 left-4 right-4 h-10 bg-white/80 backdrop-blur-md rounded-lg shadow-sm flex items-center px-4">
                            <div class="w-4 h-4 rounded-full bg-red-400 mr-2"></div>
                            <div class="w-4 h-4 rounded-full bg-yellow-400 mr-2"></div>
                            <div class="w-4 h-4 rounded-full bg-green-400 mr-2"></div>
                            <div class="h-5 bg-gray-200 rounded-md flex-1 ml-2"></div>
                        </div>

                        <svg class="absolute inset-0 w-full h-full" viewBox="0 0 400 300" fill="none">
                            <path
                                d="M100,200 C130,150 270,150 300,100"
                                stroke="#0EA5E9"
                                stroke-width="3"
                                stroke-dasharray="8 4"
                                class="animate-pulse" />
                            <circle cx="100" cy="200" r="6" fill="#0C4A6E" />
                            <circle cx="300" cy="100" r="6" fill="#0C4A6E" />
                        </svg>

                        <div class="absolute bottom-4 right-4 flex flex-col space-y-2">
                            <div class="w-10 h-10 bg-white/80 backdrop-blur-md rounded-full shadow-sm flex items-center justify-center">
                                <span class="text-sky-600 font-bold">+</span>
                            </div>
                            <div class="w-10 h-10 bg-white/80 backdrop-blur-md rounded-full shadow-sm flex items-center justify-center">
                                <span class="text-sky-600 font-bold">-</span>
                            </div>
                        </div>

                        <div class="absolute bottom-4 left-4 w-56 bg-white/90 backdrop-blur-md rounded-lg shadow-sm p-3">
                            <div class="flex items-center mb-2">
                                <span class="h-4 w-4 mr-2"><img width="30px" src="./Assets/plane.png" alt=""></span>
                                <span class="text-xs font-semibold">Flight Path Analysis</span>
                            </div>
                            <div class="h-1 w-full bg-gray-200 rounded-full mb-2">
                                <div class="h-1 bg-sky-500 rounded-full w-3/4"></div>
                            </div>
                            <div class="flex justify-between text-xs text-gray-500">
                                <span>Distance: 1,463 mi</span>
                                <span>ETA: 3h 42m</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-20 bg-white relative overflow-hidden">

        <div class="absolute inset-0 -z-10 bg-[linear-gradient(to_right,_#f0f9ff_1px,_transparent_1px),linear-gradient(to_bottom,_#f0f9ff_1px,_transparent_1px)] bg-[size:4rem_4rem] [mask-image:radial-gradient(ellipse_80%_80%_at_50%_50%,#000_40%,transparent_100%)]"></div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-display font-bold text-navy-950 mb-6">
                    Elevate Your Flight Planning Experience
                </h2>
                <p class="text-lg text-gray-600">
                    Our platform combines precision mapping, real-time data, and intuitive tools to
                    revolutionize how you navigate the skies.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white border border-gray-100 rounded-xl p-6 transition-all duration-300 hover:shadow-elevation" style="animation-delay: 0ms;">
                    <div class="w-12 h-12 rounded-lg bg-sky-100 flex items-center justify-center mb-5">
                        <img src="./Assets/global.png" alt="3D Terrain" width="24" height="24" class="text-sky-600">
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-navy-950">3D Terrain Visualization</h3>
                    <p class="text-gray-600">Explore accurate 3D terrain models for enhanced situational awareness during flight planning.</p>
                </div>

                <div class="bg-white border border-gray-100 rounded-xl p-6 transition-all duration-300 hover:shadow-elevation" style="animation-delay: 100ms;">
                    <div class="w-12 h-12 rounded-lg bg-sky-100 flex items-center justify-center mb-5">
                        <img src="./Assets/location.png" alt="Weather" width="24" height="24" class="text-sky-600">
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-navy-950">Real-Time Weather Data</h3>
                    <p class="text-gray-600">Access current weather conditions and forecasts along your planned route for safer flying.</p>
                </div>

                <div class="bg-white border border-gray-100 rounded-xl p-6 transition-all duration-300 hover:shadow-elevation" style="animation-delay: 200ms;">
                    <div class="w-12 h-12 rounded-lg bg-sky-100 flex items-center justify-center mb-5">
                        <img src="./Assets/navigation.png" alt="Route" width="24" height="24" class="text-sky-600">
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-navy-950">Precise Route Planning</h3>
                    <p class="text-gray-600">Create detailed flight paths with waypoints, altitude changes, and time estimations.</p>
                </div>

                <div class="bg-white border border-gray-100 rounded-xl p-6 transition-all duration-300 hover:shadow-elevation" style="animation-delay: 300ms;">
                    <div class="w-12 h-12 rounded-lg bg-sky-100 flex items-center justify-center mb-5">
                        <img src="./Assets/compass.png" alt="Database" width="24" height="24" class="text-sky-600">
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-navy-950">Global Navigation Database</h3>
                    <p class="text-gray-600">Utilize our comprehensive database of airports, navaids, and airspace restrictions.</p>
                </div>

                <div class="bg-white border border-gray-100 rounded-xl p-6 transition-all duration-300 hover:shadow-elevation" style="animation-delay: 400ms;">
                    <div class="w-12 h-12 rounded-lg bg-sky-100 flex items-center justify-center mb-5">
                        <img src="./Assets/graph.png" alt="Analytics" width="24" height="24" class="text-sky-600">
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-navy-950">Performance Analytics</h3>
                    <p class="text-gray-600">Analyze aircraft performance data to optimize fuel consumption and flight efficiency.</p>
                </div>

                <div class="bg-white border border-gray-100 rounded-xl p-6 transition-all duration-300 hover:shadow-elevation" style="animation-delay: 500ms;">
                    <div class="w-12 h-12 rounded-lg bg-sky-100 flex items-center justify-center mb-5">
                        <img src="./Assets/map.png" alt="Safety" width="24" height="24" class="text-sky-600">
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-navy-950">Safety Alerts</h3>
                    <p class="text-gray-600">Receive notifications about potential hazards, airspace restrictions, and NOTAMs.</p>
                </div>
            </div>
        </div>
    </section>
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