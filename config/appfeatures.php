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

        // Organization
        [
            'name' => 'organization',
            'label_fr' => 'Organisation',
            'label_en' => 'Organization',
            'roles' => ['owner', 'admin', 'root', 'member'],
            'features' => [
                [
                    'name' => 'organization.organization',
                    'label_fr' => 'Organisation',
                    'label_en' => 'Organization',
                    'crud_permission' => true,
                    'roles' => ['owner', 'admin', 'root'],
                    'permissions' => [
                        [
                            'name' => '.validation',
                            'label_fr' => 'Validation des organisations',
                            'label_en' => 'Organizations Validation',
                            'roles' => ['admin', 'root'],
                        ]
                    ]
                ],
                [
                    'name' => 'organization.team',
                    'label_fr' => 'Equipe',
                    'label_en' => 'Team',
                    'crud_permission' => true,
                    'roles' => ['owner'],
                    'permissions' => []
                ],
                [
                    'name' => 'organization.member',
                    'label_fr' => 'Membre',
                    'label_en' => 'Member',
                    'crud_permission' => true,
                    'roles' => ['owner'],
                    'permissions' => []
                ],
                [
                    'name' => 'organization.role',
                    'label_fr' => 'Role',
                    'label_en' => 'Role',
                    'crud_permission' => true,
                    'roles' => ['owner'],
                    'permissions' => []
                ],
                [
                    'name' => 'organization.permission',
                    'label_fr' => 'Permission',
                    'label_en' => 'Permission',
                    'crud_permission' => true,
                    'roles' => ['owner'],
                    'permissions' => []
                ],
            ]
        ],

        // Offer
        [
            'name' => 'offer',
            'label_fr' => 'Offre',
            'label_en' => 'Offer',
            'roles' => ['owner', 'admin', 'root', 'member'],
            'features' => [
                [
                    'name' => 'offer.offer',
                    'label_fr' => 'Offre',
                    'label_en' => 'Offer',
                    'crud_permission' => true,
                    'roles' => ['admin', 'root'],
                    'permissions' => [
                        [
                            'name' => '.validation',
                            'label_fr' => 'Validation des offres',
                            'label_en' => 'Offers Validation',
                            'roles' => ['admin', 'root'],
                        ]
                    ]
                ]
            ]
        ],
        [
            'name' => 'subscription',
            'label_fr' => 'Abonnement',
            'label_en' => 'Subscription',
            'roles' => ['owner', 'admin', 'root', 'member'],
            'features' => [
                [
                    'name' => 'subscription.subscription',
                    'label_fr' => 'Abonnement',
                    'label_en' => 'Subscription',
                    'crud_permission' => true,
                    'roles' => ['admin', 'root'],
                    'permissions' => [
                        [
                            'name' => '.validation',
                            'label_fr' => 'Validation des abonnements',
                            'label_en' => 'Subscriptions Validation',
                            'roles' => ['admin', 'root'],
                        ]
                    ]
                ]
            ]
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
