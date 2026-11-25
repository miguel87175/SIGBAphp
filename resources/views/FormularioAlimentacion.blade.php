
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bienestar al Aprendiz | SENA</title>

    <!-- Conexión con los estilos CSS -->
    @vite(['resources/css/FormularioAlimentacion.css','resources/js/FormularioAlimentacion.js'])
</head>

<body>

    <header class="encabezado">
        <div class="logo">
            <h1>SENA</h1>
            <span>Servicio Nacional de Aprendizaje</span>
        </div>

        <div class="titulo-header">
            <h2>Bienestar al Aprendiz</h2>
            <p>Programa de acompañamiento y apoyo al aprendiz</p>
        </div>
    </header>

    <main class="contenedor">

        <section class="introduccion">
            <h2>Solicitud de apoyo de alimentación</h2>

            <p>
                Este formulario tiene como finalidad conocer las condiciones y
                necesidades de los aprendices que solicitan el apoyo
                de alimentación durante su proceso de formación.
            </p>

            <div class="aviso">
                <strong>Importante:</strong>
                El diligenciamiento de este formulario no garantiza
                la asignación de un apoyo. Las solicitudes estarán
                sujetas a los requisitos y convocatorias institucionales.
            </div>
        </section>

        <form id="formularioBienestar" novalidate>

            <!-- SECCIÓN 1: INFORMACIÓN PERSONAL -->

            <section class="seccion">

                <h3>1. Información personal</h3>

                <div class="grupo-campos">

                    <div class="campo">
                        <label for="nombre">Nombres completos</label>
                        <input type="text" id="nombre" name="nombre"
                               placeholder="Ingrese sus nombres"
                               maxlength="100" required>
                    </div>

                    <div class="campo">
                        <label for="documento">Número de documento</label>
                        <input type="text" id="documento" name="documento"
                               placeholder="Ingrese su documento"
                               maxlength="20" required>
                    </div>

                    <div class="campo">
                        <label for="correo">Correo electrónico</label>
                        <input type="email" id="correo" name="correo"
                               placeholder="ejemplo@correo.com"
                               maxlength="120" required>
                    </div>

                    <div class="campo">
                        <label for="telefono">Número de contacto</label>
                        <input type="tel" id="telefono" name="telefono"
                               placeholder="Ingrese su teléfono"
                               maxlength="20" required>
                    </div>

                </div>
            </section>


            <!-- SECCIÓN 2: INFORMACIÓN ACADÉMICA -->

            <section class="seccion">

                <h3>2. Información académica</h3>

                <div class="grupo-campos">

                    <div class="campo">
                        <label for="programa">Programa de formación</label>
                        <input type="text" id="programa" name="programa"
                               placeholder="Ej. Análisis y Desarrollo de Software"
                               maxlength="120" required>
                    </div>

                    <div class="campo">
                        <label for="ficha">Número de ficha</label>
                        <input type="text" id="ficha" name="ficha"
                               placeholder="Número de ficha"
                               maxlength="30" required>
                    </div>

                    <div class="campo">
                        <label for="jornada">Jornada de formación</label>
                        <select id="jornada" name="jornada" required>
                            <option value="">Seleccione una jornada</option>
                            <option value="Mañana">Mañana</option>
                            <option value="Tarde">Tarde</option>
                            <option value="Noche">Noche</option>
                            <option value="Mixta">Mixta</option>
                        </select>
                    </div>

                    <div class="campo">
                        <label for="centro">Centro de formación</label>
                        <input type="text" id="centro" name="centro"
                               placeholder="Nombre del centro"
                               maxlength="120" required>
                    </div>

                </div>
            </section>


            <!-- SECCIÓN 3: INFORMACIÓN SOBRE EL APOYO DE ALIMENTACIÓN -->

            <section class="seccion">

                <h3>3. Información sobre el apoyo de alimentación</h3>

                <p class="descripcion">
                    Responda las siguientes preguntas para conocer mejor
                    sus necesidades relacionadas con la alimentación
                    durante su proceso de formación.
                </p>

                <div class="grupo-campos">

                    <div class="campo">
                        <label for="apoyo_actual">
                            ¿Actualmente recibe algún tipo de apoyo alimentario?
                        </label>

                        <select id="apoyo_actual" name="apoyo_actual" required>
                            <option value="">Seleccione una opción</option>
                            <option value="Sí">Sí</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="campo">
                        <label for="frecuencia_alimentacion">
                            ¿Con qué frecuencia tiene dificultades para acceder
                            a una alimentación adecuada?
                        </label>

                        <select id="frecuencia_alimentacion"
                                name="frecuencia_alimentacion" required>
                            <option value="">Seleccione una opción</option>
                            <option value="Nunca">Nunca</option>
                            <option value="Rara vez">Rara vez</option>
                            <option value="Algunas veces">Algunas veces</option>
                            <option value="Frecuentemente">Frecuentemente</option>
                        </select>
                    </div>

                    <div class="campo">
                        <label for="momento_alimentacion">
                            ¿En qué momento del día necesita principalmente
                            el apoyo alimentario?
                        </label>

                        <select id="momento_alimentacion"
                                name="momento_alimentacion" required>
                            <option value="">Seleccione una opción</option>
                            <option value="Desayuno">Desayuno</option>
                            <option value="Almuerzo">Almuerzo</option>
                            <option value="Cena">Cena</option>
                            <option value="Durante toda la jornada">
                                Durante toda la jornada
                            </option>
                        </select>
                    </div>

                </div>

            </section>


            <!-- SECCIÓN 4: SITUACIÓN SOCIOECONÓMICA -->

            <section class="seccion">

                <h3>4. Información socioeconómica</h3>

                <div class="grupo-campos">

                    <div class="campo">
                        <label for="situacion">
                            ¿Cuál es su situación laboral actual?
                        </label>

                        <select id="situacion" name="situacion" required>
                            <option value="">Seleccione una opción</option>
                            <option value="Desempleado">
                                No cuento con empleo
                            </option>
                            <option value="Empleado">
                                Tengo empleo
                            </option>
                            <option value="Trabajo independiente">
                                Trabajo independiente
                            </option>
                        </select>
                    </div>

                    <div class="campo">
                        <label for="personas">
                            ¿Cuántas personas dependen económicamente
                            de usted?
                        </label>

                        <select id="personas" name="personas" required>
                            <option value="">Seleccione una opción</option>
                            <option value="Ninguna">Ninguna</option>
                            <option value="1 a 2">De 1 a 2</option>
                            <option value="3 a 4">De 3 a 4</option>
                            <option value="5 o más">5 o más</option>
                        </select>
                    </div>

                    <div class="campo">
                        <label for="ingresos">
                            ¿Cómo describe los ingresos de su hogar?
                        </label>

                        <select id="ingresos" name="ingresos" required>
                            <option value="">Seleccione una opción</option>
                            <option value="Sin ingresos fijos">
                                No contamos con ingresos fijos
                            </option>
                            <option value="Ingresos bajos">
                                Son limitados
                            </option>
                            <option value="Ingresos estables">
                                Son estables
                            </option>
                            <option value="Prefiero no responder">
                                Prefiero no responder
                            </option>
                        </select>
                    </div>

                    <div class="campo">
                        <label for="estrato">
                            Estrato socioeconómico (opcional)
                        </label>

                        <select id="estrato" name="estrato">
                            <option value="">Prefiero no indicarlo</option>
                            <option value="1">Estrato 1</option>
                            <option value="2">Estrato 2</option>
                            <option value="3">Estrato 3</option>
                            <option value="4">Estrato 4</option>
                            <option value="5">Estrato 5</option>
                            <option value="6">Estrato 6</option>
                        </select>
                    </div>

                </div>

            </section>


            <!-- SECCIÓN 5: JUSTIFICACIÓN -->

            <section class="seccion">

                <h3>5. Justificación de la solicitud</h3>

                <div class="campo">
                    <label for="justificacion">
                        Explique brevemente por qué necesita el apoyo de alimentación
                    </label>

                    <textarea id="justificacion" name="justificacion"
                              rows="5" maxlength="1500"
                              placeholder="Describa su situación alimentaria actual y explique cómo este apoyo contribuiría a su proceso de formación..."
                              required></textarea>
                </div>

            </section>


            <!-- SECCIÓN 6: AUTORIZACIÓN -->

            <section class="seccion autorizacion">

                <h3>6. Declaración del aprendiz</h3>

                <label class="check">
                    <input type="checkbox" name="declaracion"
                           value="Acepto" required>

                    <span>
                        Declaro que la información suministrada es
                        verdadera y autorizo su revisión para los
                        fines relacionados con la evaluación de esta
                        solicitud, conforme a las políticas de
                        tratamiento de datos aplicables.
                    </span>
                </label>

            </section>


            <!-- BOTÓN DE ENVÍO -->

            <div class="botones">
                <button type="reset" class="btn-limpiar">
                    Limpiar formulario
                </button>

                <button type="submit" class="btn-enviar">
                    Enviar solicitud
                </button>
            </div>

        </form>

        <footer>
            <p>Bienestar al Aprendiz - SENA</p>
            <small>Prototipo académico de solicitud de apoyos.</small>
        </footer>
    </main>

</body>
</html>

