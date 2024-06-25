<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('title') ?>Home<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container mx-auto md:pt-24 p-4 md:px-16 pt-8 ">
    <p class="lg:text-4xl text-3xl mb-8">Selecione um quiz </p>
    <?= view_cell('Quiz\Cells\ListTechsCell') ?>
</div>


<?= $this->endSection() ?>