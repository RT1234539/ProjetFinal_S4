
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




Tâches – Projet Mobile Money (PHP CodeIgniter 4 + SQLite)
Version 1 (Tag v1) – Livraison 13h
Setup technique
Initialiser le projet CodeIgniter 4 + SQLite embarqué (base.sql à la racine).
Créer Taches.md à la racine, y consigner qui fait quoi à chaque livraison.
Coller le lien du formulaire Google en haut du README.md / entête projet.
Intégrer Bootstrap (ou équivalent) + layout de base (navbar Opérateur / Client).
Base de données (base.sql)
Table prefixes (id, prefixe) — pour les préfixes de l'opérateur (ex: 033, 037).
Table type_operations (id, nom: dépôt/retrait/transfert).
Table bareme_frais (id, type_operation_id, montant_min, montant_max, frais) — modifiable.
Table clients (id, numero_tel unique, solde, date_creation).
Table operations (id, type_operation_id, client_source_id, client_dest_id, montant, frais, date).
Vue / requête situation_gain (somme des frais retrait + transfert).
Jeu de données de démo (préfixes 033/037, barème d'exemple fourni, quelques clients).
Côté Opérateur
CRUD Préfixes (033, 037…).
CRUD Types d'opérations (dépôt, retrait, transfert).
CRUD Barèmes de frais par tranche pour chaque type d'opération.
Page Situation gain via les frais (total retrait + total transfert, avec détail).
Page Situation des comptes clients (liste clients + solde, recherche par numéro).
Côté Client
Login automatique par numéro de téléphone (création auto du compte si préfixe valide, pas d'inscription préalable).
Rejet si le préfixe ne fait pas partie des préfixes opérateur.
Page Voir le solde.
Dépôt (automatique, sans validation opérateur) → maj solde + enregistrement opération.
Retrait (automatique) → calcul frais selon barème, contrôle solde suffisant.
Transfert vers un autre numéro du même opérateur → calcul frais, maj des 2 soldes.
Page Historique des opérations du client connecté (avec type, montant, frais, date).
Livraison
Commit final + tag Git v1 sur la branche main, dépôt public

///



Version 2 (Tag v2) – Livraison 17h10
Base de données – évolutions
Table operateurs_externes (id, nom, commission_pct) — % en plus pour transferts vers autres opérateurs.
Ajouter des préfixes de type "autre opérateur" (ex: 032, 031) dans prefixes (colonne operateur_externe_id nullable, ou table dédiée).
Migration/mise à jour de base.sql (garder un seul fichier à la racine).
Côté Opérateur
Config des préfixes autres opérateurs (ex: 032, 031) — CRUD.
Config du % de commission supplémentaire par opérateur externe pour les transferts sortants.
Refonte page Situation gain via les frais : séparer gains "opérateur interne" vs "autres opérateurs".
Nouvelle page Situation des montants à envoyer à chaque opérateur externe (total dû par opérateur, basé sur les transferts sortants).
Côté Client
Sur le transfert : option "inclure frais de retrait dans l'envoi" (le destinataire reçoit net des frais de retrait futurs).
⚠️ Désactiver / ignorer cette option pour transferts vers autres opérateurs (pas de frais de retrait applicables).
Détection auto : si le numéro destinataire a un préfixe "autre opérateur" → appliquer commission supplémentaire.
Envoi multiple vers plusieurs numéros en une seule opération : saisir une liste de numéros + montant global, divisé équitablement par numéro.
⚠️ Uniquement vers des numéros du même opérateur (interne).
Historique mis à jour (afficher le type: interne/externe, commission, option frais inclus).
Contrôles / UX
Validation stricte des préfixes destinataires (interne vs externe) avec message clair.
Recalcul et affichage du détail des frais avant confirmation (montant, frais barème, commission externe, total débité).
Livraison
Mettre à jour Taches.md avec les travaux V2.
Commit + tag Git v2 sur main.
Dis-moi quand tu veux que je passe à la Version 3 ou que je commence à coder une partie précise


Version 2:

    