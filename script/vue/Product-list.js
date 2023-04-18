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
            AddToCart();
        },
        show(product) {
            // console.log("show");
            Goo();
        },
    }
});

function AddToCart(product_id)
{
    let xhr = new XMLHttpRequest();
    let url = "./data.php";
    let params = "query=INSERT INTO `products` (`id_product`, `name`) VALUES (NULL, 'Bread');";
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            let response = xhr.responseText;
            if (response) {
                let data = JSON.parse(response);
                console.log(data);
            } else {
                console.log("Empty response from server");
            }
        } else if (xhr.readyState == 4 && xhr.status != 200) {
            console.log("Error executing request: " + xhr.status);
        }
    }
    xhr.send(params);
    console.log("end of add");
}

// function OutputFile(src)
// {
//     var request = new XMLHttpRequest();
//         request.open("GET", src, false);
//         request.send(null);
//         // var returnValue = request.responseText;
//         // return returnValue;
//         console.log(request.responseText);
// }

// function Foo()
// {
//     localStorage.setItem();
//     console.log('saved');
// }

// function Goo()
// {
//     console.log(localStorage.getItem('id'));
// }

// function WriteInFile(src, data)
// {
//     var textFile = null,
//   makeTextFile = function (text) {
//     var data = new Blob([text], {type: 'text/plain'});

//     // If we are replacing a previously generated file we need to
//     // manually revoke the object URL to avoid memory leaks.
//     if (textFile !== null) {
//       window.URL.revokeObjectURL(textFile);
//     }

//     textFile = window.URL.createObjectURL(data);

//     // returns a URL you can use as a href
//     return textFile;
//   };


//     // console.log('in write');
//     // let formData = new FormData(src);
//     // formData.append("some", "choto");


//     // var request = new XMLHttpRequest();
//     //     request.open("POST", src, false);
//     //     request.se
// }