
<?php if (isset($data['arr']) && is_array($data['arr'])): ?>
    <?php for ($i = 0; $i < count($data['arr']); $i++): ?>
        <h2>[<?php echo $i; ?>] = <?php echo $data['arr'][$i]; ?></h2>
    <?php endfor; ?>
<?php else: ?>
    <p>No data available</p>
<?php endif; ?>
