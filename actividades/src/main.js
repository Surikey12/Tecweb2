//Función de clase 
function getDatos(){
    var nombre = window.prompt("Nombre: ", "");
    var edad = prompt("Edad: ", "");

    var div1 = document.getElementById('nombre');
    div1.innerHTML = '<h3> Nombre: ' + nombre + '</h3>';

    var div2 = document.getElementById('edad');
    div2.innerHTML = '<h3> Edad: ' + edad + '</h3>';
}

//Función 1
function HolaMundo(){
    document.write('Hola Mundo');
}
//Función 2
function Nombre(){
    var nombre = 'Juan';
    var edad = 10
    ;
    var altura = 1.92
    ;
    var casado = false
    ;

    document.write( nombre );
    document.write( '<br>' );
    document.write( edad );
    document.write( '<br>' );
    document.write( altura );
    document.write( '<br>' );
    document.write( casado );
}
//Función 3
function Nombre2(){
    var nombre;
    var edad;
    nombre = prompt('Ingresa tu nombre:', '');
    edad = prompt('Ingresa tu edad:', '');
    document.write('Hola ');
    document.write(nombre);
    document.write(' así que tienes ');
    document.write(edad);
    document.write(' años');
}
//Función 4
function Numeros(){
    var valor1;
    var valor2;
    valor1 = prompt('Introducir primer número:', '');
    valor2 = prompt('Introducir segundo número', '');
    var suma = parseInt(valor1)+parseInt(valor2);
    var producto = parseInt(valor1)*parseInt(valor2);
    document.write('La suma es ');
    document.write(suma);
    document.write('<br>');
    document.write('El producto es ');
    document.write(producto);
}
//Función 5
function SentenciaIf(){
    var nombre;
    var nota;
    nombre = prompt('Ingresa tu nombre:', '');
    nota = prompt('Ingresa tu nota:', '');
    if (nota>=4) {
    document.write(nombre+' esta aprobado con un '+nota);
    }
}
//Función 6
function SentenciaIf_else(){
    var num1,num2;
    num1 = prompt('Ingresa el primer número:', '');
    num2 = prompt('Ingresa el segundo número:', '');
    num1 = parseInt(num1);
    num2 = parseInt(num2);
    if (num1>num2) {
    document.write('el mayor es '+num1);
    }
    else {
    document.write('el mayor es '+num2);
    }
}
//Función 7
function AnidadosIf_else(){
    var nota1,nota2,nota3;

    nota1 = prompt('Ingresa 1ra. nota:', '');
    nota2 = prompt('Ingresa 2da. nota:', '');
    nota3 = prompt('Ingresa 3ra. nota:', '');

    //Convertimos los 3 string en enteros
    nota1 = parseInt(nota1);
    nota2 = parseInt(nota2);
    nota3 = parseInt(nota3);

    var pro;
    pro = (nota1+nota2+nota3)/3;
    if (pro>=7) {
        document.write('aprobado');
        }
        else {
        if (pro>=4) {
        document.write('regular');
        }
        else {
        document.write('reprobado');
        }
    }
}
//Función 8
function SentenciaSwitch(){
    var valor;
    valor = prompt('Ingresar un valor comprendido entre 1 y 5:', '' );
    //Convertimos a entero
    valor = parseInt(valor);
    switch (valor) {
        case 1: document.write('uno');
        break;

        case 2: document.write('dos');
        break;

        case 3: document.write('tres');
        break;

        case 4: document.write('cuatro');
        break;

        case 5: document.write('cinco');
        break;

        default:document.write('debe ingresar un valor comprendido entre 1 y 5.');
    }
}
//Función 9
function SwitchColores(){
    var col;
    col = prompt('Ingresa el color con que quierar pintar el fondo de la ventana (rojo, verde, azul)' , '');
    switch (col) {
        case 'rojo': document.bgColor='#ff0000';
        break;

        case 'verde': document.bgColor='#00ff00';
        break;

        case 'azul': document.bgColor='#0000ff';
        break;

    }
}
//Función 10
function SentenciaWhile(){
    var x;
    x=1;
    while (x<=100) {
    document.write(x);
    document.write('<br>');
    x=x+1;
    }
}
//Función 11
function Acumulador(){
    var x=1;
    var suma=0;
    var valor;
    while (x<=5){
    valor = prompt('Ingresa el valor:', '');
    valor = parseInt(valor);
    suma = suma+valor;
    x = x+1;
    }
    document.write("La suma de los valores es "+suma+"<br>");
}
//Función 12
function SentenciaDo_While(){
    var valor;
    do{
        valor = prompt('Ingresa un valor entre 0 y 999:', '');
        valor = parseInt(valor);
        document.write('El valor '+valor+' tiene ');
        if (valor<10)
            document.write('Tiene 1 dígitos');
        else
            if (valor<100) {
                document.write('Tiene 2 dígitos');
            }
            else {
                document.write('Tiene 3 dígitos');
            }
                document.write('<br>');
    }while(valor!=0);
}
//Función 13
function SentenciaFor(){
    var f;
    for(f=1; f<=10; f++)
    {
        document.write(f+" ");
    }
}
//Función 14
function Implementacion(){
    document.write("Cuidado<br>");
    document.write("Ingresa tu documento correctamente<br>");
    document.write("Cuidado<br>");
    document.write("Ingresa tu documento correctamente<br>");
    document.write("Cuidado<br>");
    document.write("Ingresa tu documento correctamente<br>");
}
//Función 15
function MensajeFunciones() {
    function mostrarMensaje() {
        document.write("Cuidado<br>");
        document.write("Ingresa tu documento correctamente<br>");
        }
        mostrarMensaje();
        mostrarMensaje();
        mostrarMensaje();
}
//Función 16
function Rango(){
    function mostrarRango(x1,x2) {
        var inicio;
        for(inicio=x1; inicio<=x2; inicio++) {
            document.write(inicio+' ');
        
        }
        }
        var valor1,valor2;
        valor1 = prompt('Ingresa el valor inferior:', '');
        valor1 = parseInt(valor1);
        valor2 = prompt('Ingresa el valor superior:', '');
        valor2 = parseInt(valor2);
        mostrarRango(valor1,valor2);
}

//Función 17
function RetornoV(){
    function convertirCastellano(x) {

        if(x==1)
        return "uno";
        else
        if(x==2)
        
        return "dos";
        else
        if(x==3)
        return "tres";
        else
        if(x==4)
        
        return "cuatro";
        
        else
        
        if(x==5)
        return "cinco";
        else
        return "valor incorrecto";
        
    }
    var valor = prompt("Ingresa un valor entre 1 y 5", "");
    valor = parseInt(valor);
    var r = convertirCastellano(valor);
    document.write(r);
}
//Función 18
function RetornoSwitch(){
    function convertirCastellano(x) {
        switch (x) {
            case 1: return "uno";
            case 2: return "dos";
            case 3: return "tres";
            case 4: return "cuatro";
            case 5: return "cinco";
            default: return "valor incorrecto";
        }
    }
    var valor = prompt("Ingresa un valor entre 1 y 5", "");
    valor = parseInt(valor);
    var r = convertirCastellano(valor);
    document.write(r);
    
    
}