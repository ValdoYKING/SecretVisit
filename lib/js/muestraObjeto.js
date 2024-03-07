import { buscaElementoHtml } from "./buscaElementoHtml.js"
import { muestraArray } from "./muestraArray.js"
import { muestraValor } from "./muestraValor.js"

/**
 * @param { Document | HTMLElement } raizHtml
 * @param { any } objeto
 */
export async function muestraObjeto(raizHtml, objeto) {
 for (const [propiedad, valor] of Object.entries(objeto)) {
  if (Array.isArray(valor)) {
   muestraArray(raizHtml, propiedad, valor)
  } else {
   const elementoHtml = buscaElementoHtml(raizHtml, propiedad)
   if (elementoHtml !== null) {
    await muestraValor(raizHtml, elementoHtml, valor)
   }
  }
 }
}

// Permite que los eventos de html usen la función.
window["muestraObjeto"] = muestraObjeto