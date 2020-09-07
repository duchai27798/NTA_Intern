fetchJSONFile('mock.json', function (data) {
    const projectListEl = document.getElementById('table-body');

    for (let item of data) {
        if (item['quantity']) {
            console.log(item);
            const tr = document.createElement('tr');
            const tdProduct = document.createElement('td');
            const tdQuantity = document.createElement('td');
            const tdAction = document.createElement('td');

            tdProduct.innerHTML = `<div class="d-flex align-items-center product"><img src="${item['product_img']}"><div class="ml-3"><h4>${item['name']}</h4><span>${item['price']}</span></div></div>`;
            tr.appendChild(tdProduct);

            tdQuantity.innerHTML = `${item['quantity']}`;
            tdQuantity.className = 'align-middle quantity';
            tr.appendChild(tdQuantity);

            const button = document.createElement('button');
            button.className = 'btn btn-remove';
            button.innerHTML = '<i class="far fa-trash-alt"></i>';
            tdAction.className = 'align-middle';
            tdAction.appendChild(button);
            tr.appendChild(tdAction);

            projectListEl.appendChild(tr);
        }
    }
});
