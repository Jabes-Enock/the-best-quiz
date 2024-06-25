<?= $this->extend('layouts/main_layout') ?>


<?= $this->section('content') ?>

<div class="container mx-auto md:pt-24 p-4 md:px-16 pt-8 mb-32 space-y-8">
    <?= view_cell("Dashboard\Cells\CardsResumeCell") ?>
    <?= view_cell("Dashboard\Cells\ChartJsCell") ?>

</div>

<?= $this->endSection() ?>