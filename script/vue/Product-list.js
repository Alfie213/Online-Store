Vue.component('product-list', {
    props: ['products'],
    template:
        `<div class="product-block">
        <h2>Product List</h2>
        <product-item v-for='item in products'
        :key="item.id_product"
        :product='item'></product-item>
        </div>`
});

Vue.component('product-item', {
    props: ['product'],
    template:
        `<div class="product-item">
        </h3>{{product.title}}</h3>
        <p>{{product.price}}</p>
        <button @click="addItemCart(product)">+</button>
        <button @click="show(product)">info</button>
        </div>`,

    methods: {
        addItemCart(product) {
            console.log("add");
            console.log(product.title + " " + product.id);
        },
        show(product) {
            // console.log("show");
            OutputFile('data.txt');
        },
    }
});

function OutputFile(src)
{
    let xhr = new XMLHttpRequest();
    xhr.open('GET', src, true);
    xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
        console.log(xhr.responseText);
    }
    };
    xhr.send();
}