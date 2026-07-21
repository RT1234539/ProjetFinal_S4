<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Modifier Barème - Admin Money</title>
    <?= view('include/tailwind_head') ?>
</head>

<body class="bg-background text-on-background min-h-screen flex">
    <?= view('include/sidebar_admin', ['active' => 'frais']) ?>
    <main class="flex-1 lg:ml-72 flex flex-col min-h-screen">
        <header class="flex justify-between items-center w-full px-gutter h-16 sticky top-0 z-40 bg-surface shadow-sm">
            <div class="flex items-center gap-md">
                <button class="lg:hidden p-xs">
                    <i class="bi-list"></i>
                </button>
                <h2 class="font-headline-md text-headline-md text-on-surface">Modifier un Barème</h2>
            </div>
        </header>
        <div class="p-gutter flex-grow max-w-[800px] w-full mx-auto">
            <div class="flex items-center gap-sm mb-xl">
                <a href="<?= base_url('frais/ajouter') ?>" class="flex items-center gap-xs text-primary font-label-md hover:underline">
                    <i class="bi-arrow-left text-[18px]"></i>
                    Retour aux barèmes
                </a>
            </div>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="mb-xl p-md bg-red-100 text-red-800 rounded-xl flex items-center gap-sm">
                    <i class="bi-x-circle"></i>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            <div class="bg-white rounded-xl shadow-sm border border-outline-variant/30 overflow-hidden">
                <div class="p-lg border-b border-outline-variant/30">
                    <div class="flex items-center gap-sm">
                        <div class="w-10 h-10 bg-primary/10 text-primary rounded-lg flex items-center justify-center">
                            <i class="bi-pencil text-[20px]"></i>
                        </div>
                        <div>
                            <h3 class="font-headline-sm text-headline-sm text-on-surface">Modifier le barème</h3>
                            <p class="font-body-sm text-body-sm text-secondary">Modifiez les informations du barème #<?= esc($frais['id']) ?></p>
                        </div>
                    </div>
                </div>
                <form action="<?= base_url('frais/update/' . $frais['id']) ?>" method="post" class="p-lg space-y-lg">
                    <?= csrf_field() ?>
                    <div>
                        <label class="font-label-md text-label-md text-on-surface-variant">Type d'opération</label>
                        <select name="operation" class="w-full bg-surface-container-low border border-outline-variant rounded-lg p-sm focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all font-body-sm text-body-sm">
                            <?php if (isset($operations)): ?>
                                <?php foreach ($operations as $o): ?>
                                    <option value="<?= $o['id'] ?>" <?= $o['id'] == $frais['id_operation'] ? 'selected' : '' ?>>
                                        <?= $o['libelle'] ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="grid grid-cols-2 gap-md">
                        <div class="space-y-xs">
                            <label class="font-label-md text-label-md text-on-surface-variant">Montant min.</label>
                            <div class="relative">
                                <input name="min" class="w-full pl-sm pr-12 bg-surface-container-low border border-outline-variant rounded-lg p-sm focus:ring-2 focus:ring-primary outline-none font-body-sm text-body-sm" type="number" value="<?= esc($frais['montant1']) ?>" />
                                <span class="absolute right-3 top-2.5 text-secondary font-label-sm">Ar</span>
                            </div>
                        </div>
                        <div class="space-y-xs">
                            <label class="font-label-md text-label-md text-on-surface-variant">Montant max.</label>
                            <div class="relative">
                                <input name="max" class="w-full pl-sm pr-12 bg-surface-container-low border border-outline-variant rounded-lg p-sm focus:ring-2 focus:ring-primary outline-none font-body-sm text-body-sm" type="number" value="<?= esc($frais['montant2']) ?>" />
                                <span class="absolute right-3 top-2.5 text-secondary font-label-sm">Ar</span>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-xs">
                        <label class="font-label-md text-label-md text-on-surface-variant">Frais appliqués</label>
                        <div class="relative">
                            <input name="frais" class="w-full pl-sm pr-12 bg-surface-container-low border border-outline-variant rounded-lg p-sm focus:ring-2 focus:ring-primary outline-none font-body-sm text-body-sm" type="number" value="<?= esc($frais['frais']) ?>" />
                            <span class="absolute right-3 top-2.5 text-secondary font-label-sm">Ar</span>
                        </div>
                    </div>
                    <div class="flex gap-sm pt-md">
                        <button class="flex-grow bg-primary text-on-primary py-sm rounded-lg font-label-md text-label-md hover:bg-primary-container transition-colors shadow-md" type="submit">
                            Mettre à jour
                        </button>
                        <a href="<?= base_url('frais/ajouter') ?>" class="px-md py-sm bg-surface-container border border-outline-variant text-on-surface-variant rounded-lg font-label-md text-label-md hover:bg-outline-variant transition-colors">
                            Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>