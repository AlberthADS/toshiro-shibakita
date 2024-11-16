<html>

<head>
<title>Exemplo PHP V2</title>
</head>
<body>

<?php
$servername = "54.234.128.60";
$username = "root";
$password = "Senha123";
$database = "meubanco";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assign variables
$company = "YourCompany";
$cnpj = "12345678901234";
$state = "SP";
$product = "YourProduct";
$value = 100.00;
$dueDate = "2024-12-31";
$date = "2024-11-15";
$host = gethostname(); // Get the hostname of the server

// Insert SQL statement
$insert_sql = "INSERT INTO dados (company, cnpj, state, product, value, dueDate, date, host) 
               VALUES ('$company', '$cnpj', '$state', '$product', $value, '$dueDate', '$date', '$host')";

if ($conn->query($insert_sql) === TRUE) {
    echo "New record created successfully.<br>";
} else {
    echo "Error: " . $insert_sql . "<br>" . $conn->error;
}

// Query to retrieve all records
$query_sql = "SELECT * FROM dados";
$result = $conn->query($query_sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Company</th>
                <th>CNPJ</th>
                <th>State</th>
                <th>Product</th>
                <th>Value</th>
                <th>Due Date</th>
                <th>Date</th>
                <th>Host</th>
            </tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["company"]."</td>
                <td>".$row["cnpj"]."</td>
                <td>".$row["state"]."</td>
                <td>".$row["product"]."</td>
                <td>".$row["value"]."</td>
                <td>".$row["dueDate"]."</td>
                <td>".$row["date"]."</td>
                <td>".$row["host"]."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
</body>
</html>
