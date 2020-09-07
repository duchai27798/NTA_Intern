let listData = [];

fetchJSONFile('mock.json', function (data) {
    listData = data;
    renderView();
});

function renderView() {
    const projectListEl = document.getElementById('table-body');
    projectListEl.innerHTML = "";
    const cartDetail = JSON.parse(localStorage.getItem('cartDetail'));
    let listId = [];

    if (cartDetail) {
        listId = Object.keys(cartDetail);
    }

    document.getElementById('number-card').innerText = listId ? listId.length : 0;

    for (let item of listData) {
        if (listId.includes(item['id'].toString())) {
            const tr = document.createElement('tr');
            const tdProduct = document.createElement('td');
            const tdQuantity = document.createElement('td');
            const tdAction = document.createElement('td');

            tdProduct.innerHTML = `<div class="d-flex align-items-center product"><img src="${item['product_img']}"><div class="ml-3"><h4>${item['name']}</h4><span>${item['price']}</span></div></div>`;
            tr.appendChild(tdProduct);

            tdQuantity.innerHTML = `${cartDetail[item['id']]}`;
            tdQuantity.className = 'align-middle quantity';
            tr.appendChild(tdQuantity);

            const button = document.createElement('button');
            button.className = 'btn btn-remove';
            button.innerHTML = '<i class="far fa-trash-alt"></i>';
            button.onclick = () => removeItemCart(item['id']);
            tdAction.className = 'align-middle';
            tdAction.appendChild(button);
            tr.appendChild(tdAction);

            projectListEl.appendChild(tr);
        }
    }
}

function removeItemCart(id) {
    let cartDetail = JSON.parse(localStorage.getItem('cartDetail')) || {};

    delete cartDetail[id];

    localStorage.setItem('cartDetail', JSON.stringify(cartDetail));

    renderView();
}
