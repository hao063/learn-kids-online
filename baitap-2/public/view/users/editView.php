<?= __Include('layout.header') ?>
    <div class="card m-t-20">
        <div class="card-header">
            Sửa User
        </div>
        <div class="card-body card-block">
            <div class="container-fluid">
                <form action="/user/post-edit/<?=$data['data']['id']?>" method="post">
                    <?= __Include('users._form', $data) ?>
                </form>
            </div>
        </div>
    </div>

<?= __Include('layout.footer') ?>