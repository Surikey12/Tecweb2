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
    var div1 = document.getElementById('Hola_M');
    div1.innerHTML = 'Hola Mundo';
}
//Función 2
function Nombre(){
    var nombre = 'Juan';
    var edad = 10;
    var altura = 1.92;
    var casado = false;

    var div1 = document.getElementById('Nombre');
    div1.innerHTML =  nombre + '<br>';
    var div2 = document.getElementById('Edad');
    div2.innerHTML= edad +'<br>';
    var div3 = document.getElementById('Altura');
    div3.innerHTML= altura + '<br>';
    var div4 = document.getElementById('Casado');
    div4.innerHTML =  casado + '<br>';
}
//Función 3
function Nombre2(){
    var nombre;
    var edad;
    var div1 = document.getElementById('Nombre2');
    nombre = prompt('Ingresa tu nombre:', '');
    edad = prompt('Ingresa tu edad:', '');
    div1.innerHTML ='Hola ' + nombre + ' así que tienes ' + edad + ' años';
}
//Función 4
function Numeros(){
    var valor1;
    var valor2;
    valor1 = prompt('Introducir primer número:', '');
    valor2 = prompt('Introducir segundo número', '');
    var suma = parseInt(valor1)+parseInt(valor2);
    var producto = parseInt(valor1)*parseInt(valor2);
    var div1 = document.getElementById('Suma');
    var div2 = document.getElementById('Producto');
    div1.innerHTML = 'La suma es ' + suma + '<br>';
    div2.innerHTML = 'El producto es ' + producto;
}
//Función 5
function SentenciaIf(){
    var nombre;
    var nota;
    var div1 = document.getElementById('Calificacion');
    nombre = prompt('Ingresa tu nombre:', '');
    nota = prompt('Ingresa tu nota:', '');
    if (nota>=4) {
        div1.innerHTML = nombre+' esta aprobado con un '+nota;
    }
}
//Función 6
function SentenciaIf_else(){
    var num1,num2;
    var div1 = document.getElementById('mayor');
    num1 = prompt('Ingresa el primer número:', '');
    num2 = prompt('Ingresa el segundo número:', '');
    num1 = parseInt(num1);
    num2 = parseInt(num2);
    if (num1>num2) {
        div1.innerHTML = 'el mayor es '+num1 ;
    }
    else {
        div1.innerHTML = 'el mayor es '+num2;
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
    var div1 = document.getElementById('nota');
    pro = (nota1+nota2+nota3)/3;
    if (pro>=7) {
        div1.innerHTML = 'aprobado';
        }
        else {
        if (pro>=4) {
        div1.innerHTML = 'regular';
        }
        else {
        div1.innerHTML = 'reprobado';
        }
    }
}
//Función 8
function SentenciaSwitch(){
    var valor;
    var div1 = document.getElementById('num');
    valor = prompt('Ingresar un valor comprendido entre 1 y 5:', '' );
    //Convertimos a entero
    valor = parseInt(valor);
    switch (valor) {
        case 1: div1.innerHTML = 'uno';
        break;

        case 2: div1.innerHTML = 'dos';
        break;

        case 3: div1.innerHTML = 'tres';
        break;

        case 4: div1.innerHTML = 'cuatro';
        break;

        case 5: div1.innerHTML = 'cinco';
        break;

        default:div1.innerHTML = 'debe ingresar un valor comprendido entre 1 y 5.';
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
    var div1 = document.getElementById('valor');
    x=1;
    while (x<=100) {
        div1.innerHTML += x + '<br>';
        x=x+1;
    }
}
//Función 11
function Acumulador(){
    var x=1;
    var suma=0;
    var valor;
    var div1 = document.getElementById('suma_valor');
    while (x<=5){
    valor = prompt('Ingresa el valor:', '');
    valor = parseInt(valor);
    suma = suma+valor;
    x = x+1;
    }
    div1.innerHTML = "La suma de los valores es "+suma+"<br>";
}
//Función 12
function SentenciaDo_While(){
    var valor;
    var div1 = document.getElementById('digitos');
    do{
        valor = prompt('Ingresa un valor entre 0 y 999:', '');
        valor = parseInt(valor);
        if (valor<10)
            div1.innerHTML += 'El valor '+valor+' tiene 1 dígito<br>';
        else
            if (valor<100) {
                div1.innerHTML += 'El valor '+valor+' tiene 2 dígito<br>';
            }
            else {
                div1.innerHTML += 'El valor '+valor+' tiene 3 dígito<br>';
            }
    }while(valor!=0);
}
//Función 13
function SentenciaFor(){
    var f;
    var div1 = document.getElementById('secuencia');
    for(f=1; f<=10; f++)
    {
        div1.innerHTML += f+" ";
    }
}
//Función 14
function Implementacion(){
    var div1 = document.getElementById('SinF');
    div1.innerHTML += "Cuidado<br>";
    div1.innerHTML += "Ingresa tu documento correctamente<br>";
    div1.innerHTML += "Cuidado<br>";
    div1.innerHTML += "Ingresa tu documento correctamente<br>";
    div1.innerHTML += "Cuidado<br>";
    div1.innerHTML += "Ingresa tu documento correctamente<br>";
}
//Función 15
function MensajeFunciones() {
    function mostrarMensaje() {
        var div1 = document.getElementById('ConF');
        div1.innerHTML += "Cuidado<br>";
        div1.innerHTML += "Ingresa tu documento correctamente<br>";
        }
        mostrarMensaje();
        mostrarMensaje();
        mostrarMensaje();
}
//Función 16
function Rango(){
    function mostrarRango(x1,x2) {
        var inicio;
        var div1 = document.getElementById('Rango');
        for(inicio=x1; inicio<=x2; inicio++) {
            div1.innerHTML += inicio+' ';
        
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
    var div1 = document.getElementById('NumL');
    div1.innerHTML = r;
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
    var div1 = document.getElementById('NumTxt');
    div1.innerHTML = r;
    
    
}