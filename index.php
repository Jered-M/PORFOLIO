<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'includes/header.php';
?>
<main class="container my-5" style="height: 100vh; overflow-y: auto;"> <!-- Conteneur avec défilement -->
    <section class="intro text-center mb-5">
        <h1 class="display-1 important-name">Jered Minono</h1> <!-- Ajout de votre nom avec une classe personnalisée -->
        <h2 class="display-3">Bienvenue sur mon Portfolio</h2> <!-- Texte agrandi -->
        <p class="lead fs-4">Je suis développeur débutant en PHP. Voici quelques-uns de mes projets :</p> <!-- Texte agrandi -->
    </section>

    <section class="skills text-center mb-5">
        <h2 class="mb-4 display-5">Mes Compétences</h2> <!-- Texte agrandi -->
        <div class="d-flex justify-content-center flex-wrap gap-4">
            <div>
                <img src="https://cdn-icons-png.flaticon.com/512/5968/5968350.png" alt="Python" style="width: 50px;"> <!-- Icône Python -->
                <p>Python (Pygame, Django, Flask)</p>
            </div>
            <div>
                <img src="https://cdn-icons-png.flaticon.com/512/732/732190.png" alt="C" style="width: 50px;"> <!-- Icône C -->
                <p>C (Bases)</p>
            </div>
            <div>
                <img src="https://cdn-icons-png.flaticon.com/512/5968/5968282.png" alt="Java" style="width: 50px;"> <!-- Icône Java -->
                <p>Java (Bases)</p>
            </div>
            <div>
                <img src="https://cdn-icons-png.flaticon.com/512/919/919830.png" alt="PHP" style="width: 50px;"> <!-- Icône PHP -->
                <p>PHP (Bases)</p>
            </div>
        </div>
    </section>

    <section class="projects d-flex flex-wrap justify-content-center gap-4">
        <?php 
        include 'data/projects.php'; 
        $projects = Project::getAll(); // Récupère uniquement les projets locaux
        ?>
        <?php foreach ($projects as $project): ?>
            <div class="card text-center" style="width: 18rem;">
                <img src="<?= $project->icon ?: 'https://cdn-icons-png.flaticon.com/512/847/847969.png' ?>" alt="Icône" class="card-img-top" style="max-width: 150px; margin: auto;"> <!-- Icône par défaut -->
                <div class="card-body">
                    <h3 class="card-title display-6"><?= $project->title ?></h3> <!-- Texte agrandi -->
                    <p class="card-text fs-5"><?= $project->description ?></p> <!-- Texte agrandi -->
                    <a href="<?= $project->link ?>" target="_blank" class="btn btn-primary">Voir le projet</a>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
</main>
<?php include 'includes/footer.php'; ?>
