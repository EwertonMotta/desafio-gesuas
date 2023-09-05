<?php require_once PATH_BASE . '/app/Views/layout/header.php'; ?>
    <div class="container d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header bg-body-secondary">
            Cadastre uma pessoa ou Pesquise pelo NIS:
            </div>
            <div class="card-body p-4">
                <form action="http://localhost/people/store" method="post">
                    <div>
                        <input id="data" name="data" class="form-control text-uppercase" required />
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary m-3">Cadatrar / Pesquisar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require_once PATH_BASE . '/app/Views/layout/footer.php'; ?>
