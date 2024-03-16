let productName = document.getElementById('productname')
let quantity = document.getElementById('quantity')
let price = document.getElementById('price')
let submit = document.getElementById('submit');
let isUpdate = false;
let productId = null;

// Total Price
const total = document.createElement('tr')
const totalPriceHeading = document.createElement('td')
const totalPrice = document.createElement('td')
totalPriceHeading.textContent = 'Total Price'
totalPriceHeading.colSpan = 2
totalPriceHeading.setAttribute('style', 'background:#6c7ae0; color:#fff')
totalPrice.colSpan = 5
totalPrice.setAttribute('id', 'total_price')
totalPrice.setAttribute('style', 'color:#000')
total.appendChild(totalPriceHeading)
total.appendChild(totalPrice)

// submitting form
document.querySelector('form').addEventListener('submit', (event) => {
    event.preventDefault()

    let name = productName.value.trim()
    let stock = quantity.value.trim()
    let productPrice = price.value.trim()

    if (name && stock && productPrice)
        addProduct(name, stock, productPrice, submit.name)
    else
        alert('Field is required')
})

// add & update product logic
const addProduct = (product_name, product_quantity, product_price, submit) => {
    const request = new XMLHttpRequest()
    request.open('POST', 'add.php')
    request.onload = function () {

        if (this.status === 200) {
            const response = JSON.parse(this.response)
            totalPrice.textContent=response.total_sum;

            // check for update or add task
            if (isUpdate) {
                isUpdate = false
                Array.from(document.querySelectorAll('tr')).forEach(row => {
                    if (row.id == response.id) {
                        Array.from(row.children).forEach(element => {

                            if (element.className === 'product_name')
                                element.textContent = product_name
                            else if (element.className === 'quantity') 
                                element.textContent = product_quantity
                            else if (element.className === 'price')
                                element.textContent = product_price
                            else if (element.className === 'datetime')
                                element.textContent = response.datetime
                            else if (element.className === 'total_value')
                                element.textContent = (product_quantity * product_price).toFixed(2)
                        })

                        return;
                    }
                })
            }
            else {
                productUI(response.id, product_name, product_quantity, product_price, response.datetime, product_quantity * product_price)
            }

            productName.value = ''
            quantity.value = ''
            price.value = ''
        }
    }
    request.setRequestHeader('Content-type', 'application/json')
    const totalValue = product_price * product_quantity
    if (isUpdate)
        request.send(JSON.stringify({ product_name, product_quantity, product_price, totalValue, submit, isUpdate, productId }))
    else
        request.send(JSON.stringify({ product_name, product_quantity, product_price, totalValue, submit, isUpdate }))
}

window.onload = () => {
    showProducts()
}

const showProducts = () => {
    const request = new XMLHttpRequest()
    request.open('GET', 'show.php')
    request.onload = function () {
        if (this.status === 200) {
            // display message when no products are present
            if (this.response === '0') {
                document.querySelector('.no-products').style.display = 'block';
                document.querySelector('.products-list').style.display = 'none';
            }
            else {
                document.querySelector('.products-list').style.display = 'block';
                createProduct(JSON.parse(this.response))
            }
        }
    }
    request.setRequestHeader('Content-Type', 'application/json')
    request.send()
}

// display product & total sum onload
const createProduct = (products) => {

    let totatSum = 0;
    products.forEach(product => {
        totatSum += parseInt(product[5])
        productUI(product[0], product[1], product[2], product[3], product[4], product[5])
    });

    totalPrice.textContent = totatSum.toFixed(2)
}

// create product UI 
const productUI = (id, product_name, product_quantity, product_price, datetime, total_value) => {

    const tbody = document.querySelector('tbody')
    const tr = document.createElement('tr')
    tr.setAttribute('id', id)

    const pid = document.createElement('td')
    pid.textContent = id

    const productName = document.createElement('td');
    productName.textContent = product_name
    productName.classList.add('product_name')

    const quantity = document.createElement('td')
    quantity.textContent = product_quantity
    quantity.classList.add('quantity')

    const price = document.createElement('td')
    price.textContent = parseFloat(product_price).toFixed(2)
    price.classList.add('price')

    const dateTime = document.createElement('td')
    dateTime.textContent = datetime
    dateTime.classList.add('datetime')

    const totalValue = document.createElement('td')
    totalValue.textContent = total_value
    totalValue.classList.add('total_value')

    const edit = document.createElement('td')
    edit.classList.add('edit')
    edit.innerHTML = "<i class='fa fa-edit' style='color: blue; font-size:1.2rem;'></i>";
    edit.onclick = () => update(id);

    tr.appendChild(pid)
    tr.appendChild(productName)
    tr.appendChild(quantity)
    tr.appendChild(price)
    tr.appendChild(dateTime)
    tr.appendChild(totalValue)
    tr.appendChild(edit)

    tbody.appendChild(tr)
    tbody.appendChild(total)
}

// update
const update = (id) => {
    productId = id
    const request = new XMLHttpRequest()
    request.open(`GET`, `update.php?id=${id}`);
    request.onload = function () {
        if (this.status === 200) {
            isUpdate = true
            const product = JSON.parse(this.response)
            productName.value = product.product_name
            quantity.value = product.quantity
            price.value = product.price
        }
    }
    request.setRequestHeader('Application-Type', 'application/json')
    request.send()
}
