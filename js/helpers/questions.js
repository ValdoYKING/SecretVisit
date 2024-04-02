const preguntasAtencionClientes = [

    {
        tema: "Atención al cliente",
        pregunta: "¿El personal de la tienda te saludó al entrar?",
    },
    {
        tema: "Atención al cliente",
        pregunta: "¿El personal de la tienda fue amable y servicial?",
    },


    {
        tema: "Presentación de productos",
        pregunta: "¿Los productos estaban correctamente etiquetados?",
    },
    {
        tema: "Presentación de productos",
        pregunta: "¿Los productos estaban organizados y ordenados en las estanterías?",
    },


    {
        tema: "Tiempo de espera",
        pregunta: "¿Cuánto tiempo tuviste que esperar para ser atendido?",
    },
    {
        tema: "Tiempo de espera",
        pregunta: "¿El tiempo de espera en la caja fue razonable?",
    },

  
    {
        tema: "Conocimiento del producto",
        pregunta: "¿El personal de la tienda pudo responder tus preguntas sobre los productos?",
    },
    {
        tema: "Conocimiento del producto",
        pregunta: "¿El personal de la tienda te ofreció información adicional sobre los productos?",
    },

 
    {
        tema: "Limpieza y orden",
        pregunta: "¿La tienda estaba limpia y ordenada?",
    },
    {
        tema: "Limpieza y orden",
        pregunta: "¿Los baños estaban limpios y en buen estado?",
    },
];

const preguntasProductos =[
    // Tema 6: Calidad de los productos
    {
        tema: "Calidad de los productos",
        pregunta: "¿Los productos que compraste cumplían con tus expectativas de calidad?",
    },
    {
        tema: "Calidad de los productos",
        pregunta: "¿Has tenido algún problema con la calidad de los productos comprados?",
    },

    // Tema 7: Precios
    {
        tema: "Precios",
        pregunta: "¿Consideras que los precios de los productos son justos?",
    },
    {
        tema: "Precios",
        pregunta: "¿Has encontrado productos con descuentos o promociones atractivas?",
    },

    // Tema 8: Variedad de productos
    {
        tema: "Variedad de productos",
        pregunta: "¿La tienda ofrece una amplia variedad de productos?",
    },
    {
        tema: "Variedad de productos",
        pregunta: "¿Has encontrado todos los productos que estabas buscando?",
    },

    // Tema 9: Experiencia de compra en línea
    {
        tema: "Experiencia de compra en línea",
        pregunta: "¿Has realizado compras en línea en esta tienda?",
    },
    {
        tema: "Experiencia de compra en línea",
        pregunta: "¿Cómo calificarías tu experiencia de compra en línea en esta tienda?",
    },

    // Tema 10: Devoluciones y garantías
    {
        tema: "Devoluciones y garantías",
        pregunta: "¿Has tenido que hacer alguna devolución de productos en esta tienda?",
    },
    {
        tema: "Devoluciones y garantías",
        pregunta: "¿Cómo ha sido tu experiencia con las garantías de los productos comprados en esta tienda?",
    },
];

const preguntasEstacionamiento = [
    {
        tema: "Estacionamiento",
        pregunta: "¿La tienda cuenta con suficiente espacio de estacionamiento?",
    },
    {
        tema: "Estacionamiento",
        pregunta: "¿El estacionamiento de la tienda estaba limpio y bien señalizado?",
    },
];
const preguntasCobros = [
    {
        tema: "Cobros",
        pregunta: "¿El proceso de cobro en caja fue rápido y eficiente?",
    },
    {
        tema: "Cobros",
        pregunta: "¿Has tenido algún problema con el cobro de tus compras?",
    },
];

const preguntasAmbiente = [
    {
        tema: "Ambiente",
        pregunta: "¿El ambiente de la tienda era agradable y acogedor?",
    },
    {
        tema: "Ambiente",
        pregunta: "¿La tienda contaba con una buena iluminación y ventilación?",
    },
];

const preguntasRecomendacion = [
    {
        tema: "Recomendación",
        pregunta: "¿Recomendarías esta tienda a tus amigos y familiares?",
    },
    {
        tema: "Recomendación",
        pregunta: "¿Por qué recomendarías esta tienda a otros?",
    },
];

const preguntasSatisfaccion = [
    {
        tema: "Satisfacción general",
        pregunta: "¿Cómo calificarías tu experiencia de compra en esta tienda?",
    },
    {
        tema: "Satisfacción general",
        pregunta: "¿Qué aspectos de la tienda te gustaron más?",
    },
    {
        tema: "Satisfacción general",
        pregunta: "¿Qué aspectos de la tienda crees que podrían mejorar?",
    },
];

const preguntas = [
    ...preguntasAtencionClientes,
    ...preguntasProductos,
    ...preguntasEstacionamiento,
    ...preguntasCobros,
    ...preguntasAmbiente,
    ...preguntasRecomendacion,
    ...preguntasSatisfaccion,
];

export default preguntas;