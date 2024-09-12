<!DOCTYPE html>
<html>
<head>
    <title>Resultados OCR</title>
</head>
<body>
    <?php
        /**
         * @autor Bombo ALN
         * @fecha 2024-09-11
         */
    if (!empty($res)): ?>
        <ul>
            <?php foreach ($res as $re): ?>
                <li>OCR: <?= htmlspecialchars($re); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Sin resultados.</p>
    <?php endif; ?>

    <a href="<?= base_url() ?>">Volver</a>
</body>
</html>
