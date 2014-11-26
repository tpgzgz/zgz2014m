<?php
/**
 * Combustibles y Precio
 *
 * Fuel + solicita al sistema el listado de combustibles disponibles
 * en su estación con el precio por litro de cada uno de los combustibles.
 * Se indicará el código identificativo de la estación de servicio.
 * Para cada combustible se indicará el producto, marca comercial (si procede),
 * unidad de medida, precio en euros con 3 decimales por unidad de medida.
 *
 */

GET api.servotal.com/stations/1

{
    "_links": {
        "self": {
        "href": "http://api.servotal.com/stations/1"
        }
    }
    "idstation": "1",
    "_embedded": {
        "fuels": [
            {
                "product": "Product 1",
                "commercial_name": "Commercial name 1",
                "unit": "lts",
                "price": "10.000"
            },
            {
                "product": "Product 2",
                "commercial_name": "Commercial name 2",
                "unit": "lts",
                "price": "10.000"
            }
        ]
    }
}



/**
 * Surtidores y Mangueras
 *
 * Fuel+ interroga al sistema por los surtidores disponibles y sus mangueras.
 * Se indicará el código identificativo de la estación de servicio.
 * El sistema responderá con un listado con la siguiente información;
 * Código de identificación de manguera, surtidor, producto, marca comercial,
 * unidad de medida, precio en euros por unidad de medida con 3 decimales y
 * el estado de cada uno de los surtidores.
 */

GET api.servotal.com/pumps?station=1

{
    "_links": {
        "self": {
        "href": "http://api.servotal.com/pumps?station=1"
        }
    },
    "_embedded": {
        "pumps": [
            {
                "idpump": "1",
                "fuel_station_idstation": "1",
                "fuel_pump_statuses_idpumpstatus": "1",
                "fuel_pump_payment_type": "1",
                "fuel_pump_payment_available_units": "10",
                "fuel_pump_payment_available_price": "10.000",
                "_links": {
                    "self": {
                    "href": "http://api.servotal.com/pumps/1"
                }
            }
                "_embedded": {
                    "hoses": [
                        {
                            "idhose": "1",
                            "hose_status":"1",
                            "product": "Product 1",
                            "commercial_name": "Comemrcial name 1",
                            "unit": "lts",
                            "price": "10.000"
                        },
                        {
                            "idhose": "2",
                            "hose_status":"1",
                            "product": "Product 1",
                            "commercial_name": "Comemrcial name 1",
                            "unit": "lts",
                            "price": "10.000"
                        },
                    ]
                }
            },
            {
                "idpump": "2",
                "fuel_station_idstation": "1",
                "fuel_pump_statuses_idpumpstatus": "1",
                "fuel_pump_payment_type": "1",
                "fuel_pump_payment_available_units": "10",
                "fuel_pump_payment_available_price": "10.000",
                "_links": {
                    "self": {
                    "href": "http://api.servotal.com/pumps/2"
                    }
                }
                "_embedded": {
                    "hoses": [
                        {
                            "idhose": "1",
                            "hose_status":"1",
                            "product": "Product 1",
                            "commercial_name": "Comemrcial name 1",
                            "unit": "lts",
                            "price": "10.000"
                        },
                        {
                            "idhose": "1",
                            "hose_status":"1",
                            "fuel_pump_group": "1",
                            "product": "Product 1",
                            "commercial_name": "Comemrcial name 1",
                            "unit": "lts",
                            "price": "10.000"
                        },
                    ]
                }
            }        
        ]
    },
    "page_count": 1,
    "page_size": 25,
    "total_items": 2
}

/**
 * Estatus Manguera/Surtidor
 * 
 * Fuel+ solicita el estado en el que se encuentra un surtidor, 
 * el sistema informará si está operativo y en tal caso se indicará 
 * si está en uno de los posibles estados: en uso, bloqueado, 
 * desbloqueado para repostar sin límite, desbloqueado para una cantidad 
 * de euros (se informará la cantidad de euros), desbloqueado para 
 * una cantidad de litros (se indicará la cantidad de litros). 
 * En uso y litros consumidos. Al mismo tiempo se incluirá información 
 * de si la manguera se encuentra colgada o descolgada.
 */



