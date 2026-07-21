<!DOCTYPE html>
<html class="light" lang="fr">

<head>
       <meta charset="utf-8" />
       <meta content="width=device-width, initial-scale=1.0" name="viewport" />
       <title>NexusPay | Dépôt</title>
       <?= view('include/tailwind_head') ?>
</head>

<body class="text-on-surface">
       <?= view('include/sidebar_client', ['active' => 'depot']) ?>
       <header class="bg-white shadow-sm flex items-center px-4 h-16 w-full fixed top-0 z-50 md:pl-[300px]">
              <a href="<?= base_url('accueil') ?>" class="p-2 hover:bg-surface-container rounded-full transition-colors md:hidden">
                     <i class="bi-arrow-left"></i>
              </a>
              <h1 class="ml-2 text-headline-md font-headline-md">Effectuer un dépôt</h1>
       </header>
       <main class="pt-24 pb-24 md:pb-8 md:pl-[300px] px-4 md:px-8 min-h-screen max-w-[1440px] mx-auto">
              <?php if (session()->getFlashdata('success')): ?>
                     <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-xl flex items-center gap-2">
                            <i class="bi-check-circle"></i>
                            <?= session()->getFlashdata('success') ?>
                     </div>
              <?php endif; ?>
              <?php if (session()->getFlashdata('error')): ?>
                     <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-xl flex items-center gap-2">
                            <i class="bi-x-circle"></i>
                            <?= session()->getFlashdata('error') ?>
                     </div>
              <?php endif; ?>
              <div class="bg-white rounded-xl shadow-sm border border-outline-variant p-6">
                     <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 bg-primary-fixed-dim text-primary rounded-full flex items-center justify-center">
                                   <i class="bi-plus-circle"></i>
                            </div>
                            <div>
                                   <h2 class="text-headline-sm font-headline-sm">Nouveau dépôt</h2>
                                   <p class="text-body-sm text-on-surface-variant">Ajoutez des fonds à votre compte</p>
                            </div>
                     </div>
                     <form method="POST" action="<?= base_url('clients/depot') ?>">
                            <?= csrf_field() ?>
                            <div class="mb-6">
                                   <label class="block text-label-md font-label-md text-on-surface-variant mb-2">Montant (Ar)</label>
                                   <input type="number" name="montant" min="1" required
                                          class="w-full border border-outline-variant rounded-xl px-4 py-3 text-headline-sm focus:ring-2 focus:ring-primary focus:outline-none"
                                          placeholder="Ex: 10000">
                            </div>
                            <button type="submit" class="w-full bg-primary text-on-primary py-3 rounded-xl font-label-md hover:shadow-lg transition-all active:scale-95">
                                   Confirmer le dépôt
                            </button>
                     </form>
              </div>
       </main>
</body>

</html>