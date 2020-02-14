<article class="content dashboard-page">
    <section class="section">
        <div class="col-12">
            <div class="card card-block sameheight-item">
                <div class="title-block">
                    <h3 class="title"> DODAVANJE NOVE PRODAJE </h3>
                </div>
                <form role="form" action="index.php?page=prodaja/dodaj" method="POST">
                    <div class="form-group">
                        <label class="control-label">Klijent</label>
                        <select name="klijent">
                            <option value="0">Izaberite..</option>
                            <?php foreach($data["sviKlijenti"] as $podatak): ?>
                                <option value="<?= $podatak->id ?>"> <?= $podatak->naziv. ', '.$podatak->delatnost. ', '.$podatak->adresa ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Usluga</label>
                        <select name="usluga">
                            <option value="0">Izaberite..</option>
                            <?php foreach($data["sveUsluge"] as $podatak): ?>
                                <option value="<?= $podatak->id ?>"> <?= $podatak->naziv ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Cena</label>
                        <input type="text" class="form-control underlined" name="cena" placeholder="Unesi cenu">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Napomena o klijentu</label>
                        <textarea rows="3" class="form-control underlined" name="opis"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Datum prodaje usluge</label>
                        <input type="date" class="form-control underlined" name="datum" placeholder="Unesi naziv klijenta">
                    </div>
                    <input type="submit" class="btn btn-primary btn-lg btn-block" name="btnProdajaUnesi" value="DODAJ NOVU PRODAJU"/>
                </form>
            </div>
        </div>
    </section>
</article>