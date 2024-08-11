<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client List</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #2e2e2e;
            color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
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

        .btn-danger {
            background-color: #f44336;
            color: #ffffff;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c62828;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1.5rem;
        }

        table thead th {
            background-color: #333333;
            color: #ffffff;
            padding: 1rem;
            text-align: center;
        }

        table tbody td {
            padding: 1rem;
            text-align: center;
            border-bottom: 1px solid #444444;
        }

        table tbody tr:nth-child(even) {
            background-color: #2c2c2c;
        }

        table tbody tr:hover {
            background-color: #3c3c3c;
        }

        .btn-sm {
            font-size: 0.875rem;
            padding: 0.5rem 1rem;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>List of Clients</h2>
    <a class="btn btn-primary" href="Create.php" role="button">Add New Client</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Created at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $server_name = "localhost";
            $username = "root";
            $password = "";
            $database = "mycrud";

            $connection = mysqli_connect($server_name, $username, $password, $database);

            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM newcrud";
            $query = mysqli_query($connection, $sql);

            if (!$query) {
                die("Query failed: " . mysqli_error($connection));
            }

            while ($row = mysqli_fetch_assoc($query)) {
                echo "
                <tr>
                    <td>" . htmlspecialchars($row['ID']) . "</td>
                    <td>" . htmlspecialchars($row['Name']) . "</td>
                    <td>" . htmlspecialchars($row['Age']) . "</td>
                    <td>" . htmlspecialchars($row['Email']) . "</td>
                    <td>" . htmlspecialchars($row['Phone']) . "</td>
                    <td>" . htmlspecialchars($row['Address']) . "</td>
                    <td>" . htmlspecialchars($row['Created_at']) . "</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='Edit.php?ID=" . htmlspecialchars($row['ID']) . "'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='Delete.php?ID=" . htmlspecialchars($row['ID']) . "'>Delete</a>
                    </td>
                </tr>";
            }

            mysqli_close($connection);
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
