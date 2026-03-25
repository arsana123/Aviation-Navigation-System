<?php
session_start();

function connectDB()
{
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "aviation_nav";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

$mode = isset($_GET['mode']) ? $_GET['mode'] : 'login';
$email = '';
$password = '';
$name = '';
$errorMsg = '';
$successMsg = '';

if (!isset($_SESSION['user_id']) && isset($_COOKIE['aviation_remember'])) {
    $token = $_COOKIE['aviation_remember'];

    $conn = connectDB();
    $stmt = $conn->prepare("SELECT user_id FROM remember_tokens WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row['user_id'];

        $stmt = $conn->prepare("SELECT id, name, email FROM users WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $user_result = $stmt->get_result();
        $user = $user_result->fetch_assoc();

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];

        header("Location: index.php");
        exit;
    }
    $conn->close();
}

if (isset($_SESSION['user_id']) && !isset($_GET['logout'])) {
    header("Location: index.php");
    exit;
}

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();

    if (isset($_COOKIE['aviation_remember'])) {
        $conn = connectDB();
        $token = $_COOKIE['aviation_remember'];
        $stmt = $conn->prepare("DELETE FROM remember_tokens WHERE token = ?");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $conn->close();

        setcookie('aviation_remember', '', time() - 3600, '/');
    }

    header("Location: Auth.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = connectDB();

    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $remember = isset($_POST['remember']) ? true : false;

    if ($mode === 'signup') {
        $name = isset($_POST['name']) ? trim($_POST['name']) : '';

       
        if (empty($name)) {
            $errorMsg = 'Please enter your name';
        } elseif (empty($email)) {
            $errorMsg = 'Please enter your email';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMsg = 'Please enter a valid email address';
        } elseif (empty($password)) {
            $errorMsg = 'Please enter a password';
        } elseif (strlen($password) < 8) {
            $errorMsg = 'Password must be at least 8 characters long';
        } else {
           
            $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $errorMsg = 'Email already registered. Please use a different email.';
            } else {
              
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                
                $stmt = $conn->prepare("INSERT INTO users (name, email, password, created_at) VALUES (?, ?, ?, NOW())");
                $stmt->bind_param("sss", $name, $email, $hashed_password);

                if ($stmt->execute()) {
                    
                    $user_id = $conn->insert_id;

                    
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['user_name'] = $name;
                    $_SESSION['user_email'] = $email;

                    
                    if ($remember) {
                        $token = bin2hex(random_bytes(32));

                       
                        setcookie('aviation_remember', $token, time() + (86400 * 30), '/');

                       
                        $stmt = $conn->prepare("INSERT INTO remember_tokens (user_id, token, expires_at) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 30 DAY))");
                        $stmt->bind_param("is", $user_id, $token);
                        $stmt->execute();
                    }

                   
                    header("Location: index.php");
                    exit;
                } else {
                    $errorMsg = 'Error creating account. Please try again.';
                }
            }
        }
    } else {
        if (empty($email)) {
            $errorMsg = 'Please enter your email';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMsg = 'Please enter a valid email address';
        } elseif (empty($password)) {
            $errorMsg = 'Please enter your password';
        } else {
            $stmt = $conn->prepare("SELECT id, name, email, password FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 0) {
                $errorMsg = 'Invalid email or password';
            } else {
                $user = $result->fetch_assoc();

                if (password_verify($password, $user['password'])) {
                   
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['name'];
                    $_SESSION['user_email'] = $user['email'];

                    if ($remember) {
                        $token = bin2hex(random_bytes(32));

                        setcookie('aviation_remember', $token, time() + (86400 * 30), '/');

                        $stmt = $conn->prepare("INSERT INTO remember_tokens (user_id, token, expires_at) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 30 DAY))");
                        $stmt->bind_param("is", $user['id'], $token);
                        $stmt->execute();
                    }

                    header("Location: index.php");
                    exit;
                } else {
                    $errorMsg = 'Invalid email or password';
                }
            }
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $mode === 'login' ? 'Login' : 'Sign Up'; ?> - AviationNav</title>
    <link rel="shortcut icon" href="./Assets/plane2.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-900 flex items-center justify-center min-h-screen p-4">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="text-center mb-8">
                <a href="index.php" class="inline-flex items-center mb-5">
                    <img src="./Assets/plane.png" alt="AviationNav Logo" class="w-8 h-8 mr-2">
                    <span class="text-xl font-semibold text-gray-900">AviationNav</span>
                </a>
                <h1 class="text-2xl font-bold mb-2"><?php echo $mode === 'login' ? 'Welcome back' : 'Create an account'; ?></h1>
                <p class="text-gray-500 text-sm"><?php echo $mode === 'login' ? 'Sign in to your account' : 'Sign up for free access'; ?></p>
            </div>

            <div class="flex mb-6 border-b border-gray-200">
                <a href="?mode=login" class="<?php echo $mode === 'login' ? 'border-b-2 border-sky-600 text-sky-600' : 'text-gray-500'; ?> flex-1 text-center py-2 px-4 font-medium text-sm hover:text-sky-600 transition-colors">Login</a>
                <a href="?mode=signup" class="<?php echo $mode === 'signup' ? 'border-b-2 border-sky-600 text-sky-600' : 'text-gray-500'; ?> flex-1 text-center py-2 px-4 font-medium text-sm hover:text-sky-600 transition-colors">Sign Up</a>
            </div>

            <?php if (!empty($errorMsg)): ?>
                <div class="bg-red-50 text-red-500 p-3 rounded-md mb-4 text-sm"><?php echo $errorMsg; ?></div>
            <?php endif; ?>

            <?php if (!empty($successMsg)): ?>
                <div class="bg-green-50 text-green-500 p-3 rounded-md mb-4 text-sm text-center"><?php echo $successMsg; ?></div>
            <?php endif; ?>

            <form method="post" action="?mode=<?php echo $mode; ?>">
                <?php if ($mode === 'signup'): ?>
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-900 mb-2">Name</label>
                        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" class="w-full px-3 py-2 border border-gray-300 rounded-md text-base focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition-colors" autofocus>
                    </div>
                <?php endif; ?>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-900 mb-2">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" class="w-full px-3 py-2 border border-gray-300 rounded-md text-base focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition-colors" <?php echo $mode === 'login' ? 'autofocus' : ''; ?>>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-900 mb-2">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-md text-base focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition-colors">
                    <?php if ($mode === 'signup'): ?>
                        <p class="text-gray-500 text-xs mt-1">Must be at least 8 characters long</p>
                    <?php endif; ?>
                </div>

                <?php if ($mode === 'login'): ?>
                    <div class="flex items-center mb-4">
                        <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-sky-600 focus:ring-sky-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-900">Remember me for 30 days</label>
                    </div>
                <?php endif; ?>

                <button type="submit" class="w-full bg-sky-600 text-white rounded-md py-2 px-4 text-base font-medium hover:bg-sky-700 transition-colors">
                    <?php echo $mode === 'login' ? 'Sign In' : 'Sign Up'; ?>
                </button>
            </form>

            <div class="text-center mt-6 text-sm text-gray-500">
                <?php if ($mode === 'login'): ?>
                    <p>Don't have an account? <a href="?mode=signup" class="text-sky-600 font-medium hover:underline">Sign up</a></p>
                    <p class="mt-2"><a href="index.php" class="text-gray-600 hover:text-sky-600">Back to home</a></p>
                <?php else: ?>
                    <p>Already have an account? <a href="?mode=login" class="text-sky-600 font-medium hover:underline">Sign in</a></p>
                    <p class="mt-2"><a href="index.php" class="text-gray-600 hover:text-sky-600">Back to home</a></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html>