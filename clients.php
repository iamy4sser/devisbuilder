<?php include('connection.php');
$sql = "SELECT * FROM client ";
$result = mysqli_query($conn,$sql);

if(isset($_GET['id'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_GET['id']);

    $sql = "DELETE FROM client WHERE id=$id";
    $result = mysqli_query($conn,$sql);
    if ($result){
        header("Location: clients.php");
    }else {
        header("Location: clients.php?error");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link href="css/style4.css" rel="stylesheet" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <title>Devis Builder</title>
</head>
<body>
    
    <div class="top">
        <div class="header">
            <h2>Devis Builder</h2>
            <nav class="navigation">
                <a href="home.php" class="navlinkhome">Home</a>
                <a href="cdevis.php" class="navlinkcreer">Créer un devis</a>
                <a href="gestiondevis.php" class="navlinkdevis">Gestion des devis</a>
                <a href="clients.php" class="navlinkclient">Gestion des clients</a>
                <a href="index.php"><button class="btn_logout">Logout</button></a>
            </nav>
        </div>
    </div>
    <div class="fullpg">
        <h1 style="margin-top : 35px;" class="text-center">Listes de clients</h1>
        <?php if (mysqli_num_rows($result)) { ?>
        <div style="margin-top : 30px; margin-bottom : 20px; width : 80%" class="container-fluid">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Code Postal</th>
                        <th>Ville</th>
                        <th>Pays</th>
                        <th>Telephone</th>
                        <th>Email</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                    $i = 0;
                    while($rows = mysqli_fetch_assoc($result)){
                        $i++; 
                    ?>
                    <tr>
                        <td><?=$rows['id']?></td>
                        <td><?php echo $rows['prenom']?></td>
                        <td><?php echo $rows['nom']?></td>
                        <td><?php echo $rows['adresse']?></td>
                        <td><?php echo $rows['codep']?></td>
                        <td><?php echo $rows['ville']?></td>
                        <td><?php echo $rows['pays']?></td>
                        <td><?php echo $rows['telephone']?></td>
                        <td><?php echo $rows['email'];?></td>
                        <td><a style="background: red; color: #fff;" class="btn" name="delete" href="?id=<?=$rows['id']?>">Supprimer</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php } ?>
        </div>
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script defer src="https://code.jquery.com/jquery-3.7.0.js" ></script>
    <script defer src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js" ></script>
    <script defer src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
</body>