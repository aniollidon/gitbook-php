# Projecte: Social Network

## Estructura del projecte
```
├── app                           # Main MVC file structure directory
│   ├── controllers               # Controllers directory
│   │   ├── session
│   │   |   ├── login.php
│   │   |   └── logout.php
│   │   ├── user                  # Example Controller with functionality explanation
│   │   |   ├── create.php
│   │   |   ├── read.php
│   │   |   ├── update.php
│   │   |   └── delete.php
│   │   └── post
│   │       ├── create.php
│   │       ├── read.php
│   │       ├── update.php
│   │       ├── delete.php
│   │       └── like.php
│   ├── models                    # Models directory
│   │   ├── Database.php               
│   │   ├── User.php
│   │   └── Post.php
│   └── views                     # Views directory, views are recommended in pure html, possible <?=$variable?> additions
│       ├── user.view.php
│       └── post.view.php
├── index.php                     # Endpoint url
├── config.php                    # App configuration
└── public                        # Directory for all public resources, javascript files, stylesheets and vendor plugins
    ├── javascripts               
    └── stylesheets               
        └── styles.css
```