/**
 * Generate number array from patternNum that all element divisible for 3
 * @param patternNum: A masked is a string that consists of digit and one asterisk(*)
 * @returns []
 */
function generateNumbersDivisibleThree(patternNum) {
    let sum = 0;
    let result = [];

    /* check has only one asterisk been existed on patternNum */
    if ((patternNum.match(/\*/g) || []).length !== 1) {
        throw new Error('\'patternNum\' is not pattern number');
    }

    /* compute the sum all digit of the number */
    for (let digit of patternNum) {
        /* if any char of number isn't digit or asterisk then throws errors */
        if (isNaN(digit) && digit !== '*') {
            throw new Error('\'patternNum\' is not pattern number');
        }

        sum += isNaN(digit) ? 0 : parseInt(digit);
    }

    /* condition to the number divisible 3 is the sum of all digits divisible for 3 */
    for (let i = 0; i <= 9; i++) {
        if ((sum + i) % 3 === 0) {
            result.push(patternNum.replace('*', i))
        }
    }

    return result;
}

/* text function */
console.log(generateNumbersDivisibleThree('1*9'));
console.log(generateNumbersDivisibleThree('1234567890*'));
console.log(generateNumbersDivisibleThree('1**9'));