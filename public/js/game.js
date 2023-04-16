import Tile from "./Tile";

export default {

        guessesAllowed: 3,
        wordLength: 4,
        currentRoWIndex: 0,
        currentTileIndex: 0,

        init() {
            this.board = Array.from({ length: this.guessesAllowed }, () => {
                return Array.from({ length: this.wordLength }, () => new Tile);
            });
            
        },

        onKeyPress(key) {
            
            // validazione
            if (/^[A-z]$/.test(key)) {

                this.fllTile(key);
            }
        },

        fllTile(key) {
            for(let tile of this.currentRow()) {
                if(!tile.letter ) {
                    tile.fill(key);
                    break;
                }
            }

            //this.board[this.currentRoWIndex][this.currentTileIndex] = key;

           if (this.currentTileIndex == this.wordLength - 1) {
               this.currentRoWIndex++;
               this.currentTileIndex = 0;
           } else {
               this.currentTileIndex++;
           }
        },

        currentRow() {
            return this.board[this.currentRoWIndex];
        }

}