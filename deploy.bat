@echo off
:: ============================================================================
:: Script de Automatizacion de Despliegue para Pizza Roga
:: Automatiza: Git (Add, Commit, Push) + Docker (Stop, Rm, Build, Run)
:: ============================================================================

CLS
echo ============================================================================
echo           INICIANDO AUTOMATIZACION DE DESPLIEGUE - PIZZA ROGA
echo ============================================================================
echo.

:: 1. GIT AUTOMATICO
echo [1/4] Agregando archivos a Git...
git add .

echo [2/4] Generando Commit automatico...
git commit -m "Actualizacion automatica del sitio web - Pizza Roga"

echo [3/4] Subiendo cambios a GitHub...
echo (Si se congela aqui, presiona Ctrl+C y verifica tu Token)
git push origin main

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