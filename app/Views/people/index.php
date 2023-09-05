<?php require_once PATH_BASE . '/app/Views/layout/header.php'; ?>
    <div class="container d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header bg-body-secondary">
            Usuários
            </div>
            <div class="card-body p-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">NIS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['users'] as $user) : ?>
                            <tr>
                                <th scope="row"><?= $user['name'] ?></th>
                                <td><?= $user['nis'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php require_once PATH_BASE . '/app/Views/layout/footer.php'; ?>
