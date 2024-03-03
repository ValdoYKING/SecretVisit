import { htmlentities } from "../../lib/js/htmlentities.js"
import { Sesion } from "../Sesion.js"
import { ROL_ADMINISTRADOR } from "../const/ROL_ADMINISTRADOR.js"
/* import { ROL_CLIENTE } from "../const/ROL_CLIENTE.js" */
import { ROL_MYSTERY_SHOPPER } from "../const/ROL_MYSTERY_SHOPPER.js"
import { ROL_ANALISTA } from "../const/ROL_ANALISTA.js"

export class MiNav extends HTMLElement {

 connectedCallback() {

  this.style.display = "block"

  this.innerHTML = /* html */
   `<nav>
     <ul style="display: flex;
            flex-wrap: wrap;
            padding:0;
            gap: 0.5em;
            list-style-type: none">
      <li><progress max="100">Cargando&hellip;</progress></li>
     </ul>
    </nav>`

 }

 /**
  * @param {Sesion} sesion
  */
 set sesion(sesion) {
  const cue = sesion.cue
  const rolIds = sesion.rolIds
  let innerHTML = /* html */ `<li><a href="index.html">Inicio</a></li>`
  innerHTML += this.hipervinculosAdmin(rolIds)
  innerHTML += this.hipervinculosMysteryShopper(rolIds)
  innerHTML += this.hipervinculosAnalista(rolIds)
  const cueHtml = htmlentities(cue)
  if (cue !== "") {
   innerHTML +=  /* html */ `<li>${cueHtml}</li>`
  }
  innerHTML += /* html */ `<li><a href="perfil.html">Perfil</a></li>`
  const ul = this.querySelector("ul")
  if (ul !== null) {
   ul.innerHTML = innerHTML
  }
 }

 /**
  * @param {Set<string>} rolIds
  */
 hipervinculosAdmin(rolIds) {
  return rolIds.has(ROL_ADMINISTRADOR) ?
   /* html */ `<li><a href="admin.html">Para administradores</a></li>`
   : ""
 }

 hipervinculosMysteryShopper(rolIds) {
    return rolIds.has(ROL_MYSTERY_SHOPPER) ?
     /* html */ `<li><a href="mystery-shopper.html">Para mystery shoppers</a></li>`
     : ""  
 }

 hipervinculosAnalista(rolIds) {
  return rolIds.has(ROL_ANALISTA) ?
   /* html */ `<li><a href="analista.html">Para analistas</a></li>`
   : ""
 }
}

customElements.define("mi-nav", MiNav)