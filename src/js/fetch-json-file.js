/**
 * fetch data from json file
 * @param path: file's url
 * @param callback
 */
function fetchJSONFile(path, callback) {
    const httpRequest = new XMLHttpRequest();

    httpRequest.onreadystatechange = function () {
        if (httpRequest.readyState === 4) {
            /* fetch success */
            if (httpRequest.status === 200) {
                /* convert response to json */
                const data = JSON.parse(httpRequest.responseText);

                /* execute callback */
                if (callback) callback(data);
            }
        }
    };

    httpRequest.open('GET', path);
    httpRequest.send();
}
