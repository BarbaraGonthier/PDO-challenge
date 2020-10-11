<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php

    require_once '_connec.php';

    $pdo = new \PDO(DSN, USER, PASS);

    $lastname = trim($_POST['lastname']);
    $limit = $_GET[‘limit’];
    $query = 'SELECT * FROM friend WHERE lastname=:lastname LIMIT :limit';
    $statement = $pdo->prepare($query);

    $statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);
    $statement->bindValue(':limit', $limit, \PDO::PARAM_INT);

    $statement->execute();

    $friends = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>
    
    <section id="friends-list">
        <?php foreach($friends as $friend) { ?>
        <div> <?php echo $friend['firstname'] . ' ' . $friend['lastname']; ?> </div>
        <?php } ?>
    </section>

    <form method="post" action="">
        <label for="firstname">Firstame :</label>
        <input type="text" value="firstname" name="firstname">
        <label for="lastname">Lastname :</label>
        <input type="text" value="lastname" name="lastname">
        <button type="submit">submit</button>
    </form>

</body>
</html>
