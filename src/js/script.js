fetchJSONFile('mock.json', function (data) {
    const projectListEl = document.getElementById('list-product');

    for (let item of data) {
        const div = document.createElement('div');
        const img = document.createElement('img');

        img.src = item['product_img'];
        div.className = 'd-flex flex-column col-12 col-md-6 col-lg-4 item-list align-items-center'
        div.appendChild(img);

        const h3 = document.createElement('h3')
        h3.className = 'mt-2 text-capitalize';
        h3.appendChild(document.createTextNode(item['name']))

        const span = document.createElement('span')
        span.appendChild(document.createTextNode(item['price']))

        div.appendChild(h3);
        div.appendChild(span);

        projectListEl.appendChild(div);
    }
});
