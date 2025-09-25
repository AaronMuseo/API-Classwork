<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// DB connection
$servername = "localhost";
$username   = "root";
$password   = "1738";
$dbname     = "API";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("DB Connection failed: " . $conn->connect_error);
}

$msg = "";

// Handle signup
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = trim($_POST['fullname']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // ✅ Check if email already exists
    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    if (!$check) {
        die("Prepare failed (check): " . $conn->error);
    }
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        // Email already exists
        $msg = "<div class='alert alert-danger'>Email already exists. Please use another one.</div>";
    } else {
        // Insert new user
        $stmt = $conn->prepare("INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)");
        if (!$stmt) {
            die("Prepare failed (insert): " . $conn->error);
        }
        $stmt->bind_param("sss", $fullname, $email, $hashed_password);

        if ($stmt->execute()) {
            // include the mailer
            require_once "Plugins/PHPMailer/mail.php";

            // send welcome email
            $subject = "Welcome to BBIT group E";
            $body    = "Hello $fullname,<br><br>Welcome to BBIT Group E! This is a new semester <b>Let's get started!</b>";

            $result = sendMail($email, $fullname, $subject, $body);

            if ($result === true) {
                $msg = "<div class='alert alert-success'>Signup successful! A welcome email has been sent. You can now <a href='signin.php'>login</a>.</div>";
            } else {
                $msg = "<div class='alert alert-warning'>Signup successful, but email failed: $result</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
        }
        $stmt->close();
    }
    $check->close();
}

require_once "Layouts/layouts.php";
$layout = new layouts();
$conf = ["site_name" => "My Website"];
?>

<?php $layout->header($conf); ?>
<?php $layout->navbar($conf); ?>
<?php $layout->banner($conf); ?>

<div class="container">
    <?php echo $msg; ?>
    <?php $layout->form_content($conf); ?>
</div>

<?php $layout->footer($conf); ?>
