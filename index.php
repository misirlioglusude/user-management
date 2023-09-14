<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biste Soft</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>List of Items</h2>
        <a class="btn btn-primary" href="create.php" role="button">New Item</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name Surname</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Position</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "my_list";

                // Create Connection
                $connection = new mysqli($servername, $username, $password, $database);
                // Check Connection
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }
                // Read all row from database table
                $sql = "SELECT * FROM clients";
                $result = $connection->query($sql);
                if (!$result) {
                    die ("Invalid query: " . $connection->error);
                }
                // Read data of each row
                while ($row = $result->fetch_assoc()) {
                    echo sprintf("
                    <tr>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>
                            <a class='btn btn-primary' href='../internship_HR/edit.php?id=%s'>Edit</a>
                            <a class='btn btn-danger' href='../internship_HR/delete.php?id=%s'>Delete</a>
                        </td>
                    </tr>", $row["ID"], $row["Name"], $row['Email'], $row['Phone'], $row['Position'], $row["ID"],  $row["ID"]);
                    /* echo "
                    <tr>" .
                    "<td>$row["ID"]</td>" .
                    "<td>$row['Name']</td>" .
                    "<td>$row['Email']</td>" .
                    "<td>$row['Phone']</td>" .
                    "<td>$row['Position']</td> ".
                    "<td>" .
                    "<a class='btn btn-primary' href='../internship_HR/edit.php?id='>Edit</a>" .
                    "<a class='btn btn-danger' href='../internship_HR/delete.php'>Delete</a>" .
                    "</td>" .
                "</tr>"; */
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>