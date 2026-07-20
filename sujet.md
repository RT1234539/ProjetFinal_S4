
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




Version 2:
    creer table operatuer_externe(id,nom,commission_pct,id_autre operateur) dediee autre operateur
    creer table autre_operateur(id,prefix,nom)



    -CRUD autre operateur
        aff:
            list
            inserer
            updater
            suprimer
        

        metier:
            -verifier si le prefix n exist pas encore
            -prefix a 3 chiffre
            -inserer ou updater
            -spprimer
            -etc
        database:
        operateur_externe
        autre operateur

    -transfert_externes
        aff:
            -select choix de autre operateur
            -input numero avec le prefixe de autre operateur
        

        metier:
            -verifier si autre operateur le prefix
            -calculer le montant a transefer(montant initial + frais + % commission)
            -

        database:
            -operation_utilisateur
            -operation
            -operatuer_externe


    -situation gain(ameliorer)
        -aff:
            gain operateur interne
            autre operateur(gain)
        
        -metier:
            grouper les gain interne et autre
        
        -database:
            operation_utilisateur
            operation
            autre operation 
            operation externe 
        
    -situation montant envoyer:
        aff:
            montant total par operateur (transfert sortant)


cote client:

        Transfert:
            aff:
                choix option de transfert inclure ou pas le frais de retrait
                input montant
                input numero
            metier
                -verifier si autre operateur ou interne le numero 
                si interne: 
                            -verifier si inclus ou pas
                            -sommer le montant + frais + frais de retrait de destinataire
                            -verifier si le solde insuffisant
                si non:desactiver et faire le transfert normal

            database:
                operateur_utilisateur
                operation 
                type operation
                etc
        Transfert Multiple:
            aff:
                choix de plusieurs ou multiplr numero interne
                input montant

            metier:
                verifier tous les numero si interne
                calculer la montant moyenne pour chaque numero
                inserer dans chaque numero le montant moyenne