GET api.servotal.com/pumps/1

{
    "idpump": "1",
    "fuel_station_idstation": "1",
    "fuel_pump_statuses_idpumpstatus": "1",
    "fuel_pump_payment_type": "1",
    "fuel_pump_payment_available_units": "10",
    "fuel_pump_payment_available_price": "10.000",
    "_links": {
            "self": {
            "href": "http://api.servotal.com/pumps/2"
        }
    }
    "_embedded": {
        "hoses": [
            {
                "idhose": "1",
                "hose_status":"1",
                "product": "Product 1",
                "commercial_name": "Comemrcial name 1",
                "unit": "lts",
                "price": "10.000"
            },
            {
                "idhose": "1",
                "hose_status":"1",
                "fuel_pump_group": "1",
                "product": "Product 1",
                "commercial_name": "Comemrcial name 1",
                "unit": "lts",
                "price": "10.000"
            },
        ]
    }
}

/**
 * Abrir e iniciar reportaje
 * 
 * Fuel+ indicará el código de transacción de Fuel+, 
 * el cliente (código numérico de fuel+) y código de cliente 
 * de la estación si existiera, también informará de las 
 * promociones aplicables en función de las campañas de 
 * fidelización a las que esté adscrito el cliente y la matrícula 
 * del vehículo. Siempre se incluirá el NIF del cliente
 */


POST api.servotal.com/refuel

{
    "idrefuel": "100",
    "idstation":"1",
    "idpump":"1",
    "product":"product 1",
    "client_nif":"123456789",
    "client_vehicle_registration":"123456789",
    "idclient": "1",
    "unit": "lts",
    "price": "10.000",
    "refuel_quantity":"80.000"
}
        
RESULT
{
    "idtransaction":"10",
    "idrefuel":"100",
    "idstation":"1",
    "idpump":"1",
    "product":"product 1",
    "client_nif":"123456789",
    "client_vehicle_registration":"123456789",
    "idclient": "1",
    "unit": "lts",
    "price": "10.000",
    "refuel_quantity":"80.000"
}


/**
 * Descolgar manguera (to Fuel +)
 * 
 */

PATCH api.servotal.com/refuel/10

{
    "idrefuel": "100",
    "idstation":"1",
    "idstatus":"1"
}

/**
 * Iniciar repostaje (to Fuel +)
 * 
 */

PATCH api.servotal.com/refuel/10

{
    "idrefuel": "100",
    "idstation":"1",
    "idstatus":"2"
}

/**
 * Colgar manguera (to Fuel +)
 * 
 */

PATCH api.servotal.com/refuel/10

{
    "idrefuel": "100",
    "idstation":"1",
    "idstatus":"3",
    "quantity":"28" // informa en units o en price?
}


/**
 * Finalizar repostaje espontaneo (to Fuel +)
 * 
 */

PATCH api.servotal.com/refuel/10

{
    "idrefuel": "100",
    "idstation":"1"',
    "idstatus":"4",
    "ALBARAN"
}

/**
 * Finalizar repostaje
 * 
 */

POST api.servotal.com/transaction

{
    "idrefuel": "100",
    "id_transaction":"10",
    "idstatus":"5",
    "ALBARAN"
}

RESULT
{
    "idrefuel": "100",
    "id_transaction":"10",
    "idstatus":"5",
    "ALBARAN"   //?
}




