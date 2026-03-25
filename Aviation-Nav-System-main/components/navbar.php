<nav class="hidden md:flex text-sm space-x-6">
    <?php
    $currentFileName = basename($_SERVER['PHP_SELF'], '.php');
    ?>
    <a href="./index.php" class="relative font-medium text-sm transition-colors duration-300 hover:text-sky-600 <?php echo $currentFileName === 'index' ? 'text-sky-600 underline decoration-blue-600 decoration-[3px] underline-offset-4' : 'text-gray-700'; ?>">Home</a>
    <a href="./about.php" class="relative font-medium text-sm transition-colors duration-300 hover:text-sky-600 <?php echo $currentFileName === 'about' ? 'text-sky-600 underline decoration-blue-600 decoration-[3px] underline-offset-4' : 'text-gray-700'; ?>">About</a>
    <a href="./Features.php" class="relative font-medium text-sm transition-colors duration-300 hover:text-sky-600 <?php echo $currentFileName === 'Features' ? 'text-sky-600 underline decoration-blue-600 decoration-[3px] underline-offset-4' : 'text-gray-700'; ?>">Features</a>
    <a href="./how-to-use.php" class="relative font-medium text-sm transition-colors duration-300 hover:text-sky-600 <?php echo $currentFileName === 'how-to-use' ? 'text-sky-600 underline decoration-blue-600 decoration-[3px] underline-offset-4' : 'text-gray-700'; ?>">How to Use</a>
    <a href="./data-sources.php" class="relative font-medium text-sm transition-colors duration-300 hover:text-sky-600 <?php echo $currentFileName === 'data-sources' ? 'text-sky-600 underline decoration-blue-600 decoration-[3px] underline-offset-4' : 'text-gray-700'; ?>">Data Sources</a>
    <a href="./case-studies.php" class="relative font-medium text-sm transition-colors duration-300 hover:text-sky-600 <?php echo $currentFileName === 'case-studies' ? 'text-sky-600 underline decoration-blue-600 decoration-[3px] underline-offset-4' : 'text-gray-700'; ?>">Case Studies</a>
    <a href="./contact.php" class="relative font-medium text-sm transition-colors duration-300 hover:text-sky-600 <?php echo $currentFileName === 'contact' ? 'text-sky-600 underline decoration-blue-600 decoration-[3px] underline-offset-4' : 'text-gray-700'; ?>">Contact</a>
</nav>