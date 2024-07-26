const productoForm = document.getElementById('productoForm');
productoForm.addEventListener('submit', (event) => {
    event.preventDefault();
    addProducto(event);
});

async function addProducto(event) {
    event.preventDefault();

    const nombre = document.getElementById('name').value;
    const descripcion = document.getElementById('description').value;
    const precio = document.getElementById('price').value;
    const stock = document.getElementById('stock').value;
    const categoria = document.getElementById('category').value;
    const imagen_producto = document.getElementById('imagen_producto');
    const estado = document.getElementById('estado').value;

    const file = imagen_producto.files[0];

    const formData = new FormData();
    formData.append('nombre', nombre);
    formData.append('descripcion', descripcion);
    formData.append('precio', precio);
    formData.append('stock', stock);
    formData.append('categoria', categoria);
    formData.append('imagen', file);
    formData.append('estado', estado);
    console.log(file);

    try {
        const response = await fetch('http://localhost/REFACTORIZACION/businessLogic/swproductos.php', {
            method: 'POST',
            body: formData
        });
    } catch (error) {
        console.error('Error al agregar producto:', error);
    }
}