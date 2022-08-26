<?= __Include('layout.header') ?>
    <div class="card m-t-20">
        <div class="card-header">
            Tạo Post
        </div>
        <div class="card-body card-block">
            <div class="container-fluid">
                <form action="/post/post-create" method="post">
                    <?= __Include('post._form', $data) ?>
                </form>
            </div>
        </div>
    </div>

<?= __Include('layout.footer') ?>