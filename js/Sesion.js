import { CUE } from "./const/CUE.js"
import { ROL_IDS } from "./const/ROL_IDS.js"

export class Sesion {

 /**
  * @param { any } objeto
  */
 constructor(objeto) {

  /** @readonly */
  this.cue = objeto[CUE]
  if (typeof this.cue !== "string")
   throw new Error("cue debe ser string.")

  /** @readonly */
  const rolIds = objeto[ROL_IDS]
  if (!Array.isArray(rolIds))
   throw new Error("rolIds debe ser arreglo.")
  /** @readonly */
  this.rolIds = new Set(rolIds)

 }

}

// Permite que los eventos de html usen la clase.
window["Sesion"] = Sesion