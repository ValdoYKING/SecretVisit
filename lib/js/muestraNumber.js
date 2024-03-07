import { muestraString } from "./muestraString.js"

/**
 * @param { Element } elementoHtml
 * @param { number } valor
 */
export function muestraNumber(elementoHtml, valor) {
 if (isNaN(valor)) {
  muestraString(elementoHtml, "")
 } else {
  muestraString(elementoHtml, valor.toString())
 }
}
// Permite que los eventos de html usen la función.
window["muestraNumber"] = muestraNumber