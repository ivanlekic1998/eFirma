<article class="content dashboard-page">
    <section class="section">
        <div class="col-12">
            <div class="card card-block sameheight-item">
                <div class="title-block">
                    <h3 class="title"> IZMENA KLIJENTA </h3>
                </div>
                <form role="form" action="index.php?page=klijent/izmeni" method="POST">
                    <div class="form-group">
                     <?php  foreach($data as $podatak): ?>
                        <input type="hidden" class="form-control underlined" name="id"  value="<?=  $podatak->id ?>">
                        <label class="control-label">Naziv klijenta</label>
                        <input type="text" class="form-control underlined" name="naziv" placeholder="Unesi naziv klijenta" value="<?=  $podatak->naziv ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Vlasnik</label>
                        <input type="text" class="form-control underlined" name="vlasnik" placeholder="Unesi podatke o vlasniku" value="<?=  $podatak->vlasnik ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Adresa klijenta</label>
                        <input type="text" class="form-control underlined" name="adresa" placeholder="Placeholder text" value="<?=  $podatak->adresa ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">PIB</label>
                        <input type="text" class="form-control underlined" name="PIB" placeholder="Placeholder text" value="<?=  $podatak->PIB ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Datum početka saradnje</label>
                        <input type="text" class="form-control underlined" name="datum_partnerstva" placeholder="Placeholder text" value="<?=  $podatak->datum_partnerstva ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Žiro račun klijenta</label>
                        <input type="text" class="form-control underlined" name="ziro_racun" placeholder="Placeholder text" value="<?=  $podatak->ziro_racun ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Delatnost klijenta</label>
                        <input type="text" class="form-control underlined" name="delatnost" placeholder="Placeholder text" value="<?=  $podatak->delatnost ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input type="text" class="form-control underlined" name="email" placeholder="Placeholder text" value="<?=  $podatak->email ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Telefon</label>
                        <input type="text" class="form-control underlined" name="telefon" placeholder="Placeholder text" value="<?=  $podatak->telefon ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Napomena o klijentu</label>
                        <textarea rows="3" class="form-control underlined" name="napomena"><?= $podatak->napomena ?></textarea>
                    </div>
                    <?php endforeach; ?>
                    <input type="submit" class="btn btn-primary btn-lg btn-block" name="btnKlijentIzmeni" value="IZMENI KLIJENTA"/>
                </form>
            </div>
        </div>
    </section>
</article>