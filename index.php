<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login Page</title>
  </head>
  <body>
    <?php
      $servername = "localhost";
      $username = "your_username";
      $password = "your_password";
      $database = "your_database_name";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $database);

      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      // Check if the form was submitted
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // SQL query to validate the user's credentials
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
          // Successful login
          echo "Login successful!";
        } else {
          // Failed login
          echo "Invalid username or password.";
        }
      }

      // Close the database connection
      $conn->close();
    ?>
    <form method="post">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username"><br><br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password"><br><br>
      <input type="submit" value="Login">
    </form>
  </body>
</html>
