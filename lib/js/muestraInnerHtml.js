/**
 * @param {Element} elementoHtml
 * @param {any} valor
 */
export function muestraInnerHtml(elementoHtml, valor) {
    if (typeof valor === "string") {
     elementoHtml.innerHTML = valor
    }
   }
   // Permite que los eventos de html usen la función.
   window["muestraInnerHtml"] = muestraInnerHtml