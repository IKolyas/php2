<div class="d-flex flex-column justify-content-center align-items-center">
    <h2>My account</h2>
    <div class="d-flex">
        <h3>Hello <?= /** @var \app\models\User $user */
            $user['username']?> </h3>
        <form action="\?c=user&a=out" method="post" class="mx-3">
            <button type="submit" class="btn btn-danger">out</button>
        </form>
    </div>

</div>