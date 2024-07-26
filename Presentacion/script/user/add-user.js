const categoriaForm = document.getElementById('categoriaForm');
categoriaForm.addEventListener('submit', (event) => {
    event.preventDefault();
    addCategoria(event);
});

async function addCategoria(event) {
    const nombreCategoria = document.getElementById('nameCategory').value;
    const descripcionCategoria = document.getElementById('descriptionCategory').value;
    const formData = new FormData();
    
    formData.append('nameCategory', nombreCategoria);
    formData.append('descriptionCategory', descripcionCategoria);
    try {
        const response = await fetch('http://localhost/REFACTORIZACION/businessLogic/swcategorias.php', {
            method: 'POST',
            body: formData
        });
    } catch (error) {
        console.error('Error al agregar categoría:', error);
    }
}

