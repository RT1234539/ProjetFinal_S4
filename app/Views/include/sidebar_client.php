<?php
$active = $active ?? 'accueil';
$clientItems = [
    'accueil'   => ['url' => 'accueil',            'icon' => 'dashboard',    'label' => 'Accueil'],
    'depot'     => ['url' => 'clients/depot',      'icon' => 'add_circle',   'label' => 'Dépôt'],
    'retrait'   => ['url' => 'clients/retrait',    'icon' => 'payments',     'label' => 'Retrait'],
    'transfert' => ['url' => 'clients/transfert',  'icon' => 'swap_horiz',   'label' => 'Transfert'],
    'historique'=> ['url' => 'clients/historique', 'icon' => 'history',      'label' => 'Historique'],
];
?>
<!-- SideNavBar Desktop -->
<aside class="bg-white border-r border-outline-variant fixed left-0 top-0 h-full flex flex-col p-4 z-40 hidden md:flex w-[280px]">
    <div class="mt-20 px-2 mb-8">
        <div class="flex flex-col items-start p-4 bg-surface-container rounded-xl">
            <span class="text-label-md font-label-md text-secondary"><?= esc($user['numero'] ?? '0000000000') ?></span>
            <span class="text-headline-sm font-headline-sm text-primary mt-1"><?= number_format($solde['solde'] ?? 0, 0, ',', ' ') ?> Ar</span>
            <span class="text-body-sm font-body-sm text-on-surface-variant opacity-70">Balance disponible</span>
            <a href="<?= base_url('clients/depot') ?>" class="mt-4 w-full bg-primary text-on-primary py-2 rounded-lg font-label-md hover:scale-[1.02] active:scale-95 transition-all text-center block">Effectuer un dépôt</a>
        </div>
    </div>
    <nav class="flex flex-col gap-1 flex-1">
        <?php foreach ($clientItems as $key => $item): ?>
            <?php $isActive = ($active === $key); ?>
            <a class="flex items-center gap-4 p-4 <?= $isActive ? 'bg-primary-container text-on-primary-container rounded-lg font-bold' : 'text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-all' ?>"
               href="<?= base_url($item['url']) ?>">
                <span class="material-symbols-outlined"><?= $item['icon'] ?></span>
                <span class="text-label-md font-label-md"><?= $item['label'] ?></span>
            </a>
        <?php endforeach; ?>
    </nav>
    <div class="p-4 border-t border-outline-variant mt-auto">
        <a class="flex items-center gap-4 p-4 text-on-surface-variant hover:bg-error-container hover:text-on-error-container rounded-lg transition-colors"
           href="<?= base_url('logout') ?>">
            <span class="material-symbols-outlined">logout</span>
            <span class="text-label-md font-label-md">Déconnexion</span>
        </a>
    </div>
</aside>

<!-- BottomNavBar Mobile -->
<nav class="fixed bottom-0 left-0 w-full z-50 flex justify-around items-center px-4 py-2 md:hidden bg-white shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.1)] rounded-t-xl">
    <?php foreach ($clientItems as $key => $item): ?>
        <?php $isActive = ($active === $key); ?>
        <a class="flex flex-col items-center justify-center <?= $isActive ? 'bg-primary-container text-on-primary-container rounded-full px-4 py-1' : 'text-on-secondary-container hover:text-primary transition-all' ?> active:scale-90 duration-150 transition-all"
           href="<?= base_url($item['url']) ?>">
            <span class="material-symbols-outlined"><?= $item['icon'] ?></span>
            <span class="text-label-sm font-label-sm"><?= $item['label'] ?></span>
        </a>
    <?php endforeach; ?>
    <a class="flex flex-col items-center justify-center text-on-secondary-container hover:text-error transition-all active:scale-90 duration-150"
       href="<?= base_url('logout') ?>">
        <span class="material-symbols-outlined">logout</span>
        <span class="text-label-sm font-label-sm">Sortir</span>
    </a>
</nav>
