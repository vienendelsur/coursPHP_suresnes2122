<?php
            $resultat = $pdoENT->query( " SELECT * FROM employes ORDER BY id_employes ASC " );

            echo '<table class="table table-dark table-striped">';
            // la ligne des en-têtes :
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Nom</th>';
            echo '<th>Prénom</th>';
            echo '<th>Sexe</th>';
            echo '<th>Service</th>';
            echo '<th>Date d\'entrée</th>';
            echo '<th>Salaire</th>';
            echo '</tr>';
            // les lignes du tableau

            //            1ère version une ligne par colonnes 

            //            while($employe = $resultat->fetch(PDO::FETCH_ASSOC)) {
            //                 echo '<tr>';
            //                    echo '<td>' . $employe['id_employes'] . ' </td>';
            //                    echo '<td>' . $employe['prenom'] . ' ' . $employe['nom'] . ' </td>';
            //                    echo '<td>' . $employe['sexe'] . ' </td>';
            //                    echo '<td>' . $employe['service'] . ' </td>';
            //                    echo '<td>' . $employe['date_embauche'] . ' </td>';
            //                    echo '<td>' . $employe['salaire'] . ' €</td>';
            //                 echo '</tr>';
            //            }

            //            seconde version foreach 

            while ( $employe = $resultat->fetch( PDO::FETCH_ASSOC ) ) { // la boucle while avec le fetch permet de parcourir l'objet avec $resultat? ON crée un tableau associatif $employe à chaque tour de boucle
                echo '<tr>';
                //                    debug($employe);
                foreach ( $employe as $infos ) { //$employe étant un tableau on peut le parcourir avec une foreach. La variable $infos prend les valeurs successivement à chaque tour de boucle
                    echo '<td>' . $infos . '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';
            ?>