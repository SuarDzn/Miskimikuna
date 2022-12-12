const items = document.getElementById('items');
const footer = document.getElementById('cart-footer');
const header = document.getElementById('cart-header');
const templateFooter = document.getElementById('template-footer').content;
const templateHeader = document.getElementById('template-header').content;
const templateCarrito = document.getElementById('template-carrito').content;
const fragment = document.createDocumentFragment();
let carrito = {};

document.addEventListener('DOMContentLoaded', () => {
    if (localStorage.getItem('carrito')) {
        carrito = JSON.parse(localStorage.getItem('carrito'));
        imprimirCarrito();
    }
});

items.addEventListener('click', e => {
    btnAccion(e);
});

//Añadir al Carrito
const addCarrito = e => {
    if (e.target.classList.contains('btn')) {
        setCarrito(e.target.parentElement);
    }
    e.stopPropagation();
};

const setCarrito = objeto => {
    const producto = {
        id: objeto.querySelector('.btn').dataset.id,
        title: objeto.querySelector('h3').textContent,
        precio: objeto.querySelector('.precio').textContent,
        thumbnailUrl: objeto.querySelector('img').getAttribute("src"),
        cantidad: 1
    };

    if (carrito.hasOwnProperty(producto.id)) {
        producto.cantidad = carrito[producto.id].cantidad + 1;
    }

    carrito[producto.id] = {
        ...producto
    };
    imprimirCarrito();
};

const imprimirCarrito = () => {
    items.innerHTML = '';
    Object.values(carrito).forEach(producto => {
        templateCarrito.querySelector('img').setAttribute("src", producto.thumbnailUrl);
        templateCarrito.querySelector('h3').textContent = producto.title;
        templateCarrito.querySelector('.quantity').textContent = producto.cantidad;
        templateCarrito.querySelector('.add').dataset.id = producto.id;
        templateCarrito.querySelector('.delete').dataset.id = producto.id;
        templateCarrito.querySelector('button').dataset.id = producto.id;
        templateCarrito.querySelector('.price').textContent = producto.cantidad * producto.precio;

        const clone = templateCarrito.cloneNode(true);
        fragment.appendChild(clone);
    });
    items.appendChild(fragment);
    imprimirHeader();
    imprimirFooter();

    localStorage.setItem('carrito', JSON.stringify(carrito));
};

const imprimirHeader = () => {
    header.innerHTML = '';
    if (Object.keys(carrito).length === 0) {
        header.innerHTML = '<h2>Mi Carrito</h2>';
        return;
    }

    const clone = templateHeader.cloneNode(true);
    fragment.appendChild(clone);
    header.appendChild(fragment);

    const btnVaciar = document.getElementById('vaciar-carrito');
    btnVaciar.addEventListener('click', () => {
        carrito = {};
        imprimirCarrito();
    });
};

const imprimirFooter = () => {
    footer.innerHTML = '';
    if (Object.keys(carrito).length === 0) {
        footer.innerHTML = '¡Carrito Vacío - Comience a Comprar!';
        return;
    }

    const nCantidad = Object.values(carrito).reduce((acc, {
        cantidad
    }) => acc + cantidad, 0);
    const nPrecio = Object.values(carrito).reduce((acc, {
        cantidad,
        precio
    }) => acc + cantidad * precio, 0);

    templateFooter.querySelector('.ncantidad').textContent = nCantidad;
    templateFooter.querySelector('.nprecio').textContent = nPrecio;

    const clone = templateFooter.cloneNode(true);
    fragment.appendChild(clone);
    footer.appendChild(fragment);
};

const btnAccion = e => {
    if (e.target.classList.contains('add')) {
        const producto = carrito[e.target.dataset.id];
        producto.cantidad++;
        carrito[e.target.dataset.id] = {
            ...producto
        };
        imprimirCarrito();
    }

    if (e.target.classList.contains('delete')) {
        const producto = carrito[e.target.dataset.id];
        producto.cantidad--;
        if (producto.cantidad === 0) {
            delete carrito[e.target.dataset.id];
        }
        imprimirCarrito();
    }

    e.stopPropagation();
};