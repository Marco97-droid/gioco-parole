export default class Tile {
    letter = '';
    status = ''; // corretto, presente, assente,

    fill(key) {
        this.letter = key.toLowerCase();
    }

    empty() {
        this.letter  = '';
    }
}
