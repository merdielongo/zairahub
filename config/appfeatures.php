<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Default CRUD Permissions
    |--------------------------------------------------------------------------
    |
    | When a feature has "crud_permission" set on "true", CRUD permissions will
    | be automatically added to that feature.
    |
    | For example this feature:
    | [
    |   'name' => 'users', 'label_fr' => 'Utilisateur', 'label_en' => 'users',
    |   'crud_permissions' => true
    | ]
    |
    | The following permissions will be automatically created:
    | => users.home, users.import, users.create, users.edit, users.archive, users.view, users.delete
    |
    */
    'crud_permissions' => [
        'home' => ['fr' => 'Liste', 'en' => 'List' ],
        'import' => ['fr' => 'Importer', 'en' => 'Import'],
        'create' => ['fr' => 'Créer', 'en' => 'Create'],
        'edit' => ['fr' => 'Modifier', 'en' => 'Update'],
        'archive' => ['fr' => 'Archiver', 'en' => 'Archive'],
        'view' => ['fr' => 'Voir', 'en' => 'View'],
        'delete' => ['fr' => 'Supprimer', 'en' => 'Delete']
    ],

    /*
    |--------------------------------------------------------------------------
    | Modules
    |--------------------------------------------------------------------------
    |
    | Here is the entire list of available modules implemented in the plateforme
    | If you update something here you may need to run "AppFeaturesSeeder" seeder
    | in to order to apply those changes in database.
    |
    */
    'modules' => [

        // Blog
        [
            'name' => 'blog',
            'label_fr' => 'Blog',
            'label_en' => 'Blog',
            'roles' => ['moderator', 'author', 'instructor'],
            'features' => [
                [
                    'name' => 'blog.articles',
                    'label_fr' => 'Mes articles',
                    'label_en' => 'My articles',
                    'crud_permission' => true,
                    'roles' => [],
                    'permissions' => []
                ],
                [
                    'name' => 'blog.event',
                    'label_fr' => 'Mes events',
                    'label_en' => 'My events',
                    'crud_permission' => true,
                    'roles' => [],
                    'permissions' => []
                ],
            ],
        ],

        //Institution
        [
            'name' => 'institution',
            'label_fr' => 'Institution',
            'label_en' => 'Institution',
            'roles' => ['instructor', 'author', 'student', 'owner'],
            'features' => [
                [
                    'name' => 'institution.course',
                    'label_fr' => 'Cours',
                    'label_en' => 'Courses',
                    'crud_permission' => true,
                    'roles' => ['instructor', 'owner'],
                    'permissions' => [
                        [
                            'name' => '.validation',
                            'label_fr' => 'Validation des cours',
                            'label_en' => 'Courses Validation',
                            'roles' => ['owner'],
                        ],
                    ]
                ],
                [
                    'name' => 'institution.event',
                    'label_fr' => 'Events',
                    'label_en' => 'Events',
                    'crud_permission' => true,
                    'roles' => ['instructor', 'owner', 'author'],
                    'permissions' => [
                        [
                            'name' => '.validation',
                            'label_fr' => 'Validation des events',
                            'label_en' => 'Events Validation',
                            'roles' => ['owner'],
                        ]
                    ]
                ],
                [
                    'name' => 'institution.instructor',
                    'label_fr' => 'Instructeurs',
                    'label_en' => 'Instructors',
                    'crud_permission' => true,
                    'roles' => ['owner'],
                    'permissions' => []
                ],
                [
                    'name' => 'institution.student',
                    'label_fr' => 'Inscrits',
                    'label_en' => 'Students',
                    'crud_permission' => true,
                    'roles' => ['instructor', 'owner'],
                    'permissions' => [
                        [
                            'name' => '.validation',
                            'label_fr' => 'Validation des inscrits',
                            'label_en' => 'Inscrits Validation',
                            'roles' => ['owner', 'instructor'],
                        ]
                    ]
                ],
                [
                    'name' => 'institution.author',
                    'label_fr' => 'Auteurs',
                    'label_en' => 'Authors',
                    'crud_permission' => true,
                    'roles' => ['instructor', 'author'],
                    'permissions' => []
                ],
                [
                    'name' => 'institution.classe',
                    'label_fr' => 'Classe',
                    'label_en' => 'Classe',
                    'crud_permission' => true,
                    'roles' => ['instructor', 'owner'],
                    'permissions' => [
                        [
                            'name' => '.validation',
                            'label_fr' => 'Validation des classe',
                            'label_en' => 'Classes Validation',
                            'roles' => ['owner'],
                        ]
                    ]
                ]
            ]
        ],

        // Academia
        [
            'name' => 'academia',
            'label_fr' => 'Academia',
            'label_en' => 'Academia',
            'roles' => ['instructor', 'student', 'author'],
            'features' => [
                [
                    'name' => 'academia.courses',
                    'label_fr' => 'Cours',
                    'label_en' => 'Courses',
                    'crud_permission' => true,
                    'roles' => [],
                    'permissions' => [
                        [
                            'name' => '.archive',
                            'label_fr' => 'Archiver',
                            'label_en' => 'Archive',
                            'roles' => ['instructor', 'author'],
                        ],
                    ]
                ]
            ]
        ]
    ]
];
