const entradas = document.getElementById('entradas');
const anticuchos = document.getElementById('anticuchos');
const cervezas = document.getElementById('cervezas');
const gaseosas = document.getElementById('gaseosas');
const vinos = document.getElementById('vinos');
const templateCard = document.getElementById('template-card').content;

document.addEventListener('DOMContentLoaded', () => {
    fetchData();
});

const fetchData = async () => {
    try {
        const res = await fetch('../carrito/api.json');
        const data = await res.json();
        // console.log(data)
        imprimirEntradas(data);
        imprimirAnticuchos(data);
        imprimirCervezas(data);
        imprimirGaseosas(data);
        imprimirVinos(data);
    } catch (error) {
        console.log(error);
    }
};


//Imprimir Entradas
const imprimirEntradas = data => {
    data.forEach(producto => {
        if (producto.id <= 4) {
            templateCard.querySelector('h3').textContent = producto.title;
            templateCard.querySelector('.precio').textContent = producto.precio;
            templateCard.querySelector('img').setAttribute("src", producto.thumbnailUrl);
            templateCard.querySelector('button').dataset.id = producto.id;
            templateCard.querySelector('.btn').dataset.id = producto.id;
            const clone = templateCard.cloneNode(true);
            fragment.appendChild(clone);
        }
    });
    entradas.appendChild(fragment);
};

//Imprimir Anticuchos
const imprimirAnticuchos = data => {
    data.forEach(producto => {
        if (producto.id > 4 && producto.id <= 7) {
            templateCard.querySelector('h3').textContent = producto.title;
            templateCard.querySelector('.precio').textContent = producto.precio;
            templateCard.querySelector('img').setAttribute("src", producto.thumbnailUrl);
            templateCard.querySelector('button').dataset.id = producto.id;
            templateCard.querySelector('.btn').dataset.id = producto.id;
            const clone = templateCard.cloneNode(true);
            fragment.appendChild(clone);
        }
    });
    anticuchos.appendChild(fragment);
};

//Imprimir Cervezas
const imprimirCervezas = data => {
    data.forEach(producto => {
        if (producto.id > 7 && producto.id <= 9) {
            templateCard.querySelector('h3').textContent = producto.title;
            templateCard.querySelector('.precio').textContent = producto.precio;
            templateCard.querySelector('img').setAttribute("src", producto.thumbnailUrl);
            templateCard.querySelector('button').dataset.id = producto.id;
            templateCard.querySelector('.btn').dataset.id = producto.id;
            const clone = templateCard.cloneNode(true);
            fragment.appendChild(clone);
        }
    });
    cervezas.appendChild(fragment);
};

//Imprimir Gaseosas
const imprimirGaseosas = data => {
    data.forEach(producto => {
        if (producto.id > 9 && producto.id <= 11) {
            templateCard.querySelector('h3').textContent = producto.title;
            templateCard.querySelector('.precio').textContent = producto.precio;
            templateCard.querySelector('img').setAttribute("src", producto.thumbnailUrl);
            templateCard.querySelector('button').dataset.id = producto.id;
            templateCard.querySelector('.btn').dataset.id = producto.id;
            const clone = templateCard.cloneNode(true);
            fragment.appendChild(clone);
        }
    });
    gaseosas.appendChild(fragment);
};

//Imprimir Vinos
const imprimirVinos = data => {
    data.forEach(producto => {
        if (producto.id > 11 && producto.id <= 13) {
            templateCard.querySelector('h3').textContent = producto.title;
            templateCard.querySelector('.precio').textContent = producto.precio;
            templateCard.querySelector('img').setAttribute("src", producto.thumbnailUrl);
            templateCard.querySelector('button').dataset.id = producto.id;
            templateCard.querySelector('.btn').dataset.id = producto.id;
            const clone = templateCard.cloneNode(true);
            fragment.appendChild(clone);
        }
    });
    vinos.appendChild(fragment);
};
