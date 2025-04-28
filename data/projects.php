<?php

class Project {
    public string $icon;
    public string $title;
    public string $description;
    public string $link;

    public function __construct(string $icon, string $title, string $description, string $link) {
        $this->icon = $icon;
        $this->title = $title;
        $this->description = $description;
        $this->link = $link;
    }

    public static function getAll(): array {
        return [
            new Project(
                'https://cdn-icons-png.flaticon.com/512/5977/5977590.png', // Icône pour un site de streaming
                'Netflix',
                'Un petit site de streaming qui ressemble à Netflix.',
                'https://github.com/Jered-M/Netflix'
            ),
            new Project(
                'https://cdn-icons-png.flaticon.com/512/1055/1055672.png', // Icône pour un réseau social
                'My-Etude',
                'Un petit réseau social pour gérer les abonnés, les publications, les photos, vidéos et messages. (En cours de développement)',
                'https://github.com/Jered-M/My-Etude'
            ),
            new Project(
                'https://cdn-icons-png.flaticon.com/512/1006/1006771.png', // Icône pour un portfolio
                'Projet Portfolio',
                'Mon portfolio personnel développé en PHP.',
                'https://github.com/Jered-M/Portfolio'
            ),
        ];
    }

    public static function getFromGitHub(string $username): array {
        $url = "https://api.github.com/users/$username/repos";
        $options = [
            "http" => [
                "header" => "User-Agent: PHP"
            ]
        ];
        $context = stream_context_create($options);
        $response = @file_get_contents($url, false, $context);

        // Vérifiez si la réponse est valide
        if ($response === false) {
            error_log("Erreur : Impossible de récupérer les dépôts GitHub pour l'utilisateur $username.");
            return []; // Retourne un tableau vide en cas d'erreur
        }

        $repos = json_decode($response, true);

        // Vérifiez si la réponse est un tableau valide
        if (!is_array($repos)) {
            error_log("Erreur : Réponse invalide de l'API GitHub pour l'utilisateur $username.");
            return [];
        }

        $projects = [];
        foreach ($repos as $repo) {
            $projects[] = new Project(
                'styles/images/default-icon.png', // Icône par défaut pour GitHub
                $repo['name'],
                $repo['description'] ?? 'Aucune description disponible.',
                $repo['html_url'] // Lien vers le dépôt GitHub
            );
        }

        return $projects;
    }
}
?>
