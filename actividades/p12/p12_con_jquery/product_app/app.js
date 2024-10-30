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
    
        let defaultImagen = "IMG/imagenDefecto.png"; 

        // Función para mostrar el mensaje de error debajo de cada campo
        function mostrarError(campo, mensaje) {
            $(campo).next('.error-message').remove();  // Elimina el mensaje previo si existe
            $(campo).after(`<span class="error-message" style="color: red;">${mensaje}</span>`);
        }

        // Función para limpiar el mensaje de error debajo de cada campo
        function limpiarError(campo) {
            $(campo).next('.error-message').remove();
        }

        // Función de validación para cada campo
        function validarCampo(campo) {
            let valid = true;
            let valor = $(campo).val();
            limpiarError(campo);

            switch (campo.id) {
                case 'name':
                    if (valor.length === 0 || valor.length > 100) {
                        mostrarError(campo, 'El nombre del producto es obligatorio y debe tener 100 caracteres o menos.');
                        valid = false;
                    }
                    break;
                case 'precio':
                    if (isNaN(valor) || valor <= 99.99) {
                        mostrarError(campo, 'El precio es requerido, debe ser numérico y mayor a 99.99.');
                        valid = false;
                    }
                    break;
                case 'unidades':
                    if (isNaN(valor) || valor < 0) {
                        mostrarError(campo, 'Las unidades son requeridas, deben ser numéricas y un número entero positivo.');
                        valid = false;
                    }
                    break;
                case 'modelo':
                    let modelPattern = /^[a-zA-Z0-9]+$/;
                    if (valor === '' || !modelPattern.test(valor) || valor.length > 25) {
                        mostrarError(campo, 'El modelo es requerido, debe ser alfanumérico y tener 25 caracteres o menos.');
                        valid = false;
                    }
                    break;
                case 'marca':
                    if (valor === '') {
                        mostrarError(campo, 'La marca es obligatoria.');
                        valid = false;
                    }
                    break;
                case 'description':
                    if (valor.length > 250) {
                        mostrarError(campo, 'Los detalles no pueden tener más de 250 caracteres.');
                        valid = false;
                    }
                    break;
                case 'img':
                    if (valor === '') {
                        $(campo).val(defaultImagen);
                    }
                    break;
            }
            return valid;
        }

        // Ejecutar la validación al perder el foco en cada campo
        $('#product-form input, #product-form textarea').on('blur', function() {
            validarCampo(this);
        });

         // Validar todos los campos y enviar el formulario si no hay errores
        $('#product-form').submit(function(e) {
            e.preventDefault();
            let valido = true;

            // Validar cada campo
            $('#product-form input, #product-form textarea').each(function() {
                if (!validarCampo(this)) {
                    valido = false;
                }
            });
            if (!valido) return;  // Detener si hay errores

            // Crear el objeto de datos finales
            const finalProductData = {
                id: $('#productId').val(),
                nombre: $('#name').val(),
                marca: $('#marca').val(),
                modelo: $('#modelo').val(),
                precio: $('#precio').val(),
                detalles: $('#description').val(),
                unidades: $('#unidades').val(),
                imagen: $('#img').val() || defaultImagen
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

    //Función para validacion de nombre
    $('#name').keyup(function(e){
        let nombre = $('#name').val();
        // Limpiar mensaje anterior
        $('#name-exists').remove();
        
        if (nombre.length > 0) {  // Validar solo si el campo tiene texto
            $.ajax({
                url: 'backend/product-name.php',
                type: 'POST',
                data: { name: nombre },
                success: function(response) {
                    let products = JSON.parse(response);
                    
                    if (products.length > 0) {
                        // Si el nombre ya existe, mostrar un mensaje en azul debajo del input
                        $('#name').after('<span id="name-exists" style="color: blue;">Ya existe un libro con este nombre.</span>');
                    }
                }
            });
        }
    });
});

