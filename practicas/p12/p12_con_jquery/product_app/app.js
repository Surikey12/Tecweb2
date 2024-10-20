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
        })
    })
});