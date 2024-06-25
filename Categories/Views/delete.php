<?= $this->extend('layouts/main_layout') ?>


<?= $this->section('content') ?>
<div class="container mx-auto md:pt-24 p-4 md:px-16 pt-8 mb-32 space-y-8">
    <div class="flex flex-col md:flex-row gap-8">
        <?= view_cell('Components/BackArrowCell', ["url_to" => "categorias"]) ?>
        <p class="lg:text-4xl text-2xl ">Deletando <span class="text-red-600 "><?= esc($category) ?></span></p>
    </div>

    <?= view_cell("Categories\Cells\AlertDeleteCell", ["id" => esc($id)]) ?>
</div>

<?= $this->endSection() ?>