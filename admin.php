<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "donation_project";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Start session
session_start();

// Check if the user is logged in and the username is correct
if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'gdscsies') {
    // Redirect to login page if not logged in or incorrect username
    header("Location: login.php");
    exit();
}

// Fetching all table names in the database
$tables_query = "SHOW TABLES";
$tables_result = mysqli_query($conn, $tables_query);

// Store table names in an array
$tables = array();
while ($row = mysqli_fetch_row($tables_result)) {
    $tables[] = $row[0];
}

// Function to sanitize input data
function sanitize($data) {
    global $conn;
    return mysqli_real_escape_string($conn, trim($data));
}

// Function to add a new record to the selected table
function addRecord($table, $data) {
    global $conn;
    $keys = implode(', ', array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";
    $query = "INSERT INTO $table ($keys) VALUES ($values)";
    return mysqli_query($conn, $query);
}

// Function to update a record in the selected table
function updateRecord($table, $data, $id) {
    global $conn;
    $set = '';
    foreach ($data as $key => $value) {
        $set .= "$key = '$value', ";
    }
    $set = rtrim($set, ', ');
    $query = "UPDATE $table SET $set WHERE id = $id";
    return mysqli_query($conn, $query);
}

// Function to delete a record from the selected table
function deleteRecord($table, $id) {
    global $conn;
    $query = "DELETE FROM $table WHERE id = $id";
    return mysqli_query($conn, $query);
}

if (isset($_POST['submit'])) {
    // Get the selected table name from the form
    $selected_table = sanitize($_POST['table']);

    // Fetching column names of the selected table
    $columns_query = "SHOW COLUMNS FROM $selected_table";
    $columns_result = mysqli_query($conn, $columns_query);

    // Store column names in an array
    $columns = array();
    while ($row = mysqli_fetch_assoc($columns_result)) {
        $columns[] = $row['Field'];
    }

    // Fetching data from the selected table
    $data_query = "SELECT * FROM $selected_table";
    $data_result = mysqli_query($conn, $data_query);
}

// Handle add record form submission
if (isset($_POST['add_record'])) {
    $table = sanitize($_POST['table']);
    $data = array();
    foreach ($columns as $column) {
        if ($column != 'id' && isset($_POST[$column])) {
            $data[$column] = sanitize($_POST[$column]);
        }
    }
    addRecord($table, $data);
}

// Handle edit record form submission
if (isset($_POST['edit_record'])) {
    $table = sanitize($_POST['table']);
    $id = sanitize($_POST['edit_id']);
    $data = array();
    foreach ($columns as $column) {
        if ($column != 'id' && isset($_POST[$column])) {
            $data[$column] = sanitize($_POST[$column]);
        }
    }
    updateRecord($table, $data, $id);
}

// Handle delete record action
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $table = sanitize($_GET['table']);
    $id = sanitize($_GET['id']);
    deleteRecord($table, $id);
    header("Location: {$_SERVER['PHP_SELF']}?table=$table");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .top {
            font-size: 28px;
            background-color: #e6e6e6;
            text-align: center;
            padding: 8px 0;
            margin-bottom: 20px;
            box-shadow: 0 -20px 15px -10px rgba(155, 155, 155, 0.3) inset,
                0 20px 15px -10px rgba(155, 155, 155, 0.3) inset,
                0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="top">
                    <i class="fa fa-dashboard fa-fw"></i> Admin Panel
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <form method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label">Select Table:</label>
                        <select class="form-control" name="table">
                            <?php foreach ($tables as $table) { ?>
                                <option value="<?php echo $table; ?>"><?php echo $table; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Select">
                    </div>
                </form>
            </div>
        </div>

        <?php if (isset($selected_table)) { ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Table: <?php echo $selected_table; ?></h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <?php foreach ($columns as $column) { ?>
                                                <th><?php echo $column; ?></th>
                                            <?php } ?>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_assoc($data_result)) { ?>
                                            <tr>
                                                <?php foreach ($row as $key => $value) { ?>
                                                    <td><?php echo $value; ?></td>
                                                <?php } ?>
                                                <td>
                                                    <a href="?table=<?php echo $selected_table; ?>&action=edit&id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                                                    <a href="?table=<?php echo $selected_table; ?>&action=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
            $edit_id = sanitize($_GET['id']);
            $edit_query = "SELECT * FROM $selected_table WHERE id = $edit_id";
            $edit_result = mysqli_query($conn, $edit_query);
            $edit_data = mysqli_fetch_assoc($edit_result);
            ?>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Record</h3>
                        </div>
                        <div class="panel-body">
                            <form method="post" class="form-horizontal">
                                <input type="hidden" name="table" value="<?php echo $selected_table; ?>">
                                <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>">
                                <?php foreach ($columns as $column) { ?>
                                    <div class="form-group">
                                        <label class="control-label"><?php echo $column; ?>:</label>
                                        <input type="text" class="form-control" name="<?php echo $column; ?>" value="<?php echo $edit_data[$column]; ?>" required>
                                    </div>
                                <?php } ?>
                                <div class="form-group">
                                    <input type="submit" name="edit_record" class="btn btn-primary" value="Update Record">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add New Record</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" class="form-horizontal">
                            <input type="hidden" name="table" value="<?php echo $selected_table; ?>">
                            <?php foreach ($columns as $column) { ?>
                                <?php if ($column != 'id') { ?>
                                    <div class="form-group">
                                        <label class="control-label"><?php echo $column; ?>:</label>
                                        <input type="text" class="form-control" name="<?php echo $column; ?>" required>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <div class="form-group">
                                <input type="submit" name="add_record" class="btn btn-primary" value="Add Record">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>
