<?= $this->extend('layouts/main_layout') ?>


<?= $this->section('content') ?>
<div class="container mx-auto md:pt-24 p-4 md:px-16 pt-8 mb-32 space-y-8">
    <div class="flex flex-col md:flex-row gap-8">
        <?= view_cell('Components/BackArrowCell', ["url_to" => "perguntas"]) ?>
        <p class="lg:text-4xl text-2xl ">Deletando </p>
    </div>
    <p class="text-red-600 "><?= esc($question->question) ?></p>

    <?= view_cell("Questions\Cells\AlertDeleteCell", ["id" => esc($id)]) ?>
</div>

<?= $this->endSection() ?>