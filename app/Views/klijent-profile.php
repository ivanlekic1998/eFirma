<article class="content dashboard-page">
    <div class="section">
        <div class="row">
            <div class="col-12">
                <div class="card card-block sameheight-item">
                    <div class="title-block">
                        <h3 class="title"> Klijent:  </h3>
                    </div>
                    <?php foreach ($data["klijentInfo"] as $klijent): ?>
                    <form role="form">
                        <div class="form-group">
                            <label class="control-label">Naziv</label>
                            <input type="text" readonly="readonly" class="form-control underlined" value="<?= $klijent->naziv ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Vlasnik</label>
                            <input type="text" readonly="readonly" class="form-control underlined" value="<?= $klijent->vlasnik ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Adresa</label>
                            <input type="text" readonly="readonly" class="form-control underlined" value="<?= $klijent->adresa ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">PIB</label>
                            <input type="text" readonly="readonly" class="form-control underlined" value="<?= $klijent->PIB ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Datum partnerstva</label>
                            <input type="text" readonly="readonly" class="form-control underlined" value="<?= $klijent->datum_partnerstva ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Žiro račun</label>
                            <input type="text" readonly="readonly" class="form-control underlined" value="<?= $klijent->ziro_racun ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="text" readonly="readonly" class="form-control underlined" value="<?= $klijent->email ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Telefon</label>
                            <input type="text" readonly="readonly" class="form-control underlined" value=<?= $klijent->telefon ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Napomena</label>
                            <input type="text" readonly="readonly" class="form-control underlined" value="<?= $klijent->napomena ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Delatnost</label>
                            <input type="text" readonly="readonly" class="form-control underlined" value="<?= $klijent->delatnost ?>">
                        </div>
                    </form>
                    <?php endforeach; ?>
                    <div class="section">
                        <div class="row">
                            <div class="col-12"><a href="index.php?page=klijent&action=izmeni&id=<?= $klijent->id ?>"><button type="button" class="btn btn-primary btn-lg btn-block">Izmeni podatke o ovom klijentu</button></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title"> Sve prodaje </h3>
                        </div>
                        <section class="example">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Usluga</th>
                                    <th>Cena</th>
                                    <th>Datum prodaje</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($data['prodaje'] as $prodaja): ?>
                                <tr>
                                    <th scope="row"><?= $prodaja->usluga ?></th>
                                    <td><?= $prodaja->cena ?></td>
                                    <td><?= $prodaja->datum ?></td>
                                    <td><a href="index.php?page=prodaje&action=generatePdf&id=<?= $prodaja->id ?>"><button type="button" class="btn btn-danger-outline">Generiši PDF fakturu</button></a></td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </div>
    </section>
</article>