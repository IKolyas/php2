<?php /** @var \app\controllers\Controller $model */?>
<div class="card">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title"><?= $model->product_name ?></h5>
        <p class="card-text"><?= $model->product_description ?></p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">ID: <?= $model->id ?></li>
        <li class="list-group-item">cat ID: <?= $model->category_id ?></li>
        <li class="list-group-item">Price: <?= $model->product_price ?></li>
    </ul>
    <form action="/basket/add" method="post">
        <input type="hidden" name="params[id]" value="<?= $model->id ?>">
        <input type="hidden" name="params[quantity]" value="1">
        <input type="submit" value="добавить в корзину">
    </form>
</div>