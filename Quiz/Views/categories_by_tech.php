<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('title') ?>Home<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container mx-auto md:pt-24 p-4 md:px-16 pt-8">
    <div class="flex flex-col md:flex-row gap-8 mb-8">
        <?= view_cell('Components/BackArrowCell', ["url_to" => "/"]) ?>
        <p class="lg:text-4xl text-2xl"><?= esc($tech_name) ?></span>
        </p>
    </div>
    <?= view_cell('Quiz\Cells\ListCategoriesCell', [
        "tech_id" => esc($tech_id)
    ]) ?>
</div>

<?= $this->endSection() ?>