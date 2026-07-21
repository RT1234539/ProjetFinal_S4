# Projet Mobile Money — Liste des tâches

> **Légende**
>
> - [ ] À faire
> - [x] Terminé

---

# Opérateur

## 1. Gestion des préfixes

### Interface

- [ ] Créer la page de gestion des préfixes
- [ ] Ajouter un formulaire
  - [ ] Préfixe (3 chiffres)
- [ ] Afficher la liste des préfixes existants

### Métier

- [ ] Vérifier que le préfixe n'existe pas déjà
- [ ] Vérifier que le préfixe contient exactement **3 chiffres**
- [ ] Enregistrer le préfixe

### Base de données

- [ ] Créer la table `prefix`

---

## 2. Gestion des frais

### Interface

- [ ] Créer le formulaire de gestion des frais
- [ ] Ajouter les champs suivants
  - [ ] Montant minimum
  - [ ] Montant maximum
  - [ ] Frais
  - [ ] Type d'opération
- [ ] Afficher la liste des frais

### Métier

- [ ] Vérifier que les montants et les frais sont positifs
- [ ] Enregistrer les frais

### Base de données

- [ ] Créer la table `frais`

---

## 3. Situation des gains

### Interface

Afficher :

- [ ] Total des montants par opération
- [ ] Total des frais par opération
- [ ] Date
- [ ] Gain total

### Métier

- [ ] Calculer le total des montants par type d'opération
- [ ] Calculer le total des frais
- [ ] Calculer le gain total

### Base de données

- [ ] `frais`
- [ ] `operation_utilisateur`
- [ ] `operation`

---

## 4. Liste des clients

### Interface

Afficher :

- [ ] Numéro
- [ ] Solde actuel
- [ ] Nombre d'opérations

### Métier

- [ ] Calculer le solde de chaque client
- [ ] Lister tous les clients
- [ ] Calculer le nombre d'opérations par client

### Base de données

- [ ] `utilisateur`
- [ ] `operation_utilisateur`

---

## 5. Détection de l'opérateur

### Métier

Associer automatiquement un numéro de téléphone à son opérateur.

| Préfixe | Opérateur |
|---------:|-----------|
| 032 | Telma |
| 033 | Airtel |
| 034 | Yas |
| 037 | Orange |
| 038 | Telma |

---

## 6. Types d'opération

### Base de données

Créer la table `type_operation`

| Champ | Description |
|--------|-------------|
| id | Clé primaire |
| libelle | Nom du type d'opération |

---

# Client

## 1. Connexion

### Interface

- [ ] Créer une page de connexion (sans inscription)
- [ ] Rediriger automatiquement vers l'accueil après la connexion
- [ ] Afficher une erreur si le préfixe est invalide

### Métier

- [ ] Vérifier que le préfixe existe
- [ ] Vérifier que le numéro est valide
- [ ] Vérifier si le numéro existe déjà

Si le numéro existe :

- [ ] Connecter automatiquement l'utilisateur

Sinon :

- [ ] Créer l'utilisateur
- [ ] Enregistrer le numéro

### Base de données

- [ ] `utilisateur`
- [ ] `prefix`

---

## 2. Accueil

### Interface

Afficher :

- [ ] Solde actuel

Ajouter les boutons :

- [ ] Dépôt
- [ ] Retrait
- [ ] Transfert
- [ ] Historique

---

## 3. Consultation du solde

### Interface

- [ ] Afficher le solde actuel

### Métier

- [ ] Calculer le solde à partir des opérations
- [ ] Utiliser la vue SQL `v_solde`

### Base de données

- [ ] `operation_utilisateur`
- [ ] `v_solde`

---

## 4. Dépôt

### Interface

Formulaire :

- [ ] Montant

Validation :

- [ ] Validation JavaScript
- [ ] Refuser les montants nuls ou négatifs

### Métier

- [ ] Vérifier que le montant est positif
- [ ] Enregistrer une opération positive

### Base de données

- [ ] `operation_utilisateur`
- [ ] `operation`

---

## 5. Retrait

### Interface

Formulaire :

- [ ] Montant

Erreurs :

- [ ] Solde insuffisant

### Métier

