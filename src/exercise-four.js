/**
 * Generate number array from patternNum that all element divisible for 6
 * @param patternNum: A masked is a string that consists of digit and one asterisk(*)
 * @returns []
 */
function generateNumbersDivisibleThree(patternNum) {
    let result = [];

    /* check has only one asterisk been existed on patternNum */
    if ((patternNum.match(/\*/g) || []).length !== 1) {
        throw new Error('\'patternNum\' is not pattern number');
    }

    /* patternNum contain only digit and asterisk */
    for (let digit of patternNum) {
        if (isNaN(digit) || digit !== '*') {
            throw new Error('\'patternNum\' is not pattern number');
        }
    }

    // generate number
    for (let i = 0; i <= 9; i++) {
        let el = patternNum.replace('*', i);
        let surplus = 0;
        let sum = 0;

        /* compute the sum all digit of the number split for 2 */
        for (let digit of el) {
            surplus = surplus * 10 + parseInt(digit);
            sum += Math.floor(surplus / 2);
            surplus %= 2;
        }

        /* the number divisible 6 if the number divisible 2 and the sum all digit of the number split for 3 */
        if (surplus === 0 && sum % 3 === 0) {
            result.push(el);
        }
    }

    return result;
}

/* text function */
console.log(generateNumbersDivisibleThree('1234567890*'));
console.log(generateNumbersDivisibleThree('1*e9'));
