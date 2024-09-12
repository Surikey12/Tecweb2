<?php
    function Matricula($matricula) {
        global $vehiculos;
        if (isset($vehiculos[$matricula])) {
            echo '<h2>Información del vehículo con matrícula ' . $matricula . ':</h2>';
            print_r($vehiculos[$matricula]);
        } else {
            echo '<h2>No se encontró un vehículo con la matrícula ' . $matricula . '.</h2>';
        }
    }
    
    function Carros() {
        global $vehiculos;
        echo '<h2>Información de todos los vehículos registrados:</h2>';
        print_r($vehiculos);
    }
    
    
    $vehiculos = array(
        'ABC1234' => array(
            'Auto' => array(
                'marca' => 'HONDA',
                'modelo' => 2020,
                'tipo' => 'camioneta'
            ),
            'Propietario' => array(
                'nombre' => 'Alfonzo Esparza',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'C.U., Jardines de San Manuel'
            )
        ),
        'DEF5678' => array(
        'Auto' => array(
            'marca' => 'TOYOTA',
            'modelo' => 2019,
            'tipo' => 'sedán'
        ),
        'Propietario' => array(
            'nombre' => 'Luis Martínez',
            'ciudad' => 'Guadalajara, Jal.',
            'direccion' => 'Av. Chapultepec, Centro'
        )
        ),
        'GHI9012' => array(
            'Auto' => array(
                'marca' => 'FORD',
                'modelo' => 2018,
                'tipo' => 'SUV'
            ),
            'Propietario' => array(
                'nombre' => 'María González',
                'ciudad' => 'Monterrey, NL',
                'direccion' => 'Col. Del Valle'
            )
        ),
        'JKL3456' => array(
            'Auto' => array(
                'marca' => 'NISSAN',
                'modelo' => 2021,
                'tipo' => 'camioneta'
            ),
            'Propietario' => array(
                'nombre' => 'José Ramírez',
                'ciudad' => 'Toluca, Edo. Mex.',
                'direccion' => 'Col. El Cerrillo'
            )
        ),
        'MNO7890' => array(
            'Auto' => array(
                'marca' => 'CHEVROLET',
                'modelo' => 2017,
                'tipo' => 'sedán'
            ),
            'Propietario' => array(
                'nombre' => 'Ana Pérez',
                'ciudad' => 'Querétaro, Qro.',
                'direccion' => 'Av. Zaragoza, Centro'
            )
        ),
        'PQR1234' => array(
            'Auto' => array(
                'marca' => 'KIA',
                'modelo' => 2022,
                'tipo' => 'SUV'
            ),
            'Propietario' => array(
                'nombre' => 'Fernando López',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Lomas de Angelópolis'
            )
        ),
        'STU5678' => array(
            'Auto' => array(
                'marca' => 'MAZDA',
                'modelo' => 2020,
                'tipo' => 'hatchback'
            ),
            'Propietario' => array(
                'nombre' => 'Isabel Hernández',
                'ciudad' => 'Veracruz, Ver.',
                'direccion' => 'Av. Independencia, Centro'
            )
        ),
        'VWX9012' => array(
            'Auto' => array(
                'marca' => 'VOLKSWAGEN',
                'modelo' => 2021,
                'tipo' => 'sedán'
            ),
            'Propietario' => array(
                'nombre' => 'Pedro Gutiérrez',
                'ciudad' => 'Cancún, QRoo.',
                'direccion' => 'Av. Tulum, Zona Hotelera'
            )
        ),
        'YZA3456' => array(
            'Auto' => array(
                'marca' => 'AUDI',
                'modelo' => 2019,
                'tipo' => 'SUV'
            ),
            'Propietario' => array(
                'nombre' => 'Claudia Rivera',
                'ciudad' => 'Mérida, Yuc.',
                'direccion' => 'Col. Montebello'
            )
        ),
        'BCD7890' => array(
            'Auto' => array(
                'marca' => 'BMW',
                'modelo' => 2020,
                'tipo' => 'sedán'
            ),
            'Propietario' => array(
                'nombre' => 'Alejandro Jiménez',
                'ciudad' => 'Ciudad de México, CDMX',
                'direccion' => 'Col. Condesa'
            )
        ),
        'EFG1234' => array(
            'Auto' => array(
                'marca' => 'MERCEDES',
                'modelo' => 2021,
                'tipo' => 'SUV'
            ),
            'Propietario' => array(
                'nombre' => 'Luisana Torres',
                'ciudad' => 'Monterrey, NL',
                'direccion' => 'Col. San Jerónimo'
            )
        ),
        'HIJ5678' => array(
            'Auto' => array(
                'marca' => 'HYUNDAI',
                'modelo' => 2018,
                'tipo' => 'camioneta'
            ),
            'Propietario' => array(
                'nombre' => 'Julio Morales',
                'ciudad' => 'Tijuana, BC',
                'direccion' => 'Zona Río'
            )
        ),
        'KLM9012' => array(
            'Auto' => array(
                'marca' => 'TESLA',
                'modelo' => 2022,
                'tipo' => 'sedán'
            ),
            'Propietario' => array(
                'nombre' => 'Verónica Silva',
                'ciudad' => 'Guadalajara, Jal.',
                'direccion' => 'Col. Providencia'
            )
        ),
        'NOP3456' => array(
            'Auto' => array(
                'marca' => 'RENAULT',
                'modelo' => 2017,
                'tipo' => 'hatchback'
            ),
            'Propietario' => array(
                'nombre' => 'Miguel Castro',
                'ciudad' => 'León, Gto.',
                'direccion' => 'Blvd. Adolfo López Mateos'
            )
        ),
        'QRS7890' => array(
            'Auto' => array(
                'marca' => 'PEUGEOT',
                'modelo' => 2019,
                'tipo' => 'camioneta'
            ),
            'Propietario' => array(
                'nombre' => 'Sofía Vargas',
                'ciudad' => 'Oaxaca, Oax.',
                'direccion' => 'Centro Histórico'
            )
        ) 
    );
?>