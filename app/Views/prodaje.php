<section class="section">
    <header class="header">
        <div class="header-block header-block-collapse d-lg-none d-xl-none">
        </div>
        <div class="header-block header-block-search">
            <form role="search">
                <div class="input-container">
                    <i class="fa fa-search"></i>
                    <input type="search" placeholder="Pretraži prodaje (Po nazivu usluge, ceni, imenu klijenta...)" style="max-width:none !important;width: 1000px !important;" id="pretraziProdaje">
                    <div class="underline"></div>
                </div>
            </form>
        </div>
    </header>
</section>
<section class="section">
    <button type="button" class="btn btn-primary btn-lg btn-block">DODAJ NOVOG KLIJENTA</button>
</section>
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <section class="example">

                        <table class="table table-striped">
                            <section>
                                <a href="index.php?page=prodaja"<button type='button' class='btn btn-danger btn-lg'>Dodaj novu prodaju</button></a>
                                <a href="index.php?page=klijent"<button type='button' class='btn btn-danger btn-lg'>Dodaj novog klijenta</button></a>
                            </section>
                            <thead>
                            <tr>
                                <th>Klijent</th>
                                <th>Usluga</th>
                                <th>Cena</th>
                                <th>Datum prodaje</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="prodajeLista">
                            <?php foreach ($data as $prodaja): ?>
                            <tr>
                                <th scope="row"><?= $prodaja->nazivKlijent ?></th>
                                <td><?= $prodaja->nazivUsluga ?></td>
                                <td><?= $prodaja->cena ?></td>
                                <td><?= $prodaja->datumUsluge ?></td>
                                <td><a href="index.php?page=prodaje&action=generatePdf&id=<?= $prodaja->id ?>"><button type="button" class="btn btn-danger-outline">Generiši PDF fakturu</button></a></td>
                                <td><a href="index.php?page=prodaje&action=sendEmail&id=<?= $prodaja->id ?>"><button type="button" class="btn btn-danger-outline">Pošalji izveštaj klijentu na mail</button></a></td>
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