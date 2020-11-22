<div class="d-flex flex-column justify-content-center align-items-center w-100">


        <table class="table table-hover table-dark">
            <thead>
            <form action="#" method="post">
            <tr>
                <th scope="col">#</th>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">price</th>
                <th scope="col">quantity</th>
                <th scope="col">sum</th>
                <th scope="col">dell</th>
            </tr>
            </form>
            </thead>
            <tbody>
            <?php
            $index = 1;
            /** @var \app\models\Basket $model */
            foreach ($model as $item): ?>
            <tr>
                <th scope="row"><?=$index?></th>
                <td><?=$item->id?></td>
                <td><?=$item->product_name?></td>
                <td><?=$item->product_price?></td>
                <td>
                    <form action="/?c=basket&a=update" method="post">
                        <input type="hidden" name="params[id]" value="<?=$item->id?>">
                        <input type="number" name="params[product_quantity]" value="<?=$item->product_quantity?>">
                        <input type="submit" class="btn btn-secondary" value="применить">
                    </form>
                </td>
                <td><?=$item->sum?></td>
                <td>
                    <form action="/?c=basket&a=delete" method="post">
                        <input type="hidden" name="id" value="<?=$item->id?>">
                        <input type="submit" class="btn btn-danger" value="удалить">
                    </form>
                </td>
            </tr>
            <?
            $index++;
            endforeach; ?>
            </tbody>
        </table>
</div>