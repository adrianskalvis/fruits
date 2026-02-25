<?php require "views/components/header.php"; ?>

    <h1>Rediģēt augli</h1>

    <form method="POST" action="/fruits/update">
        <input type="hidden" name="id" value="<?= e($fruit["id"]) ?>">

        <label for="name">Nosaukums:</label>
        <input id="name" name="name" type="text" value="<?= e($old["name"] ?? "") ?>">
        <br><br>
        <?php if (!empty($showErrors) && !empty($errors["name"])): ?>
            <div class="error"><?= e($errors["name"]) ?></div>
        <?php endif; ?>
        <button type="submit">Saglabāt</button>
    </form>

<?php require "views/components/footer.php"; ?>