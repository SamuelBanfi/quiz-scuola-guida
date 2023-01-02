<div class="container">
    <div class="mt-5"></div>
    <h1 class="text-center">Impostazioni</h1>
    <div class="mt-5"></div>
    <form action="<?php echo URL . 'admin/update_settings' ?>" method="post" class="form-control p-5">
        <div class="d-flex justify-content-evenly">
            <div>
                <h3>Limite di tempo</h3>
                <div class="mt-3"></div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="50" id="rt1" name="time" 
                        <?php echo ($this->limit_time == 50) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="rt1">50 Minuti</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="30" id="rt2" name="time"
                        <?php echo ($this->limit_time == 30) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="rt2">30 Minuti</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="-1" id="rt3" name="time"
                        <?php echo ($this->limit_time == -1) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="rt3">Illimitato</label>
                </div>
            </div>
            <div>
                <h3>Limite di errori</h3>
                <div class="mt-3"></div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="3" id="re1" name="errors"
                        <?php echo ($this->limit_errors == 3) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="re1">3</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="5" id="re2" name="errors"
                        <?php echo ($this->limit_errors == 5) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="re2">5</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="7" id="re3" name="errors"
                        <?php echo ($this->limit_errors == 7) ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="re3">7</label>
                </div>
            </div>
            <div>
                <h3>Limite tempo di accesso (mesi)</h3>
                <div class="mt-3"></div>
                <input type="number" name="access" id="access" class="form-control"
                    value="<?php echo $this->limit_access; ?>">
            </div>
        </div>
        <br>
        <div class="d-flex justify-content-center">
            <input type="submit" class="btn btn-success ps-5 pe-5" value="IMPOSTA">
        </div>
    </form>
    <?php if (isset($_SESSION["update_settings_successful"])): ?>
        <div class="alert alert-success" role="alert">
            Impostazioni aggiornate con successo!
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION["update_settings_fail"])): ?>
        <div class="alert alert-danger" role="alert">
            Attenzione! Errore durante l'aggiornamento delle impostazioni!
        </div>
    <?php endif; ?>
</div>