<?php

return [
    [
        'name_fr' => 'Trial',
        'name_en' => 'Trial',
        'description_fr' => 'Version d\'essai offrant un aperçu des fonctionnalités de l\'ERP pour une gestion simplifiée des organisations.',
        'description_en' => 'Trial version offering a glimpse of ERP features for simplified organization management.',
        'price' => 0,
        'currency' => 'USD',
        'is_trial' => true,
        'options' => [
            "additional_active_account_price" => 2,
            "additional_not_active_account_price" => 1,
        ],
        'packs' => [
            ['name_fr' => 'Durée d\'utilisation', 'value' => 30],
            ['name_fr' => 'Stockage cloud sécurisé', 'value' => 300],
            ['name_fr' => 'Emails inclus', 'value' => 0],
            ['name_fr' => 'Comptes administrateurs', 'value' => 2],
            ['name_fr' => 'Comptes utilisateurs actifs', 'value' => 10],
            ['name_fr' => 'Utilisateurs enregistrés (non actifs)', 'value' => 50],
            // ['name_fr' => 'Applications incluses', 'value' => ['Gestion d\'organisation']]
        ]
    ],
    [
        'name_fr' => 'Standard',
        'name_en' => 'Standard',
        'description_fr' => 'Idéal pour les petites entreprises et organisations en phase de test, ce plan simplifie la gestion de vos opérations.',
        'description_en' => 'Ideal for small businesses and organizations in test phases, this plan simplifies your operations management.',
        'price' => 199,
        'currency' => 'USD',
        'is_trial' => false,
        'options' => [
            "additional_active_account_price" => 3,
            "additional_not_active_account_price" => 1,
            "additionnal_message_title_fr" => 'Si vous voulez 300 comptes actifs',
            "additionnal_message_title_en" => 'If you want 300 active accounts',
            "user_price_by_year" => 1
        ],
        'packs' => [
            ['name_fr' => 'Durée d\'utilisation', 'value' => 365],
            ['name_fr' => 'Stockage cloud sécurisé', 'value' => 100],
            ['name_fr' => 'Emails inclus', 'value' => 100],
            ['name_fr' => 'Comptes administrateurs', 'value' => 20],
            ['name_fr' => 'Comptes utilisateurs actifs', 'value' => 200],
            ['name_fr' => 'Utilisateurs enregistrés (non actifs)', 'value' => 500],
            // ['name_fr' => 'Applications incluses', 'value' => ['Gestion d\'organisation', 'Gestion de facturation', 'Gestion des abonnements']]
        ]
    ],
    [
        'name_fr' => 'Pro',
        'name_en' => 'Pro',
        'description_fr' => 'Optimisé pour les organisations de taille moyenne, il facilite la gestion administrative, financière et opérationnelle.',
        'description_en' => 'Optimized for medium-sized organizations, it facilitates administrative, financial, and operational management.',
        'price' => 299,
        'currency' => 'USD',
        'is_trial' => false,
        'options' => [
            "additional_active_account_price" => 2.5,
            "additional_not_active_account_price" => 1,
            "additionnal_message_title_fr" => 'Si vous voulez entre 500 et 1000 comptes actifs',
            "additionnal_message_title_en" => 'If you want between 500 and 1000 active accounts',
            "user_price_by_year" => 0.33
        ],
        'packs' => [
            ['name_fr' => 'Durée d\'utilisation', 'value' => 365],
            ['name_fr' => 'Stockage cloud sécurisé', 'value' => 200],
            ['name_fr' => 'Emails inclus', 'value' => 600],
            ['name_fr' => 'Comptes administrateurs', 'value' => 30],
            ['name_fr' => 'Comptes utilisateurs actifs', 'value' => 500],
            ['name_fr' => 'Utilisateurs enregistrés (non actifs)', 'value' => 1000],
           // ['name_fr' => 'Applications incluses', 'value' => ['Gestion d\'organisation', 'Gestion de facturation', 'Gestion des abonnements', 'Gestion des ventes', 'Gestion de projets']]
        ]
    ],
    [
        'name_fr' => 'Premium',
        'name_en' => 'Premium',
        'description_fr' => 'Une solution complète pour une gestion centralisée et optimisée des grandes entreprises et institutions.',
        'description_en' => 'A complete solution for centralized and optimized management of large companies and institutions.',
        'price' => 399,
        'currency' => 'USD',
        'is_trial' => false,
        'options' => [
            "additional_active_account_price" => 2,
            "additional_not_active_account_price" => 1,
            "additionnal_message_title_fr" => 'Si vous voulez plus de 1000 comptes actifs',
            "additionnal_message_title_en" => 'If you want more than 1000 active accounts',
            "user_price_by_year" => 0.20
        ],
        'packs' => [
            ['name_fr' => 'Durée d\'utilisation', 'value' => 365],
            ['name_fr' => 'Stockage cloud sécurisé', 'value' => 300],
            ['name_fr' => 'Emails inclus', 'value' => 2000],
            ['name_fr' => 'Comptes administrateurs', 'value' => 60],
            ['name_fr' => 'Comptes utilisateurs actifs', 'value' => 1000],
            ['name_fr' => 'Utilisateurs enregistrés (non actifs)', 'value' => 2000],
            // ['name_fr' => 'Applications incluses', 'value' => ['Gestion d\'organisation', 'Gestion de facturation', 'Gestion des abonnements', 'Gestion des ventes', 'Gestion de projets', 'Gestion des boutiques et points de vente', 'Gestion des restaurants', 'Gestion des inventaires', 'Gestion des événements', 'Gestion des rendez-vous']]
        ]
    ],
];
