<?php require_once PATH_BASE . '/app/Views/layout/header.php'; ?>

<?php if ($data['register']) : ?>
    <div class="alert alert-success alert-dismissible fade show  m-3 z-3 position-absolute  top-0 end-0" role="alert">
        Pessoa cadastrada com Sucesso
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="container">
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card w-50">
            <div class="card-header bg-body-secondary">
            Usuário
            </div>
            <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">NIS</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <th scope="row"><?= $data['user']['name'] ?></th>
                            <td><?= $data['user']['nis'] ?></td>
                        </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<?php require_once PATH_BASE . '/app/Views/layout/footer.php'; ?>
