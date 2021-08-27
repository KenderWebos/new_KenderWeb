/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

( function()
{
    var lista = document.getElementById("lista"),
            tareaInput = document.getElementById("tareaInput"),
            btnNuevaTarea = document.getElementById("btnAgregar");
    
    //FUNCIONES
    
    var agregarTarea = function()
    {
        var tarea = tareaInput.value,
                nuevaTarea = document.createElement("li"),
                enlace = document.createElement("a"),
                contenido = document.createTextNode(tarea);
        
        if (tarea === "")
        {
            tareaInput.setAttribute("placeholder", "agrega una tarea primero");
            tareaInput.className = "error";
            return false;
        }
        
        //agregamos contenido al enlace
        enlace.appendChild(contenido);
        
        //le damos un aatributo href al enlace
        enlace.setAttribute("href", "#tareas-section");
        
        //metemos el elemento <a> en el elemento <li>
        nuevaTarea.appendChild(enlace);
        
        nuevaTarea.style.width = "90%";
        
        //agregamos la nueva tarea ( <li> <a> contenido ) a la <ul> unordened list
        lista.appendChild(nuevaTarea);
        
        tareaInput.value = "";
        
        for (var i = 0; i <= lista.children.length; i++)
        {
            lista.children[i].addEventListener("click", function(){
                this.parentNode.removeChild(this);  
            });
        }
        
        };
    var comprobarInput = function(){
        tareaInput.className = "";
        tareaInput.setAttribute("placeholder", "ingresa una tarea");
        };
    var eliminarTarea = function(){
        this.parentNode.removeChild(this);
        };
    
    //EVENTOS
    
    //agregar tarea
    btnNuevaTarea.addEventListener("click", agregarTarea);
    
    //comprobar input
    tareaInput.addEventListener("click", comprobarInput);
    
    //borrando elementos de la lista
    for (var i = 0; i <= lista.children.length - 1; i++)
    {
        lista.children[i].addEventListener("click", eliminarTarea);
    }
    
}() );
