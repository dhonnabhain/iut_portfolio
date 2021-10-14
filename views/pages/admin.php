<?php require(__DIR__ . '/../partials/admin/greeting.php') ?>

<dl class="grid grid-cols-1 lg:grid-cols-3 gap-4">
    <?php
    foreach (array_keys($cards) as $card) {
        require __DIR__ . '/../partials/admin/card.php';
    }
    ?>
</dl>

<?php
if ($cards['themes'] == 0) {
    require __DIR__ . '/../partials/admin/themes/emptyCreateTheme.php';
}
?>