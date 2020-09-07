/**
 * Format string like remove space at head and end, double space, tab and especial character
 * @param str: string
 * @returns string
 */
function toCapitalize(str) {
    let listWord = [];
    let word = str[0];

    // remove space at head and end of string
    str = str.toString().trim();

    // split word and capitalize the first character
    for (let i = 1; i < str.length; i++) {
        if (str[i].match(/^[\w&.\-]*$/)) {
            word += str[i];
        } else {
            if (word.length) {
                word = word[0].toLocaleUpperCase() + word.substr(1).toLocaleLowerCase();
                listWord.push(word);
                word = '';
            }
        }
    }

    if (word.length) {
        listWord.push(word[0].toLocaleUpperCase() + word.substr(1).toLocaleLowerCase());
    }

    /* join list word to string and return */
    return listWord.join(' ');
}

/* test function */
console.log(toCapitalize('NGUYEN VAN NAM'))
console.log(toCapitalize('Nguyen van nam'))
console.log(toCapitalize('NGuyen    Van NAM'))