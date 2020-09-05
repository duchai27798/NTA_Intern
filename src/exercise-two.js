/**
 * Compute the absolute difference between A and 19, if A greater than 19 then triple result
 * @param a: number
 * @returns: number | null
 */
function diffWith19(a) {
    /* check data type, if not number then throws error */
    if (typeof a !== 'number') {
        throw new Error('Data type of parameter is not number');
    }

    return a > 19 ? Math.abs(19 - a) * 3 : Math.abs(19 - a);
}

/* Test function */
console.log(diffWith19(12));
console.log(diffWith19(19));
console.log(diffWith19(22));
console.log(diffWith19('12'));
