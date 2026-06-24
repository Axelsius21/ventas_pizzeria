@echo off
:: ============================================================================
:: Script de Automatizacion de Despliegue para Pizza Roga
:: Automatiza: Git (Add, Commit con Mensaje Manual, Push Forzado) + Docker
:: ============================================================================

CLS
echo ============================================================================
echo           INICIANDO AUTOMATIZACION DE DESPLIEGUE - PIZZA ROGA
echo ============================================================================
echo.

:: 1. GIT AUTOMATICO (CON MENSAJE MANUAL)
echo [1/4] Agregando archivos a Git...
git add .

echo.
:: Aquí te pide el mensaje manualmente en la consola
set /p commit_msg="Introduce la descripcion para el Commit (ej. Correccion de imagenes): "

:: Si presionas Enter sin escribir nada, le asigna un mensaje por defecto para que no falle
if "%commit_msg%"=="" (
    set commit_msg="Actualizacion automatica del sitio web - Pizza Roga"
)

echo.
echo [2/4] Generando Commit con tu descripcion...
git commit -m "%commit_msg%"

echo.
echo [3/4] Subiendo cambios a GitHub (Forzado)...
echo (Si se congela aqui, presiona Ctrl+C y verifica tu Token)
:: El --force soluciona el error [rejected] que te salio antes
git push origin main --force

:: 2. DOCKER AUTOMATICO
echo.
echo [4/4] Actualizando Contenedor Docker Local...
docker stop mi-contenedor-web >nul 2>&1
docker rm mi-contenedor-web >nul 2>&1

echo [DOCKER] Recompilando imagen...
docker build -t pizzaroga-web .

echo [DOCKER] Iniciando contenedor en puerto 8080...
docker run -d -p 8080:80 --name mi-contenedor-web pizzaroga-web

echo.
echo ============================================================================
echo ¡DESPLIEGUE FINALIZADO EXITOSAMENTE!
echo ============================================================================
echo Puedes entrar a: http://localhost:8080
echo.
pause