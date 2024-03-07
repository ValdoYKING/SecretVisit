/**
 * @param { Document | HTMLElement } raizHtml
 * @param { string } nombre
 */
export function buscaElementoHtml(raizHtml, nombre) {
    return raizHtml.querySelector(
     `#${nombre},[name="${nombre}"],[data-name="${nombre}"]`)
   }
   
   // Permite que los eventos de html usen la función.
   window["buscaElementoHtml"] = buscaElementoHtml