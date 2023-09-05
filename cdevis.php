<?php require_once('connection.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link href="css/style3.css" rel="stylesheet" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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

    <form action="" method="post" enctype="multipart/form-data">
    <div style="width: 100%;" class="midle">
        <div style="width: 90%; margin-left: 5%;">
            <div style="width: 100%; align-items: center; display: flex; justify-content: space-between; border-bottom: 2px gray solid;" class="btns_devis">
                <h2 style="margin: 30px 0 20px 0; color: gray;">NOUVEAU DEVIS</h2>
                <nav class="a3btn">
                    <button name="nv_devis" style="background: #3abaff; border-radius: 4px; padding: 7px 13px 7px 13px; height: 50px; margin-right: 6px; color: #fff; font-weight: 700;"><i style="margin-right: 12px; font-size: 1rem; font-weight: 600; color: #fff;" class='bx bx-check'></i>Enregistrer</button>
                    <button href="cdevis.php" type="submit" style="background: transparent; border-radius: 4px; padding: 7px 10px 7px 10px; height: 50px;">Annuler</button>
                </nav>
            </div>
            <div style="width: 45%;">
                <div style="margin-top: 30px; border-right: 1px solid black;" class="devclient">
                    <div style="display: grid;" class="dev1">
                        <label style="font-weight: 500;" for="#">Date d'émission :</label>
                        <input name="txtDate" style="width: 200px; padding: 7px; margin: 8px 0 12px 0;" type="date">
                    </div>
                    <div>
                        <label for="">Ajouter votre logo :</label>
                        <div style="margin: 10px 0 15px 0;">
                            <input type="file" name="elogo" value="choisir une image"/>
                        </div>
                    </div>
                    <div style="border: 1px solid black; width: 80%; padding: 20px; margin-top: 30px;" class="infosoc">
                        <h4 style="text-align: center;">Informations sur l'entreprise</h4>
                        
                            <div style="margin-top: 25px;" class="group">
                                 <label>Nom</label>
                                 <input type="text" name="enom" class="" >
                            </div>
                            <div style="margin-top: 20px;" class="bar">
                                <label>Adresse</label>
                                <input style="width: 410px;" type="text" name="eadresse" class="" >
                            </div>
                            <div style="display: flex;">
                                <div style="margin-top: 20px;" class="bar">
                                    <label>Code Postal</label>
                                    <input type="text" name="ecodep" class="" >
                                </div>
                                <div style="margin-top: 20px;" class="bar">
                                    <label class="ville">Ville</label>
                                    <input style="margin-left: 10px;" type="text"  name="eville" class="villei" >
                                </div>
                            </div>
                            <div style="margin-top: 20px;" class="bar">
                                <label>Pays</label>
                                <input type="text" name="epays" class="" >
                            </div>
                            <div style="margin-top: 20px;" class="bar">
                                <label>Telephone</label>
                                <input type="tel" name="etele" class="" >
                            </div>
                            <div style="margin-top: 20px;" class="bar">
                                <label>Email</label>
                                <input type="text" name="eemail" class="" >
                            </div>
                            <div style="margin-top: 20px;" class="bar">
                                <label>SIRET</label>
                                <input type="text" name="siret" class="" >
                            </div>
                    </div>
                </div>
            </div>
            <div style="margin-left: 50%; margin-top: -628px;width: 40%; border: 1px solid black; border-radius: 0.2em; padding: 12px 0 30px 20px; height: cover;">
            
                <div>
                    <h3 style="text-align: center; font-weight: 600;">Informations sur le client</h3>
                    <div style="margin: 25px 34px 0" autocomplete="off">
                        <div style="display: flex;">
                            <div style="margin-top: 25px;" class="bar">
                                 <label>Prenom</label>
                                 <input type="text" class="" name="prenom" >
                            </div>
                            <div style="margin-top: 25px;" class="bar">
                                 <label class="ville">Nom</label>
                                 <input style="margin-left: 10px;" type="text"  class="villei" name="nom" >
                            </div>
                        </div>
                        <div style="margin-top: 25px;" class="bar">
                             <label>Adresse</label>
                             <input style="width: 410px;" type="text" class="" name="adress" >
                        </div>
                        <div style="display: flex;">
                            <div style="margin-top: 25px;" class="bar">
                                 <label>Code Postal</label>
                                 <input type="text" class="" name="codep" >
                            </div>
                            <div style="margin-top: 25px;" class="bar">
                                 <label class="ville">Ville</label>
                                 <input style="margin-left: 10px;" type="text"  class="villei" name="ville" >
                            </div>
                        </div>
                        <div style="margin-top: 25px;" class="bar">
                             <label>Pays</label>
                             <input type="text" class="" name="pays" >
                        </div>
                        <div style="margin-top: 25px;" class="bar">
                             <label>Telephone</label>
                             <input type="tel" class="" name="tele" >
                        </div>
                        <div style="margin-top: 25px;" class="bar">
                         <label>Email</label>
                         <input style="width: 410px;" type="text" class="" name="email" >
                        </div>
                    </div>
                </div>
            </div>


            <!-- periode -->
            <div style="display: grid; margin-left: 50%; margin-top: 20px; margin-bottom: 15px" class="">
                <label style="font-weight: 500;" for="#">Periode :</label>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="nuitSemaine">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Nuit semaine</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="samedi">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Samedi</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="nuitSamedi">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Nuit Samedi</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="dimancheetferies">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Dimanche et jours fériés</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="nuitDimanche">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Nuit Dimanche</label>
                </div>
            </div>


            <!-- tableau -->
            <table style="margin-top: 40px" class="table" id="tableau">
                <thead>
                    <tr>
                        <th scope="col">Description</th>
                        <th scope="col">Tâches et Actions</th>
                        <th scope="col">Profil</th>
                        <th scope="col">Date de debut</th>
                        <th scope="col">Date de fin</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <td><input style="padding: 5px; border: none; width: 100%" type="text" name="tbdescription[]" id=""></td>
                        <td><input style="padding: 5px; border: none; width: 100%" type="text" name="tbtache[]" id=""></td>
                        <td><select name="profil[]" style="padding: 5px; width: 100%" class="form-select" aria-label="Default select example">
                                <option disabled selected>Choisissez le profil souhaité</option>
                                <option name="2000">Pilote d`exploitation</option>
                                <option name="3200">Ingenieur systeme</option>
                                <option name="2466">stockage et sauvegarde</option>
                                <option name="2234">Administrateur SGBD</option>
                                <option name="4432">Ingenieur d`application</option>
                                <option name="3243">Ingenieur reseau</option>
                                <option name="4555">Chef de projet senior</option>
                                <option name="7645">Consultant senior systeme</option>
                                <option name="2345">Consultant senior base de donnees</option>
                                <option name="3432">Consultant senior reseaux/securite</option>
                                <option name="2352">Consultant senior San/Backup</option>
                                <option name="9666">Consultant senior virtualisation</option>
                            </select></td>
                        <td><input style="padding: 5px" type="date" name="tbdated[]" id=""></td>
                        <td><input style="padding: 5px" type="date" name="tbdatef[]" id=""></td>
                    </tr>
                </tbody>
            </table>
            <div class="btn_ajtligne">
                <button style="margin-top: 15px; padding: 5px; background: #6cacff; border-radius: 0.2rem; color: #fff; border: 1px solid black" id="ajouterLigne" class="ajouterLigne"><i style="color: #fff; padding-right: 5px" class='bx bx-plus-medical'></i>Ajouter une ligne</button>
            </div>
        </div>

        <?php
        if(isset($_POST['nv_devis']))
        {
            $dateem=$_POST['txtDate'];
            $image=$_FILES['elogo']['tmp_name'];
            $traget="img/".$_FILES['elogo']['name'];
            move_uploaded_file($image,$traget);
            $enom=$_POST['enom'];
            $eadresse=$_POST['eadresse'];
            $ecodep=$_POST['ecodep'];
            $eville=$_POST['eville'];
            $epays=$_POST['epays'];
            $etele=$_POST['etele'];
            $eemail=$_POST['eemail'];
            $siret=$_POST['siret'];


            $reqAdd="INSERT INTO nv_devis(dateemi,logo,enom,eadress,ecodep,eville,epays,eteleph,eemail,siret) VALUES ('$dateem','$traget','$enom','$eadresse','$ecodep','$eville','$epays','$etele','$eemail','$siret')";
            $result=mysqli_query($conn,$reqAdd);
            if($result)
            {
                echo "";
            } else
            {
                echo '<script>
                alert("Echec d\'insertion de données")
            </script>';
            }
        }
        ?>
        
        



    </div>


    <?php
    if(isset($_POST['nv_devis'])){
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $adress = $_POST['adress'];
        $codep = $_POST['codep'];
        $ville = $_POST['ville'];
        $pays = $_POST['pays'];
        $tele = $_POST['tele'];
        $email = $_POST['email'];


        $sql = "INSERT INTO client(prenom, nom, adresse, codep, ville, pays, telephone, email) VALUES ('$prenom','$nom','$adress','$codep','$ville','$pays','$tele','$email')";
        $result=mysqli_query($conn,$sql);
            if($result)
            {
                echo "";
            } else
            {
                echo '<script>
                alert("Echec d\'insertion de données")
            </script>';
            }
    }
    ?>

    <!-- period -->
    <?php
    if(isset($_POST['nv_devis'])){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $nuitSemaine = isset($_POST['nuitSemaine']) ? 1 : 0;
        $samedi = isset($_POST['samedi']) ? 1 : 0; 
        $nuitSamedi = isset($_POST['nuitSamedi']) ? 1 : 0;
        $dimancheetferies = isset($_POST['dimancheetferies']) ? 1 : 0;
        $nuitDimanche = isset($_POST['nuitDimanche']) ? 1 : 0;
        
        
        $sql = "INSERT INTO periodes (`nuitSemaine`, `samedi`, `nuitSamedi`, `dimancheetferies`, `nuitDimanche`) VALUES ('$nuitSemaine', '$samedi', '$nuitSamedi', '$dimancheetferies', '$nuitDimanche')";
        $req = "UPDATE periodes
        SET coeff = CASE
            WHEN nuitSemaine = 1 THEN 1.5
            WHEN samedi = 1 THEN 1.25
            WHEN nuitSamedi = 1 THEN 1.75
            WHEN dimancheetferies = 1 THEN 2
            WHEN nuitDimanche = 1 THEN 2
            ELSE 1
        END";
        
        if ($conn->query($sql) === true) {
            echo "";
        } else {
            echo "Erreur lors de l'insertion des données : " . $conn->error;
        }
        if ($conn->query($req) === true) {
            echo "";
        } else {
            echo "Erreur lors de l'insertion des données : " . $conn->error;
        }
    }
    }
    ?>

    <!-- tableau -->
    <?php
    if(isset($_POST['nv_devis'])){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            for($i=0;$i<count($_POST['tbdescription']);$i++){

                $tbdescription = $_POST['tbdescription'][$i];
                $tbtache = $_POST['tbtache'][$i];
                $selectedProfil = $_POST['profil'][$i];
                $tbdated = $_POST['tbdated'][$i];
                $tbdatef = $_POST['tbdatef'][$i];

                if($tbdescription!=='' && $tbtache!=='' && $selectedProfil!=='' && $tbdated!=='' && $tbdatef!==''){
                    $sql = "INSERT INTO tableau (`description`, `tache`, `profil`, `datedebut`, `datefin`) VALUES ('$tbdescription', '$tbtache', '$selectedProfil', '$tbdated', '$tbdatef')";
                    $req = "UPDATE tableau
                    SET taux = CASE
                        WHEN profil = 'Pilote d`exploitation' THEN 2000
                        WHEN profil = 'Ingenieur systeme' THEN 3200
                        WHEN profil = 'stockage et sauvegarde' THEN 2466
                        WHEN profil = 'Administrateur SGBD' THEN 2234
                        WHEN profil = 'Ingenieur d`application' THEN 4432
                        WHEN profil = 'Ingenieur reseau' THEN 3243
                        WHEN profil = 'Chef de projet senior' THEN 4555
                        WHEN profil = 'Consultant senior systeme' THEN 7645
                        WHEN profil = 'Consultant senior base de donnees' THEN 2345
                        WHEN profil = 'Consultant senior reseaux/securite' THEN 3432
                        WHEN profil = 'Consultant senior San/Backup' THEN 2352
                        WHEN profil = 'Consultant senior virtualisation' THEN 9666
                    END";
                    $req2 = "UPDATE tableau
                    SET day_difference = DATEDIFF(datefin, datedebut) ";


                    if ($conn->query($sql) === TRUE) {
                        echo "";
                    } else {
                    echo "Erreur : " . $sql . "<br>" . $conn->error;
                    }
                    if ($conn->query($req) === TRUE) {
                        echo "";
                    } else {
                    echo "Erreur : " . $req . "<br>" . $conn->error;
                    }
                    if ($conn->query($req2) === TRUE) {
                        echo "";
                    } else {
                    echo "Erreur : " . $req2 . "<br>" . $conn->error;
                    }
                }
            }
        }
        // hnaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $owner = $_POST['enom'];
            for($i=0;$i<count($_POST['tbtache']);$i++){
        
                $iaction = $_POST['tbtache'][$i];
        
                if($iaction!==''){
                    $sql = "INSERT INTO listdevis (`datecreation`,`iaction`,`owner`) VALUES (NOW(),'$iaction','$owner')";
        
        
                    if ($conn->query($sql) === TRUE) {
                        echo "";
                    } else {
                    echo "Erreur : " . $sql . "<br>" . $conn->error;
                    }
                }
            }
        }
    }
    ?>


    </form>

    <script src="js/script.js"></script>
</body>
</html>

