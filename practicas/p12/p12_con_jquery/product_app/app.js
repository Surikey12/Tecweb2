// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;

    // SE LISTAN TODOS LOS PRODUCTOS
    //listarProductos();
}

$(document).ready(function() {
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
    
        let nombre = $('#name').val();
        let productData = JSON.parse($('#description').val());  // Parsear el JSON del textarea para modificarlo
    
        let marca = productData.marca;
        let modelo = productData.modelo;
        let precio = productData.precio;
        let detalles = productData.detalles;
        let unidades = productData.unidades;
        let imagen = productData.imagen;
    
        // Validar nombre del producto
        if (nombre.length === 0 || nombre.length > 100) {
            errores.push('El nombre del producto es obligatorio y debe tener 100 caracteres o menos.');
        }
    
        // Validar precio
        if (isNaN(precio) || precio <= 99.99) {
            errores.push('El precio es requerido y debe ser mayor a 99.99');
        }
    
        // Validar unidades
        if (isNaN(unidades) || unidades < 0) {
            errores.push('Las unidades son requeridas y deben ser un número entero positivo.');
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
            nombre: nombre,
            marca: marca,
            modelo: modelo,
            precio: precio,
            detalles: detalles,
            unidades: unidades,
            imagen: imagen
        };
    
    
    
        // Enviar los datos vía AJAX
        $.ajax({
            url: 'backend/product-add.php',  // Cambia a la ruta correcta del backend
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
                            <td>${product.nombre}</td>
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
});

