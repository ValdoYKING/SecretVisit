/**
 * @param {Element} elementoHtml
 * @param {string} valor
 */
export function muestraTextContent(elementoHtml, valor) {
    if (typeof valor === "string") {
     elementoHtml.textContent = valor
    }
   }
   
   // Permite que los eventos de html usen la función.
   window["muestraTextContent"] = muestraTextContent