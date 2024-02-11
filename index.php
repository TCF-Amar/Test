<?php
$hostname = "localhost"; 
$username = "root";     
$password = "amarjeet";  
$database = "amarjeet";  
$connect = mysqli_connect($hostname, $username, $password, $database);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $contact = $_POST['contact_no'];

    $name = mysqli_real_escape_string($connect, $name);
    $contact = mysqli_real_escape_string($connect, $contact);

    $sql = "INSERT INTO amar (name, conact) VALUES ('$name', '$contact')";

    if (mysqli_query($connect, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }
}

mysqli_close($connect);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="p-10">
    <form action="./test.php" class="max-w-md mx-auto">
        <label for="name" class="block">Name</label>
        <input type="text" id="name" name="name" class="w-full border rounded px-3 py-2 mb-4">

        <label for="contact_no" class="block">Contact No.</label>
        <input type="tel" id="contact_no" name="contact_no" class="w-full border rounded px-3 py-2 mb-4">

        <button type="submit"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
    </form>
</body>

</html>