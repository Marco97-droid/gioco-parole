import { fourLetters } from "./4LettersWords";
import { fiveLetters } from "./5LettersWords";
import { threeLetters } from "./3LettersWords";
import { sixLetters } from "./6LettersWords";

let allWords =  threeLetters.concat(fourLetters).concat(fiveLetters).concat(sixLetters);

export default allWords;
