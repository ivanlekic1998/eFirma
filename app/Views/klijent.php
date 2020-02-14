<article class="content dashboard-page">
    <section class="section">
        <div class="col-12">
            <div class="card card-block sameheight-item">
                <div class="title-block">
                    <?php  if(isset($_SESSION['error'])):?>
                        <button type='button' class='btn btn-danger btn-lg'><?= $_SESSION['error']; $_SESSION['error']="";?></button>
                    <?php  endif; ?>
                    <h1 class="title"> DODAVANJE NOVOG KLIJENTA </h1>
                </div>
                <form role="form" action="index.php?page=klijent/dodaj" method="POST">
                    <div class="form-group">
                        <label class="control-label">Naziv klijenta</label>
                        <input type="text" class="form-control underlined" name="naziv" placeholder="Unesi naziv klijenta">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Vlasnik</label>
                        <input type="text" class="form-control underlined" name="vlasnik" placeholder="Unesi podatke o vlasniku">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Adresa klijenta</label>
                        <input type="text" class="form-control underlined" name="adresa" placeholder="Placeholder text">
                    </div>
                    <div class="form-group">
                        <label class="control-label">PIB</label>
                        <input type="text" class="form-control underlined" name="PIB" placeholder="Placeholder text">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Datum početka saradnje</label>
                        <input type="date" class="form-control underlined" name="datum_partnerstva" placeholder="Placeholder text">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Žiro račun klijenta</label>
                        <input type="text" class="form-control underlined" name="ziro_racun" placeholder="Placeholder text">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Delatnost klijenta</label>
                        <input type="text" class="form-control underlined" name="delatnost" placeholder="Placeholder text">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input type="text" class="form-control underlined" name="email" placeholder="Placeholder text">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Telefon</label>
                        <input type="text" class="form-control underlined" name="telefon" placeholder="Placeholder text">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Napomena o klijentu</label>
                        <textarea rows="3" class="form-control underlined" name="napomena"></textarea>
                    </div>
                    <input type="submit" class="btn btn-primary btn-lg btn-block" name="btnKlijentUnesi" value="DODAJ NOVOG KLIJENTA"/>
                </form>
            </div>
        </div>
    </section>
</article>