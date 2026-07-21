<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Types d'opérations - Admin Mobile Money</title>
    <?= view('include/tailwind_head') ?>
</head>

<body class="bg-background text-on-background min-h-screen flex">
    <?= view('include/sidebar_admin', ['active' => 'operations']) ?>
    <main class="flex-1 lg:ml-72 flex flex-col min-h-screen">
        <header class="flex justify-between items-center w-full px-gutter h-16 sticky top-0 z-40 bg-surface shadow-sm">
            <div class="flex items-center gap-lg">
                <button class="lg:hidden p-xs rounded-full hover:bg-surface-container">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <h2 class="font-headline-md text-headline-md text-on-surface">Types d'opérations</h2>
            </div>
        </header>
        <div class="flex-1 p-gutter max-w-[1200px] w-full mx-auto">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-md mb-xl">
                <div>
                    <h2 class="font-headline-md text-headline-md text-on-surface">Gestion des Types d'opérations</h2>
                    <p class="font-body-sm text-body-sm text-secondary">Ajoutez, modifiez ou supprimez les types de transactions.</p>
                </div>
            </div>
            <?php if (session()->getFlashdata('success')): ?>
                <div class="mb-xl p-md bg-green-100 text-green-800 rounded-xl flex items-center gap-sm">
                    <span class="material-symbols-outlined">check_circle</span>
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="mb-xl p-md bg-red-100 text-red-800 rounded-xl flex items-center gap-sm">
                    <span class="material-symbols-outlined">error</span>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-xl">
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-sm border border-outline-variant/30 overflow-hidden">
                        <div class="p-lg border-b border-outline-variant/30">
                            <div class="flex items-center gap-sm">
                                <div class="w-10 h-10 bg-primary/10 text-primary rounded-lg flex items-center justify-center">
                                    <span class="material-symbols-outlined text-[20px]">add_circle</span>
                                </div>
                                <div>
                                    <h3 class="font-headline-sm text-headline-sm text-on-surface">Nouveau type</h3>
                                    <p class="font-body-sm text-body-sm text-secondary">Ajouter un type d'opération</p>
                                </div>
                            </div>
                        </div>
                        <form action="<?= base_url('operations/save') ?>" method="post" class="p-lg space-y-lg">
                            <?= csrf_field() ?>
                            <div>
                                <label for="libelle" class="block font-label-md text-label-md text-on-surface-variant mb-sm">Libellé</label>
                                <input type="text" id="libelle" name="libelle" maxlength="10" required
                                    placeholder="Ex : dépôt"
                                    class="w-full bg-surface-container-low border border-outline-variant rounded-xl px-4 py-3 text-body-md focus:ring-2 focus:ring-primary focus:outline-none transition-all">
                                <p class="mt-xs font-label-sm text-label-sm text-secondary">ex: dépôt, retrait, transfert</p>
                            </div>
                            <div class="flex gap-sm pt-md">
                                <button type="submit" class="flex-grow bg-primary text-on-primary py-sm rounded-lg font-label-md text-label-md hover:bg-primary-container transition-colors shadow-md">
                                    Ajouter
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-sm border border-outline-variant/30 overflow-hidden flex flex-col">
                        <div class="p-lg border-b border-outline-variant/30 flex items-center justify-between">
                            <p class="text-body-sm text-secondary">
                                <?php if (! empty($operations) && is_array($operations)): ?>
                                    <?= count($operations) ?> type(s) d'opération(s)
                                <?php else: ?>
                                    Aucun type
                                <?php endif; ?>
                            </p>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead class="bg-surface-container-low border-b border-outline-variant/30">
                                    <tr>
                                        <th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap">#</th>
                                        <th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap">Libellé</th>
                                        <th class="px-lg py-md font-label-md text-label-md text-secondary whitespace-nowrap text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-outline-variant/20">
                                    <?php if (! empty($operations) && is_array($operations)): ?>
                                        <?php foreach ($operations as $op): ?>
                                            <tr class="hover:bg-primary/5 transition-colors group">
                                                <td class="px-lg py-md font-label-md text-label-md text-secondary"><?= esc($op['id']) ?></td>
                                                <td class="px-lg py-md">
                                                    <span class="inline-flex items-center gap-xs px-sm py-1 bg-primary/10 text-primary rounded-full font-label-md">
                                                        <span class="material-symbols-outlined text-[16px]">label</span>
                                                        <?= esc($op['libelle']) ?>
                                                    </span>
                                                </td>
                                                <td class="px-lg py-md text-right">
                                                    <div class="flex justify-end gap-xs opacity-0 group-hover:opacity-100 transition-opacity">
                                                        <a href="<?= base_url('operations/delete/' . $op['id']) ?>" class="p-2 text-error hover:bg-error/10 rounded-full transition-colors" title="Supprimer" onclick="return confirm('Supprimer ce type d\'opération ?')">
                                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="3" class="px-lg py-md text-center text-secondary">
                                                Aucun type d'opération trouvé.
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>