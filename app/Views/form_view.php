<!DOCTYPE html>
<html>
<head>
    <title>OCR</title>
</head>
<body>
    <?php
        /**
         * @autor Bombo ALN
         * @fecha 2024-09-11
         */
    ?>

    <h3>Cargar Archivo OCR</h3>

    <?php if (session()->getFlashdata('err')): ?>
        <p style="color: red;"><?= session()->getFlashdata('err'); ?></p>
    <?php endif; ?>

    <form action="<?= base_url(); ?>home/pft" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <input type="file" name="ocr" required />
        <button type="submit">Procesar archivo</button>
    </form>
</body>
</html>
