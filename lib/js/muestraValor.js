import { muestraBoolean } from "./muestraBoolean.js"
import { muestraImagen } from "./muestraImagen.js"
import { muestraNumber } from "./muestraNumber.js"
import { muestraString } from "./muestraString.js"

/**
 * @param { Document | HTMLElement } raizHtml
 * @param { Element } elementoHtml
 * @param { any } valor
 */
export async function muestraValor(raizHtml, elementoHtml, valor) {
 if (typeof valor === "string") {
  if (elementoHtml instanceof HTMLImageElement) {
   await muestraImagen(raizHtml, elementoHtml, valor)
  } else {
   muestraString(elementoHtml, valor)
  }
 } else if (typeof valor === "number") {
  muestraNumber(elementoHtml, valor)
 } else if (valor === null || valor === undefined) {
  muestraString(elementoHtml, "")
 } else if (typeof valor === "boolean") {
  muestraBoolean(elementoHtml, valor)
 } else {
  const name = "name" in elementoHtml
   ? elementoHtml["name"]
   : elementoHtml.id
  throw new Error(`El valor de ${name} no es soportado.`)
 }
}

// Permite que los eventos de html usen la función.
window["muestraValor"] = muestraValor