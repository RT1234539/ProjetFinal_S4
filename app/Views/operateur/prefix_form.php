<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Ajouter un Préfixe - Admin Mobile Money</title>
    <?= view('include/tailwind_head') ?>
</head>

<body class="bg-background text-on-background min-h-screen flex">
    <?= view('include/sidebar_admin', ['active' => 'prefixes']) ?>
    <main class="flex-1 lg:ml-72 flex flex-col min-h-screen">
        <!-- TopNavBar -->
        <header class="flex justify-between items-center w-full px-gutter h-16 sticky top-0 z-40 bg-surface shadow-sm">
            <div class="flex items-center gap-lg">
                <button class="lg:hidden p-xs rounded-full hover:bg-surface-container">
                    <i class="bi-list"></i>
                </button>
                <h2 class="font-headline-md text-headline-md text-on-surface">Ajouter un Préfixe</h2>
            </div>
        </header>
        <div class="flex-1 p-gutter max-w-[800px] w-full mx-auto">
            <!-- Breadcrumb -->
            <div class="flex items-center gap-sm mb-xl">
                <a href="<?= base_url('prefix') ?>" class="flex items-center gap-xs text-primary font-label-md hover:underline">
                    <i class="bi-arrow-left text-[18px]"></i>
                    Retour à la liste
                </a>
            </div>
            <!-- Flash Messages -->
            <?php if (session()->getFlashdata('success')): ?>
                <div class="mb-xl p-md bg-green-100 text-green-800 rounded-xl flex items-center gap-sm">
                    <i class="bi-check-circle"></i>
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="mb-xl p-md bg-red-100 text-red-800 rounded-xl flex items-center gap-sm">
                    <i class="bi-x-circle"></i>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            <!-- Form Card -->
            <div class="bg-white rounded-xl shadow-sm border border-outline-variant/30 overflow-hidden">
                <div class="p-lg border-b border-outline-variant/30">
                    <div class="flex items-center gap-sm">
                        <div class="w-10 h-10 bg-primary/10 text-primary rounded-lg flex items-center justify-center">
                            <i class="bi-plus-circle text-[20px]"></i>
                        </div>
                        <div>
                            <h3 class="font-headline-sm text-headline-sm text-on-surface">Nouveau préfixe</h3>
                            <p class="font-body-sm text-body-sm text-secondary">Ajoutez un préfixe d'opérateur mobile money</p>
                        </div>
                    </div>
                </div>
                <form action="<?= base_url('prefix/save') ?>" method="post" class="p-lg space-y-lg">
                    <?= csrf_field() ?>
                    <!-- Préfixe -->
                    <div>
                        <label for="prefix" class="block font-label-md text-label-md text-on-surface-variant mb-sm">Numéro de préfixe</label>
                        <input type="text" id="prefix" name="prefix" maxlength="3" minlength="3" pattern="[0-9]{3}" required
                            placeholder="Ex : 034"
                            class="w-full bg-surface-container-low border border-outline-variant rounded-xl px-4 py-3 text-body-md focus:ring-2 focus:ring-primary focus:outline-none transition-all">
                        <p class="mt-xs font-label-sm text-label-sm text-secondary">3 chiffres exactement (ex: 034, 032, 038)</p>
                    </div>
                    <!-- Nom opérateur -->
                    <div>
                        <label for="nom" class="block font-label-md text-label-md text-on-surface-variant mb-sm">Nom de l'opérateur</label>
                        <input type="text" id="nom" name="nom" maxlength="50" required
                            placeholder="Ex : Telma"
                            class="w-full bg-surface-container-low border border-outline-variant rounded-xl px-4 py-3 text-body-md focus:ring-2 focus:ring-primary focus:outline-none transition-all">
                        <p class="mt-xs font-label-sm text-label-sm text-secondary">Nom complet de l'opérateur mobile</p>
                    </div>
                    <!-- Actions -->
                    <div class="flex items-center gap-md pt-md">
                        <button type="submit" class="flex items-center gap-xs px-lg py-sm bg-primary text-on-primary font-label-md rounded-xl hover:shadow-lg transition-all active:scale-95">
                            <i class="bi-save text-[20px]"></i>
                            Enregistrer
                        </button>
                        <a href="<?= base_url('prefix') ?>" class="flex items-center gap-xs px-lg py-sm bg-surface-container-highest text-on-surface-variant font-label-md rounded-xl hover:bg-outline-variant transition-colors">
                            Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>