import { CUE } from "./const/CUE.js";
import { ROL_IDS } from "./const/ROL_IDS.js";
import { ID_USUARIO } from "./const/ID_USUARIO.js"; // Importamos la constante ID_USUARIO

export class Sesion {

 /**
  * @param { any } objeto
  */
 constructor(objeto) {

  /** @readonly */
  this.cue = objeto[CUE];
  if (typeof this.cue !== "string")
   throw new Error("cue debe ser string.");

  /** @readonly */
  const rolIds = objeto[ROL_IDS];
  if (!Array.isArray(rolIds))
   throw new Error("rolIds debe ser arreglo.");
  /** @readonly */
  this.rolIds = new Set(rolIds);

  /** @readonly */
  this.idUsuario = objeto[ID_USUARIO]; // Agregamos ID_USUARIO
  if (typeof this.idUsuario !== "number")
    throw new Error("ID_USUARIO debe ser un número.");

 }

}

// Permite que los eventos de html usen la clase.
window["Sesion"] = Sesion;
