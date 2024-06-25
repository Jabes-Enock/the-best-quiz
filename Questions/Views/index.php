<?= $this->extend('layouts/main_layout') ?>


<?= $this->section('content') ?>
<div class="container mx-auto md:pt-24 p-4 md:px-16 pt-8 mb-32 space-y-8">

    <div class="flex flex-col md:flex-row md:justify-between gap-8">
        <p class="lg:text-4xl text-3xl">Perguntas </p>
        <a href="<?= base_url("perguntas/adicionar") ?>"
            class="max-w-sm text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 ">
            Adicionar Pergunta
        </a>
    </div>

    <?= view_cell('Questions\Cells\TableCell') ?>
</div>

<?= $this->endSection() ?>