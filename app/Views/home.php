<article class="content dashboard-page">
    <section class="section">
        <a href="index.php?page=klijent"><button type="button" class="btn btn-primary btn-lg btn-block">DODAJ NOVOG KLIJENTA</button></a>
        <a href="index.php?page=prodaja"><button type="button" class="btn btn-primary btn-lg btn-block">DODAJ NOVU PRODAJU</button></a>
            <a href="index.php?page=prodaja"><button type="button" class="btn btn-primary btn-lg btn-block">GENERIŠI FAKTURU</button></a>
    </section>
    <section class="section">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title"> Poslednjih 5 prodaja </h3>
                        </div>
                        <section class="example">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Klijent</th>
                                    <th>Usluga</th>
                                    <th>Datum</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($data['poslednjihPetProdaja'] as $prodaja):
                                ?>
                                <tr>
                                    <th scope="row"><?= $prodaja->nazivKlijent ?></th>
                                    <td><?= $prodaja->nazivUsluga ?></td>
                                    <td><?= $prodaja->datumUsluge ?></td>
                                    <td><a href="index.php?page=prodaje&action=generatePdf&id=<?= $prodaja->id ?>"><button type="button" class="btn btn-danger-outline">PDF faktura</button></a></td>
                                </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title"> Poslednjih 5 klijenata </h3>
                        </div>
                        <section class="example">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Naziv</th>
                                    <th>Delatnost</th>
                                    <th>Telefon</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    foreach ($data['poslednjihPetKlijenata'] as $klijent):
                                ?>
                                <tr>
                                    <th scope="row"><?= $klijent->naziv ?></th>
                                    <td><?= $klijent->delatnost ?></td>
                                    <td><?= $klijent->telefon ?></td>
                                    <td><a href="index.php?page=klijenti&action=klijentProfile&id=<?= $klijent->id ?>"><button type="button" class="btn btn-danger-outline"> Ostvarene prodaje</button></td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>