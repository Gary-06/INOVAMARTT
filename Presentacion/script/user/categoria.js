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
        const result = await response.json();
        if (result.success) {
            alert(result.message);
            // Optionally, you can refresh the category list here
        } else {
            alert('Error al agregar categoría.');
        }
    } catch (error) {
        console.error('Error al agregar categoría:', error);
    }
}

async function getCategorias() {
    try {
        const response = await fetch('http://localhost/REFACTORIZACION/businessLogic/swcategorias.php', {
            method: 'GET'
        });
        const categorias = await response.json();
        // Here you can render the categories in your HTML
    } catch (error) {
        console.error('Error al obtener categorías:', error);
    }
}

async function putCategoria(id, nombreCategoria, descripcionCategoria) {
    const data = {
        id: id,
        nombre: nombreCategoria,
        descripcion: descripcionCategoria
    };
    try {
        const response = await fetch('http://localhost/REFACTORIZACION/businessLogic/swcategorias.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });
        const result = await response.json();
        if (result.success) {
            alert(result.message);
            // Optionally, you can refresh the category list here
        } else {
            alert('Error al actualizar categoría.');
        }
    } catch (error) {
        console.error('Error al actualizar categoría:', error);
    }
}

async function deleteCategoria(id) {
    try {
        const response = await fetch(`http://localhost/REFACTORIZACION/businessLogic/swcategorias.php?id=${id}`, {
            method: 'DELETE'
        });
        const result = await response.json();
        if (result.success) {
            alert(result.message);
            // Optionally, you can refresh the category list here
        } else {
            alert('Error al eliminar categoría.');
        }
    } catch (error) {
        console.error('Error al eliminar categoría:', error);
    }
}

// Example of how to call getCategorias on page load
document.addEventListener('DOMContentLoaded', getCategorias);
