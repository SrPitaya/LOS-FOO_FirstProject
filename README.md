# 📌 Proyecto 1 de PABD - *by LOS FOO!*

## 🚀 Instalación del Proyecto  

Para instalar el proyecto en tu entorno local (*localhost* con WAMP), sigue estos pasos:  

1. **Clona el repositorio en la carpeta de WAMP**  
   Abre *Git Bash* o la terminal de *Visual Studio Code* y ejecuta el siguiente comando:  

   ```bash
   git clone https://github.com/SrPitaya/LOS-FOO_FirstProject.git
   ```  

2. **Crea tu propia rama (OBLIGATORIO)**  
   Una vez clonado el repositorio, posiciona tu terminal dentro de la carpeta del proyecto y ejecuta:  

   ```bash
   git checkout -b TuUsuarioDeGitHubBranch
   ```  
    💡Por ejemplo, si tu usuario de GitHub es `LuisChe`, el comando sería:

    ```bash
    git checkout -b LuisCheBranch
    ```   

   ✅ *Esto ayudará a mantener un mejor orden en el trabajo colaborativo.*  

3. **Configura la conexión a la base de datos**  
   Debes modificar el archivo `db.php`, ubicado en la carpeta **config**, según tu configuración local:  

   ```php
   $servername = "localhost"; // Nombre del host o IP local  
   $username = "root"; // Usuario de la base de datos  
   $password = ""; // Contraseña del usuario  
   $dbname = "facultad"; // Nombre de la base de datos  
   ```  

   🔴 **IMPORTANTE**: Al finalizar tu trabajo, **restaura los valores originales** por seguridad.  

4. **Inicia el proyecto en tu navegador**  
   Abre tu navegador y accede a:  

   ```
   http://localhost/LOS-FOO_FirstProject
   ```  

   🎉 *¡Listo! Ahora puedes visualizar la página web y realizar pruebas.*  

---

## 🔎 Funcionamiento de la Primera Fase del Proyecto  

El proyecto está estructurado en dos carpetas principales:  

### 📂 `/components`  
Contiene los archivos responsables de la interfaz visual y funcionalidad con JavaScript:  

- `consulta1.php`  
- `consulta2.php`  
- `modal.php` *(este no es tan relevante, pero ahí está 🤭)*  

### 📂 `/connection`  
Aquí se encuentran los archivos encargados de la extracción de datos mediante consultas SQL:  

- `fetch_consulta1.php`  
- `fetch_consulta2.php`  

📝 **Regla general:** Por cada `consultaX.php` en **components**, debe existir un `fetch_consultaX.php` en **connection**. *Van de la mano.*  

📌 **Resumen:**  
- `consultaX.php` → Parte visual y funcional (*con estilos y scripts JavaScript*).  
- `fetch_consultaX.php` → Obtiene datos de la base de datos y genera botones de paginación.  

🚨 *Y sí, `modal.php` sigue ahí, nadie lo quiere, pero no lo borres... por si acaso.* 😆  

---

## 🤝 ¿Cómo aportar al proyecto?  

Cada miembro debe encargarse de las **2 consultas** asignadas en la reunión (o en la *junta empresarial* jaja).  

📌 **Normas de contribución:**  
1. **Por cada `consultaX.php` que crees, debes crear su `fetch_consultaX.php`.**  
2. **Sigue la estructura existente** de los archivos ya creados.  
3. **Incluye tu consulta en `index.php`** de la siguiente manera:  

   ```php
   <?php include 'components/consultaX.php'; ?>
   ```
👀 OJO: En el archivo index, solo puedes añadir un **máximo de 2 líneas**. Además, el proyecto debe incluir **obligatoriamente dos archivos**, los mencionados anteriormente.
 
 🔍 Sr. Pitaya lo inspeccionará de todos modos… MUAJ MUAJ MUAJ 😈
 
 Ah, y no olvides restablecer el código de db.php a su estado original(***ya sabes por seguridad***), por favor. 🙏
 
 
---

## 🔄 Solicitar la fusión de tu rama al main

Una vez hayas terminado tu parte y hayas verificado que todo funciona correctamente (¡espero que sí! 😜), sigue estos pasos para fusionar tu trabajo al proyecto principal:

📌 **Últimos pasos a seguir:**

1. **Añadir los cambios al área de preparación (staging area):**
   Asegúrate de haber agregado todos los archivos modificados para que se incluyan en el commit:
   ```bash
   git add .
   ```

2. **Confirmar los cambios con un mensaje claro:**
   Realiza el commit con una breve descripción de lo que has hecho. Asegúrate de que el mensaje sea claro y específico:
   ```bash
   git commit -m "Descripción breve de lo que hiciste"
   ```

3. **Subir tu rama a GitHub:**
   Sube tus cambios a tu rama en GitHub. Recuerda usar el nombre de tu rama personal:
   ```bash
   git push origin TuUsuarioDeGitHubBranch
   ```

✅ ¡Listo! Una vez aprobado el PR, tu trabajo se fusionará con la rama principal y estará disponible para todos los miembros del proyecto.
