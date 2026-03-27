# Structure du Projet Iran News

## Architecture du projet

Le projet a été restructuré avec une séparation claire entre le front-office (partie publique) et le back-office (partie administration).

```
.
├── frontOffice/          # Partie publique du site
│   ├── functions/        # Fonctions métier pour le front
│   │   └── article.php
│   ├── inc/              # Fichiers d'inclusion (header, footer, db)
│   │   ├── db.php
│   │   ├── header.php
│   │   └── footer.php
│   └── pages/            # Pages publiques
│       ├── home.php      # Page d'accueil
│       ├── article.php   # Page détail article
│       └── categorie.php # Page liste par catégorie
│
├── backOffice/           # Partie administration
│   ├── functions/        # Fonctions métier pour l'admin
│   │   └── article.php
│   ├── inc/              # Fichiers d'inclusion admin
│   │   ├── db.php
│   │   ├── header.php
│   │   └── footer.php
│   └── pages/            # Pages d'administration
│       └── modules.php
│
├── sql/                  # Scripts SQL
│   └── database.sql      # Script d'initialisation de la BDD
│
├── assets/               # Ressources statiques (CSS, JS, images)
├── index.php             # Point d'entrée principal
├── .htaccess             # Configuration Apache (URL rewriting)
└── docker-compose.yml    # Configuration Docker
```

## URLs du site

### Front-Office
- **Accueil** : `http://localhost/` ou `http://localhost/frontOffice/pages/home.php`
- **Article** : `http://localhost/article/slug-article-123.html`
- **Catégorie** : `http://localhost/categorie/1` ou `http://localhost/categorie/1/page/2`

### Back-Office
- **Admin** : `http://localhost/admin`
- **Modules** : `http://localhost/admin/modules`

## Configuration Docker

### PostgreSQL
- **Container** : `iran_db`
- **Port** : `5433:5432`
- **Base de données** : `iran_news`
- **User/Password** : `postgres/postgres` (par défaut)

### Initialisation automatique
Tous les fichiers `.sql` dans le dossier `sql/` seront automatiquement exécutés lors de la première initialisation de la base de données grâce au volume Docker :
```yaml
volumes:
  - ./sql:/docker-entrypoint-initdb.d
```

### PHP + Apache
- **Container** : `iran_web`
- **Port** : `80`

## Commandes utiles

```bash
# Démarrer les conteneurs
docker-compose up -d

# Se connecter à PostgreSQL
docker-compose exec postgres psql -U postgres -d iran_news

# Voir les logs
docker-compose logs -f

# Arrêter les conteneurs
docker-compose down

# Réinitialiser la base de données (supprime le volume)
docker-compose down
docker volume rm rewriting_postgres_data
docker-compose up -d
```

## Notes importantes

1. **URL Rewriting** : Le fichier `.htaccess` gère la réécriture d'URLs pour avoir des URLs propres
2. **Séparation Front/Back** : Les fichiers sont séparés mais partagent la même base inc et functions (possibilité de différencier plus tard)
3. **Scripts SQL** : Tous les fichiers SQL dans `sql/` sont exécutés automatiquement au premier lancement
4. **Chemins relatifs** : Les includes utilisent des chemins relatifs (`../inc/`, `../functions/`)
