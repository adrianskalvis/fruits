<?php require "views/components/header.php"; ?>

    <h1>Augļi</h1>

    <form method="GET" action="/">
        <label for="q">Nosaukums satur:</label>
        <input id="q" name="q" type="text" value="<?= e($q) ?>">
        <button type="submit">Atlasīt</button>
    </form>

    <ul>
        <?php foreach ($fruits as $fruit): ?>
            <li>
                <a href="/fruits/show?id=<?= e($fruit["id"]) ?>">
                    <?= e($fruit["name"]) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

<?php require "views/components/footer.php"; ?>