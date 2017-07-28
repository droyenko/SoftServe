<h3>List of pets:</h3>

<ol>
    <?php foreach ($this->data as $pet): ?>
        <li><?= $pet->isYourName() . ' is a ' . get_class($pet) .
            ' it is ' . $pet->isYourColor() . ' and costs '
            . $pet->isYourPrice() . ' $'; ?></li>
    <?php endforeach; ?>
</ol>