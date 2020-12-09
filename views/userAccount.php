<div class="d-flex flex-column justify-content-center align-items-center">
    <h2>My account</h2>
    <div class="d-flex">
        <h3>Hello <?= /** @var \app\models\User $user */
            $user['login'] ?> </h3>
        <form action="\user\out" method="post" class="mx-3">
            <button type="submit" class="btn btn-danger">out</button>
        </form>
    </div>
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h2>PRODUCTS</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">id</th>
                <th scope="col">product_name</th>
                <th scope="col">product_description</th>
                <th scope="col">product_price</th>
                <th scope="col">category_id</th>
                <th scope="col">dell</th>
            </tr>
            </thead>
            <tbody>
            <?
            $count = 1;
            /** @var \app\controllers\ProductController $products */
            foreach ($products as $product):
                ?>
                <tr>
                    <th scope="row"><?= $count ?></th>
                    <td><?= $product->id ?></td>
                    <td><?= $product->product_name ?></td>
                    <td><?= $product->product_description ?></td>
                    <td><?= $product->product_price ?></td>
                    <td><?= $product->category_id ?></td>
                    <td>
                        <form action="/product/delete" method="post">
                            <input type="hidden" name="product_id" value="<?= $product->id?>">
                            <input type="submit" value="dell">
                        </form>
                    </td>
                </tr>
                <?
                $count++;
            endforeach; ?>
            </tbody>
        </table>
        <form action="/product/add" method="post" class="d-flex flex-column">
            <label>
                product_name
                <input type="text" name="product[product_name]">
            </label>
            <label>
                product_description
                <input type="text" name="product[product_description]">
            </label>
            <label>
                product_price
                <input type="number" name="product[product_price]">
            </label>
            <label>
                category_id
                <input type="number" name="product[category_id]">
            </label>
            <input type="submit" value="create">
        </form>
    </div>

</div>