
cote operateur:
        prefix
            affichage:
                ajouter prefix
                input champ prefix

            metier:
                -verifier si exist deja
                -verification nombre de chiffre(3)
                -inserer 
            database:
                    prefixe

        frais
            affichage:
                input:
                    montant1
                    montant2
                    frais
                    type operation

                list frais
            metier:
                -verification toujours positif
                -inserer
            database:
                frais
        
        situation gain
            affichage:
                total montant et total frais par operation
                date
                gain total 

                
            
            metier:
                -somme de montant et frais par operation 
            database:
                frais 
                operation utilisateur
                operation
                
        list clients
            affichage:
                numero
                solde actuel
                nombre d operation par client
            
            metier:
                calcul solde
                lister client
                calculer nombre operation

            database
                utilisateur
                operation utilisateur



ajuter 
    -identifier l operateur correspondant(si 033 airtel,037 orang etc)


operation:
    database:type_operation(id,libelle)



cote client
    Login
        
        -affichage
            -connection sans inscription
            -redirection vers la page d acceuil
            -erreur de prefix si ne correspond pas au operateur
        -metier
            -verification prefix
            -verification 
            -verifier si le numero exist deja 
                si exist entrer automatique dans l'acceuil 
                    si nom inserer dans la table
        -database:
            table utilisateurs(id,numero)
            prefix
    acceuil
        -affichage:
            -afficher le solde d'utilisateur actuel connecter apres login 

            boutton pour faire 
                -le depot
                -rettrait
                -transfert
                -voir historique
            
    voir Solde:
            affichage:
                afficher solde
            metier
                afficher solde:
                    recuperer le solde a partir de la calcul de l'operation de chaque utilisateur
                    stocker dans le database view
            database:
                -table operation
                -v_solde

    faire un depot:
            metier:
                deposer:
                    inserer dans table operation_utilisateur montant positif
            
            affichage:

                form montant 

                -erreur montant toujours positif(validation js et controller)
            database:
                operation_utilisateur
                operation



    retrait:
            metier:
                    -recuperer le montant + frais
                    -verification solde par rapprot monttant + frais
                    -inserer dans table operation_utilisateur montant NEGATIF
                    
                    
                
            affichage:

                form montant 

                -erreur solde insuffisant
            database:
                operation_utilisateur
                operation
                frais
                v_solde
    transfert:
            metier:
            verifier si le prefix de numero exist
                expediteur
                    -recuperer le montant + frais 
                    -verification solde par rapprot monttant + frais
                    -inserer dans table operation_utilisateur montant NEGATIF
                
                destinataire:
                    -inserer dans table operation_utilisateur montant positif
            
            affichage:
                    -form :  champ numero
                            montant
                    -erreur solde insuffisant
                    -erreur prefix

            database:
                    operation_utilisateur
                    operation
                    frais
                    prefix
                    v_solde




git remote -v
git config --global user.name
git remote -v
git config --global credential.helper
git remote -v
git config --global user.name
git config --global user.email
git config --global credential.helper
cat ~/.git-credentials 2>/dev/null
ssh -T git@github.com
rm ~/.git-credentials



