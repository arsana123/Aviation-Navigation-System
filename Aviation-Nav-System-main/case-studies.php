<?php include "./components/htmlHeader.php" ?>

<body class="bg-gray-100">
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
<main class="container mt-28 mx-auto px-4">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-6">Case Studies</h1>
        <p class="text-center m-auto w-2/3 text-gray-600 mb-12">Discover how aviation professionals around the world use AviationNav to improve safety, efficiency, and operational performance.</p>
        
        <div class="flex flex-col gap-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="https://plus.unsplash.com/premium_photo-1679758630055-99ebb2df7d77?w=1000&auto=format&fit=crop&q=60" alt="Alpine Air Services" class="w-full h-64 object-cover">
                <div class="p-6">
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-3 py-1 rounded-full">Commercial Operator</span>
                    <h2 class="text-2xl font-semibold text-gray-800 mt-3">Alpine Air Services</h2>
                    <p class="text-gray-600 mt-2">A regional carrier that improved safety and efficiency for mountain routes by 27% using AviationNav's 3D terrain mapping.</p>
                    <details class="mt-4 cursor-pointer">
                        <summary class="text-blue-600 font-medium">Read More</summary>
                        <div class="mt-4">
                            <h3 class="font-semibold text-gray-800">Challenge</h3>
                            <p class="text-gray-600">Planning safe routes through mountainous terrain with rapidly changing weather conditions.</p>
                            <h3 class="font-semibold text-gray-800 mt-3">Solution</h3>
                            <p class="text-gray-600">Implemented AviationNav's 3D terrain visualization and real-time weather overlay features.</p>
                            <h3 class="font-semibold text-gray-800 mt-3">Results</h3>
                            <ul class="list-disc list-inside text-gray-600">
                                <li>27% reduction in weather-related delays</li>
                                <li>Improved fuel efficiency by optimizing routes</li>
                                <li>Enhanced pilot situational awareness in challenging terrain</li>
                            </ul>
                        </div>
                    </details>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="https://images.unsplash.com/photo-1606707323990-c2bc64723dba?w=1000&auto=format&fit=crop&q=60" alt="Global Freight Express" class="w-full h-64 object-cover">
                <div class="p-6">
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-3 py-1 rounded-full">Cargo Operator</span>
                    <h2 class="text-2xl font-semibold text-gray-800 mt-3">Global Freight Express</h2>
                    <p class="text-gray-600 mt-2">Optimizing transoceanic routes to minimize fuel consumption while navigating complex international airspace regulations.</p>
                    <details class="mt-4 cursor-pointer">
                        <summary class="text-blue-600 font-medium">Read More</summary>
                        <div class="mt-4">
                            <h3 class="font-semibold text-gray-800">Challenge</h3>
                            <p class="text-gray-600">Optimizing transoceanic routes to minimize fuel consumption while navigating complex international airspace regulations.</p>
                            <h3 class="font-semibold text-gray-800 mt-3">Solution</h3>
                            <p class="text-gray-600">Used AviationNav's route planning and performance analytics tools to identify more efficient flight paths.</p>
                            <h3 class="font-semibold text-gray-800 mt-3">Results</h3>
                            <ul class="list-disc list-inside text-gray-600">
                                <li>12% reduction in overall fuel consumption</li>
                                <li>Saved approximately $3.5M annually on operating costs</li>
                                <li>Decreased carbon emissions by an estimated 15,000 tons per year</li>
                            </ul>
                        </div>
                    </details>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="https://images.unsplash.com/photo-1534724295769-d49447d13dd0?q=80&w=2070&auto=format&fit=crop" alt="Coastal Air Academy" class="w-full h-64 object-cover">
                <div class="p-6">
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-3 py-1 rounded-full">Flight School</span>
                    <h2 class="text-2xl font-semibold text-gray-800 mt-3">Coastal Air Academy</h2>
                    <p class="text-gray-600 mt-2">Teaching complex navigation concepts to student pilots in a practical, engaging manner.</p>
                    <details class="mt-4 cursor-pointer">
                        <summary class="text-blue-600 font-medium">Read More</summary>
                        <div class="mt-4">
                            <h3 class="font-semibold text-gray-800">Challenge</h3>
                            <p class="text-gray-600">Teaching complex navigation concepts to student pilots in a practical, engaging manner.</p>
                            <h3 class="font-semibold text-gray-800 mt-3">Solution</h3>
                            <p class="text-gray-600">Integrated AviationNav as a training tool for visualizing navigation concepts and planning training flights.</p>
                            <h3 class="font-semibold text-gray-800 mt-3">Results</h3>
                            <ul class="list-disc list-inside text-gray-600">
                                <li>92% of students reported better understanding of navigation principles</li>
                                <li>Reduced cross-country planning time by 40%</li>
                                <li>Improved student preparedness for real-world flight conditions</li>
                            </ul>
                        </div>
                    </details>
                </div>
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
