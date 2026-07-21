<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Préfixes - Admin Mobile Money</title>
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
                <h2 class="font-headline-md text-headline-md text-on-surface">Préfixes</h2>
            </div>
            <div class="flex items-center gap-md">
                <button class="p-sm rounded-full hover:bg-surface-container text-on-surface-variant relative">
                    <i class="bi-bell"></i>
                    <span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full"></span>
                </button>
            </div>
        </header>
        <div class="flex-1 p-gutter max-w-[1600px] w-full mx-auto">
            <!-- Header Actions -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-md mb-xl">
                <div>
                    <h2 class="font-headline-md text-headline-md text-on-surface">Gestion des Préfixes</h2>
                    <p class="font-body-sm text-body-sm text-secondary">Gérez les préfixes des opérateurs mobile money.</p>
                </div>
                <a href="<?= base_url('prefix/form') ?>" class="flex items-center gap-xs px-md py-sm bg-primary text-on-primary font-label-md rounded-xl hover:shadow-lg transition-all active:scale-95">
                    <i class="bi-plus-lg text-[20px]"></i>
                    Ajouter un préfixe
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
            <!-- Table Card -->
            <div class="bg-white rounded-xl shadow-sm border border-outline-variant/30 overflow-hidden flex flex-col">
                <div class="p-lg border-b border-outline-variant/30 flex items-center justify-between">
                    <p class="text-body-sm text-secondary">
                        <?php if (! empty($prefixes) && is_array($prefixes)): ?>
                            <?= count($prefixes) ?> préfixe(s) enregistré(s)
                        <?php else: ?>
                            Aucun préfixe
                        <?php endif; ?>
                    </p>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-surface-container-low border-b border-outline-variant/30">
                            <tr>
                                <th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap">#</th>
                                <th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap">Préfixe</th>
                                <th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap">Opérateur</th>
                                <th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant/20">
                            <?php if (! empty($prefixes) && is_array($prefixes)): ?>
                                <?php foreach ($prefixes as $prefix): ?>
                                    <tr class="hover:bg-primary/5 transition-colors group">
                                        <td class="px-lg py-md font-label-md text-label-md text-secondary"><?= esc($prefix->id) ?></td>
                                        <td class="px-lg py-md">
                                            <span class="inline-flex items-center gap-xs px-sm py-1 bg-primary/10 text-primary rounded-full font-label-md">
                                                <i class="bi-keypad text-[16px]"></i>
                                                <?= esc($prefix->prefix) ?>
                                            </span>
                                        </td>
                                        <td class="px-lg py-md font-label-md text-label-md text-on-surface"><?= esc($prefix->nom) ?></td>
                                        <td class="px-lg py-md text-right">
                                            <div class="flex justify-end gap-xs opacity-0 group-hover:opacity-100 transition-opacity">
                                                <a href="<?= base_url('prefix/edit/' . $prefix->id) ?>" class="p-2 text-primary hover:bg-primary/10 rounded-full transition-colors" title="Modifier">
                                                    <i class="bi-pencil text-[20px]"></i>
                                                </a>
                                                <a href="<?= base_url('prefix/delete/' . $prefix->id) ?>" class="p-2 text-error hover:bg-error/10 rounded-full transition-colors" title="Supprimer" onclick="return confirm('Supprimer ce préfixe ?')">
                                                    <i class="bi-trash text-[20px]"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="px-lg py-md text-center text-secondary">
                                        Aucun préfixe trouvé.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>

</html>