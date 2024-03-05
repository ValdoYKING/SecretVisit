<?php

function bdCrea(PDO $con)
{
    $con->exec(
        'CREATE TABLE IF NOT EXISTS USUARIO (
            USU_ID INTEGER PRIMARY KEY,
            USU_CUE TEXT NOT NULL UNIQUE,
            USU_MATCH TEXT NOT NULL
        )'
    );

    $con->exec(
        'CREATE TABLE IF NOT EXISTS ROL (
            ROL_ID TEXT PRIMARY KEY,
            ROL_DESCRIPCION TEXT NOT NULL UNIQUE
        )'
    );

    $con->exec(
        'CREATE TABLE IF NOT EXISTS USU_ROL (
            USU_ID INTEGER NOT NULL,
            ROL_ID TEXT NOT NULL,
            PRIMARY KEY(USU_ID, ROL_ID),
            FOREIGN KEY (USU_ID) REFERENCES USUARIO(USU_ID),
            FOREIGN KEY (ROL_ID) REFERENCES ROL(ROL_ID)
        )'
    );

    $con->exec(
        'CREATE TABLE IF NOT EXISTS EMPRESA (
            EMP_ID INTEGER PRIMARY KEY,
            EMP_NOMBRE TEXT NOT NULL,
            EMP_DIRECCION TEXT NOT NULL,
            EMP_TELEFONO TEXT NOT NULL,
            EMP_CALIFICACION INTEGER NOT NULL
        )'
    );

    $con->exec(
        'CREATE TABLE IF NOT EXISTS ENCUESTA (
            ENC_ID INTEGER PRIMARY KEY,
            EMP_ID INTEGER NOT NULL,
            USU_ID INTEGER NOT NULL,
            ENC_RECOMPENSA TEXT NOT NULL,
            FOREIGN KEY (EMP_ID) REFERENCES EMPRESA(EMP_ID),
            FOREIGN KEY (USU_ID) REFERENCES USUARIO(USU_ID)
        )'
    );

    $con->exec(
        'CREATE TABLE IF NOT EXISTS PREGUNTA (
            PRE_ID INTEGER PRIMARY KEY,
            PRE_PREGUNTA TEXT NOT NULL
        )'
    );

    $con->exec(
        'CREATE TABLE IF NOT EXISTS ENC_PRE (
            ENC_ID INTEGER NOT NULL,
            PRE_ID INTEGER NOT NULL,
            PRIMARY KEY(ENC_ID, PRE_ID),
            FOREIGN KEY (ENC_ID) REFERENCES ENCUESTA(ENC_ID),
            FOREIGN KEY (PRE_ID) REFERENCES PREGUNTA(PRE_ID)
        )'
    );
}
?>
