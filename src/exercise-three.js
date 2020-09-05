/**
 * Generate number array from patternNum that all element divisible for 3
 * @param patternNum: A masked is a string that consists of digit and one asterisk(*)
 * @returns []
 */
function generateNumbersDivisibleThree(patternNum) {
    let sum = 0;
    let result = [];

    /*  */
    if (!patternNum.includes('*')) {
        throw new Error('\'patternNum\' is not pattern number');
    }

    for (let digit of patternNum) {
        if (isNaN(digit) && digit !== '*') {
            throw new Error('\'patternNum\' is not pattern number');
        }

        sum += isNaN(digit) ? 0 : parseInt(digit);
    }

    for (let i = 0; i <= 9; i++) {
        if ((sum + i) % 3 === 0) {
            
        }
    }

    return result;
}

generateNumbersDivisibleThree('1234567890*');