<section class="section">
    <header class="header">
        <div class="header-block header-block-collapse d-lg-none d-xl-none">
        </div>
        <div class="header-block header-block-search">
            <form role="search">
                <div class="input-container">
                    <i class="fa fa-search"></i>
                    <input type="search" placeholder="Pretraži klijente (Po nazivu, PIB-u, adresi..)" style="max-width:none !important;width: 1000px !important;" id="pretraziKlijente">
                    <div class="underline"></div>
                </div>
            </form>
        </div>
    </header>
</section>

<section class="section">
    <div class="row">
        <div class="col-12">
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-block">

                    <div class="card-title-block">
                        <h3 class="title"> Svi klijenti </h3>
                    </div>
                    <section class="example">

                        <table class="table table-striped">
                            <section>
                                <a href="index.php?page=klijent"><button type='button' class='btn btn-danger btn-lg'>Dodaj novog klijenta</button></a>
                                <a href="index.php?page=prodaja"><button type='button' class='btn btn-danger btn-lg'>Dodaj novu prodaju</button></a>
                                <?php if(isset($_SESSION['dodavanjeKlijentaOk'])): ?>
                                    <button type='button' class='btn btn-success btn-lg'><?= $_SESSION['dodavanjeKlijentaOk']; ?></button>
                                <?= $_SESSION['dodavanjeKlijentaOk'] = ""; ?>
                                <?php endif; ?>
                            </section>
                            <thead>
                            <tr>
                                <th>Naziv</th>
                                <th>Delatnost</th>
                                <th>PIB</th>
                                <th>Datum saradnje</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="klijentiLista">
                            <?php foreach ($data as $klijent):?>
                            <tr>
                                <th scope="row"> <?= $klijent->naziv ?> </th>
                                <td> <?= $klijent->delatnost ?></td>
                                <td> <?= $klijent->PIB ?></td>
                                <td> <?= $klijent->datum_partnerstva ?></td>
                                <td><a href="index.php?page=klijent&action=izmeni&id=<?= $klijent->id ?>"><button type="button" class="btn btn-danger-outline">Izmeni podatke</button></a></td>
                                <td><a href="index.php?page=klijent&action=obrisi&id=<?= $klijent->id ?>"><button type="button" class="btn btn-danger-outline">Obriši klijenta</button></a></td>
                                <td><a href="index.php?page=klijenti&action=klijentProfile&id=<?= $klijent->id ?>"><button type="button" class="btn btn-danger-outline">Profil klijenta i sve prodaje</button></a></td>
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