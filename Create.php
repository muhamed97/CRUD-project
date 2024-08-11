<?php 

$server_name = "localhost";
$username = "root";
$password = "";
$database = "mycrud";

$connection = mysqli_connect($server_name, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$Name = $Email = $Address = $Age = $Phone = "";
$errors = array('Name' => '', 'Email' => '', 'Address' => '', 'Age' => '', 'Phone' => '');

if (isset($_POST['submit'])) {

    if (empty($_POST['Name'])) {
        $errors['Name'] = "Please enter your Name";
    } else {
        $Name = $_POST['Name'];
    }

    if (empty($_POST['Email'])) {
        $errors['Email'] = "Please enter your Email";
    } else {
        $Email = $_POST['Email'];
    }

    if (empty($_POST['Address'])) {
        $errors['Address'] = "Please enter your Address";
    } else {
        $Address = $_POST['Address'];
    }

    if (empty($_POST['Age'])) {
        $errors['Age'] = "Please enter your Age";
    } else {
        $Age = $_POST['Age'];
    }

    if (empty($_POST['Phone'])) {
        $errors['Phone'] = "Please enter your Phone";
    } else {
        $Phone = $_POST['Phone'];
    }

    if (!array_filter($errors)) {
        $sql = "INSERT INTO newcrud (Name, Email, Phone, Address, Age) VALUES ('$Name', '$Email', '$Phone', '$Address', '$Age')";
        $query = mysqli_query($connection, $sql);

        if (!$query) {
            die("Query failed: " . mysqli_error($connection));
        } else {
            header("Location: Index.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Client</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #2e2e2e;
            color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: #1e1e1e;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        h2 {
            color: #4caf50;
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-label {
            color: #f4f4f4;
        }

        .btn {
            display: inline-block;
            padding: 0.75rem 1.25rem;
            margin: 0.5rem 0;
            font-size: 1rem;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-primary {
            background-color: #4caf50;
            color: #ffffff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #388e3c;
        }

        .btn-outline-secondary {
            border: 1px solid #ffffff;
            color: #ffffff;
        }

        .btn-outline-secondary:hover {
            background-color: #ffffff;
            color: #2e2e2e;
        }

        .error {
            color: #f44336;
            font-size: 80%;
        }

        .form-control {
            background-color: #2c2c2c;
            color: #f4f4f4;
            border: 1px solid #444444;
            border-radius: 5px;
            padding: 0.75rem;
            width: 100%;
        }

        .form-control:focus {
            border-color: #4caf50;
            box-shadow: 0 0 0 0.2rem rgba(76, 175, 80, 0.25);
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Add New Client</h2>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="Name" class="form-control" value="<?php echo htmlspecialchars($Name); ?>">
            <span class="error"><?php echo $errors['Name']; ?></span>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="Email" class="form-control" value="<?php echo htmlspecialchars($Email); ?>">
            <span class="error"><?php echo $errors['Email']; ?></span>
        </div>
        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" name="Address" class="form-control" value="<?php echo htmlspecialchars($Address); ?>">
            <span class="error"><?php echo $errors['Address']; ?></span>
        </div>
        <div class="mb-3">
            <label class="form-label">Age</label>
            <input type="number" name="Age" class="form-control" value="<?php echo htmlspecialchars($Age); ?>">
            <span class="error"><?php echo $errors['Age']; ?></span>
        </div>
        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="tel" name="Phone" class="form-control" value="<?php echo htmlspecialchars($Phone); ?>">
            <span class="error"><?php echo $errors['Phone']; ?></span>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a href="Index.php" class="btn btn-outline-secondary">Cancel</a>
    </form>
</div>

</body>
</html>
