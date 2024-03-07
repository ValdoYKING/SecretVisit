import { muestraInnerHtml } from "./muestraInnerHtml.js"
import { muestraTextContent } from "./muestraTextContent.js"

/**
 * @param { Element } elementoHtml
 * @param { string } valor
 */
export function muestraString(elementoHtml, valor) {
 if ("value" in elementoHtml) {
  elementoHtml.value = valor
 } else if (elementoHtml.getAttribute("data-text-content") !== null) {
  muestraTextContent(elementoHtml, valor)
 } else {
  muestraInnerHtml(elementoHtml, valor)
 }
}

// Permite que los eventos de html usen la función.
window["muestraString"] = muestraString