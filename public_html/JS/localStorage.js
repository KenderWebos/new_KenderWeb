
guardarLocalStorage();

function get( ){
    //JSON.parse(); esto es para retransformar el string a OBJETO.
}

function set( ){
    
}

function guardarLocalStorage(){
    let persona = 
    {
        nombre: "Kevin",
        edad: 21,
        correo: "kenderman.8@gmail.com",
        
        coordenadas:
        {
            x:5,
            y:5
        }

    };
    
    let nombre = "juan";
    
    localStorage.setItem( "nombre", nombre);
    localStorage.setItem( "persona", JSON.stringify(persona) );
}
