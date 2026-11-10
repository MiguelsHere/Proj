<?php if (isset($_SESSION['alert'])): ?>
    <p class="alert"><?php htmlspecialchars($_SESSION['alert']) ?></p>
    <?php unset($_SESSION['alert']); ?>
<?php endif ?>