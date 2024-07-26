window.addEventListener('message', (event) => {
    const categoria = event.data;
    document.getElementById('id').value = categoria.id;
    document.getElementById('nombre').value = categoria.nombre;
    document.getElementById('descripcion').value = categoria.descripcion;
  });
  
  async function updateCategoria(event) {
    event.preventDefault();
    
    const id = document.getElementById('id').value;
    const nombre = document.getElementById('nombre').value;
    const descripcion = document.getElementById('descripcion').value;

    const categoria = {
        id: id,
        nombre: nombre,
        descripcion: descripcion
    };

    console.log(categoria)
  
    try {
        const response = await fetch('http://localhost/REFACTORIZACION/businessLogic/swcategorias.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(categoria)
        });
        window.close();
        
    } catch (error) {
        console.error('Error al actualizar categoria:', error);
    }
}
  
  document.getElementById('updateCategoriaForm').addEventListener('submit', updateCategoria);