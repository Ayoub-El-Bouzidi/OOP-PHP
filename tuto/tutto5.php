<?php
class Personne {
    private $id;
    private $nom;
    private $passeport; // Un objet Passeport

    // ... getters et setters ...

    public function setPasseport(Passeport $passeport): void {
        $this->passeport = $passeport;
        $passeport->setPersonne($this); // Lien bidirectionnel
    }
}

// class Passeport {
//     private $numero;
//     private $dateExpiration;
//     private $personne; // Un objet Personne

//     // ... getters et setters ...

//     public function setPersonne(Personne $personne): void {
//         $this->personne = $personne;
//     }
// }

// class Auteur {
//     private $id;
//     private $nom;
//     /** @var Livre[] */
//     private $livres = [];

//     // ... getters et setters ...

//     public function addLivre(Livre $livre): void {
//         $this->livres[] = $livre;
//         $livre->setAuteur($this);
//     }
// }

// class Livre {
//     private $id;
//     private $titre;
//     private $auteur; // Un objet Auteur

//     // ... getters et setters ...
// }

class Etudiant {
    private $id;
    private $nom;
    /** @var Cours[] */
    private $cours = [];

    // ... getters et setters ...

    public function ajouterCours(Cours $cours): void {
        $this->cours[] = $cours;
        $cours->ajouterEtudiant($this);
    }
}

class Cours {
    private $id;
    private $nom;
    /** @var Etudiant[] */
    private $etudiants = [];

    // ... getters et setters ...

    public function ajouterEtudiant(Etudiant $etudiant): void {
        $this->etudiants[] = $etudiant;
    }
}

// Configuration de Doctrine (simplifiée)
use Doctrine\ORM\EntityManager;

$entityManager = EntityManager::create(/* ... paramètres de connexion ... */);

// Création d'un nouvel auteur et de livres associés
$auteur = new Auteur();
$auteur->setNom('Dumas');

$livre1 = new Livre();
$livre1->setTitre('Les Trois Mousquetaires');
$livre1->setAuteur($auteur);

$entityManager->persist($auteur);
$entityManager->persist($livre1);
$entityManager->flush();