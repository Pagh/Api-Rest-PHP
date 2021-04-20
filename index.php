<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Api</title>
</head>
<body>
    <form action="student.php" method="GET">
        <input type="submit" value="get all students"><br>
        
        <label for="text_get">Get studenti</label>
        <select name="id">
            <option selected disabled hidden value="">Id studenti</option>
            <?php 
                include('./class/DBConnection.php');

                $db = new DBConnection;
                $db = $db->returnConnection();
                $sql = "SELECT id FROM student ORDER BY id ASC;";
                $stmt = $db->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

                foreach($result as $key) 
                {   
                    echo '<option value="' . $key['id'] . '">' . $key['id'] . '</option>';
                }   
            ?>
        </select>
        <input type="submit" value="get 1 row">
    </form> 
    <br><br>
    <form action="student.php" method="POST">
        <legend>Data insert form</legend>
        <label>Nome: </label>
        <input name="name" required><br>
        <label>Cognome: </label>
        <input name="surname" required><br>
        <label>Sidi code: </label>
        <input name="sidi_code" required><br>
        <label>Tax code: </label>
        <input name="tax_code" required><br>
        <input type="submit" value="Insert">
    </form>
</body>
</html>

<!-- curl --header "Content-Type: application/json" --request POST --data '{"_name":"Ciccio", "_surname":"Benve"}' http://localhost:8080  -->