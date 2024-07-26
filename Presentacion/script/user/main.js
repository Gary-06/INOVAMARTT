console.log("hi")
async function getCategorias() {
    try {
      const response = await fetch('http://localhost/REFACTORIZACION/businessLogic/swcategorias.php');
      const data = await response.json();

      console.log(data)
  
      const categorias = data;
  
      const tableBody = document.querySelector('#table-categoria tbody');
      tableBody.innerHTML = '';
      let cont=1
  
      categorias.forEach(categoria => {
       
        // Create table row
        const row = document.createElement('tr');
  
        // Create cells for each user property
        const id = document.createElement('td');
        id.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
        id.textContent = cont++;
  
        const nombre= document.createElement('td');
        nombre.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
        nombre.textContent = categoria.nombre;
  
        const descripcion = document.createElement('td');
        descripcion.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
        descripcion.textContent = categoria.descripcion;
  
        // Create action cell with icons
        const actionsCell = document.createElement('td');
  
        // edit icon
        const editIcon = document.createElement('i');
        editIcon.classList.add('fas', 'fa-edit', 'text-blue-500', 'cursor-pointer', 'mr-2');
        editIcon.setAttribute('title', 'Editar');
        editIcon.addEventListener('click', () => openEditForm(categoria));
  
        // delete icon
        const deleteIcon = document.createElement('i');
        deleteIcon.classList.add('fas', 'fa-trash-alt', 'text-red-500', 'cursor-pointer', 'mr-2');
        deleteIcon.setAttribute('title', 'Eliminar');
        deleteIcon.addEventListener('click', () => deleteCategoria(categoria.id));
  
        // Add icons to the action cell
        actionsCell.appendChild(editIcon);
        actionsCell.appendChild(deleteIcon);
  
        // Add cells to row
        row.appendChild(id);
        row.appendChild(nombre);
        row.appendChild(descripcion);
        row.appendChild(actionsCell);
  
        // Add row to table
        tableBody.appendChild(row);
      });
  
    } catch (error) {
      console.error('Error al obtener categorías:', error);
    }
  }
  
  // user delete function
  async function deleteCategoria(id) {
    Swal.fire({
      title: '¿Estás seguro?',
      text: '¡No podrás revertir esto!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Sí, eliminar!',
      cancelButtonText: 'Cancelar'
    }).then(async (result) => {
      if (result.isConfirmed) {
        try {
          const response = await fetch(`http://localhost/REFACTORIZACION/businessLogic/swcategorias.php?id=${id}`, {
            method: 'DELETE'
          });
          const result = await response.json();
          if (result.success) {
            Swal.fire({
              icon: 'success',
              title: 'Eliminado!',
              text: result.message,
              confirmButtonText: 'Aceptar'
            });
            getCategorias();
          } else {
            throw new Error(result.message);
          }
        } catch (error) {
          console.error('Error al eliminar la categoría:', error);
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Hubo un error al eliminar la categoría',
            confirmButtonText: 'Aceptar'
          });
        }
      }
    });
  }
  
  //Open Update form
  function openEditForm(categoria) {
    const newWindow = window.open('../Categoria/updateCategoria.php', '_blank', 'width=600,height=600');
  
    newWindow.onload = function() {
      newWindow.postMessage(categoria, '*');
    };
  
    newWindow.onbeforeunload = function() {
      getCategorias();
    };
  }

  document.addEventListener('DOMContentLoaded', getCategorias);
