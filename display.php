<html>
    <head>
    <link rel="stylesheet" href="search.css">
    </head>
<body>
<header class="header">
          <h1 style="color: white; font-size:xx-large;">Abhyasika<span style="color: orangered;">HUB</span></h1>
        <ul class="main-nav">
          <li class="nav"><a class="nav-link" href="#" >Home</a></li>
          <li class="nav"><a class="nav-link" href="#contact-me">Contact </a></li>
        </ul>
      </header>

      <?php
// Establish a connection to the database
$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=1503");

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

// Check if searchAddress parameter is set
if (isset($_GET['searchAddress'])) {
    $searchAddress = $_GET['searchAddress'];

    // SQL query to search for Abhyasika by address
    $sql = "SELECT * FROM Abhyasika_Details WHERE address LIKE '%$searchAddress%'";

    // Execute the SQL query
    $result = pg_query($conn, $sql);

    if ($result) {
        if (pg_num_rows($result) > 0) {
            echo "<h2>Search Results</h2>";
            echo "<div class='container'>";
            echo "<table>";
            echo "<tr><th>Abhyasika Name</th><th>Owner's Name</th><th>Owner's ID</th><th>Phone Number</th><th>Established Date</th><th>Address</th><th>Number of Seats</th><th>Additional Facility</th></tr>";

            // Loop through each row of the result set
            while ($row = pg_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row['abhyasika_name']."</td>";
                echo "<td>".$row['abhyasika_owner_name']."</td>";
                echo "<td>".$row['abhyasika_owner_id']."</td>";
                echo "<td>".$row['phone_number']."</td>";
                echo "<td>".$row['established_date']."</td>";
                echo "<td>".$row['address']."</td>";
                echo "<td>".$row['number_of_seats']."</td>";
                echo "<td>".$row['additional_facility']."</td>";
                echo "</tr>";
            }

            echo "</table>";
            echo "</div>";
        } else {
            echo "No results found.";
        }
    } else {
        echo "Error: " . pg_last_error($conn);
    }

    // Close the database connection
    pg_close($conn);
}
?>


<footer class="footer" id="contact-me">
    <div class="grid--footer">
      <div class="logo-col">
        <!-- <a href="#" class="footer--link"> -->
          <h1 style="color: white; font-size:xx-large;">Abhyasika<span style="color: orangered;">HUB</span></h1>
        <!-- </a> -->
        <ul class="social-links">
          <li class="icon-list">
            <a
              class="footer-link"
              href="https://github.com/ashiishjn"
              target="_blank"
            >
              <ion-icon class="social-icon" name="logo-github"></ion-icon>
            </a>
          </li>
          <li class="icon-list">
            <a
              class="footer-link"
              href="https://instagram.com/aashishjn"
              target="_blank"
            >
              <ion-icon class="social-icon" name="logo-instagram"></ion-icon>
            </a>
          </li>
          <li class="icon-list">
            <a
              class="footer-link"
              href="https://twitter.com/aashiishjn"
              target="_blank"
            >
              <ion-icon class="social-icon" name="logo-twitter"></ion-icon>
            </a>
          </li>
          <li class="icon-list">
            <a
              class="footer-link"
              href="https://www.facebook.com/ashiishjn"
              target="_blank"
            >
              <ion-icon class="social-icon" name="logo-facebook"></ion-icon>
            </a>
          </li>
          <li class="icon-list">
            <a
              class="footer-link"
              href="mailto:viveksutar39984@gmail.com"
              target="_blank"
            >
              <ion-icon class="social-icon" name="mail-outline"></ion-icon>
            </a>
          </li>
        </ul>
      </div>
      <div class="adress-col">
        <p class="footer-heading">Contact us</p>
        <address class="contacts">
          <p class="address"><span>Lokmanya Tilak road, Pune</span> Maharashtra 411030</p>

          <p>
            <a class="footer-link" href="tel:917972879944">+91 9511221768</a>
          </p>
        </address>
      </div>
      <nav class="nav-col">
        
      </nav>
      <nav class="nav-col">
        <p class="footer-heading">Company</p>
        <ul class="footer-nav">
          <li><a class="footer-link" href="#">About AbhyasikaHub</a></li>
          <li><a class="footer-link" href="#">For Business</a></li>
          <li><a class="footer-link" href="#">Careers</a></li>
        </ul>
      </nav>
    </div>
  </footer>
</body>
</html>