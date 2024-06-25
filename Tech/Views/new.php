<?= $this->extend('layouts/main_layout') ?>


<?= $this->section('content') ?>
<div class="container mx-auto md:pt-24 p-4 md:px-16 pt-8 mb-32 space-y-8">
    <div class="flex flex-col md:flex-row gap-8">
        <?= view_cell('Components/BackArrowCell', ["url_to" => "tecnologias"]) ?>
        <p class="lg:text-4xl text-2xl">Adicionar Tecnologia </span>
        </p>
    </div>
    <?= view_cell('Tech\Cells\AddTechFormCell') ?>
</div>

<?= $this->endSection() ?>