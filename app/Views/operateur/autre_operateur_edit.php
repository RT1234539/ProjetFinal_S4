<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Modifier un Opérateur - Admin Mobile Money</title>
    <?= view('include/tailwind_head') ?>
</head>

<body class="bg-background text-on-background min-h-screen flex">
    <?= view('include/sidebar_admin', ['active' => 'operateurs']) ?>
    <main class="flex-1 lg:ml-72 flex flex-col min-h-screen">
        <header class="flex justify-between items-center w-full px-gutter h-16 sticky top-0 z-40 bg-surface shadow-sm">
            <div class="flex items-center gap-lg">
                <button class="lg:hidden p-xs rounded-full hover:bg-surface-container">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <h2 class="font-headline-md text-headline-md text-on-surface">Modifier un Opérateur</h2>
            </div>
        </header>
        <div class="flex-1 p-gutter max-w-[800px] w-full mx-auto">
            <div class="flex items-center gap-sm mb-xl">
                <a href="<?= base_url('autre-operateur') ?>" class="flex items-center gap-xs text-primary font-label-md hover:underline">
                    <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                    Retour à la liste
                </a>
            </div>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="mb-xl p-md bg-red-100 text-red-800 rounded-xl flex items-center gap-sm">
                    <span class="material-symbols-outlined">error</span>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            <div class="bg-white rounded-xl shadow-sm border border-outline-variant/30 overflow-hidden">
                <div class="p-lg border-b border-outline-variant/30">
                    <div class="flex items-center gap-sm">
                        <div class="w-10 h-10 bg-primary/10 text-primary rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-[20px]">edit</span>
                        </div>
                        <div>
                            <h3 class="font-headline-sm text-headline-sm text-on-surface">Modifier l'opérateur</h3>
                            <p class="font-body-sm text-body-sm text-secondary">Modifiez les informations de l'opérateur #<?= esc($autreOperateur['id']) ?></p>
                        </div>
                    </div>
                </div>
                <form action="<?= base_url('autre-operateur/update/' . $autreOperateur['id']) ?>" method="post" class="p-lg space-y-lg">
                    <?= csrf_field() ?>
                    <div>
                        <label for="prefix" class="block font-label-md text-label-md text-on-surface-variant mb-sm">Numéro de préfixe</label>
                        <input type="text" id="prefix" name="prefix" maxlength="3" minlength="3" pattern="[0-9]{3}" required
                            value="<?= esc($autreOperateur['prefix']) ?>"
                            class="w-full bg-surface-container-low border border-outline-variant rounded-xl px-4 py-3 text-body-md focus:ring-2 focus:ring-primary focus:outline-none transition-all">
                        <p class="mt-xs font-label-sm text-label-sm text-secondary">3 chiffres exactement</p>
                    </div>
                    <div>
                        <label for="nom" class="block font-label-md text-label-md text-on-surface-variant mb-sm">Nom de l'opérateur</label>
                        <input type="text" id="nom" name="nom" maxlength="50" required
                            value="<?= esc($autreOperateur['nom']) ?>"
                            class="w-full bg-surface-container-low border border-outline-variant rounded-xl px-4 py-3 text-body-md focus:ring-2 focus:ring-primary focus:outline-none transition-all">
                        <p class="mt-xs font-label-sm text-label-sm text-secondary">Nom complet de l'opérateur externe</p>
                    </div>
                    <div class="flex items-center gap-md pt-md">
                        <button type="submit" class="flex items-center gap-xs px-lg py-sm bg-primary text-on-primary font-label-md rounded-xl hover:shadow-lg transition-all active:scale-95">
                            <span class="material-symbols-outlined text-[20px]">save</span>
                            Mettre à jour
                        </button>
                        <a href="<?= base_url('autre-operateur') ?>" class="flex items-center gap-xs px-lg py-sm bg-surface-container-highest text-on-surface-variant font-label-md rounded-xl hover:bg-outline-variant transition-colors">
                            Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>