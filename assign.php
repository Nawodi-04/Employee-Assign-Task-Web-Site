<html>

<head>
    <head>
        
         <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Activity</title>
        <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f0f0;
            background-image:url('blur-hotel-lobby.jpg');
            background-position: center;
            background-size: cover;
            min-height: 100vh;
            width: 100%;
    margin: 0;
    padding: 0;
}

.form-type {
    max-width: 500px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
}

label, select, input[type="date"], textarea {
    display: block;
    margin-bottom: 15px;
}

label {
    font-weight: bold;
}

select, input[type="date"], textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    display: block;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    padding: 10px 20px;
    margin-top: 10px;
}

button:hover {
    background-color: #0056b3;
}

a {
    display: block;
    text-align: center;
    text-decoration: none;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    padding: 10px 20px;
    margin-top: 10px;
}

a:hover {
    background-color: #0056b3;
}
</style>
    </head>

<body>
    <div class="form-type">
    <h1>Assign Activities</h1>
    <form align="center" action="assign1.php" method="POST" Required>
    <br>
    <form action="assign1.php" method="POST">
        <label for="eid">Eid</label>
        <select id="eid" name="eid" required>
            <?php
            $servername = 'localhost';
                $username = 'root';
                $password = '';
                $database = 'project';

                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $database);

                   // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
             $sql = "SELECT eid FROM employee";
                $result = $conn->query($sql);
                while ($t = $result->fetch_assoc()) {
                    echo "<option value='" . $t['eid'] . "'>" . $t['eid'] . "</option>";
                }
                ?>
            
        </select>

        <label for="tid">Tid</label>
        <select id="tid" name="tid" required>
            <?php
                $servername = 'localhost';
                $username = 'root';
                $password = '';
                $database = 'project';

                // Create connection
                $conn = new mysqli($servername, $username, $password, $database);

                   // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                $sql = "SELECT tid FROM task";
                $result = $conn->query($sql);
                while ($t = $result->fetch_assoc()) {
                    echo "<option value='" . $t['tid'] . "'>" . $t['tid'] . "</option>";
                }
                ?>
            
        </select>
        

        <label for="activityid">Activity Id</label>
        <select id="activityid" name="activityid" required>

                <?php
               $servername = 'localhost';
                $username = 'root';
                $password = '';
                $database = 'project';

                // Create connection
                $conn = new mysqli($servername, $username, $password, $database);

                   // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 
                $sql = "SELECT activityid FROM taskactivities";
                $result = $conn->query($sql);
                while ($t = $result->fetch_assoc()) {
                    echo "<option value='" . $t['activityid'] . "'>" . $t['activityid'] . "</option>";
                }
                ?>
            
            
        </select>
        

        <label for="date">Date Assign</label>
        <input type="date" name="date" required>

        <label for="remarks">Remarks</label>
        <textarea id="remarks" name="re"></textarea>


        <button type="submit">Submit</button>

        <br>
        <br>
     <a href="admin_page.php" target="_blank">Back</a>
    </form>
</div>
</body>
</html>