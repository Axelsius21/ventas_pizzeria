@echo off
:: ============================================================================
:: Script de Automatizacion de Despliegue para Pizza Roga
:: Automatiza: Git (Add, Commit, Push) + Docker (Stop, Rm, Build, Run)
:: ============================================================================

CLS
echo ============================================================================
echo           INICIANDO LA AUTOMATIZACION DE DESPLIEGUE - PIZZA ROGA
echo ============================================================================
echo.

if not exist "Dockerfile" (
    echo [ERROR] No se encontro el archivo 'Dockerfile' en este directorio.
    goto :error
)

echo [GIT] Preparando cambios en el repositorio local...
git add .

echo.
set /p commit_msg="Introduce la descripcion para el Commit (ej. Correccion de imagenes): "
if "%commit_msg%"=="" (
    set commit_msg="Actualizacion automatica del sitio web - Pizza Roga"
)

echo.
echo [GIT] Guardando confirmacion local (Commit)...
git commit -m "%commit_msg%"

echo.
echo [GIT] Subiendo cambios al repositorio remoto en GitHub (Push)...
git push origin main
if %ERRORLEVEL% NEQ 0 (
    echo.
    echo [ADVERTENCIA] Error en el push. El script continuara con el despliegue local...
    echo.
    pause
)

echo.
echo ============================================================================
echo           ACTUALIZANDO CONTENEDOR DOCKER LOCAL
echo ============================================================================
echo.

echo [DOCKER] Deteniendo contenedor anterior si esta activo...
docker stop mi-contenedor-web >nul 2>&1
docker rm mi-contenedor-web >nul 2>&1

echo [DOCKER] Construyendo la nueva imagen de Pizza Roga...
docker build -t pizzaroga-web .
if %ERRORLEVEL% NEQ 0 (
    echo [ERROR] Fallo la compilacion de la imagen en Docker.
    goto :error
)

echo.
echo [DOCKER] Encendiendo el nuevo contenedor en el puerto 8080...
docker run -d -p 8080:80 --name mi-contenedor-web pizzaroga-web
if %ERRORLEVEL% NEQ 0 (
    echo [ERROR] No se pudo encender el contenedor.
    goto :error
)

echo.
echo ============================================================================
echo ¡PROCESO COMPLETADO CON EXITO!
echo ============================================================================
echo.
echo  Puedes acceder desde tu PC en: http://localhost:8080
echo.
pause
exit /b 0

:error
echo.
echo [PROCESO FALLIDO] Ocurrio un error critico.
echo.
pause
exit /b 1