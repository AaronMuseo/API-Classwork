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

    // Hardcoded admin credentials
    if ($email === "admin@bbit.com" && $password === "admin123") {
        $_SESSION['is_admin'] = true;
        $_SESSION['user'] = "Admin";
        header("Location: admin_dashboard.php");
        exit;
    }

    // Check in users table for normal users
    $stmt = $conn->prepare("SELECT fullname FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($fullname);
        $stmt->fetch();
        $_SESSION['is_admin'] = false;
        $_SESSION['user'] = $fullname;
        header("Location: dashboard.php");
        exit;
    } else {
        $msg = "<div class='alert alert-danger'>Invalid email or password.</div>";
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
    <div class="row align-items-md-stretch">
        <div class="col-md-6 mx-auto">
            <div class="h-100 p-5 text-bg-dark rounded-3">
                <h2 class="mb-3">Login</h2>
                <form action="admin.php" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-danger w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $layout->footer($conf); ?>
