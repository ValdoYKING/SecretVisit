import { muestraString } from "./muestraString.js"

/**
 * @param {Element} elementoHtml
 * @param {boolean} valor
 */
export function muestraBoolean(elementoHtml, valor) {
 if (elementoHtml instanceof HTMLInputElement
  && elementoHtml.type === "checkbox") {
  elementoHtml.checked = valor
 } else if (elementoHtml instanceof HTMLInputElement
  && elementoHtml.type === "range") {
  elementoHtml.valueAsNumber = valor === true ? 1 : 0
 } else {
  muestraString(elementoHtml, valor === true ? "verdadero" : "falso")
 }
}

// Permite que los eventos de html usen la función.
window["muestraBoolean"] = muestraBoolean
