# Projecte: Social Network

## Estructura del projecte
```
├── app                           # Main MVC file structure directory
│   ├── controllers               # Controllers directory
│   │   └── user.php              # Example Controller with functionality explanation
│   │   └── post.php
│   ├── models                    # Models directory
│   │   └── database.php               
│   │   └── user.php
│   │   └── post.php
│   └── views                     # Views directory, views are recommended in pure html, possible <?=$variable?> additions
│       └── user.view.php
│       └── post.view.php
├── index.php                     # Endpoint url
└── public                        # Directory for all public resources, javascript files, stylesheets and vendor plugins
    ├── javascripts               
    └── stylesheets               
        └── styles.css
```