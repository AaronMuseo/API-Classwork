<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Ensure only admin can access
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: admin.php");
    exit;
}

// DB connection
$servername = "localhost";
$username   = "root";
$password   = "1738";
$dbname     = "API";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("DB Connection failed: " . $conn->connect_error);
}

// Fetch users
$result = $conn->query("SELECT id, fullname, email FROM users");

require_once "Layouts/layouts.php";
$layout = new layouts();
$conf = ["site_name" => "My Website"];
?>

<?php $layout->header($conf); ?>
<?php $layout->navbar($conf); ?>

<div class="container">
    <h2 class="my-4">Admin Dashboard</h2>
    <div class="card shadow-sm p-4">
        <h4>Registered Users</h4>
        <table class="table table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['fullname']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $layout->footer($conf); ?>
