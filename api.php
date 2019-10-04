
        <?php
        header('Content-Type: application/json');
        
        /**
         * connexion à la base de données
         */
        try {
            $connexion = new PDO('mysql:host=localhost;dbname= acuBD.sql ;charset=utf8','root','');
            $retour["success"] = true;
            $retour["message"] = "Connexion à la base de données réussie";
        }
        catch(Exception $ex) {
            $retour["success"] = false;
            $retour["message"] = "Erreur de connexion à la base de données";
        }
        
        $request = $connexion->prepare("SELECT * FROM symptome");
        $request->execute();
        
        $resultat = $request->fetchAll();
        
       // $retour["message"] = "khrthgyrj";
        $retour["patho"]["symptome"] = $resultat;
        
        echo json_encode($retour);
        
        ?>
