<?php /** @var \app\controllers\Controller $model */
foreach ($model as $item): ?>
<div class="card m-2" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title"><?=$item->product_name?></h5>
        <p class="card-text"><?=$item->product_description?></p>
        <p class="card-text">ID: <?=$item->id?></p>
        <p class="card-text">cat ID: <?=$item->category_id?></p>
        <p class="card-text">Price: <?=$item->product_price?></p>
        <a href="/product/card?id=<?=$item->id?>" class="btn btn-primary">buy</a>
    </div>
</div>
<?php endforeach; ?>