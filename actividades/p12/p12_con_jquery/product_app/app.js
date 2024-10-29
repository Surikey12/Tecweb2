function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    /*var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;*/

    // SE LISTAN TODOS LOS PRODUCTOS
    //listarProductos();
}

$(document).ready(function() {
    let edit = false;
    console.log('jQuery is working');
    fetchProducts();
    //Función para buscar productos
    $('#search').keyup(function(e){
        let search = $('#search').val();
        $.ajax({
            url: 'backend/product-search.php',
            type: 'POST',
            data: {search},
            success: function(response){
                console.log(response);
                let products = JSON.parse(response);
                let template =''; 

                products.forEach(product => {
                    template += `<li>
                        ${product.nombre}
                    </li>`
                });
                // Mostrar el contenedor si hay productos
                if (products.length > 0) {
                    $('#product-result').removeClass('d-none');
                }

                $('#container').html(template);
            }
        });
    });

    //Funcion de envio de productos
    $('#product-form').submit(function(e){
        // Obtener valores individuales de los campos
        e.preventDefault();
        // Inicializar el array de errores
        let errores = [];
        let id = $('#productId').val();
        let nombre = $('#name').val();
    
        let marca = $('#marca').val()
        let modelo = $('#modelo').val();
        let precio = $('#precio').val();
        let detalles = $('#description').val();
        let unidades = $('#unidades').val();
        let imagen = $('#img').val();
    
        // Validar nombre del producto
        if (nombre.length === 0 || nombre.length > 100) {
            errores.push('El nombre del producto es obligatorio y debe tener 100 caracteres o menos.');
        }
    
        // Validar precio
        if (isNaN(precio) || precio <= 99.99) {
            errores.push('El precio es requerido, debe ser númerico y debe ser mayor a 99.99');
        }
    
        // Validar unidades
        if (isNaN(unidades) || unidades < 0) {
            errores.push('Las unidades son requeridas, deben ser númericas y deben ser un número entero positivo.');
        }
    
        // Validar modelo
        let modelPattern = /^[a-zA-Z0-9]+$/;
        if (modelo === '' || !modelPattern.test(modelo) || modelo > 25) {
            errores.push('El modelo es requerido, debe ser alfanumérico y tener 25 caracteres o menos.');
        }
    
        // Validar marca
        if (marca === '') {
            errores.push('La marca es obligatoria.');
        }
    
        // Validar detalles (opcional, pero si existe debe tener contenido)
        if (detalles.length > 250) {
            errores.push('Los detalles no pueden tener más de 250 caracteres.');
        }
    
        // Validar imagen (opcional, puede estar vacía o tener un valor por defecto)
        let defaultImagen = "IMG/imagenDefecto.png"; 
        if (imagen === '') {
            imagen = defaultImagen;
        }
    
        // Si hay errores, mostrarlos y detener la ejecución
        if (errores.length > 0) {
            alert('Errores en los datos:\n' + errores.join('\n'));
            return; // Detener la ejecución de la función
        }  
    
        // Si no hay errores, crear el objeto productData final
        const finalProductData = {
            id : id,
            nombre: nombre,
            marca: marca,
            modelo: modelo,
            precio: precio,
            detalles: detalles,
            unidades: unidades,
            imagen: imagen
        };
    
        let url_unic = edit === false ? 'backend/product-add.php' : 'backend/product-edit.php';
    
        // Enviar los datos vía AJAX
        $.ajax({
            url: url_unic,  // Cambia a la ruta correcta del backend
            type: 'POST',
            ContentType: 'application/json',
            data: JSON.stringify(finalProductData),  // Enviar el JSON modificado
            success: function(response) {
                fetchProducts();
                let message = JSON.parse(response);
                let template ='';
                template = `<p>
                    ${message.message}
                </p>`
                // Mostrar el contenedor si hay productos
                if (message.message.length > 0) {
                    $('#product-result').removeClass('d-none');
                }
    
                $('#container').html(template);
            },
            error: function(err) {
                console.error('Error al agregar producto:', err);
            }
        });
    });

    //Función de listar productos
    function fetchProducts() {
        $.ajax({
            url: 'backend/product-list.php',
            type: 'GET',
            success: function(response){
                let products = JSON.parse(response);
                let template = '';
                products.forEach(product =>{
                    template += `
                        <tr productId = "${product.id}">
                            <td>${product.id}</td>
                            <td>
                                <a href="#" class="product-item">${product.nombre}</a>
                            </td>
                            <td>${product.detalles}</td>
                            <td>
                                <button class="product-delete btn btn-danger">
                                    Eliminar
                                </button>  
                            </td>
                        </tr>
                    `
                });
                $('#products').html(template);
            }
        });
    }

    //Función borrar producto
    $(document).on('click', '.product-delete', function(){
        if(confirm('¿Estas seguro de querer eliminar?')){
            let element= $(this)[0].parentElement.parentElement;
            let id= $(element).attr('productId');
            $.post('backend/product-delete.php', {id}, function(response){
                fetchProducts();
                let message = JSON.parse(response);
                    let template ='';
                    template = `<p>
                        ${message.message}
                    </p>`
                    // Mostrar el contenedor si hay productos
                    if (message.message.length > 0) {
                        $('#product-result').removeClass('d-none');
                    }
        
                    $('#container').html(template);
            })
        }
    });

    //Función para editar un producto
    $(document).on('click', '.product-item', function(){
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('productId');
        $.post('backend/product-single.php', {id}, function(response){
            const product = JSON.parse(response);
            $('#name').val(product.nombre);
             // Actualizar los valores del JSON base con los datos obtenidos
            var updatedJSON = {
                precio: Number(product.precio),          // Usar el precio obtenido, o el valor base si no existe
                unidades: Number(product.unidades),    // Usar las unidades obtenidas, o el valor base
                modelo: product.modelo,          // Usar el modelo obtenido
                marca: product.marca,             // Usar la marca obtenida
                detalles: product.detalles || baseJSON.detalles,    // Usar los detalles obtenidos
                imagen: product.imagen || baseJSON.imagen           // Usar la imagen obtenida, o el valor base
            };

            // Convertir el JSON modificado a string para mostrarlo en el textarea
            $('#description').val(JSON.stringify(updatedJSON, null, 2));
            $('#productId').val(product.id);
            edit = true;
        })
    })
});

