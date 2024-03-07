/**
 * @param { Document | HTMLElement } raizHtml
 * @param { string } propiedad
 * @param {any[]} valores
 */
export function muestraArray(raizHtml, propiedad, valores) {
    const conjunto = new Set(valores)
    const elementos = raizHtml.querySelectorAll(
     `[name="${propiedad}"],[data-name="${propiedad}"]`)
    for (const elemento of Array.from(elementos)) {
     if (elemento instanceof HTMLInputElement) {
      elemento.checked = conjunto.has(elemento.value)
     }
    }
   }
   
   // Permite que los eventos de html usen la función.
   window["muestraArray"] = muestraArray
   