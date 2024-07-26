window.addEventListener('message', (event) => {
    const producto = event.data;
    document.getElementById('id').value = producto.id;
    document.getElementById('nombre').value = producto.nombre;
    document.getElementById('descripcion').value = producto.descripcion;
    document.getElementById('precio').value = producto.precio;
    document.getElementById('stock').value = producto.stock;
    document.getElementById('categoria').value = producto.categoria;
    document.getElementById('imagen').value = producto.imagen;
    document.getElementById('estado').value = producto.estado;
});

async function updateProducto(event) {
    event.preventDefault();
    
    const id = document.getElementById('id').value;
    const nombre = document.getElementById('nombre').value;
    const descripcion = document.getElementById('descripcion').value;
    const precio = document.getElementById('precio').value;
    const stock = document.getElementById('stock').value;
    const categoria = document.getElementById('categoria').value;
    const imagen = document.getElementById('imagen').value;
    const estado = document.getElementById('estado').value;

    const producto = {
        id: id,
        nombre: nombre,
        descripcion: descripcion,
        precio: precio,
        stock: stock,
        categoria: categoria,
        imagen: imagen,
        estado: estado
    };

    console.log(producto);

    try {
        const response = await fetch('http://localhost/REFACTORIZACION/businessLogic/swproductos.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(producto)
        });
        window.close();
        
    } catch (error) {
        console.error('Error al actualizar producto:', error);
    }
}

document.getElementById('updateProductoForm').addEventListener('submit', updateProducto);
