<div class="bg-white rounded-lg shadow-lg p-8">
    <h2 class="text-2xl font-semibold mb-6">For Any Enquires... 🎧</h2>
    <form method="POST" class="mt-4 space-y-4">
        <input type="text" name="name" placeholder="Full Name" class="w-full px-4 py-2 border rounded-md" required>
        <input type="email" name="email" placeholder="Email Address" class="w-full px-4 py-2 border rounded-md" required>
        <input type="text" name="subject" placeholder="Subject" class="w-full px-4 py-2 border rounded-md" required>
        <textarea name="message" placeholder="Message" class="w-full px-4 py-2 border rounded-md" rows="5" required></textarea>
        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">Send Message</button>
    </form>
</div>

<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $to = "anandkr1704@gmail.com";
            $from = $email;
            $headers = "From: $from\r\n";
            $headers .= "Reply-To: $email\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

            $emailBody = "You have received a new message from $name.\n\n";
            $emailBody .= "Message: $message\n\n";

            if (mail($to, $subject, $emailBody, $headers)) {
                echo "<p class='text-green-500'>Message sent successfully!</p>";
            } else {
                echo "<p class='text-red-500'>Failed to send the message. Please try again later.</p>";
            }
        } else {
            echo "<p class='text-red-500'>Invalid email address.</p>";
        }
    } else {
        echo "<p class='text-red-500'>All fields are required.</p>";
    }
}

?>