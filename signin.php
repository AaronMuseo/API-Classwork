<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

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

// Handle login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, fullname, email, password FROM users WHERE email = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            // ✅ Login success: store session values
            $_SESSION['user_id']   = $row['id'];
            $_SESSION['fullname']  = $row['fullname'];
            $_SESSION['email']     = $row['email'];

            // Redirect to dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            $msg = "<div class='alert alert-danger'>Invalid password.</div>";
        }
    } else {
        $msg = "<div class='alert alert-danger'>No account found with that email.</div>";
    }

    $stmt->close();
}

require_once "Layouts/layouts.php";
$layout = new layouts();
$conf = ["site_name" => "My Website"];
?>

<?php $layout->header($conf); ?>
<?php $layout->navbar($conf); ?>

<div class="container">
    <?php echo $msg; ?>
    <?php $layout->form_content($conf); ?>
</div>

<?php $layout->footer($conf); ?>