/**
 * Albaran
 * 
 * Fuel+ indica el número de operación sobre el cual se quiere obtener el albarán. 
 * Se podrá indicar tanto el código de transacción de fuel+ como el de 
 * la estación. Poder consultar una transacción en función del identificador 
 * de fuel+ es necesario para controlar la excepción en la que se produzca 
 * un error en las comunicaciones una vez iniciado el repostaje pero sin 
 * confirmación por parte del sistema. El sistema solamente contestará con 
 * información sobre los albaranes realizados mediante la plataforma Fuel+. 
 * Informa del albarán con los datos de cabecera y las líneas 
 * (habitualmente solamente una) de las operaciones realizadas en esa transacción. 
 * Entre los datos de cabecera se incluirá obligatoriamente el código de cliente 
 * (Fuel +), código del centro y datos fiscales. Para cada línea de albarán 
 * debe incluir el identificador de la operación, la fecha y hora, tipo de combustible, 
 * unidad de medida, número de unidades solicitadas, número de unidades servidas, 
 * surtidor utilizado, manguera utilizada,
 */

GET api.servotal.com/receipts/1
{
    "station_name":"Name",
    "station_nif":"NIF",
    "station_address":"Address",
    "station_phone":"Phone",
    "client_name":"Name",
    "client_nif":"NIF",
    "client_address":"Address",
    "client_phone":"Phone",
    "product": "Product 1",
    "commercial_name": "Comemrcial name 1",
    "unit": "lts",
    "price": "10.000",
    "quantity":"45"     // en lts o en price?   
}

/**
 * Factura
 * 
 * Fuel+ indica el número o números de albarán sobre el cual se quiere 
 * obtener la factura. El sistema Informa de la factura con los 
 * datos de cabecera de la factura, todos los albaranes y las 
 * líneas (habitualmente solamente una) de las operaciones 
 * realizadas en esa transacción. La información suministrada será la 
 * misma que en el caso de la línea de albarán. Se generará factura
 * simplificada siempre que se haya informado del NIF del cliente al 
 * Iniciar Repostaje.
 */

GET api.servotal.com/invoices
{
    "id_transaction":"1",
    "id_transaction":"2",   
}

RESULT
GET api.servotal.com/receipts/1
{
    "_embedded": {
        "receipts": [
            {
                "id_transaction":"1",
                "station_name":"Name",
                "station_nif":"NIF",
                "station_address":"Address",
                "station_phone":"Phone",
                "client_name":"Name",
                "client_nif":"NIF",
                "client_address":"Address",
                "client_phone":"Phone",
                "product": "Product 1",
                "commercial_name": "Comemrcial name 1",
                "unit": "lts",
                "price": "10.000",
                "quantity":"45"     // en lts o en price?
            },
            {
                "id_transaction":"2",
                "station_name":"Name",
                "station_nif":"NIF",
                "station_address":"Address",
                "station_phone":"Phone",
                "client_name":"Name",
                "client_nif":"NIF",
                "client_address":"Address",
                "client_phone":"Phone",
                "product": "Product 1",
                "commercial_name": "Comemrcial name 1",
                "unit": "lts",
                "price": "10.000",
                "quantity":"45"     // en lts o en price?
            }            
        ]
    }    
}


/**
 * Informar Comisión operación
 * Informar Comisión alta
 * 
 * Fuel+ Indicará a la estación cual es la comisión que se 
 * aplicará a Fuel+ por las operativas realizadas a través 
 * de su plataforma. Será un porcentaje utilizando 3 decimales. 
 * La tarifa tendrá un periodo de tiempo de vigencia con una fecha 
 * inicio y otra de fin. En el caso de que la fecha de fin no esté 
 * informada se considerará sin caducidad. En caso de conflicto de 
 * periodo con comisiones anteriormente definidas prevalecerá la última 
 * informada.
 */

POST api.servotal.com/commisions
{
    "commision_type":"1",
    "commision_unit":"percentage|price",
    "commision_value":"2",
    "start_date":"DATE",
    "end_date":"DATE"
}



/**
 * Registro Cliente
 * 
 */

POST api.servotal.com/clients
{
    "id_statione":"Name",
    "client_name":"Name",
    "client_nif":"NIF",
    "client_address":"Address",
    "client_phone":"Phone",
    "_embedded": {
        "loyalty_programs": [
            {
                "id_program":"1"
                "name":"Extra Discount",
                "discount":"10%",
            },
            {
                "id_program":"2"
                "name":"Super Discount",
                "discount":"20%",
            },        
        ]
    }  
}