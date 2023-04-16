<div id="settings" class="modal">
    <div class="modal__content">
        <h2 style="color:#212121!important">Modifica parametri</h2>
        
        <div class='range'>
            <label class="label"  style="color:#212121 !important">Max Tentativi</label>
            <br>
            <input type="range"  min="2" max="10" x-model="guessesAllowed" x-on:input.change="setGuessesAllowed(guessesAllowed)" />
            <span x-text="guessesAllowed"  style="color:#fff !important"></span>
        </div>

        <div class='range'>
            <label class="label"  style="color:#212121 !important">Lettere parola</label>
            <br>
            <input type="range"  min="3" max="6" x-model="theWordLength" x-on:input.change="setTheWordLength(theWordLength)" />
            <span x-text="theWordLength"  style="color:#fff !important"></span>
        </div>

        <div class="modal__footer">
            <button class="chiudi-modal">
                <a href="#"  style="color:#fff !important">Chiudi</a>
            </button>
        </div>

        <a href="#" class="modal__close">&times;</a>
    </div>
</div>
