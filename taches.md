# To-Do List – Projet Mobile Money

---

#  Côté Opérateur

##  Gestion des préfixes

### Affichage

* [ ] Créer la page de gestion des préfixes.
* [ ] Ajouter un formulaire :

* [ ] Champ *Préfixe* (3 chiffres).
* [ ] Afficher la liste des préfixes existants.

### Métier

* [ ] Vérifier que le préfixe n'existe pas déjà.
* [ ] Vérifier que le préfixe contient exactement *3 chiffres*.
* [ ] Insérer le préfixe.

### Base de données

* [ ] Créer la table *prefix*.

---

##  Gestion des frais

### Affichage

* [ ] Créer le formulaire.
* [ ] Ajouter les champs :

  * [ ] Montant minimum.
  * [ ] Montant maximum.
  * [ ] Frais.
  * [ ] Type d'opération.
* [ ] Afficher la liste des frais.

### Métier

* [ ] Vérifier que les montants et les frais sont toujours positifs.
* [ ] Enregistrer les frais.

### Base de données

* [ ] Créer la table *frais*.

---

## Situation des gains

### Affichage

* [ ] Afficher :

  * [ ] Total des montants par opération.
  * [ ] Total des frais par opération.
  * [ ] Date.
  * [ ] Gain total.

### Métier

* [ ] Calculer la somme des montants par type d'opération.
* [ ] Calculer la somme des frais.
* [ ] Calculer le gain total.

### Base de données

* [ ] Utiliser :

  * [ ] frais
  * [ ] operation_utilisateur
  * [ ] operation

---

##  Liste des clients

### Affichage

* [ ] Afficher :

  * [ ] Numéro.
  * [ ] Solde actuel.
  * [ ] Nombre d'opérations.

### Métier

* [ ] Calculer le solde de chaque client.
* [ ] Lister tous les clients.
* [ ] Calculer le nombre d'opérations par client.

### Base de données

* [ ] utilisateur
* [ ] operation_utilisateur

---

##  Gestion des opérateurs

### Métier

* [ ] Associer automatiquement un numéro à son opérateur selon le préfixe.
* [ ] Exemple :

  * [ ] 032 → Telma
  * [ ] 033 → Airtel
  * [ ] 034 → Yas
  * [ ] 037 → Orange
  * [ ] 038 → Telma

---

##  Type d'opération

### Base de données

* [ ] Créer la table *type_operation*

  * [ ] id
  * [ ] libelle

---

#  Côté Client

##  Login

### Affichage

* [ ] Page de connexion sans inscription.
* [ ] Redirection automatique vers l'accueil après connexion.
* [ ] Afficher une erreur si le préfixe est invalide.

### Métier

* [ ] Vérifier que le préfixe existe.
* [ ] Vérifier que le numéro est valide.
* [ ] Vérifier si le numéro existe déjà.
* [ ] Si le numéro existe :

  * [ ] Connexion automatique.
* [ ] Sinon :

  * [ ] Créer l'utilisateur.
  * [ ] Enregistrer le numéro.

### Base de données

* [ ] utilisateur(id, numero)
* [ ] prefix

---

##  Accueil

### Affichage

* [ ] Afficher le solde actuel.
* [ ] Ajouter les boutons :

  * [ ] Dépôt.
  * [ ] Retrait.
  * [ ] Transfert.
  * [ ] Historique.

---

##  Voir le solde

### Affichage

* [ ] Afficher le solde actuel.

### Métier

* [ ] Calculer le solde à partir des opérations.
* [ ] Utiliser une vue SQL pour récupérer rapidement le solde.

### Base de données

* [ ] operation_utilisateur
* [ ] v_solde

---

##  Dépôt

### Affichage

* [ ] Formulaire :

  * [ ] Champ montant.
* [ ] Validation JavaScript.
* [ ] Afficher une erreur si le montant est négatif ou nul.

### Métier

* [ ] Vérifier que le montant est positif.
* [ ] Insérer une opération avec un montant positif.

### Base de données

* [ ] operation_utilisateur
* [ ] operation

---

##  Retrait

### Affichage

* [ ] Formulaire :

  * [ ] Champ montant.
* [ ] Afficher une erreur en cas de solde insuffisant.

### Métier

* [ ] Récupérer les frais applicables.
* [ ] Calculer :

  * [ ] montant + frais.
* [ ] Vérifier que le solde est suffisant.
* [ ] Enregistrer une opération avec un montant négatif.

### Base de données

* [ ] operation_utilisateur
* [ ] operation
* [ ] frais
* [ ] v_solde

---

##  Transfert

### Affichage

* [ ] Formulaire :

  * [ ] Numéro destinataire.
  * [ ] Montant.
* [ ] Afficher une erreur si :

  * [ ] Solde insuffisant.
  * [ ] Préfixe invalide.

### Métier

* [ ] Vérifier que le préfixe du destinataire existe.

#### Expéditeur

* [ ] Récupérer les frais.
* [ ] Calculer montant + frais.
* [ ] Vérifier le solde.
* [ ] Enregistrer une opération négative.

#### Destinataire

* [ ] Vérifier que le destinataire existe.
* [ ] Créer le destinataire s'il n'existe pas (si souhaité par les règles métier).
* [ ] Enregistrer une opération positive.

### Base de données

* [ ] operation_utilisateur
* [ ] operation
* [ ] frais
* [ ] prefix
* [ ] v_solde

---

#  Base de données (Récapitulatif)

* [ ] prefix
* [ ] utilisateur
* [ ] type_operation
* [ ] operation
* [ ] operation_utilisateur
* [ ] frais
* [ ] v_solde (Vue SQL)





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

