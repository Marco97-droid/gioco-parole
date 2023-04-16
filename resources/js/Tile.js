export default class Tile {
    letter = '';
    status = ''; // correct, present, absent,

    constructor(position) {
        this.position = position;
    }



    static updateStatusesForRow(row, theWord, currentGuess) {

        let theWordSplit = theWord.split('');


        for (let tile of row) {
            if (theWordSplit[tile.position] == tile.letter) {
                tile.status = 'correct';

                theWordSplit[tile.position] = null;
            }
        }

        for (let tile of row) {
            if (theWordSplit.includes(tile.letter)) {
                tile.status = 'present';

                theWordSplit[theWordSplit.indexOf('tile.letter')] = null;
            }
        }

        for (let tile of row.filter(tile => !tile.status)) {
            if (!tile.status) {
                tile.status = 'absent';
            }
        }



        for (let tile of row) {
            tile.updateStatus(theWord);
        }

        let valori = [];
        let provaCurrentGuess = currentGuess.split('');

        provaCurrentGuess.reduce(function (accumulator, currentValue) {

            if (accumulator[currentValue]) {
                ++accumulator[currentValue];
            } else {
                accumulator[currentValue] = 1;
            }

            valori.push(accumulator[currentValue]);

            return accumulator;

        }, {});     

        row.forEach((tile, index) => {

       

            if (tile.status != 'present' ) return;

            let provaTheWord = theWord.split('');
            let countTileTheWord = provaTheWord.filter(item => item == tile.letter).length;
            let countTileCurrentGuess = provaCurrentGuess.filter(item => item == tile.letter).length;

            if (valori[index] > countTileTheWord) {
                tile.status = 'absent';
            }
            
            if ((countTileCurrentGuess > countTileTheWord) && (countTileTheWord == 2)) {
                tile.status = 'absent';

            }
            /*
            if (row.some(t => t.letter == tile.letter && tile.status == 'correct')) {

                tile.status = 'absent';
                
            }*/

        });
    }

    updateStatus(theWord) {
        if (!theWord.includes(this.letter)) {
            return this.status = 'absent';
        }

        if (this.letter == theWord[this.position]) {
            return this.status = 'correct';
        }

        this.status = 'present';
    }

    fill(key) {
        this.letter = key.toLowerCase();
    }

    empty() {
        this.letter = '';
    }
}
