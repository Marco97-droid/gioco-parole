import Tile from "./Tile";
import { threeLetters } from "./3LettersWords";
import { fourLetters } from "./4LettersWords";
import { fiveLetters } from "./5LettersWords";
import { sixLetters } from "./6LettersWords";
import allWords from "./allWords";
import { timeout } from "neo-async";


export default {

        guessesAllowed: 5,
        theWordLength: 5,
        theWord: fiveLetters[Math.floor(Math.random() * (fiveLetters.length - 1) + 1)].toLowerCase(),
        currentRowIndex: 0,
        state: 'active' ,// pending, active, complete   
        errors: false,
        message : '',
        
        puntiParola:0,
        completed:false,

        letters : [
            'QWERTYUIOP'.split(''),
            'ASDFGHJKL'.split(''),
            ['Enter', ...'ZXCVBNM'.split('') , 'Backspace'],
        ],

        setGuessesAllowed(guessesAllowed) {           
            this.guessesAllowed = guessesAllowed;
            this.setTheWordLength(this.theWordLength);
            this.init();
            return;
        },


        get currentRow() {
            return this.board[this.currentRowIndex];
        },

        get currentGuess() {    
            return this.currentRow.map(tile => tile.letter).join('');
        },

        get remainingGuesses() {
            return this.guessesAllowed - this.currentRowIndex;
        },

        init() {
            //console.log(this.puntiParola);
            this.currentRowIndex = 0;
            this.board = Array.from({ length: this.guessesAllowed}, () => {
                return Array.from({ length: this.theWord.length }, (item, index) => new Tile(index));
            });
            
        },

        setTheWordLength(numero) {

            this.state = 'active';
            this.message = '';

            if(numero == 3) {
                this.theWord = threeLetters[Math.floor(Math.random() * (threeLetters.length - 1) + 1)].toLowerCase();
                this.puntiParola = 100;
            }
            if(numero == 4) {
                this.theWord = fourLetters[Math.floor(Math.random() * (fourLetters.length - 1) + 1)].toLowerCase();
                this.puntiParola = 120;
            }
            if(numero == 5) {
                this.theWord = fiveLetters[Math.floor(Math.random() * (fiveLetters.length - 1) + 1)].toLowerCase();
                this.puntiParola = 120;
            }
            if(numero == 6) {
                this.theWord = sixLetters[Math.floor(Math.random() * (sixLetters.length - 1) + 1)].toLowerCase();
                this.puntiParola = 150;
            }

            this.init();
            return;
        },

        matchingTileForKey(key) {
           return this.board.flat()
                            .filter(tile => tile.status)
                            .sort((t1,t2) => {return t2.status == 'correct'})
                            .find(tile => tile.letter == key.toLowerCase());
        },

        onKeyPress(key) {

            if(this.state != 'complete') {

                this.message = '';
                this.state = 'active';
                this.errors = false;
            
                    // validazione
                    if (/^[A-z]$/.test(key)) {

                        this.fllTile(key);

                    } else if(key == 'Backspace') {

                        this.emptyTile();
                    } 
                    else if (key == 'Enter') {
                        
                        this.submitGuess();

                    }
            }
            
        },

        fllTile(key) {
            
            for(let tile of this.currentRow) {
                if(!tile.letter ) {
                    tile.fill(key);
                    break;
                }
            }
        },

        emptyTile() {
            for(let tile of [...this.currentRow].reverse()) {
                if(tile.letter) {
                    tile.empty();
                    break;
                }
            }
        },

        async submitGuess() {
            

            if(this.currentGuess.length < this.theWord.length) {
                return;
            }
            
            if(!allWords.includes(this.currentGuess.toUpperCase())) {
                this.errors = true;
                this.message = 'La parola non esiste...';
                return; 
            }

            /*if(! await this.checkDictionary(this.currentGuess)) {
                this.errors = true;
            }*/

            Tile.updateStatusesForRow(this.currentRow, this.theWord, this.currentGuess);

            if(this.currentGuess == this.theWord) {
                
                if(this.puntiParola == 0) {
                    this.puntiParola = 10;
                }
                this.completed = true;
                this.state = 'complete';
                this.message = "Hai vinto!"  + " (+" + this.puntiParola + ")";

                this.updateStats();

            }else if(this.remainingGuesses == 1) {

                this.completed = false;
                this.puntiParola = 0;
                this.state = 'complete';
                this.message = "Hai perso. La parola corretta era: \"" + this.theWord+"\"" + " (+" + this.puntiParola + ")";
                this.updateStats();

            }else {
                this.currentRowIndex++;
                this.message = "Errore!";
                this.calcoloPunti();
                console.log(this.puntiParola);
            }   
        },

        updateStats() {

            if(this.theWordLength == 3) {
                this.threeLetterUpdateStats();
            }

            if(this.theWordLength == 4) {
                this.fourLetterUpdateStats();
            }

            if(this.theWordLength == 5) {
                this.fiveLetterUpdateStats();
            }

            if(this.theWordLength == 6) {
                this.sixLetterUpdateStats();
            }
        },

        calcoloPunti() {
            //parola 3 lettere o 4 lettere
            if(this.theWordLength == 3 || this.theWordLength == 4) {
                if(this.puntiParola > 0) {
                    this.puntiParola = this.puntiParola - 20;
                }
            }

             //parola 5 lettere
             if(this.theWordLength == 5) {
                if(this.puntiParola > 0) {
                    this.puntiParola = this.puntiParola - 30;
                }
            }

            //parola 6 lettere
            if(this.theWordLength == 6) {
                if(this.puntiParola > 0) {
                    this.puntiParola = this.puntiParola - 30;
                }
            }
        },


        threeLetterUpdateStats() {

            let userId = document.getElementById("user_id").value;

            fetch("/api/updateStats-3Letters", {
                method: "POST",
                body: JSON.stringify({
                    userId: userId,
                    punti: this.puntiParola,
                    completed: this.completed,
                  }),
                headers: {
                    "Content-type": "application/json; charset=UTF-8"
                  }
            })
            .then((response) => response.json());

        },

        fourLetterUpdateStats() {

            let userId = document.getElementById("user_id").value;

            fetch("/api/updateStats-4Letters", {
                method: "POST",
                body: JSON.stringify({
                    userId: userId,
                    punti: this.puntiParola,
                    completed: this.completed,
                  }),
                headers: {
                    "Content-type": "application/json; charset=UTF-8"
                  }
            })
            .then((response) => response.json())
            .then((json) => console.log(json));

        },

        fiveLetterUpdateStats() {

            let userId = document.getElementById("user_id").value;

            fetch("/api/updateStats-5Letters", {
                method: "POST",
                body: JSON.stringify({
                    userId: userId,
                    punti: this.puntiParola,
                    completed: this.completed,
                  }),
                headers: {
                    "Content-type": "application/json; charset=UTF-8"
                  }
            })
            .then((response) => response.json())
            .then((json) => console.log(json));

        },

        sixLetterUpdateStats() {

            let userId = document.getElementById("user_id").value;

            fetch("/api/updateStats-6Letters", {
                method: "POST",
                body: JSON.stringify({
                    userId: userId,
                    punti: this.puntiParola,
                    completed: this.completed,
                  }),
                headers: {
                    "Content-type": "application/json; charset=UTF-8"
                  }
            })
            .then((response) => response.json())
            .then((json) => console.log(json));

        }


}