<?php
$active = $active ?? 'dashboard';
$adminItems = [
    'dashboard'  => ['url' => 'dashboard',            'icon' => 'dashboard',          'label' => 'Tableau de bord'],
    'clients'    => ['url' => 'clients',             'icon' => 'group',             'label' => 'Comptes clients'],
    'prefixes'   => ['url' => 'prefix',              'icon' => 'phone_iphone',      'label' => 'Préfixes'],
    'operations' => ['url' => 'operations',          'icon' => 'category',          'label' => "Types d'opérations"],
    'frais'      => ['url' => 'frais/ajouter',       'icon' => 'payments',          'label' => 'Barèmes'],
    'operateurs' => ['url' => 'autre-operateur',     'icon' => 'cell_tower',        'label' => 'Opérateurs'],
    'gains'      => ['url' => 'gains',               'icon' => 'leaderboard',       'label' => 'Gains'],
];
?>
<aside class="hidden lg:flex flex-col h-screen border-r border-outline-variant bg-white w-72 fixed left-0 top-0 z-50">
    <div class="p-lg flex items-center gap-sm">
        <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center text-on-primary">
            <span class="material-symbols-outlined">account_balance_wallet</span>
        </div>
        <div>
            <h1 class="font-headline-sm text-headline-sm text-primary">Admin Money</h1>
            <p class="font-label-sm text-label-sm text-secondary">Gestionnaire Mobile</p>
        </div>
    </div>
    <nav class="flex-1 mt-md space-y-1">
        <?php foreach ($adminItems as $key => $item): ?>
            <?php $isActive = ($active === $key); ?>
            <a class="flex items-center px-lg py-sm <?= $isActive ? 'bg-primary-container text-on-primary-container' : 'text-secondary hover:bg-surface-container' ?> rounded-lg mx-2 my-1 transition-transform hover:translate-x-1"
               href="<?= base_url($item['url']) ?>">
                <span class="material-symbols-outlined mr-sm" <?= $isActive ? 'style="font-variation-settings: \'FILL\' 1;"' : '' ?>><?= $item['icon'] ?></span>
                <span class="font-label-md text-label-md"><?= $item['label'] ?></span>
            </a>
        <?php endforeach; ?>
    </nav>
    <div class="p-lg border-t border-outline-variant">
        <a class="flex items-center px-lg py-sm text-secondary hover:bg-error-container hover:text-on-error-container rounded-lg transition-colors"
           href="<?= base_url('logout') ?>">
            <span class="material-symbols-outlined mr-sm">logout</span>
            <span class="font-label-md text-label-md">Déconnexion</span>
        </a>
    </div>
</aside>
