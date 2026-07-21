<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Promo - Admin Mobile Money</title>
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
          
            <!-- Form Card -->
            <div class="bg-white rounded-xl shadow-sm border border-outline-variant/30 overflow-hidden">
                <div class="p-lg border-b border-outline-variant/30">
                    <div class="flex items-center gap-sm">
                        <div class="w-10 h-10 bg-primary/10 text-primary rounded-lg flex items-center justify-center">
                            <i class="bi-plus-circle text-[20px]"></i>
                        </div>
                        <div>
                            <h3 class="font-headline-sm text-headline-sm text-on-surface">Nouvelle Promo</h3>
                            <p class="font-body-sm text-body-sm text-secondary">Ajoutez une promotion</p>
                        </div>
                    </div>
                </div>
                <form action="<?= base_url('promotion') ?>" method="post" class="p-lg space-y-lg">
                    <?= csrf_field() ?>
                    <!-- Nom opérateur -->
                    <div>
                        <label for="nom" class="block font-label-md text-label-md text-on-surface-variant mb-sm">Quantite</label>
                        <input type="number" id="quantite" name="quantite" maxlength="50" required
                            placeholder="Ex : Telma"
                            class="w-full bg-surface-container-low border border-outline-variant rounded-xl px-4 py-3 text-body-md focus:ring-2 focus:ring-primary focus:outline-none transition-all">
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