<!-- notoc -->

# Projecte: Social Network

## Estructura del projecte
```
├── app                           # Main MVC file structure directory
│   ├── controllers               # Controllers directory
│   │   ├── session
│   │   |   ├── login.php
│   │   |   └── logout.php
│   │   ├── user 
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
│   │   ├── session
│   │   |   ├── login.view.php
│   │   |   └── logout.view.php
│   │   ├── user                  
│   │   |   ├── create.view.php
│   │   |   ├── read.view.php
│   │   |   └── delete.view.php
│   │   └── post
│   │       ├── create.view.php
│   │       ├── read.view.php
│   │       └── update.view.php
│   ├── models                    # Models directory
│   │   ├── Database.php               
│   │   ├── User.php
│   │   └── Post.php
├── index.php                     # Endpoint url
├── config.php                    # App configuration
└── public                        # Directory for all public resources, javascript files, stylesheets and vendor plugins
    ├── javascripts               
    └── stylesheets               
        └── styles.css
```