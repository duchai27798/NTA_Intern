/**
 * Compute the sum of two numbers, if a equal b then triple result
 * @param a: number
 * @param b: number
 * @returns: number | null
 */
function sum(a, b) {
    /* check data type, if not number then throws error */
    if (typeof a !== 'number' || typeof b !== 'number') {
        throw new Error('Data type of parameter is not number');
    }

    return a === b ? (a + b) * 3 : a + b;
}

/* test function */
console.log(sum(5, 10));
console.log(sum(5, 5));
console.log(sum('5', 5));
