<?php include "./components/htmlHeader.php" ?>

<body class="min-h-screen flex flex-col">    
<header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-gray-100/30 backdrop-blur-md py-2">
    <div class="container mx-auto px-4 py-3 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <a href="index.php" class="flex items-center space-x-2 transition-opacity hover:opacity-80">
                <img width="30px" src="./Assets/plane.png" alt="AviationNav Logo">
                <span class="font-display text-lg font-semibold text-navy-950">AviationNav</span>
            </a>

            <?php include "./components/navbar.php"?>

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
<main class="flex-grow my-28 py-10">
    <h1 class="text-4xl font-bold text-center text-gray-800 mb-6">Data Sources</h1>
    <p class="text-center m-auto w-2/3 text-gray-600 mb-12">Learn about the reliable sources behind our aviation navigation data and how we ensure accuracy.</p>
    
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 mb-16">
        <div class="bg-white rounded-lg shadow-lg p-8 mb-12">
            <h2 class="text-2xl font-semibold text-gray-900 mb-2">Our Commitment to Data Quality</h2>
            <p class="text-gray-600">AviationNav uses only the most reliable and up-to-date sources for our navigation data.</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                <div class="flex items-start">
                    <span class="text-green-500 text-lg">✔</span>
                    <p class="ml-2 text-sm text-gray-600">Verified Sources</p>
                </div>
                <div class="flex items-start">
                    <span class="text-sky-500 text-lg">🔄</span>
                    <p class="ml-2 text-sm text-gray-600">Regular Updates</p>
                </div>
                <div class="flex items-start">
                    <span class="text-gray-700 text-lg">🛡</span>
                    <p class="ml-2 text-sm text-gray-600">Quality Assurance</p>
                </div>
            </div>
        </div>
        
        <h2 class="text-2xl font-semibold mb-6 text-gray-900">Primary Data Sources</h2>
        <div class="overflow-x-auto bg-white rounded-lg shadow-lg mb-12">
            <table class="min-w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100 border-b border-gray-200">
                        <th class="px-6 py-4 text-left text-sm font-semibold">Source</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold">Description</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold">Update Frequency</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold">Reliability</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr class='hover:bg-gray-50'>
                        <td class='px-6 py-4 text-sm font-medium text-gray-900'>Aeronautical Information Publication (AIP)</td>
                        <td class='px-6 py-4 text-sm text-gray-600'>Official government-published aeronautical information.</td>
                        <td class='px-6 py-4 text-sm text-gray-600'>Every 28 days</td>
                        <td class='px-6 py-4 text-sm bg-green-100 text-green-800 px-2.5 py-0.5 rounded-full'>Very High</td>
                    </tr>
                    <tr class='hover:bg-gray-50'>
                        <td class='px-6 py-4 text-sm font-medium text-gray-900'>FAA Aeronautical Data</td>
                        <td class='px-6 py-4 text-sm text-gray-600'>Comprehensive database of US airspace.</td>
                        <td class='px-6 py-4 text-sm text-gray-600'>Every 28 days</td>
                        <td class='px-6 py-4 text-sm bg-green-100 text-green-800 px-2.5 py-0.5 rounded-full'>Very High</td>
                    </tr>
                    <tr class='hover:bg-gray-50'>
                        <td class='px-6 py-4 text-sm font-medium text-gray-900'>EUROCONTROL EAD</td>
                        <td class='px-6 py-4 text-sm text-gray-600'>European AIS Database containing airspace data.</td>
                        <td class='px-6 py-4 text-sm text-gray-600'>Every 28 days</td>
                        <td class='px-6 py-4 text-sm bg-green-100 text-green-800 px-2.5 py-0.5 rounded-full'>Very High</td>
                    </tr>
                    <tr class='hover:bg-gray-50'>
                        <td class='px-6 py-4 text-sm font-medium text-gray-900'>ICAO Public Maps</td>
                        <td class='px-6 py-4 text-sm text-gray-600'>Standardized global aeronautical charts.</td>
                        <td class='px-6 py-4 text-sm text-gray-600'>Quarterly</td>
                        <td class='px-6 py-4 text-sm bg-sky-100 text-sky-800 px-2.5 py-0.5 rounded-full'>High</td>
                    </tr>
                    <tr class='hover:bg-gray-50'>
                        <td class='px-6 py-4 text-sm font-medium text-gray-900'>OpenStreetMap</td>
                        <td class='px-6 py-4 text-sm text-gray-600'>Used for base map and geographical reference.</td>
                        <td class='px-6 py-4 text-sm text-gray-600'>Continuous</td>
                        <td class='px-6 py-4 text-sm bg-sky-100 text-sky-800 px-2.5 py-0.5 rounded-full'>High</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="bg-gray-50 rounded-lg p-8 mb-12">
            <h2 class="text-2xl font-semibold mb-6 text-gray-900">Our Data Processing Methodology</h2>
            <div class="space-y-6">
                <div class='bg-white rounded-lg p-6 shadow'>
                    <h3 class='font-semibold text-lg mb-2 text-gray-900'>Collection</h3>
                    <p class='text-gray-600'>Data is gathered from multiple authoritative sources to ensure comprehensive coverage.</p>
                </div>
                <div class='bg-white rounded-lg p-6 shadow'>
                    <h3 class='font-semibold text-lg mb-2 text-gray-900'>Validation</h3>
                    <p class='text-gray-600'>All collected data undergoes rigorous cross-referencing and validation checks.</p>
                </div>
                <div class='bg-white rounded-lg p-6 shadow'>
                    <h3 class='font-semibold text-lg mb-2 text-gray-900'>Integration</h3>
                    <p class='text-gray-600'>Validated data is processed and formatted for integration into our mapping system.</p>
                </div>
                <div class='bg-white rounded-lg p-6 shadow'>
                    <h3 class='font-semibold text-lg mb-2 text-gray-900'>Continuous Updates</h3>
                    <p class='text-gray-600'>Our system automatically incorporates updates on each AIRAC cycle.</p>
                </div>
            </div>
        </div>
        
        <div class="border border-yellow-200 bg-yellow-50 rounded-lg p-6">
            <h3 class="font-semibold text-lg mb-2 text-gray-900">Important Disclaimer</h3>
            <p class="text-gray-700">While we strive for complete accuracy, AviationNav should be used as a supplementary planning tool only.</p>
        </div>
    </div>
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
