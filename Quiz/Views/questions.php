<?= $this->extend('layouts/quiz_layout') ?>

<?= $this->section('title') ?>Home<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container mx-auto  p-4 md:px-16 pt-8">
    <div class="flex flex-col md:flex-row gap-8 mb-8">
        <?= view_cell('Components/BackArrowCell', ["url_to" => "/"]) ?>
        </p>
    </div>
    <?= view_cell('Quiz\Cells\QuestionTemplateCell', [
        "category_id" => $category_id
    ]) ?>
</div>

<?= $this->endSection() ?>