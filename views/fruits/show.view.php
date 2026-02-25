<?php require "views/components/header.php"; ?>

    <h1><?= e($fruit["name"]) ?></h1>

    <p>
        <a href="/fruits/edit?id=<?= e($fruit["id"]) ?>">Rediģēt</a>
    </p>

    <form method="POST" action="/fruits/destroy">
        <input type="hidden" name="id" value="<?= e($fruit["id"]) ?>">
        <button type="submit">Dzēst</button>
    </form>

<?php require "views/components/footer.php"; ?>