<div class="container">
    <div class="mt-5"></div>
    <h1 class="text-center">Impostazioni</h1>
    <div class="mt-5"></div>
    <form action="" method="post" class="form-control p-5">
        <div class="d-flex justify-content-evenly align-items-center">
            <div class="time">
                <h3>Limite di tempo</h3>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="40" id="rt1" name="time" checked>
                    <label class="form-check-label" for="rt1">
                        40 Minuti
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="20" id="rt2" name="time">
                    <label class="form-check-label" for="rt2">
                        20 Minuti
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="-1" id="rt3" name="time">
                    <label class="form-check-label" for="rt3">
                        Illimitato
                    </label>
                </div>
            </div>
            <div class="errors">
                <h3>Limite di errori</h3>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="3" id="re1" name="errors" checked>
                    <label class="form-check-label" for="re1">
                        3
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="5" id="re2" name="errors">
                    <label class="form-check-label" for="re2">
                        5
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="7" id="re3" name="errors">
                    <label class="form-check-label" for="re3">
                        7
                    </label>
                </div>
            </div>
        </div>
        <br>
        <div class="d-flex justify-content-center">
            <input type="submit" class="btn btn-success ps-5 pe-5" value="IMPOSTA">
        </div>
    </form>
</div>