- [ ] Récupérer les frais applicables
- [ ] Calculer :

```text
Total = Montant + Frais
```

- [ ] Vérifier le solde disponible
- [ ] Enregistrer une opération négative

### Base de données

- [ ] `operation_utilisateur`
- [ ] `operation`
- [ ] `frais`
- [ ] `v_solde`

---

## 6. Transfert

### Interface

Formulaire :

- [ ] Numéro du destinataire
- [ ] Montant

Erreurs :

- [ ] Préfixe invalide
- [ ] Solde insuffisant

### Métier

- [ ] Vérifier le préfixe du destinataire

#### Expéditeur

- [ ] Récupérer les frais de transfert
- [ ] Calculer le montant total
- [ ] Vérifier le solde
- [ ] Enregistrer une opération négative

#### Destinataire

- [ ] Vérifier si le destinataire existe
- [ ] Créer le destinataire si nécessaire
- [ ] Enregistrer une opération positive

### Base de données

- [ ] `operation_utilisateur`
- [ ] `operation`
- [ ] `frais`
- [ ] `prefix`
- [ ] `v_solde`

---

# Récapitulatif de la base de données

- [ ] `prefix`
- [ ] `utilisateur`
- [ ] `type_operation`
- [ ] `operation`
- [ ] `operation_utilisateur`
- [ ] `frais`
- [ ] `v_solde`

---

# Version 2

## 1. Gestion des opérateurs externes

### Base de données

Créer la table `autre_operateur`

| Champ |
|--------|
| id |
| nom |
| prefix |

Créer la table `operateur_externe`

| Champ |
|--------|
| id |
| nom |
| commission_pct |
| id_autre_operateur |

---

## 2. CRUD des opérateurs externes

### Interface

- [ ] Liste
- [ ] Ajouter
- [ ] Modifier
- [ ] Supprimer

### Métier

- [ ] Vérifier que le préfixe est unique
- [ ] Vérifier que le préfixe contient exactement 3 chiffres
- [ ] Ajouter
- [ ] Modifier
- [ ] Supprimer

### Base de données

- [ ] `autre_operateur`
- [ ] `operateur_externe`

---

## 3. Transfert externe

### Interface

- [ ] Sélectionner un opérateur externe
- [ ] Saisir le numéro du destinataire

### Métier

- [ ] Vérifier l'opérateur
- [ ] Vérifier le préfixe
- [ ] Calculer :

```text
Total =
Montant
+ Frais de transfert
+ Commission de l'opérateur
```

### Base de données

- [ ] `operation_utilisateur`
- [ ] `operation`
- [ ] `operateur_externe`

---

## 4. Situation des gains (améliorée)

### Interface

Afficher :

- [ ] Gain des opérateurs internes
- [ ] Gain des opérateurs externes

### Métier

- [ ] Regrouper les gains internes
- [ ] Regrouper les gains externes

### Base de données

- [ ] `operation_utilisateur`
- [ ] `operation`
- [ ] `autre_operateur`
- [ ] `operation_externe`

---

## 5. Situation des montants envoyés

### Interface

- [ ] Afficher le montant total envoyé par opérateur

---

# Client — Version 2

## 1. Transfert

### Interface

- [ ] Option pour inclure les frais de retrait du destinataire
- [ ] Montant
- [ ] Numéro du destinataire

### Métier

Déterminer si le transfert est interne ou externe.

Si le transfert est **interne** :

- [ ] Calculer :

```text
Montant
+ Frais de transfert
+ Frais de retrait du destinataire (optionnel)
```

- [ ] Vérifier le solde disponible

Si le transfert est **externe** :

- [ ] Désactiver cette option
- [ ] Effectuer un transfert externe classique

---

## 2. Transfert multiple

### Interface

- [ ] Sélectionner plusieurs destinataires internes
- [ ] Saisir le montant total

### Métier

- [ ] Vérifier tous les destinataires
- [ ] Vérifier qu'ils sont tous internes
- [ ] Répartir le montant de manière égale
- [ ] Enregistrer une opération pour chaque destinataire

### Base de données

- [ ] `operation_utilisateur`
- [ ] `operation`
- [ ] `type_operation`